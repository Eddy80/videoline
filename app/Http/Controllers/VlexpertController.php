<?php

namespace App\Http\Controllers;

use App\Vlexpert;
use Illuminate\Http\Request;

class VlexpertController extends Controller
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
     * @param  \App\Vlexpert  $vlexpert
     * @return \Illuminate\Http\Response
     */
    public function show(Vlexpert $vlexpert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vlexpert  $vlexpert
     * @return \Illuminate\Http\Response
     */
    public function edit(Vlexpert $vlexpert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vlexpert  $vlexpert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vlexpert $vlexpert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vlexpert  $vlexpert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vlexpert $vlexpert)
    {
        //
    }

    public static function getUserFLNames($expertid){
        $expert = Vlexpert::where('id', $expertid)->get();
        return $expert;
    }
}
