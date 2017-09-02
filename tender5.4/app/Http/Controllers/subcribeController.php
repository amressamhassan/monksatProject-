<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\country;
use App\users;
use App\category_users;
use Illuminate\Support\Facades\Auth;
class subcribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('website.subscribe');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::guest()) {
            return redirect('/');

        }
        elseif (!(Auth::user()->users_type==1)){
            return redirect('/');
        }

        $user=[];
        $email='';
        if (!Auth::guest()){
            $user=users::where('email','=',Auth::user()->email)->get();
        }

        if (!(count($user)==0)){
            $user=users::find($user[0]->id);
            $email=$user->email;
            if($user->active==1){
                return redirect('/');

            }
        }
        else
        {
            $user=new users;
            $email=$request->email;
        }
        $user->name=$request->name;
        $user->email=$email;
        $user->company_name=$request->company_name;
        $user->company_address=$request->company_address;
        $user->phone=$request->phone;
        $user->Tphone=$request->Tphone;
        $user->fax=$request->fax;
        $user->country_id=$request->country;
        $user->registration_id=$request->type;
        $user->active=0;
        $user->save();
        foreach ($request->category as $value)
        {
            $cu=new category_users;
            $cu->users_id=$user->id;
            $cu->category_id=$value;
            $cu->save();
        }

            return redirect('/');

    }

    public function subcribetion(Request $request)
    {
        $cate=category::all();
        $country=country::all();
        $type=$request->type;
        return view('website.registration',compact('cate','type','country'));

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
