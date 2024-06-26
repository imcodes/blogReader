<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\profile;
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
        $blogs = Blog::where('user_id',Auth::user()->id)->count();
        $posts = Blog::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate(5);
        $viewcount = DB::select("SELECT sum(view_count) as sum FROM blogs where user_id = ?",[Auth::user()->id]);
        $all_blogs = DB::select("SELECT  id  FROM blogs where user_id = ?",[Auth::user()->id]);
        $i = 0;
        foreach ($all_blogs as $key) {
           $blgs[$i] = $key->id;
           $i++;
        }
        $comment = Comment::whereIn('blog_id',$blgs)->get();
        $users = User::where('user_level','>',Auth::user()->user_level)->count();
        // dd($comment);
        // $profile= profile::where('userid',Auth::user()->id)->get('profile_image');
        // $profile_image = $profile[0]->profile_image;
        $viewcount = $viewcount[0]->sum;
        return view('admin.index' ,compact(['users','blogs','posts','viewcount','comment']));
    }

    public function posts(){

        //get list of posts

        $pageTitle =  'post';

        return view('admin.post.index',compact(['pageTitle']));
    }
    public function users(){
        $user = User::where('user_level','>',Auth::user()->user_level)->orderBy('id','desc')->get();

        return view('admin.control.user',compact(['user']));
    }
    public function blogpage($id){
        $blog = Blog::with('user')->where('id',$id)->get();
        $category = Category::get();
        return view('admin.control.blog',compact(['blog','category']));
    }
    public function blog(){
        if(Auth::user()->user_level >= 3){
            $blogs = $this->get_user_blogs();
            return view('admin.control.blogs',compact(['blogs']));
        }else{

            if($_GET){
                $blogs = Blog::where('user_id',Auth::user()->id)->orderBy('created_at',)->paginate(20);
                return view('admin.control.blogs',compact(['blogs']));
            }else{

                $users = DB::select("SELECT id from users where user_level > ?",[Auth::user()->user_level]);
                $i =0;
                foreach ($users as $key) {
                    $user[$i] = $key->id;
                    $i++;
                 }
                 // dd($user);
                $blogs = Blog::whereIn('user_id',$user)->orderBy('created_at','desc')->paginate(20);
             //    dd($blogs);
                if(count($blogs) > 0){
                    return view('admin.control.blogs',compact(['blogs']));
                }
                return view('admin.control.blogs');
            }
        }
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
    // public function editblogmedia(Request $request){
    //     // dd($request);

    //     if($request->hasfile('featured_image') && $request->hasfile('media_files')){
    //         $imgfile = $request->file('featured_image');
    //         $mediafile = $request->file('media_files');
    //         $targetPath = 'blogfiles/';
    //         $featuredIMG = md5($imgfile->getFilename()).'_'.time().'.'.$imgfile->getClientOriginalExtension();
    //         $media = md5($mediafile->getFilename()).'_'.time().'.'.$mediafile->getClientOriginalExtension();
    //         $imgfile->storeas("public/$targetPath",$featuredIMG);
    //         $mediafile->storeas("public/$targetPath", $media);
    //         session()->put('featured_image',$featuredIMG);
    //         session()->put('media_files',$media);
    //         $this->update_blog($request,session('featured_image'),$request->category);
    //     }

    //     // $this->mediaFiles(session('media_files'));
    // }
    // public function update_blog(Request $request,$mediafile,$id){
    //     $incomingFields = $this->validate($request,[
    //         'title' => 'max:255|required',
    //         'body' => 'required',
    //     ]);
    //     dd($request);
    //     $blog = Blog::find($id);
    //     $blog->update($request);
    //     return redirect()->back();
    // }
    public function update_blog_page($id){
        $blog = Blog::find($id);
        $category = Category::get();
        return view('admin.post.edit',compact(['blog','category']));
    }
    public function updateblogmedia(Request $request,$id){
        // dd($request);

        if($request->hasfile('featured_image') && $request->hasfile('media_files')){
            $imgfile = $request->file('featured_image');
            $mediafile = $request->file('media_files');
            $targetPath = 'blogfiles/';
            $featuredIMG = md5($imgfile->getFilename()).'_'.time().'.'.$imgfile->getClientOriginalExtension();
            $media = md5($mediafile->getFilename()).'_'.time().'.'.$mediafile->getClientOriginalExtension();
            $imgfile->storeas("public/$targetPath",$featuredIMG);
            $mediafile->storeas("public/$targetPath", $media);
            session()->put('featured_image',$featuredIMG);
            session()->put('media_files',$media);
            $this->update_blog($request,session('featured_image'),$request->category,$id);
        }else{
            $this->update_blog($request,'none',$request->category,$id);
        }
        return redirect()->back();

        // $this->mediaFiles(session('media_files'));
    }
    public function update_blog(Request $request,$mediafile,$category,$id){
        // dd($request->input('blogBody'));
        // dd($mediafile);

        // $this->validate($request,[
        //         'title' => 'max:255|required',
        //         'body' => 'required',
        //     ]);
            $blog = Blog::find($id);
            if($mediafile == 'none'){
                $blog->update([
                    'body' => $request->input('body'),
                    'title' => $request->input('title'),
                    'user_id' => Auth::user()->id,
                ]);

                $cat = new CategoryController();
                $cat->Blog_category_update($blog->id,$category);
            }else{

                $blog->update([
                    'body' => $request->input('body'),
                    'title' => $request->input('title'),
                    'featured_image' => $mediafile,
                    'user_id' => Auth::user()->id,
                ]);
                session()->remove('featured_image');
                session()->remove('media_files');

                $cat = new CategoryController();
                $cat->Blog_category_update($blog->id,$category);
            }
            // dd($request);


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
    $blogs = Blog::with('user')->where('user_id','=',$user->id)->orderBy('created_at','desc')->paginate(20);
    return $blogs;
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
public function trash_blog($id){
    DB::update('UPDATE blogs set deleted_at = ? where user_id = ?',[now(),$id]);
    return redirect()->back();
}
}
