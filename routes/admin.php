<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => 'admin'],function(){
   Route::get('home',[AdminController::class,'admin'])->name('adminHome'); 
   
   Route::group(['prefix' => 'contact'],function(){
      Route::get('',[AdminController::class,'adContact'])->name('adContact');
      Route::get('detail/{id}',[ContactController::class,'contactDetail'])->name('contactDetail');
      Route::get('delete/{id}',[ContactController::class,'contactDelete'])->name('contactDelete');
   });

   Route::group(['prefix'=>'userlist'],function(){
      Route::get('',[AdminController::class,'userList'])->name('userList');
      Route::get('delete/{id}',[AdminController::class,'userDelete'])->name('userDelete');
   });

   Route::group(['prefix'=>'adminlist'],function(){
      Route::get('',[AdminController::class,'adminList'])->name('adminList');
      Route::get('add',[AdminController::class,'addAdmin'])->name('addAdmin');
      Route::post('add',[AdminController::class,'addNewAdmin'])->name('addNewAdmin');
      Route::get('delete/{id}',[AdminController::class,'adminDelete'])->name('adminDelete');
   });
});