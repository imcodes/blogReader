<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function index($id){
        $user = User::find($id);
        $blog = Blog::where("user_id", $user->id)->get();
        return view("profile.index",compact(["user","blog"]));
    }
}
