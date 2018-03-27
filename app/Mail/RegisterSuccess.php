<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterSuccess extends Mailable
{
    use Queueable, SerializesModels;

    public $qq;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($qq)
    {
        //
        $this->qq = $qq;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->from()->view();
        return $this->view('emails.users.registersuccess')->with('date',date('Y-m-d H:i:s',time()));
    }
}