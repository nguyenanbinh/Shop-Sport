<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class LoginController extends Controller
{

    public function __construct()
    {
        // $this->middleware('is.admin');
    }

    public function show()
    {
        // if (Auth::check() && Auth::user()->hasRole(['admin','mod','customer'])) {

        //     return view('admin.main');
        // }
        // Auth::logout();
        return view('admin.main');

    }

    public function login(Request $rq)
    {
        if (Auth::attempt(array('email' => $rq->email, 'password' => $rq->password))) {
            return redirect()->route('admin.main')->with('success','Login Successful');
        }
        return redirect()->route('admin.login')->with('error','Login Fail');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.form-login');
    }
}
