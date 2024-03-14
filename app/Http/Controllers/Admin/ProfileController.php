<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\traits\FileUploadTrait;
use Auth;
use Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    use FileUploadTrait;

    public function AdminProfile()
    {
        $id          = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.profile.index', compact('profileData'));
    } // End Method

    public function AdminProfileStore(Request $request)
    {


     $image = $this->uploadImage($request,'avatar');   

     dd($image);

    }






    public function AdminChangePassword()
    {

        $id          = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.profile.admin_change_password', compact('profileData'));
    } // End Method



    public function AdminChangePasswordUpdate(Request $request)
    {
        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',

        ]);

        /// Match The Old Password

        if (!Hash::check($request->old_password, auth::user()->password)) {

            toastr('Old Password Does not Match!', 'error');

            return back();
        }

        /// Update The New Password

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        toastr('Password Change Successfully', 'success');

        return back();
    } // End method




}
