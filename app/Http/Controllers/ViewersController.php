<?php

namespace App\Http\Controllers;
use App\Models\viewers;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewersController extends Controller
{
    public function viewers($id){
        // dd($id);
        $isviewer = DB::select("SELECT * FROM viewers where viewer_id = ? and blog_id = ?",[$id,Auth::user()->id]);
        // dd($isviewer);
        if (count($isviewer) == 0) {
            viewers::create([
                'viewer_id'=> $id,
                'blog_id'=> Auth::user()->id
            ]);
            $blog = Blog::find($id);
            // dd($blog);
            $blog->update([
                'view_count'=> $blog->view_count + 1
            ]);
        }

    }
}
