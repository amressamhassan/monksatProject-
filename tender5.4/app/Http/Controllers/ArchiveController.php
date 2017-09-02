<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Carbon;
use App\item;
class ArchiveController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $item=[];
        $now = Carbon\Carbon::now()->format('Y');
        for ($i = 2017; $i <= $now; $i++)
        {
            $dte[] = ["st"=>Carbon\Carbon::parse("$i-01-01")->format('Y-m-d'),
                "ed"=>Carbon\Carbon::parse("$i-12-31")->format('Y-m-d'),"year"=>$i];
        }
        for ($i = 0; $i < count($dte); $i++)
        {
            if (item::whereBetween('date', array($dte[$i]['st'], $dte[$i]['ed']))
                ->distinct()->get()->count())
            {
            $item[] =["year"=>$dte[$i]['year'],
            "item"=> item::whereBetween('date', array($dte[$i]['st'], $dte[$i]['ed']))->distinct()->get()];
            }
        }
        if (count($item)>0){
            //$item=$this->cerate_arc($items);
            return view('website.archive',compact('item'));
        }
        return redirect('/');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {

        $dte[] = ["st"=>Carbon\Carbon::parse("$id-01")->format('Y-m-d'),
                  "ed"=>Carbon\Carbon::parse("$id-31")->format('Y-m-d'),
                  "year"=>Carbon\Carbon::parse("$id-31")->format('Y')];
        for ($i = 0; $i < count($dte); $i++)
        {
            if (item::whereBetween('date', array($dte[$i]['st'], $dte[$i]['ed']))
                ->distinct()->get()->count())
            {
                $item[] =["year"=>$dte[$i]['year'],
                    "item"=> item::whereBetween('date', array($dte[$i]['st'], $dte[$i]['ed']))
                        ->distinct()->get()];
            }
        }
        if (count($item)>0){
            return view('website.archiveday',compact('item'));
        }
        return redirect('/');
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
