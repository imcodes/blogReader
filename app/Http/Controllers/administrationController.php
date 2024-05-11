<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;


class administrationController extends Controller
{
    public function regular_admin(){
            
    }
    public function regular_admin_make_moderator(){
            
    }
    public function regular_admin_make_manager(){
            
    }
    public function moderator(){

    }
    public function moderator_delete_post(){

    }
    public function manager(){

    }
    public function manager_report_post(){
        
    }
    public function author(){

    }
    public function authors_post(){

    }
    public function authors_post_delete(){

    }
    public function authors_post_update(){

    }
    public function deleteuser($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.control.user');
    }
}
