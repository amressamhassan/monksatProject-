<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\request;
use Storage;
use App\usersnews;
use App\news;
class Sendads extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $inputs;

    public function __construct($inputs)
    {
        $this->inputs = $inputs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $new=news::find($this->inputs);
        $user=usersnews::all();
        foreach ($user as $value)
        {
            //$file = Storage::disk('local')->get($new->image);
            $this->view('sendads',
                ['image'=>url('/public'.Storage::url($new->image))
                    ,'title'=>$new->title
                    ,'des'=>$new->body])
                ->subject(' مناقصات دوت كوم اعلانات')
                ->from('Monaqsa.DotCom@gmail.com')
                ->to($value->email);
                //->attach(url('/public'.Storage::url($new->image)));
        }
    }
}

