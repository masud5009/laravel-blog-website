<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettngController;


Auth::routes();

Route::get('/home', [HomeController::class,'index'])->name('home');

//admin route
Route::group(['prefix' => 'admin', 'middleware' => ['auth']],function(){
    //admin dashboard showing route
    Route::get('/dashboard',function(){
        return view('layouts.admin');
    })->name('admin.dashboard');
    //admin manegment all route
    Route::resource('category',CategoryController::class);
    Route::resource('tag',TagController::class);
    Route::resource('post',PostController::class);
    Route::resource('user',UserController::class);
    //profile info route
    Route::get('/profile',[UserController::class,'profile'])->name('user.profile');
    Route::post('/profile',[UserController::class,'profile_update'])->name('user.profile.update');
    //website setting route
    Route::get('/setting',[SettngController::class,'edit'])->name('website.setting');
    Route::post('/setting',[SettngController::class,'update'])->name('website.setting.update');
});

//forntend route
Route::get('/',[FrontendController::class,'index'])->name('website');
Route::get('/category/{slug}',[FrontendController::class,'category'])->name('website.category');
Route::get('/post/{slug}',[FrontendController::class,'post'])->name('website.post');
Route::get('/contact',[FrontendController::class,'about'])->name('about.us');
