<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $lang;
    //public $images;

    /**
     * Create a new message instance.
     */
    public function __construct($email, $lang)
    {        
        $this->email = $email;
        $this->lang = $lang;
        /*$imagePaths = [
            public_path('images/logo.png'),
            public_path('images/logo_footer.png'),
            public_path('images/linkedin.png'),
            public_path('images/instagram.png'),
            public_path('images/youtybe.png'),
            public_path('images/facebook.png'),
        ];

        $images = [];

        foreach ($imagePaths as $imagePath) {
            $imageData = file_get_contents($imagePath);
            $imageBase64 = base64_encode($imageData);
            $imageSrc = 'data:image/png;base64,' . $imageBase64;
            $images[] = $imageSrc;
        }
        $this->images = $images;*/
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
                markdown: 'mail.password',
            );
        } else {
            return new Content(
                markdown: 'mail.passworden',
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
