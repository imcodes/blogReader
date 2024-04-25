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
}
