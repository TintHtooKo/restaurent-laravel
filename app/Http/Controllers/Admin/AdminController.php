<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function admin(){
        return view('admin.dashboard.dashboard');
    }

    public function adContact(){
        $contact = Contact::orderBy('id','desc')->get();
        return view('admin.dashboard.contact',compact('contact'));  
    }

    public function userList(){
        $user = User::select('id','name','email','role','created_at')                   
                    ->where('role','user')
                    ->when(request('search'),function($query){
                        $query->whereAny(['name','email'],
                        'like','%'.request('search').'%');
                    })
                    ->orderBy('id','desc')
                    ->get();
        return view('admin.userlist.user',compact('user'));
    }

    public function userDelete($id){
        $user = User::find($id);
        $user->delete();
        Alert::success('Success', 'User deleted successfully');
        return back();
    }

    public function adminList(){
        $admin = User::select('id','name','email','role','created_at')                   
                    ->where('role','admin')
                    ->when(request('search'),function($query){
                        $query->whereAny(['name','email'],
                        'like','%'.request('search').'%');
                    })
                    ->orderBy('id','desc')
                    ->get();
        return view('admin.adminlist.admin',compact('admin'));
    }

    public function addAdmin(){
        return view('admin.adminlist.addAdmin');
    }

    public function addNewAdmin(Request $request){
        $this->adminValidate($request);
        $data = $this->adminData($request);
        User::create($data);
        Alert::success('Success', 'Admin added successfully');
        return to_route('adminList');
    }

    public function adminDelete($id){
        $admin = User::find($id);
        $admin->delete();
        Alert::success('Success', 'Admin deleted successfully');
        return back();
    }

    public function adminMenu(){
        $menu = Menu::select('id','name','image','price','created_at')
                    ->when(request('search'),function($query){
                        $query->whereAny(['name','price'],'like','%'.request('search').'%');
                    })
                    ->orderBy('id','desc')->get();
        return view('admin.menulist.menu',compact('menu'));
    }

    private function adminValidate($request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
        ]);
    }

    private function adminData($request){
        return [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin'
        ];
    }

}
