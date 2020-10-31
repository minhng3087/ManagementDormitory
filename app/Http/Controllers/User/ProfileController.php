<?php

namespace App\Http\Controllers\User;
use App\Models\Profile;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ttsv = Profile::where('email', Auth::user()->email)->first();
        return view('users.profile.index', ['ttsv' => $ttsv]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mssv'  =>  'required|numeric',
            'phone' =>  'required|numeric',
            'class' =>  'required|string',
        ]);
        $form_data = [
            'name'  => Auth::user()->name,
            'mssv' => $request->mssv,
            'phone' => $request->phone,
            'class' => $request->class,
            'email' => Auth::user()->email,
        ];
        Profile::create($form_data);
        return redirect()->route('user.profile.index')->with('success', 'Data Added successfully.');
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
    public function edit(Profile $profile)
    {
        return view('users.profile.edit',compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $profile->mssv = $request->mssv;
        $profile->phone = $request->phone;
        $profile->class = $request->class;
        $profile->save() ?  
            $request->session()->flash('success', 'User updated successfully') : 
            $request->session()->flash('error', 'User updated failed');
        return redirect()->route('user.profile.index');
    }

}
