<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Vlcat;
use App\Vlvideo;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Vluservideos;


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

    public function login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $user = User::where('email', $request->get('email'))
            ->where('password',md5($request->get('password')))
            ->first();

        if ($user){
            Auth::login($user);
            return redirect('/cab');

            /*
            $currentuser = Auth::user();
            $uservideos = Vluservideos::where('userid', $currentuser->id)->groupby('catid')->get('catid');

            $arrayresult = [];
            foreach ($uservideos as  $uservideo){
                $lessonname = Vlcat::where('id', $uservideo->catid)->pluck('name');
                $lessonduration = Vlcat::where('id', $uservideo->catid)->pluck('totaldurationinseconds');
                $countofvideosinlessons = Vlvideo::where('catid', $uservideo->catid)->count();
                $countofuservideosbylesson = Vluservideos::where('userid', $currentuser->id)->where('catid', $uservideo->catid)->count();
                $percent = round($countofuservideosbylesson*100/$countofvideosinlessons);
                array_push($arrayresult, array($uservideo->catid, $lessonname[0], $lessonduration[0], $percent));
            }
            return view('cab', ['arrayresult'=>$arrayresult,  'currentuser'=>$currentuser]);*/
        }
        return redirect()->back()->with('status','Yalnış email və ya parol');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
