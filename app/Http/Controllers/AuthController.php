<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //Signin method
    public function signIn(){
        $data = [
            'pageTitle' => 'Signin'
        ];

        return view('auth.login',compact($data));
    }

    //Validate signin mehtod
    public function validateSignIn(Request $request){}

    //Signup method
    public function signUp(){
        $data = [
            'pageTitle' => 'Signup'
        ];
        return view('auth.signup',compact($data));
    }

    //Validate signup method
    public function validateSignUp(Request $request){}

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
