<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\administrationController;
use App\Http\Controllers\profileController;
use Illuminate\Support\Facades\Route;



Route::name('admin.')->middleware(['auth','suspended'])->group(function () {
    Route::get('/',[AdminController::class,'index'])->name('dashboard');


    //BLOG ROUTES
    Route::prefix('blog')->name('blog.')->group(function(){
        Route::get('/',[AdminController::class,'blog'])->name('index')->middleware('author');
        Route::get('/blog/{id}',[AdminController::class,'blogpage'])->name('blog')->middleware('author');
        Route::get('/create',[PostController::class,'createPost'])->name('create')->middleware('author');
        Route::delete('/delete/{id}',[AdminController::class,'delete_blog'])->name('delete')->middleware('author');
        Route::get('update/{id}',[AdminController::class,'update_blog_page'])->name('update_page')->middleware('author');
        Route::put('update/{id}',[AdminController::class,'updateblogmedia'])->name('update')->middleware('author');
        Route::put('editors_pick/{id}',[AdminController::class,'editors_pick'])->name('editors_pick')->middleware('mod');
        Route::put('change_category/{name}',[PostController::class,'changeBlogCategory'])->name('change_category')->middleware('mod');

        //CATEGORY SUB ROUTE
        Route::prefix('category')->name('category.')->middleware('manager')->group(function(){
            Route::get('/',[CategoryController::class,'category_page'])->name('index');
            Route::post('/new_create',[CategoryController::class,'create_category'])->name('new_category');
            Route::delete('/delete/{id}',[CategoryController::class,'delete_category'])->name('delete');
       });

    });

    Route::prefix('user')->name('control.')->middleware('admin.regular')->group(function(){
        Route::get('/',[AdminController::class,'users'])->name('user');
        Route::get('/manage/{id}',[AdminController::class,'management_page'])->name('manage');
        Route::get('/roles/{id}',[AdminController::class,'User_role'])->name('role');
        Route::post('/submit_role/{id}',[AdminController::class,'submit_user_role'])->name('submit_role');
        Route::get('/createuser',[AdminController::class,'createuser'])->name('createuser');
        Route::post('/suspenduser/{id}',[AdminController::class,'suspend'])->name('suspend');
        Route::post('/unsuspenduser/{id}',[AdminController::class,'unsuspend'])->name('unsuspend');
        Route::delete('/delete/{id}',[administrationController::class,'deleteuser'])->name('deleteuser');
    });
    Route::prefix('profile')->name('profile.')->group(function(){
        Route::get('/{id}',[profileController::class,'index'])->name('index');
        Route::put('/change-password',[profileController::class,'change_password'])->name('change_password');
        Route::post('/setup-profile',[profileController::class,'uploadprofileimg'])->name('setup_profile');
        Route::post('/update-profile',[profileController::class,'updateprofileimg'])->name('update_profile');
    });
});

// Route::name('regular-admin.')->prefix('admin')->middleware(['auth'])->group(function(){
//         Route::get('/',[AdminController::class,'index'])->name('dashboard');
//         Route::prefix('blog')->name('blog.')->group(function(){
//             Route::get('/',[AdminController::class,'blog'])->name('index');
//             Route::get('/blog/{id}',[AdminController::class,'blogpage'])->name('blog');
//             Route::get('/create',[PostController::class,'createPost'])->name('create');
//             Route::delete('/delete/{id}',[AdminController::class,'delete_blog'])->name('delete');
//             Route::put('users/{id}',[AdminController::class,'update_blog'])->name('update');
//             Route::put('editors_pick/{id}',[AdminController::class,'editors_pick'])->name('editors_pick');
//             Route::put('change_category/{name}',[PostController::class,'changeBlogCategory'])->name('change_category');

//             //CATEGORY SUB ROUTE
//             Route::prefix('category')->name('category.')->group(function(){
//                 Route::get('/',[CategoryController::class,'category_page'])->name('index');
//                 Route::post('/new_create',[CategoryController::class,'create_category'])->name('new_category');
//                 Route::delete('/delete/{id}',[CategoryController::class,'delete_category'])->name('delete');
//            });
//         });
//         Route::prefix('user')->name('control.')->group(function(){
//             Route::get('/',[AdminController::class,'users'])->name('user');
//             Route::get('/manage/{id}',[AdminController::class,'management_page'])->name('manage');
//             Route::get('/roles/{id}',[AdminController::class,'User_role'])->name('role');
//             Route::post('/submit_role/{id}',[AdminController::class,'submit_user_role'])->name('submit_role');
//             Route::get('/createuser',[AdminController::class,'createuser'])->name('createuser');
//             Route::post('/suspenduser/{id}',[AdminController::class,'suspend'])->name('suspend');
//             Route::post('/unsuspenduser/{id}',[AdminController::class,'unsuspend'])->name('unsuspend');
//             Route::delete('/delete/{id}',[administrationController::class,'deleteuser'])->name('deleteuser');
//         });
//         Route::prefix('profile')->name('profile.')->group(function(){
//             Route::get('/{id}',[profileController::class,'index'])->name('index');
//         });
// });
// Route::prefix('moderator')->middleware(['auth','mod'])->name('moderator.')->group(function(){
//     Route::get('/',[AdminController::class,'index'])->name('dashboard');
//     Route::prefix('blog')->name('blog.')->group(function(){
//         Route::get('/',[AdminController::class,'blog'])->name('index');
//         Route::get('/blog/{id}',[AdminController::class,'blogpage'])->name('blog');
//         Route::get('/create',[PostController::class,'createPost'])->name('create');
//         // Route::delete('/delete/{id}',[AdminController::class,'delete_blog'])->name('delete');
//         Route::put('update/{id}',[AdminController::class,'update_blog'])->name('update');
//         Route::put('trash/{id}',[AdminController::class,'trash_blog'])->name('update');
//         Route::put('editors_pick/{id}',[AdminController::class,'editors_pick'])->name('editors_pick');
//         Route::put('change_category/{name}',[PostController::class,'changeBlogCategory'])->name('change_category');

//         // CATEGORY SUB ROUTE;
//         Route::prefix('category')->name('category.')->group(function(){
//             Route::get('/',[CategoryController::class,'category_page'])->name('index');
//             Route::post('/new_create',[CategoryController::class,'create_category'])->name('new_category');
//             Route::delete('/delete/{id}',[CategoryController::class,'delete_category'])->name('delete');
//        });
//     });
//     Route::prefix('profile')->name('profile.')->group(function(){
//         Route::get('/{id}',[profileController::class,'index'])->name('index');
//     });
// });
// Route::prefix('manager')->middleware(['auth','manager'])->name('manager.')->group(function(){
//     Route::get('/',[AdminController::class,'index'])->name('dashboard');
//     Route::prefix('blog')->name('blog.')->group(function(){
//         Route::get('/',[AdminController::class,'blog'])->name('index');
//         Route::get('/blog/{id}',[AdminController::class,'blogpage'])->name('blog');
//         Route::get('/create',[PostController::class,'createPost'])->name('create');
//         // Route::delete('/delete/{id}',[AdminController::class,'delete_blog'])->name('delete');
//         // Route::put('update/{id}',[AdminController::class,'update_blog'])->name('update');
//         // Route::put('trash/{id}',[AdminController::class,'trash_blog'])->name('update');
//         Route::put('editors_pick/{id}',[AdminController::class,'editors_pick'])->name('editors_pick');
//         // Route::put('change_category/{name}',[PostController::class,'changeBlogCategory'])->name('change_category');

//         // CATEGORY SUB ROUTE;
//         Route::prefix('category')->name('category.')->group(function(){
//             Route::get('/',[CategoryController::class,'category_page'])->name('index');
//             Route::post('/new_create',[CategoryController::class,'create_category'])->name('new_category');
//             Route::delete('/delete/{id}',[CategoryController::class,'delete_category'])->name('delete');
//        });
//     });
//     Route::prefix('profile')->name('profile.')->group(function(){
//         Route::get('/{id}',[profileController::class,'index'])->name('index');
//     });
// });
// Route::prefix('author')->middleware(['auth','author'])->name('author.')->group(function(){
//     Route::get('/',[AdminController::class,'index'])->name('dashboard');
//     Route::prefix('blog')->name('blog.')->group(function(){
//         Route::get('/',[AdminController::class,'blog'])->name('index');
//         Route::get('/blog/{id}',[AdminController::class,'blogpage'])->name('blog');
//         Route::get('/create',[PostController::class,'createPost'])->name('create');

//     });
//     Route::prefix('profile')->name('profile.')->group(function(){
//         Route::get('/{id}',[profileController::class,'index'])->name('index');
//     });
// });

