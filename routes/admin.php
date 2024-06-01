<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



Route::name('admin.')->middleware(['auth','admin.super'])->group(function () {
    Route::get('/',[AdminController::class,'index'])->name('dashboard');


    //BLOG ROUTES
    Route::prefix('blog')->name('blog.')->group(function(){
        Route::get('/',[AdminController::class,'blog'])->name('index');
        Route::get('/blog/{id}',[AdminController::class,'blogpage'])->name('blog');
        Route::get('/create',[PostController::class,'createPost'])->name('create');
        Route::delete('/delete/{id}',[AdminController::class,'delete_blog'])->name('delete');
        Route::put('users/{id}',[AdminController::class,'update_blog'])->name('update');
        Route::put('editors_pick/{id}',[AdminController::class,'editors_pick'])->name('editors_pick');

        //CATEGORY SUB ROUTE
        Route::prefix('category')->name('category.')->group(function(){
            Route::get('/',[CategoryController::class,'category_page'])->name('index');
            Route::post('/new_create',[CategoryController::class,'create_category'])->name('new_category');
            Route::delete('/delete/{id}',[CategoryController::class,'delete_category'])->name('delete');
       });
    });

    Route::prefix('user')->name('control.')->group(function(){
        Route::get('/',[AdminController::class,'users'])->name('user');
        Route::get('/manage/{id}',[AdminController::class,'management_page'])->name('manage');
        Route::get('/roles/{id}',[AdminController::class,'User_role'])->name('role');
        Route::post('/submit_role/{id}',[AdminController::class,'submit_user_role'])->name('submit_role');
        Route::get('/createuser',[AdminController::class,'createuser'])->name('createuser');
        Route::post('/suspenduser/{id}',[AdminController::class,'suspend'])->name('suspend');
        Route::post('/unsuspenduser/{id}',[AdminController::class,'unsuspend'])->name('unsuspend');
    });
});
