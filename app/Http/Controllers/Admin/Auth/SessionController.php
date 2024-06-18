<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function login()
    {
        return view('Admin.authentication.login');
    }
    public function checkLogin(LoginRequest $request)
    {
        $attributes = $request->validated();
//        dd($attributes);
        if(Auth::guard('admin')->attempt($attributes))
        {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with('error','invalid data');
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
