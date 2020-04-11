<?php

namespace App\Http\Controllers;

use App\User;
use App\Vlcat;
use App\Vluserpaylog;
use App\Vluservideos;
use App\Vlvideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            //'usercode'=> 'required',
//            'lastname'=> 'required',
//            'email'=> 'required|email|unique:users',
//            'password'=> 'required'
//            //'avatar' => 'nullable|image'
        ]);

       // $user = User::find($id);
        $user->edit($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }


    public static function getList()
    {
        return User::all();
    }

    public function cab()
    {
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


                $promos = Vluserpaylog::where('promokodforpay', $currentuser->myprivatepromokod)->
                                       where('paywaiting', '<>', 1)->
                                       where('payedtouser', '<>', 1)->get();

                $totalprofit = Vluserpaylog::where('promokodforpay', $currentuser->myprivatepromokod)->
                where('paywaiting', '<>', 1)->
                where('payedtouser', '<>', 1)->get()->sum("payamount")*50/100; // 50 % cashback


                $promoswaiting = Vluserpaylog::where('promokodforpay', $currentuser->myprivatepromokod)->
                where('paywaiting', '<>', 0)->
                where('payedtouser', '<>', 1)->get();

                $totalprofitwaiting = Vluserpaylog::where('promokodforpay', $currentuser->myprivatepromokod)->
                where('paywaiting', '<>', 0)->
                where('payedtouser', '<>', 1)->get()->sum("payamount")*50/100;  // 50 % cashback



            }
            return view('cab', ['arrayresult'=>$arrayresult, 'promos'=>$promos, 'totalprofit'=>$totalprofit,  'totalprofitwaiting'=>$totalprofitwaiting,'currentuser'=>$currentuser]);
    }


    public function cabcard($request)
    {

        dd($request);

        /*

        $cardnumber = -1;
        if (isset($_POST['cardnumber']))
        {
        if ($_POST['cardnumber']!='')
        $cardnumber = $_POST['cardnumber'];
        }

        $cardname = "-1";
        if (isset($_POST['cardname']))
        {
        if ($_POST['cardname']!='')
        $cardname = $_POST['cardname'];
        }

        $mypromokodforpay = "-1";
        if (isset($_POST['mypromokodforpay']))
        {
        if ($_POST['mypromokodforpay']!='')
        $mypromokodforpay = $_POST['mypromokodforpay'];
        }

        $payedtouserAmount = "-1";
        if (isset($_POST['payedtouserAmount']))
        {
        if ($_POST['payedtouserAmount']!='')
        $payedtouserAmount = $_POST['payedtouserAmount'];
        }

        if (($cardnumber!=-1) && ($cardname!="-1") && ($mypromokodforpay!="-1")){

        $fieldodenishlog = array('paywaiting' => 1, 'cardnumber' => $cardnumber, 'cardname' => $cardname, 'payedtouserAmount' =>$payedtouserAmount);
        $condodenishlog = array('promokodforpay'    =>  $mypromokodforpay, 'paywaiting' => 0, 'payedtouser' => 0 );

        if($data->update("vl_userpaylog", $fieldodenishlog, $condodenishlog))
        {
        //echo "MODIFIED";
        $cardnumber=-1;$cardname="-1"; $mypromokodforpay="-1";
        }
        }

        */


        $this->cab();
    }


    public function mypayaccount()
    {
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


            $promos = Vluserpaylog::where('promokodforpay', $currentuser->myprivatepromokod)->
            where('paywaiting', '<>', 1)->
            where('payedtouser', '<>', 1)->get();

            $totalprofit = Vluserpaylog::where('promokodforpay', $currentuser->myprivatepromokod)->
                where('paywaiting', '<>', 1)->
                where('payedtouser', '<>', 1)->get()->sum("payamount")*50/100; // 50 % cashback


            $promoswaiting = Vluserpaylog::where('promokodforpay', $currentuser->myprivatepromokod)->
            where('paywaiting', '<>', 0)->
            where('payedtouser', '<>', 1)->get();

            $totalprofitwaiting = Vluserpaylog::where('promokodforpay', $currentuser->myprivatepromokod)->
                where('paywaiting', '<>', 0)->
                where('payedtouser', '<>', 1)->get()->sum("payamount")*50/100;  // 50 % cashback



        }
        return view('myaccount', ['arrayresult'=>$arrayresult, 'promos'=>$promos, 'totalprofit'=>$totalprofit,  'totalprofitwaiting'=>$totalprofitwaiting,'currentuser'=>$currentuser]);
    }
}
