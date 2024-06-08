<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Blog;



class administrationController extends Controller
{
    
    public function deleteuser($id){
         $user = User::find($id);
         $blogs = Blog::where("user_id", $user->id)->get();
        //  dd($blogs);
         if(count($blogs) > 0){

             foreach($blogs as $blog){
                //  dd($blog->id);
                //  $blogbool = DB::statement("DELETE FROM blog_category where 'blog_id'= ?",[$blog->id]); 
                    DB::delete("DELETE FROM blog_category where 'blog_id'= ?",[$blog->id]);
             }
         }
        
        DB::delete('DELETE FROM comments where user_id = ? ',[$user->id]);
        DB::delete('DELETE FROM blogs where user_id = ? ',[$user->id]);
        $user->delete();
        return redirect()->route('admin.control.user');
    }
}
