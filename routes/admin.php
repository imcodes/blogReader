<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



Route::name('admin.')->middleware(['auth','admin.super'])->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('dashboard');


    //BLOG ROUTES
    Route::prefix('blog')->name('blog.')->group(function(){
        Route::get('/',[AdminController::class,'blog'])->name('index');
        Route::get('/create',[PostController::class,'createPost'])->name('create');

        //CATEGORY SUB ROUTE
        Route::prefix('category')->name('category.')->group(function(){
            Route::get('/',[])->name('index');
            Route::get('/create',[PostController::class,'createPost'])->name('create');
        });
    });

    Route::prefix('user')->name('control.')->group(function(){
        Route::get('/',[AdminController::class,'users'])->name('user');
        Route::get('/manage/{id}',[AdminController::class,'management_page']);
    });
});
