<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gt;
use App\Models\Room;
use App\Models\Area;
use App\Models\Profile;
use App\Models\RoomRegistration;
use App\User;
use DB;
use Validator;
use Carbon\Carbon;

use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Show người đăng ký
    public function index()
    {
        $ttphong = Room::all();
        $list = RoomRegistration::where([
            // [date('Y',$year->created_at),date('Y')],
            ['status','Đang chờ']
        ])->get();
        return view('managers.manager_duyetdk',['list'=>$list,'ttphong'=>$ttphong]);
    }

    // Xem thông tin sinh viên đăng ký
    public function get_manager_ttsv($mssv)
    {
        $ttsv = Profile::where('mssv', $mssv)->first();
        $vien = DB::table('profiles')->join('viens', 'viens.id', '=', 'profiles.vien_id');
        $khoa = DB::table('profiles')->join('khoas', 'khoas.id', '=', 'profiles.khoa_id');
        $gt = DB::table('profiles')->join('gts', 'gts.id', '=', 'profiles.gt_id');
        return view('managers.manager_ttsv', [
            'ttsv' => $ttsv,
            'vien' => $vien->value('viens.name'),
            'khoa' => $khoa->value('khoas.name'),
            'gt' => $gt->value('gts.name'),
        ]);
    }

    // Duyệt đăng ký
    public function get_manager_duyetdk($mssv) 
    {
        $updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        RoomRegistration::where('mssv', $mssv)->update(['status'=>'Thành công', 'updated_at'=>$updated_at]);
        return redirect()->back();
    }
    public function get_manager_huydk($mssv)
    {
        $updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $room_id = RoomRegistration::where([
            ['mssv',$mssv],
            ['status', '!=', 'Thành công']
        ])->value('room_id');
        $current_numbers = Room::where('id',$room_id)->value('current_numbers');
        $current_numbers = $current_numbers - 1;
        RoomRegistration::where([
        ['mssv',$mssv]
        ])->update(['status'=>"Hủy",'updated_at'=>$updated_at]);
        Room::where('id',$room_id)->update(['current_numbers'=>$current_numbers]);
        return redirect()->back();
    }

    // Quản lý phòng ở
    public function manager_qlphong() {
        $ttphong = DB::table('rooms')->paginate(7);
        return view('managers.manager_phong', ['ttphong' => $ttphong]);
    }
    public function manager_ttphong($id) {
        $list = RoomRegistration::where([
            ['room_id', $id],
            ['status', '!=', 'Hủy']
        ])->get();
        $room_id = DB::table('room_registrations')
                 ->select('room_id')
                 ->where([
                    ['room_id', $id],
                    ['status', '!=', 'Hủy']
                 ])
                 ->groupBy('room_id')->get();
        // $room_id = RoomRegistration::where([
        //     ['room_id', $id],
        //     ['status', '!=', 'Hủy']
        // ])->get()->groupBy('room_id');
        
        return view('managers.manager_ttphong', [
            'list' => $list,
            'room_id' => $room_id
        ]);
    }
    public function manager_delete_sv($mssv) {
        $room_id = RoomRegistration::where([
            ['mssv',$mssv]
        ])->value('room_id');
        $current_numbers = Room::where([ ['id', $room_id] ])->value('current_numbers');
        $current_numbers = $current_numbers - 1;
        Room::where([
            ['id',$room_id]
        ])->update(['current_numbers' => $current_numbers]);
        RoomRegistration::where([
           ['mssv',$mssv] 
        ])->update(['status'=>'Hủy']);
        return redirect()->back();
    }
   
    public function manager_search_sv(Request $request) {
        $gts = Gt::all();
        $request->validate([
            'search-sv'=>'required',            
        ]);
        $search_content = $request->input('search-sv');
        $sv_info = Profile::where('mssv', 'LIKE','%'.$search_content."%")
        ->orWhere('name', 'LIKE','%'.$search_content."%")
        ->orWhere('qq', 'LIKE','%'.$search_content."%")
        ->orWhere('email', 'LIKE','%'.$search_content."%")->paginate(7);
        return view('managers.manager_search_sv', compact('sv_info','gts'), ['search_content' => $search_content]);
    }

    public function manager_search_day(Request $request) {
        $start = $request->input('start');
        $end = $request->input('end');
        $room_id = $request->input('room_id');
        $list = RoomRegistration::whereDate('created_at', '>=', $start)
        ->whereDate('created_at', '<=', $end)->where('room_id', '=', $room_id)->get();
        return view('managers.manager_search_day', [
            'list' => $list,
            'start' => $start,
            'end' => $end
        ]);
    }

    public function indexSendNotify() {
        return view('managers.sendNotify');
    }

    public function sendNotification(Request $request)
    {
        // dd($request);
        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
        $SERVER_API_KEY = 'AAAAb5Ef6XA:APA91bG1cGEHstoLwouYUuJpgLRVmNBvxvJYEfS2OH5jwuMLP3ATry-2ZcvXP_25fLFVEdiERNx3n6Lba7XsI0PNT5E-pNDb-_HZsR194QGqwGKtD_zPZpIkFLSVZanpBmd2xqYpXANY';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
                "click_action" => $request->link
            ],
            "time_to_live" => 10

        ];
        
        $dataString = json_encode($data);
        // dd($dataString);
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
  
        $ch = curl_init();
  
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
              
        $response = curl_exec($ch);
        return redirect()->back()->with('message', 'Notification sent!'); 

    }
}
