<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userHome(){
        $menu = Menu::orderBy('id','desc')->get();
        return view('user.home.home',compact('menu'));
    }

    public function userAbout(){
        return view('user.home.about');
    }

    public function userService(){
        return view('user.home.service');
    }

    public function userMenu(){
        $menu = Menu::orderBy('id','desc')->get();
        return view('user.home.menu',compact('menu'));
    }

    public function userTeam(){
        return view('user.home.team');
    }

    public function userTestimonial(){
        return view('user.home.testimonial');
    }

    public function userContact(){
        return view('user.home.contact');
    }

    public function userBooking(){
        return view('user.home.booking');
    }
}
