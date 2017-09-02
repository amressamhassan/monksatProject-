<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\item;
use Illuminate\Support\Facades\Auth;

use App\category_item;
use App\newspaper;
use App\category;
use App\seen;
use App\users;

use Carbon;
use Storage;
use DB;
use Mail;
use App\Mail\SendMail;
use App\Mail\Sendonemes;
use App\Mail\Sendinter;
//App::make('files')->link(storage_path('app/public'), public_path('storage'));

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    if (!(Auth::user()->users_type==1)){
            return redirect('/');
        }
        $now = Carbon\Carbon::now()->format('Y');
        $t=2017;
        for ($i = 2017; $i <=$now ; $i++){
            $dte[] = ["st"=>Carbon\Carbon::
            parse("$i-01-01")->format('Y-m-d'),
                "ed"=>Carbon\Carbon::
                parse("$i-12-31")->format('Y-m-d')
                ,"year"=>$i];
        }
        for ($i = 0; $i < count($dte); $i++) {
            $item[]= item::whereBetween('date', array($dte[$i]['st'], $dte[$i]['ed']))->get();
        }
        return view('website.admin.tender_mangment',compact('item','dte'));
    }

    public function create()
    {
    if (!(Auth::user()->users_type==1)){
            return redirect('/');
        }
        $category= category::all();
        $newspaper=newspaper::all();

        return view('website.admin.add_tender',compact('newspaper','category'));
    }


    public function store(Request $request)
    {
    if (!(Auth::user()->users_type==1)){
            return redirect('/');
        }
        $item=new item;
        $seen='';

        $cat=$request->input('cata');
        $request->file('image');
        $item->title=$request->title;
        $item->decs=$request->decs;
        $item->image_url=$request->image_url;
        $item->company_name=$request->company_name;
        $item->date=Carbon\Carbon::now()->format('Y-m-d');
        $item->newspaper_id=$request->newspaper_id;
        $item->image_url=$request->image->store('public');
        $item->save();
        foreach ($cat as $cat1){
            $category_item=new category_item;
            $category_item->item_id=$item->id;
            $category_item->category_id=$cat1;
            $category_item->save();
        }

        if (seen::where('date', '=',$item->date)->exists()) {
            $seen=seen::where('date', '=',$item->date)->first();
            $seen->date=$item->date;
            $seen->save();
        }
        else{
            $seen=new seen;
            $seen->date=$item->date;
            $seen->seen=0;
            $seen->save();
        }
        return redirect('/admin');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return $id;
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
    if (!(Auth::user()->users_type==1)){
            return redirect('/');
        }
        $item=item::find($id);
        Storage::delete($item->image_url);
        $item->delete();
      return  redirect('/admin');
    }


    public function itemsend(){
    if (!(Auth::user()->users_type==1)){
            return redirect('/');
        }
        $item =item::whereNotExists
        (
            function($query)
                    {   $query
                        ->select(DB::raw(1))
                        ->from('item_users')
                        ->whereRaw('item.id = item_users.item_id');
                    }
        )->get();
        /*select('SELECT * FROM item WHERE NOT EXISTS (SELECT 1 FROM item_users WHERE item.id = ?)'
        , array('item_users.item_id'));*/
        $data=[];
        $array=[];
        foreach ($item as $value){
            if(!(in_array($value->date, $array))){
                $data[]=[getdayarb(Carbon\Carbon::parse($value->date)->format('l')),$value->date];
                $array[]=$value->date;
            }

       }
        return view('website.admin.sendtender',compact('item','data'));
    }
    public function sendtrener(){
    if (!(Auth::user()->users_type==1)){
            return redirect('/');
        }
        Mail::send(new Sendinter());
        Mail::send(new SendMail());
        //return redirect('/admin');
    }

    public function sendone(){
    if (!(Auth::user()->users_type==1)){
            return redirect('/');
        }
        Mail::send(new Sendonemes());
        return redirect('/admin');
    }

    public function seen(){
    if (!(Auth::user()->users_type==1)){
            return redirect('/');
        }
        $seen=seen::orderBy('date')->get();
        return view('website.admin.seen',compact('seen'));
    }

    public function enduser(){
    if (!(Auth::user()->users_type==1)){
            return redirect('/');
        }
        $user=users::where('end_data','>',Carbon\Carbon::now()->format('Y-m-d'))
            ->orderBy('end_data')->get();
        return view('website.admin.userend',compact('user'));
    }
}
