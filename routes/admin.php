<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



Route::name('admin.')->middleware(['auth','admin.regular','admin.super'])->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('dashboard');
    
    
    //POST ROUTES
    Route::prefix('post')->name('post.')->group(function(){
        Route::get('/',[AdminController::class,'posts'])->name('index');
        Route::get('/create',[PostController::class,'createPost'])->name('create');
    });

    //CATEGORY ROUTES
    Route::prefix('category')->name('category.')->group(function(){
        Route::get('/',[])->name('index');
    });
});
