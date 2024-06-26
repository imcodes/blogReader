<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Blog;
use App\Models\Category;
use App\Http\Controllers\CategoryController;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function post($title){
        $id = explode("-", $title);
        $blog = Blog::with("user","category",'comment')->where("id", end($id))->get();
        // dd(Auth::user()->id);
        // dd(auth());
        if (Auth::check()){
        $view = new ViewersController();
        $view->viewers($blog[0]->id);
        }
        return view('post.post-details', compact(['blog']));
    }
    // public function search(){
    //     return view('post.search-result');
    // }
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
        $category = Category::get();
        $pagetitle = "Create New Post";
        return  view('admin.post.create',['pageTitle'=>$pagetitle,'category'=>$category]);
    }
    public function createblogmedia(Request $request){
        // dd($request);

        if($request->hasfile('featured_image')){
            $imgfile = $request->file('featured_image');
            $mediafile = $request->file('media_files');
            $targetPath = 'blogfiles/';
            $featuredIMG = md5($imgfile->getFilename()).'_'.time().'.'.$imgfile->getClientOriginalExtension();
            $media = md5($mediafile->getFilename()).'_'.time().'.'.$mediafile->getClientOriginalExtension();
            $imgfile->storeas("public/$targetPath",$featuredIMG);
            $mediafile->storeas("public/$targetPath", $media);
            session()->put('featured_image',$featuredIMG);
            session()->put('media_files',$media);
            $this->createblog($request,session('featured_image'),$request->category);
        }
        return redirect()->route('admin.blog.index');

        // $this->mediaFiles(session('media_files'));
    }
    public function createblog(Request $request,$mediafile,$category){
        // dd($request->input('blogBody'));

        $this->validate($request,[
                'title' => 'max:255|required',
                'blogBody' => 'required',
            ]);
            $blog =  Blog::create([
                'body' => $request->input('blogBody'),
                'title' => $request->input('title'),
                'featured_image' => $mediafile,
                'user_id' => Auth::user()->id,
                'veiw_count' => 0,
                'editors_pick' => false
            ]);
            // dd($request);
                session()->remove('featured_image');
                session()->remove('media_files');

                $cat = new CategoryController();
                $cat->Blog_category($blog->id,$category);


    }
    public function changeBlogCategory($id, request $request){
        // dd($request->name);
        $category = Category::where('category_name',$request->name)->first();
        // dd($category);
        DB::update('UPDATE blog_category set category_id = ? where blog_id  = ?', [$category->id,$id]);
        return redirect()->back();
    }
}
