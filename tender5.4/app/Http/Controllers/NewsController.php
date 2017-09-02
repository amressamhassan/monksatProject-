<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\news;
use Storage;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\ads;
use App\Mail\Sendads;
class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        if (Auth::guest()) {
            return redirect('/');

        }
        elseif (!(Auth::user()->users_type==1)){
            return redirect('/');
        }


        return view('website.admin.ads');

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
        $news=new news();
        $news->title=$request->title;
        $news->body=$request->body;
        $request->file('image');
        $news->image=$request->image->store('public');
        $news->save();
        Mail::send(new Sendads($news->id));
        return redirect('/news/create');
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
