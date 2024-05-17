<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;



class AuthController extends Controller
{
    //Signin method
    public function signIn(){

            $pageTitle = 'Signin';


        return view('auth.login', compact(['pageTitle']));
    }

    //Validate signin mehtod
    public function validateSignIn(Request $request){
        $this->validate($request ,
            [
            'email'=> 'required|email',
            'password'=>'required'
        ]);
        $auth = Auth::attempt($request->only('email','password'));
       if($auth){
         return redirect()->route('home');
       }
       return back()->with('error','invalid login details');
    }

    //Signup method
    public function signUp(){
        $pageTitle = 'SignUp';

        return view('auth.signup',compact(['pageTitle']));
    }

    //Validate signup method
    public function validateSignUp(Request $request){

       $incomingfields = $this->validate($request ,
            [
            'email'=> 'required|email|unique:users',
            'name'=> 'required|max:255',
            'password'=>'required|min:8',
            'confirm_password'=>'required|min:8|same:password'
        ]);

        $incomingfields['password'] = Hash::make($incomingfields['password']);
        unset($incomingfields['confirm_password']);
        User::create($incomingfields);
        $auth = Auth::attempt($request->only('email','password'));
        session()->put('role',Auth::user()->user_role);
        session()->put('level',Auth::user()->user_level);
       if($auth){
         return redirect()->route('home');
       }
       return redirect()->back()->with('status','user already exists');
    }
    public function validateSignUpAdmin(Request $request){

       $incomingfields = $this->validate($request ,
            [
            'email'=> 'required|email|unique:users',
            'name'=> 'required|max:255',
            'password'=>'required|min:8',
            'confirm_password'=>'required|min:8|same:password'
        ]);

        $incomingfields['password'] = Hash::make($incomingfields['password']);
        unset($incomingfields['confirm_password']);
        $user = User::create($incomingfields);
        // $auth = Auth::attempt($request->only('email','password'));
       if($user){
         return redirect()->route('admin.control.role',$user->id);
       }
       return redirect()->back()->with('status','user already exists');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('sign-in');
    }

    //Forgot Password method
    public function forgotenPassword(){
        $data = [
            'pageTitle' => 'Forgot Password'
        ];
        return ;
    }

    //validate Forgot Password method
    /**
     * @method mixed validateForgotenPassword()
     * @param Request $request
     *
     * accepts a request
     * Searches for the submited email or username in the database
     * It returns an error if no record is found otherwise
     * it sends and email to the user with the Login route and finally returns the change password view
     * @return mixed
     */
    public function validateForgotenPassword(Request $request){}

    //change password
    /**
     * @method mixed changePassword()
     * This method will will return the view for changing of the password
     * which allows the user to enter his password twice and submit
     * @return mixed
     */
    public function changePassword(){

    }

    //validate change passsword method
    /**
     * @method mixed validateChangePassword()
     * @param Request $request
     * This accepts the request and searches for the email and or username of the user
     * in the database.
     * It returns an error if the details are wrong else it changes the password and returns the user back
     * to the login page.
     * @return mixed
     */
    public function validateChangePassword(Request $request){}
}
