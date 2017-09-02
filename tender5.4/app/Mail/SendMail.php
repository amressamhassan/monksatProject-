<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\request;

use Illuminate\Contracts\Queue\ShouldQueue;
use App\users;
use App\item;
use App\item_users;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(request $request)
    {

        $user=users::where('active','=','1')->get();
        $item=item::where('date','=',$request->date)->get();
        foreach ($user as $value){
        $this->view('sendtender',['date'=>$request->date
        ,'day'=>$request->day
        ,'interested'=>'all'])
            ->subject(' مناقصات دوت كوم')
            ->from('Monaqsa.DotCom@gmail.com')
            ->to($value->email);
            foreach ($item as $value1){
                $iu=new item_users();
                $iu->users_id=$value->id;
                $iu->item_id=$value1->id;
                $iu->save();
            }
        }
    }
}
