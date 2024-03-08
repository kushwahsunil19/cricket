<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    // public function build()
    // {
    //     return $this->view('emails.contact');
    // }

    public function build()
    {   
        return $this->view('emails.contact')
                    ->subject('Its working on web to testing mail thankyou!')
                    ->with(['contact' => $this->contact]);
    }
}
