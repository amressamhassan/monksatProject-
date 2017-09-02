<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\request;

use App\users;
use App\item;
use App\item_users;

class Sendinter extends Mailable
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
        foreach ($user as $value){
            $this->view('sendtender',['date'=>$request->date
                ,'day'=>$request->day
                ,'interested'=>'interested'])
                ->subject(' مناقصات دوت كوم التصنيف الخاص بيك')
                ->from('Monaqsa.DotCom@gmail.com')
                ->to($value->email);

        }
    }
}
