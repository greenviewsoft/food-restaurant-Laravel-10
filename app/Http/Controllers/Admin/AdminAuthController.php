<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function Index(){

        return view('admin.auth.login');
    }// End Method




    public function AdminForget(){

        return view('admin.auth.forgot');
    }// End Method



    // public function AdminResetPassword(){

    //     return view('admin.auth.reset-password');
    // }// End Method






    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        
toastr('Logout Successfully','error');
        return redirect('/admin/login');


    } // End Method


}
  