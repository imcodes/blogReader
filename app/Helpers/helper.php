<?php

use App\Http\Middleware\TrimStrings;
use App\Models\User;
use App\Models\Blog;
use App\Models\profile;
use Illuminate\Support\Facades\Auth;


 function slug_to_string(string $string,$delimeter = "_"){
    return str_replace($delimeter," ", trim($string));
}
 function string_to_slug(string $string,$delimeter = "_"){
    return str_replace(" ",$delimeter, trim($string));
}
 function username($id){
    $comment = User::where('id',$id)->get('name');
    return ucwords($comment[0]->name);
}
function profile_image(){
    $profile= profile::where('userid',Auth::user()->id)->get('profile_image');
    $profile_image = $profile[0]->profile_image;
    return $profile_image;
}
function UserBlogCount($userid){
    $Blog = Blog::where('user_id',$userid)->count();
    return $Blog;
}

