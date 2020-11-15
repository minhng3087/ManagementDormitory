<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Area;
use App\Models\Room;
use App\Models\RoomRegistration;
use App\Models\Profile;
use App\User;
use Validator;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = DB::select('select * from areas');
        return view('students.area_info', ['areas' => $areas]);
    }

    public function viewRoom($id)
    {
        $room = DB::table('rooms')->where('area_id', '=', $id)->paginate(10);
        return view('students.area_info', ['room' => $room]);
    }

    public function registRoom($id)
    {
        $student_info = DB::table('profiles')->where('email', Auth::user()->email)->first();
        $room = DB::table('rooms')->where('id', $id)->first();
        $area_id = $room->area_id;
        $area_cost = DB::table('areas')->where('id',$area_id)->value('area_cost');
        $mssv = $student_info->mssv;
        $std_gender_id = $student_info->gt_id;
        if ($std_gender_id == 1) {
            $std_gender = 'nam';
        } else {
            $std_gender = 'nu';
        }
        $current_numbers = $room->current_numbers;
        $max_numbers = $room->max_numbers;
        $gender = $room->gender;
        $count = DB::table('room_registrations')->where([
            ['mssv',$mssv],
            ['status','!=','cancelled']
        ])->count();
        $count1 = DB::table('room_registrations')->where([
            ['mssv',$mssv],
            ['status','=','cancelled']
        ])->count();
        if($std_gender=="" || $mssv == ""){
            return redirect()->back()->with(['flag'=>'danger','message'=>'Vui lòng cập nhật thông tin cá nhân  ']);
        }
        else{
            if($count!=0){
                return redirect()->back()->with(['flag'=>'danger','message'=>'Sinh viên đã đăng ký ở năm nay']);
            }
            elseif($std_gender!=$gender){
                return redirect()->back()->with(['flag'=>'danger','message'=>'Giới tính không đúng']);
            }
            elseif ($current_numbers>=$max_numbers) {
                return redirect()->back()->with(['flag'=>'danger','message'=>'Phòng đã đầy']);
            }
            else{
                if($count1==0){
                    $created_at = Carbon::today()->toDateString();
                    DB::table('room_registrations')->insert(['room_id'=>$id,'mssv'=>$mssv,'name'=>Auth::user()->name, 'status'=>'registered','cost'=>$area_cost*(13-date('m')), 'created_at'=>$created_at]);
                    $current_numbers=$current_numbers + 1;
                    DB::table('rooms')->where('id',$id)->update(['current_numbers'=>$current_numbers]);
                    return redirect('student_xemdk');
                }
                else{
                    DB::table('room_registrations')->where([
                        ['mssv',$mssv]
                    ])->update(['status'=>'registered']);
                    $current_numbers = $current_numbers + 1;
                    DB::table('rooms')->where('id',$id)->update(['current_numbers'=>$current_numbers]);
                    return redirect('student_xemdk');
                }
            }
        }   

    }

    public function student_xemdk(){
        $mssv = Profile::where('email',Auth::user()->email)->value('mssv');
        $lsdk = RoomRegistration::where('mssv','=',$mssv)->get();
        $ttphong = Room::all();
        $ttkhu = Area::all();
        return view('students.student_xemdk',['lsdk'=>$lsdk,'ttphong'=>$ttphong,'ttkhu'=>$ttkhu]);
    }

    public function view_managers() {
        return view('students.view_managers');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
