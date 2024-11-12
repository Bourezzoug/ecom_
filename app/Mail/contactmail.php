<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email,$nom_complet,$telephone, $options,$emailMessage,$city,$country;

    /**
     * Create a new message instance.
     */
    public function __construct($email, $nom_complet, $telephone, $subject,$emailMessage)
    {
        $this->email = $email;
        $this->nom_complet = $nom_complet;
        $this->telephone = $telephone;
        $this->subject = $subject;
        $this->emailMessage = $emailMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to('simobourezzouk@gmail.com')
                    ->from('contact@modeveloper.com', $this->nom_complet)
                    ->subject('La farme verte : ' . $this->subject)
                    ->view('emails.contactmail');
    }
}
