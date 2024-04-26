<?php

use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[FrontpageController::class,'index'])->name('home');
Route::get('/about',[FrontpageController::class,'about_me'])->name('about-me');
Route::get('/contacts',[FrontpageController::class,'contacts'])->name('contacts');
Route::get('/privatepolicy',[FrontpageController::class,'privatePolicy'])->name('privatePolicy');
Route::get('/term_and_conditions',[FrontpageController::class,'tANDc'])->name('term_and_conditions');
Route::get('/post-element',[FrontpageController::class,'postElement'])->name('postElement');
Route::get('/post-details',[ PostController::class,'post'])->name('post-detail');
Route::get('/search-results',[ PostController::class,'search'])->name('search-result');
Route::get('/admin-page',function(){
    return view('admin.index');
})->name('admin');
Route::get('/element-page',function(){
    return view('admin.basic_elements');
})->name('element');
Route::get('/login',function(){
    return view('admin.auth.login');
})->name('login');
Route::get('/signup',function(){
    return view('admin.auth.signup');
})->name('signup');

