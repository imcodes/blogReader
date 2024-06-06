<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Str;
// use Illuminate\Validation\Rule;

// use Illuminate\Validation\ValidationException;
// use Illuminate\Support\Facades\Redirect;
// use Illuminate\Support\Facades\Session;



use Illuminate\Http\Request;
// use PhpParser\Node\Stmt\Switch_;

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
        $user = User::where('user_level','>',0)->orderBy('id','desc')->get();

        return view('admin.control.user',compact(['user']));
    }
    public function blogpage($id){
        $blog = Blog::with('user')->where('id',$id)->get();
        $category = Category::get();
        return view('admin.control.blog',compact(['blog','category']));
    }
    public function blog(){
       $users = DB::select("SELECT id from users where user_level > ?",[Auth::user()->user_level]);
       $i =0;
       foreach ($users as $key) {
           # code...
           $user[$i] = $key->id;
           $i++;
        }
        // dd($user);
       $blogs = Blog::where('user_id','=',$user)->orderBy('created_at','desc')->paginate(20);
        // dd($blogs);
       return view('admin.control.blogs',compact(['blogs']));
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
        return redirect()->route('admin.control.user');
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
    $blogs = Blog::with('user')->where('user_id','=',$user->id)->get();
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
public function unsuspend($id){
    // $user = User::find(Auth::user()->id);
    $user = User::find($id);
    $user->update([
        'suspended' => false,
    ]);
    return redirect()->back();
}
public function delete_blog($id){
    DB::delete('delete from blog_category where blog_id = ?', [$id]);
    $Blog=Blog::find($id);
    // dd($Blog);
    $Blog->delete();
    return redirect()->route('admin.blog.index');
}
public function editors_pick($id){
    DB::update("UPDATE blogs set editors_pick = ? ",[false]);
 $blog =    Blog::find($id);
 $blog->update(
    [
        'editors_pick'=> true,
    ]
    );
    return redirect()->back();
}
}
