<?php

namespace App\Http\Controllers;

use App\Vluser;
use Illuminate\Http\Request;

class VluserController extends Controller
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
     * @param  \App\Vluser  $vluser
     * @return \Illuminate\Http\Response
     */
    public function show(Vluser $vluser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vluser  $vluser
     * @return \Illuminate\Http\Response
     */
    public function edit(Vluser $vluser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vluser  $vluser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vluser $vluser)
    {
        $this->validate($request,[
            //'usercode'=> 'required',
//            'lastname'=> 'required',
//            'email'=> 'required|email|unique:users',
//            'password'=> 'required'
//            //'avatar' => 'nullable|image'
        ]);

        $user = Vluser::find($id);
        $user->edit($request->all());

        //return redirect()->route('cab.members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vluser  $vluser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vluser $vluser)
    {
        //
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/home');
    }



    public static function getList()
    {
        return User::all();
    }
}
