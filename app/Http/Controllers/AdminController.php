<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //This returns the admin dashboard
    public function index(){
        return view('admin.index');
    }

    public function posts(){

        //get list of posts

        $pageTitle =  'Post List';
        
        return view('admin.post.index',compact(['pageTitle']));
    }
}
