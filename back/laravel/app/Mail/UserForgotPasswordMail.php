<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $email;
    public $lang;
    public $password;

    /**
     * Create a new message instance.
     */
    public function __construct($email, $lang, $password)
    {        
        $this->email = $email;
        $this->lang = $lang;
        $this->password = $password;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        if($this->lang == "ua") {
            return new Envelope(
                subject: 'Агенство домашнього сервісу HouseHub.',
            );
        } else {
            return new Envelope(
                subject: 'Home service agency HouseHub.',
            );
        }        
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        if($this->lang == "ua") {
            return new Content(
                markdown: 'mail.forgotpassword',
            );
        } else {
            return new Content(
                markdown: 'mail.forgotpassworden',
            );
        }
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
