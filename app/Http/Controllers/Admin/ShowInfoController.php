<?php

namespace App\Http\Controllers\Admin;
use App\Models\Role;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class ShowInfoController extends Controller
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
    public function showinfo()
    {
        $profiles = Profile::all();
        return view('pages.admin.show')->with([
            'profiles' => $profiles,
        ])->with('i', (request()->input('page', 1) - 1) * 5);
    }

}
