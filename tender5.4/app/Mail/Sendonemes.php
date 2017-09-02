<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\request;

use Illuminate\Contracts\Queue\ShouldQueue;
use App\users;
use App\item;
class Sendonemes extends Mailable
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
        $this->view('sendone',['mes'=>$request->mes,'tit'=>$request->title])
            ->subject('مناقصات دوت كوم')
            ->from('Monaqsa.DotCom@gmail.com')
            ->to($request->email);
    }
}
