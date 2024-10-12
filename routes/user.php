<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user', 'middlware' => 'user'],function(){
    Route::get('home',[UserController::class,'userHome'])->name('userHome');
    Route::get('about',[UserController::class,'userAbout'])->name('userAbout');
    Route::get('service',[UserController::class,'userService'])->name('userService');
    Route::get('menu',[UserController::class,'userMenu'])->name('userMenu');
    Route::get('team',[UserController::class,'userTeam'])->name('userTeam');
    Route::get('testimonial',[UserController::class,'userTestimonial'])->name('userTestimonial');

    Route::get('contact',[UserController::class,'userContact'])->name('userContact');   
    Route::post('contact',[ContactController::class,'contact'])->name('contact');

    Route::get('booking',[UserController::class,'userBooking'])->name('userBooking');
    Route::post('booking',[BookingController::class,'booking'])->name('booking');
});