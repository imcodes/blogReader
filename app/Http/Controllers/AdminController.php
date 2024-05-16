<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Switch_;

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
        $blog = Blog::where('user_id','=',$user->id)->get();
        return view('admin.control.misc',compact(['user','blog']));
    }
    public function User_role($id){
        $user = User::find($id);
         return view('admin.control.newrole',compact(['user']));
    }
    public function submit_user_role(Request $request,$id){
        $user = User::find($id);
        $user->update([
            'user_role'=> $request->role,
            'user_level' => $this->sortrole($request->role),
        ]);
        return redirect()->back();
    }
    public function sortrole($role){
        switch ($role) {
            case 'user':
                return 5;
                break;
            case 'author':
                return 4;
                break;
            case 'community_manager':
                return 3;
                break;
            case 'moderator':
                return 2;
                break;
            case 'regular_admin':
                return 1;
    }
}
public function get_user_blogs(){
    $user = User::find(Auth::user()->id);
    $blogs = Blog::where('user_id','=',$user->id)->get();
    return view('',compact(['user','blogs']));
}
public function createuser(){
    // $user = User::find(Auth::user()->id);
    return view('admin.control.createuser');
}
public function suspend($id){
    // $user = User::find(Auth::user()->id);
    $user = User::find($id);
    $user->update([
        'suspended' => true,
    ]);
    return redirect()->back();
}
}
