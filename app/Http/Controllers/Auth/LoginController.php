<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public  function login(Request $request)
    {
       // dd($request->all());
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);


        $result = Auth::attempt([
            'email'=> $request->get('email'),
            'password'=> $request->get('password')
        ]);

        if ($result){
                return redirect('/cab');
        }
        return redirect()->back()->with('status','Yalnış email və ya parol');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
