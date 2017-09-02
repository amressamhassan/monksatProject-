<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\users;
use Carbon;

class UsersController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function user($act){
        if (Auth::guest()) {
            return redirect('/');
        }
        elseif (!(Auth::user()->users_type==1)){
            return redirect('/');
        }
        if($act==1)
        {
            $user=users::where('active','=',1)->
                where('users_type','<>',1)->
                where('registration_id','<>',0)->get();
            return view('website.admin.manage_members',compact('act','user'));
        }
        else
        {
            $user=users::where('active','=',0)->
            where('users_type','<>',1)->
            where('registration_id','<>',0)->get();
            return view('website.admin.manage_members',compact('act','user'));
        }
    }
    public function index($act)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.newuser');

    }

    public function rest()
    {
        return view('website.rest_password');

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function actvie($actvie)
    {     if (Auth::guest()) {
        return redirect('/');
            }
        elseif (!(Auth::user()->users_type==1)){
            return redirect('/');
        }
        $todo=users::find($actvie);
        if($todo->registration_id==1)
        {$date=Carbon\Carbon::now()->addDays(90);}
        elseif ($todo->registration_id==2)
        {$date=Carbon\Carbon::now()->addDays(180);}
        elseif ($todo->registration_id==3)
        {$date=Carbon\Carbon::now()->addDays(360);}
        $todo->end_data=$date->format('Y-m-d');
        $todo->active=1;
        $todo->save();
        return redirect('/admin');
    }

    public function mes($mes)
    {
        return view('website.admin.add_message',compact('mes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
