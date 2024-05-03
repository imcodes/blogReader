<?php

use App\Http\Controllers\AuthController;
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

// AUTH ROUTES
Route::get('/signin',[AuthController::class,'signIn'])->name('sign-in');
Route::post('/signin',[AuthController::class,'validateSignIn'])->name('validate-sign-in');
Route::get('/signup',[AuthController::class,'signUp'])->name('sign-up');
Route::post('/validate-sign-up',[AuthController::class,'validateSignUp'])->name('validate-sign-up');
Route::post('/logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');

Route::get('/forgotten-password',[AuthController::class,'forgottenPassword'])->name('forgoten-password');
Route::post('/forgotten-password',[AuthController::class,'validateForgottenPassword'])->name('validate-forgotten-password');
Route::get('/change-password',[AuthController::class,'changePassword'])->name('change-password');
Route::post('/change-password',[AuthController::class,'validateChangePassword'])->name('validate-change-password');
//END OF AUTH ROUTES

// FRONTEND ROUTES
Route::get('/',[FrontpageController::class,'index'])->name('home');
Route::get('/about',[FrontpageController::class,'aboutMe'])->name('about-me');
Route::get('/contacts',[FrontpageController::class,'contacts'])->name('contacts');
Route::get('/private-policy',[FrontpageController::class,'privatePolicy'])->name('privacy_policy');
Route::get('/term_and_conditions',[FrontpageController::class,'tAndC'])->name('term-and-conditions');
Route::get('/blog-details',[ PostController::class,'post'])->name('blog-detail');
Route::get('/search-results',[ PostController::class,'search'])->name('search-result');
//END OF FRONTEND ROUTES


