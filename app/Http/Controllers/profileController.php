<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class profileController extends Controller
{
    public function index($id){
        $user = User::find($id);
        $blog = Blog::where("user_id", $user->id)->get();
        $profile = profile::where("userid", Auth::user()->id)->get();
        if(count($profile) > 0){
            return view("profile.index",compact(["user","blog","profile"]));
        }
        return view("profile.index",compact(["user","blog"]));
    }
    public function change_password(request $request){
        $hasher = app('hash');
            if ($hasher->check($request->old_password,Auth::user()->password)) {
                $user = User::find(Auth::user()->id);
                $user->update(['password'=> bcrypt($request->new_password)]);
            }
            return redirect()->back()->with('success','password changed');
    }
    public function uploadprofileimg(Request $request){
        if($request->hasfile('profile_image')){
            $profile_image = $request->file('profile_image');
            $targetPath = 'blogfiles/';
            $featuredIMG = md5($profile_image->getFilename()).'_'.time().'.'.$profile_image->getClientOriginalExtension();
            $profile_image->storeas("public/$targetPath",$featuredIMG);
            session()->put('profile_image',$featuredIMG);
            if($request->description != ''){
                $this->create_profile($request,session('profile_image'));
            }
            return redirect()->back();
        }
    }
    public function create_profile(Request $request,$imgfile){
        dd($request);
            $profile = new Profile();
            $profile->create([
                'profile_image'=> $imgfile,
                'description' => $request->description,
                'userid' => Auth::user()->id
            ]);
            return redirect()->back()->with('success','profile updated');
    }
}
