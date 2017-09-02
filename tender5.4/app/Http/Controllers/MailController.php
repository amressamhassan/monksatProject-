<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\contact;
class MailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::guest()) {
            return redirect('/');
        }
        elseif (!(Auth::user()->users_type==1)){
            return redirect('/');
        }
        $con=contact::all();

        return view('website.admin.show_message',compact('con'));

    }

    public function message_details($id)
    {
        if (Auth::guest()) {
            return redirect('/');

        }
        elseif (!(Auth::user()->users_type==1)){
            return redirect('/');
        }
        $con=contact::find($id);
        return view('website.admin.message_details',compact('con'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (Auth::guest()) {
            return redirect('/');

        }
        elseif (!(Auth::user()->users_type==1)){
            return redirect('/');
        }
        $mes='';
        return view('website.admin.add_message',compact('mes'));
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
