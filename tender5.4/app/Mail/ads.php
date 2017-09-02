<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Storage;
use App\usersnews;
use App\news;
class ads extends Mailable
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
        //return $this->markdown('ads');
            $new=news::find($this->inputs);
            $user=usersnews::all();
            foreach ($user as $value)
            {
                //$file = Storage::disk('local')->get($new->image);
                $this->markdown('ads',
                    ['image'=>$new->image
                        ,'title'=>$new->title
                        ,'des'=>$new->body])
                    ->subject(' مناقصات دوت كوم اعلانات')
                    ->from('Monaqsa.DotCom@gmail.com')
                    ->to($value->email);
                /*->attach($file);*/
            }

}
}
