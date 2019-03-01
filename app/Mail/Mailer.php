<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Mailer extends Mailable
{
    use Queueable, SerializesModels;

    public $mailobject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $mailobject )
    {
        $this->mailobject = $mailobject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('dealer@dealer.com')
                    ->view('mail.mail');
    }
}
