<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    
    public function __construct($data)
    {
       $this->data = $data;
    }

    public function envelope()
    {
    return new Envelope(
        subject: 'VIVA',);
    }


    public function content()
    {
        
        return new Content(
            view: 'ProjectView',
        );
    }
}
