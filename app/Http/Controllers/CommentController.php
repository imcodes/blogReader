<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
public function store(request $request){
    // dd($request);
   $incomingFields = $this->validate($request,[
        'body'=>'required|max:1000',
        'user_id'=>'required',
        'blog_id'=> 'required',
    ]);
    Comment::create($incomingFields);
    return back()->with('success','comment created');
}
}
