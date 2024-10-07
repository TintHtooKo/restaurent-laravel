<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'],function(){
   Route::get('home',[AdminController::class,'admin'])->name('adminHome'); 
});