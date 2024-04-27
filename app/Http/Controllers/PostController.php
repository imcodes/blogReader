<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post(){
        return view('post.post-details');
    }
    public function search(){
        return view('post.search-result');
    }
    public function searchNotFound(){
        return view('post.search-not-found');
    }

    //ADMINISTRATIVE METHODS
    /**
     * This is to list all post for the admin page
     */
    public function index(){
        return 'Hello this is the post index';
    }

    public function createPost(){
        return 'Create post';
    }
}
