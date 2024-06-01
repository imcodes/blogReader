<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;

class FrontpageController extends Controller
{
    public function index(){
        $pageDescription = 'Homepage Description';
        $p = Blog::get();
        $recentPost = Blog::with('user','category')->orderBy('created_at','desc')->paginate(9);
        $cat = Category::with('blog')->get();
        $editors_pick = Blog::with('user','category')->where('editors_pick',true)->get();
        $i = 0;
        // dd($cat);
        foreach ($cat as $key) {

            // dd($key->blog);
            if (count($key->blog)) {
                # code...
                $category[$i] = $key->category_name;
                $i++;
            }
        }

        return view('index',compact(["pageDescription","category","editors_pick","recentPost"]));
    }

    public function aboutMe(){
        $pageTitle = 'About Me';
        $pageDescription = 'Get to know me more';

        return view('frontpages.about-me',compact(['pageTitle','pageDescription']));
    }

    public function contacts(){
        return view('frontpages.contact');
    }
    public function privatePolicy(){
        return view('frontpages.privacy-policy');
    }
    public function tAndC(){
        return view('frontpages.terms-conditions');
    }
    public function author($name){
        $user = explode('_',$name);
        $id = end($user);
        $author = User::where('id',$id)->get();
        $blog = Blog::where('user_id',$author[0]->id)->get();
        // $comment = Comment::where('user_id','=',$author[0]->id,'and','blog_id','=',$blog[0]->id)->get();
        // dd($comment);
        return view('author',compact('author','blog'));
    }

}
