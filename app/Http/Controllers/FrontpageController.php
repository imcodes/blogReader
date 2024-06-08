<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontpageController extends Controller
{
    public function index(){
        $pageDescription = 'Homepage Description';
        $p = Blog::get();
        $trendingPost = Blog::orderBy('view_count','desc')->paginate(3);
        $popularPost = DB::select('SELECT max(view_count) as max from blogs');
        // dd($popularPost);
        $popularPosts = Blog::with('user','category')->where('view_count',$popularPost[0]->max)->get();
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

        return view('index',compact(["pageDescription","category","editors_pick","recentPost",'trendingPost','popularPosts']));
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
    public function search(request $request){
        // dd($request->keyword);
        $keyword = $request->keyword;
        $result = Blog::with('user','category')->where('body','like','%'.$keyword.'%')->orwhere('title','like','%'.$keyword.'%')->orderBy('view_count','desc')->get();
        // dd($result);
        // $result = DB::select(" SELECT * FROM blogs WHERE `title` LIKE '%?%' OR `body` LIKE '%?%' LIMIT 10",[$keyword,$keyword]);
        return view('post.search-result',compact(['result','keyword']));
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
