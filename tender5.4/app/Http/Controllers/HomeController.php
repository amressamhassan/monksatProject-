<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon;
use App;
use Mail;
use App\mail\SendMail;
use App\usersnews;
use App\item;
use App\users;
use App\contact;
use App\seen;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }



    public function admin()
    {

        //$this->middleware('auth');
        if (Auth::guest()) {
            return redirect('/');
        }
        elseif (!(Auth::user()->users_type==1)){
            return redirect('/');
        }
        $item = item::count();
        $usersac = users::where(['active' => 1])->where('users_type','<>','1')->get()->count();
        $usersunac =users::where(['active' => 0])->where('users_type','<>','1')->get()->count();
        $users= users::count();
        $contact = contact::count();
        return view('website.admin.index',compact('item','contact','usersac','usersunac','users'));

    }
    public function content($id)
    {
        $item=
            item::select('category.category as category', 'newspaper.id as newspaper_id', 'newspaper.newspaper as newspaper', 'item.*')->
            join('category_item', 'category_item.item_id', '=', 'item.id')->
            join('category', 'category_item.category_id', '=', 'category.id')->
            join('newspaper', 'newspaper.id', '=', 'item.newspaper_id')->
            where('item.id','=',$id)->distinct()->get();
        if ($item->count()){
            $item= create_item($item);
        }
        //dd($item);
        return view('website.content',compact('item'));
    }
    public function index()
    {
        /*$mytime = Carbon\Carbon::parse('2017')->format('Y-m-d');
        echo $mytime;*/



        for ($i = 0; $i <= 7; $i++){
            $mytime = Carbon\Carbon::now()->subDays($i);
            $dat1[]=$mytime->format('Y-m-d');
            $dat2[]=getdayarb($mytime->format('l'));}
        $date=[$dat1,$dat2];
        return view('website.home',compact('date'));

    }
    public function tenders(Request $search)
    {
        /*$u=users::find($search)->categorys;
        return $u;*/
        $item=$this->get_search($search->search);
        if (!count($item)>0) {
            return  redirect('/');
        }
        return  view('website.topic',compact('item'));

    }
    public function tendersbydate($date,$interested)
    {
        $type='date';
        $seen='';
        if($interested=='interested')
        {
            $item=$this->get_date_inter($date);
        }
        else
        {
            $item=$this->get_date($date);
        }
        if (seen::where('date', '=',$date)->exists())
        {
            $seen=seen::where('date', '=',$date)->first();
            $seen->seen=$seen->seen+1;
            $seen->save();
        }
        return  view('website.topic',compact('item','type','date'));
    }
    public function tendersbynewspaper($id)
    {
        $type='';
        $item=$this->get_newspaper($id);
        return  view('website.topic',compact('item','type'));
    }


    public function get_search($search){
        $searchValues = preg_split('/\s+/', $search, -1, PREG_SPLIT_NO_EMPTY);
        $item=
            item::select('category.category as category', 'newspaper.id as newspaper_id',
                'newspaper.newspaper as newspaper', 'item.*')->
            join('category_item', 'category_item.item_id', '=', 'item.id')->
            join('category', 'category_item.category_id', '=', 'category.id')->
            join('newspaper', 'newspaper.id', '=', 'item.newspaper_id')->
            where(function ($q) use ($searchValues) {
                foreach ($searchValues as $value) {$q->orWhere('title', 'like', "%{$value}%");}
            })->orWhere(function ($q) use ($searchValues) {
                foreach ($searchValues as $value) {$q->orWhere('decs', 'like', "%{$value}%");}
            })->orderby('date')->distinct()->get();
        if ($item->count()){
            return create_item($item);
        }

        return $item;
    }
    public function get_date($date){
        if (!Auth::guest())
        {
            if(Auth::user()->active==1)
            {
                $item=
                    item::select('category.category as category',
                        'newspaper.id as newspaper_id',
                        'newspaper.newspaper as newspaper', 'item.*')->
                    join('category_item', 'category_item.item_id', '=', 'item.id')->
                    join('category', 'category_item.category_id', '=', 'category.id')->
                    join('newspaper', 'newspaper.id', '=', 'item.newspaper_id')->
                    where('item.date','=',$date)->distinct()->get();
            }
            else
            {
                $item=
                    item::select('category.category as category',
                        'newspaper.id as newspaper_id',
                        'newspaper.newspaper as newspaper', 'item.*')->
                    join('category_item', 'category_item.item_id', '=', 'item.id')->
                    join('category', 'category_item.category_id', '=', 'category.id')->
                    join('newspaper', 'newspaper.id', '=', 'item.newspaper_id')->
                    where('item.date','=',$date)->distinct()
                        ->orderByRaw('RAND()')->take((int)((item::count()*30)/100))->get();
            }
        }
        else
        {
        $item=
            item::select('category.category as category', 'newspaper.id as newspaper_id',
                'newspaper.newspaper as newspaper', 'item.*')->
            join('category_item', 'category_item.item_id', '=', 'item.id')->
            join('category', 'category_item.category_id', '=', 'category.id')->
            join('newspaper', 'newspaper.id', '=', 'item.newspaper_id')->
            where('item.date','=',$date)->distinct()
                ->orderByRaw('RAND()')->take((int)((item::count()*30)/100))->get();
        }


        if ($item->count()){
            return create_item($item);
        }
        return $item;

    }
    public function get_newspaper($id){
        $item=
            item::select('category.category as category', 'newspaper.id as newspaper_id',
                'newspaper.newspaper as newspaper', 'item.*')->
            join('category_item', 'category_item.item_id', '=', 'item.id')->
            join('category', 'category_item.category_id', '=', 'category.id')->
            join('newspaper', 'newspaper.id', '=', 'item.newspaper_id')->
            where('newspaper.id','=',$id)
                ->orderByRaw('RAND()')->take((int)((item::count()*30)/100))
                ->distinct()->get();
        if ($item->count()){
            return create_item($item);
        }
        return $item;

    }
    public function subscriptionNews(Request $request)
    {
        /*$u=users::find($search)->categorys;
        return $u;*/
        echo $request->email;
        $news=new usersnews;
        $news->email=$request->email;
        $news->save();
        return  redirect('/');

    }
    public function get_date_inter($date){
        if (!Auth::guest())
        {
            if(Auth::user()->active==1)
            {
                $item=
                    item::select('category.category as category',
                        'newspaper.id as newspaper_id',
                        'newspaper.newspaper as newspaper', 'item.*')->
                    join('category_item', 'category_item.item_id', '=', 'item.id')->
                    join('category', 'category_item.category_id', '=', 'category.id')->
                    join('category_users', 'category_users.category_id', '=', 'category.id')->
                    join('users', 'category_users.users_id', '=', 'users.id')->
                    join('newspaper', 'newspaper.id', '=', 'item.newspaper_id')->
                    where('item.date','=',$date)->
                    Where('users.id','=',Auth::user()->id)
                        ->distinct()->get();
            }
            else
            {
                $item=
                    item::select('category.category as category',
                        'newspaper.id as newspaper_id',
                        'newspaper.newspaper as newspaper', 'item.*')->
                    join('category_item', 'category_item.item_id', '=', 'item.id')->
                    join('category', 'category_item.category_id', '=', 'category.id')->
                    join('newspaper', 'newspaper.id', '=', 'item.newspaper_id')->
                    join('category_users', 'category_users.category_id', '=', 'category.id')->
                    join('users', 'category_users.users_id', '=', 'users.id')->
                    where('item.date','=',$date)
                        ->orWhere('users.id','=',Auth::user()->id)
                        ->distinct()
                        ->orderByRaw('RAND()')->take((int)((item::count()*30)/100))->get();
            }
        }
        else
        {
            $item=
                item::select('category.category as category', 'newspaper.id as newspaper_id',
                    'newspaper.newspaper as newspaper', 'item.*')->
                join('category_item', 'category_item.item_id', '=', 'item.id')->
                join('category', 'category_item.category_id', '=', 'category.id')->
                join('newspaper', 'newspaper.id', '=', 'item.newspaper_id')->
                where('item.date','=',$date)->distinct()
                    ->orderByRaw('RAND()')->take((int)((item::count()*30)/100))->get();
        }


        if ($item->count()){
            return create_item($item);
        }
        return $item;

    }
}
