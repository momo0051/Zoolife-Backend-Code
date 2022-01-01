<?php

namespace App\Mail;

use App\Models\Promotion;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class JoinUs extends Mailable
{
    use Queueable, SerializesModels;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($param)
    {
        $this->user = $param;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->view('emails.joinus')->subject($this->user);
    }
}
