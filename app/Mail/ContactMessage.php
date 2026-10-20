<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct(array $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this
            ->subject('New website enquiry from '.$this->contact['name'])
            ->replyTo($this->contact['email'], $this->contact['name'])
            ->view('emails.contact-message');
    }
}
