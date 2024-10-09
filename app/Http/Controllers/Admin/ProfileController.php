<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function profilePage(){
        $user = Auth::user();
        return view('admin.profile.profile',compact('user'));
    }

    public function changePasswordPage(){      
        return view('admin.profile.changePw');
    }

    public function changePassword(Request $request){
        $this->updatePassword($request);
        $currentPassword = Auth::user()->password;
        if(Hash::check($request->oldPassword, $currentPassword)){
            User::find(Auth::user()->id)->update(['password' => Hash::make($request->newPassword)]);
            Alert::success('Password changed successfully');
            return to_route('profilePage');
        }else{
            Alert::error('Error','Old password is not correct');
            return back();
        }
    }

    public function editProfilePage(){
        return view('admin.profile.editProfile');
    }

    public function editProfile(Request $request){
        $this->editProfileData($request);
        User::find(Auth::user()->id)->update(['name' => $request->name, 'email' => $request->email]);
        Alert::success('Profile updated successfully');
        return to_route('profilePage');
    }

    private function updatePassword($request){
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:5|different:oldPassword',
            'confirmPassword' => 'required|same:newPassword|min:5',
        ]);
    }

    private function editProfileData($request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.Auth::user()->id,
        ]);
    }
}
