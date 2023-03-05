<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use App\Providers\RouteServiceProvider;

class athentificationController extends Controller
{
  /*   public function login(Request $request){
        validator(request()->all(),[
            'email' => ['required' , 'email'],
            'password' => ['required']
        ])->validate();
        $userdata = array(
            'email'      => $request->email,
            'password'      =>  $request->password
        );
      
        dd(FacadesAuth::attempt($userdata));
        if(auth()->attempt(request()->only(['email','password']))){
            return  redirect('/formations');
        }
      
       
    } */ /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
  
 
  
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
  
     /**
     * Write code on Method
     *
     * @return response()
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
     
        $credentials = $request->only('email', 'password');
        dd(FacadesAuth::attempt($credentials));
      
 
        if (FacadesAuth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
    
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
}
