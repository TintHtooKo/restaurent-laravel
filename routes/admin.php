<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TableController;
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

   Route::group(['prefix'=>'menu'],function(){
      Route::get('',[AdminController::class,'adminMenu'])->name('adminMenu');
      Route::get('add',[MenuController::class,'addMenuPage'])->name('addMenuPage');
      Route::post('add',[MenuController::class,'addMenu'])->name('addMenu');
      Route::get('delete/{id} ',[MenuController::class,'deleteMenu'])->name('deleteMenu');
      Route::get('edit/{id}',[MenuController::class,'editMenuPage'])->name('editMenuPage');
      Route::post('edit/{id}',[MenuController::class,'editMenu'])->name('editMenu');
   });

   Route::group(['prefix'=>'table'],function(){
      Route::get('',[AdminController::class,'adminTable'])->name('adminTable');
      Route::post('add',[TableController::class,'addTable'])->name('addTable');
      Route::get('delete/{id}',[TableController::class,'deleteTable'])->name('deleteTable');
      Route::get('edit/{id}',[TableController::class,'editTablePage'])->name('editTablePage');
      Route::post('edit/{id}',[TableController::class,'editTable'])->name('editTable');
   });

   Route::group(['prefix'=>'profile'],function(){
      Route::get('',[ProfileController::class,'profilePage'])->name('profilePage');
      Route::get('changepw',[ProfileController::class,'changePasswordPage'])->name('changePasswordPage');
      Route::post('changepw',[ProfileController::class,'changePassword'])->name('changePassword');
      Route::get('edit',[ProfileController::class,'editProfilePage'])->name('editProfilePage');
      Route::post('edit',[ProfileController::class,'editProfile'])->name('editProfile');
   });

   Route::group(['prefix'=>'booking'],function(){
      Route::get('',[BookingController::class,'bookingList'])->name('bookingList');
      Route::get('edit/{id}',[BookingController::class,'bookingEditPage'])->name('bookingEditPage');
      Route::post('edit/{id}',[BookingController::class,'bookingEdit'])->name('bookingEdit');
   });
});