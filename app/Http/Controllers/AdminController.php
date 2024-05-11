<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class AdminController extends Controller
{
    //This returns the admin dashboard
    public function index(){
        return view('admin.index');
    }

    public function posts(){

        //get list of posts

        $pageTitle =  'post';

        return view('admin.post.index',compact(['pageTitle']));
    }
    public function users(){
        $user = User::where('user_level','>',0)->get();

        return view('admin.control.user',compact(['user']));
    }
    public function Blog(){
        $user = User::where('user_level',0)->get();
        $blogandUsers = Blog::with('user')->where('user_id','!=',$user)->get();
        return view('admin.control.blogs',compact(['blogandUsers']));
    }
    public function management_page($id){
        $user = User::find($id);
        return view('admin.control.misc',compact(['user']));
    }
}
