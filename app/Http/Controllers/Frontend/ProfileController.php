<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProfilePasswordUpdate;
use App\Http\Requests\Frontend\ProfileUpdate;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function ProfileUpdate(ProfileUpdate $request){

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        toastr()->success('Profile updated successfully');


        return redirect()->back();


    }// End Method

    public function ProfilePasswordUpdated(ProfilePasswordUpdate $request) {
        // Check if the current password matches
        if (!Hash::check($request->Current_password, auth()->user()->password)) {
            // If not, display error message and redirect back
            toastr('Old Password Does not Match!', 'error');
            return back();
        }
    
        // Update the password
        try {
            // Use the updateOrFail method to automatically handle exceptions
            auth()->user()->update([
                'password' => Hash::make($request->password),
            ]);
            
            // If successful, display success message and redirect back
            toastr('Password Changed Successfully', 'success');
            return back();
        } catch (\Exception $e) {
            // If an exception occurs, handle it appropriately (e.g., log it) and display an error message
            toastr('Failed to Change Password', 'error');
            return back();
        }
    } // End Method


    public function UploadAvatar(Request $request) {
        // Handle image file
        $img = $request->file('avatar');
        $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
    
        // Create directory if it doesn't exist
        $directory = 'uploads/avatar/';
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }
    
        // Remove old avatar if it exists
        $user = Auth::user();
        if ($user->avatar) {
            $oldAvatarPath = public_path($user->avatar);
            if (file_exists($oldAvatarPath)) {
                unlink($oldAvatarPath);
            }
        }
    
        // Save new avatar
        $img->move(public_path($directory), $make_name);
        $imagePath = $directory . $make_name;
    
        // Update user's avatar
        $user->avatar = $imagePath;
        $user->save();
    
        // Return success response
        toastr('Avatar Updated Successfully', 'success');
        return response(['status' => 'success', 'message' => 'Avatar Updated Successfully']);
    }
    


        public function UserLogout(Request $request)
        {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            
    toastr('Logout Successfully','error');
            return redirect('/login');

    } // End UserLogout
    
    
}
