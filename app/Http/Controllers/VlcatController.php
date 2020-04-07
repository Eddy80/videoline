<?php

namespace App\Http\Controllers;

use App\Vlcat;
use App\Vluservideos;
use App\Vlvideo;
use Illuminate\Http\Request;
use Auth;

class VlcatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function lastindex()
    {
        $cats = Vlcat::orderBy('id', 'desc')->skip(0)->take(3)->get();
        $cats->author = 'elshad';
        return  $cats;
    }

    public static function index()
    {
        $cats = Vlcat::All();

       // $cats->edit(['author'=> 'Elşad']);
        return  $cats;
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
     * @param  \App\Vlcat  $vlcat
     * @return \Illuminate\Http\Response
     */
    public function show(Vlcat $vlcat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vlcat  $vlcat
     * @return \Illuminate\Http\Response
     */
    public function edit(Vlcat $vlcat)
    {

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vlcat  $vlcat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vlcat $vlcat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vlcat  $vlcat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vlcat $vlcat)
    {
        //
    }


    public function lessonload($lessonid)
    {
        $lesson = Vlcat::find($lessonid);
        $videos = Vlvideo::where('catid', $lessonid)->get();
        $user = Auth::user();
        return view('lesson', ['lesson'=>$lesson, 'videos'=>$videos, 'currentuser'=>$user]);
    }



}
