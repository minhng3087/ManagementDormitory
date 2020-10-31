<?php

namespace App\Http\Controllers\Admin;
use App\Models\Role;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class UsersController extends Controller
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
        $users = User::all();
        $profiles = Profile::all(); 
        return view('admin.users.index')->with([
            'users' => $users,
            'profiles' => $profiles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('create-users')) {
            return redirect()->route('admin.users.index');
        }
        return view('admin.users.create');
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
            'name'  =>  'required',
            'mssv'  =>  'required|numeric',
            'phone' =>  'required|numeric',
            'class' =>  'required|string',
        ]);
        $form_data = [
            'name'   =>  $request->name,
            'mssv' => $request->mssv,
            'phone' => $request->phone,
            'class' => $request->class,
            'email' => Auth::user()->email,
        ];
        Profile::create($form_data);
        return redirect()->route('admin.users.index')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        if(Gate::denies('edit-users')) {
            return redirect()->route('admin.users.index');
        }
        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles,
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->email = $request->email;
        $user->save() ?  
            $request->session()->flash('success', 'User updated successfully') : 
            $request->session()->flash('error', 'User updated failed');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Gate::denies('delete-users')) {
            return redirect()->route('admin.users.index');
        }
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
