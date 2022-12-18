<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordChange extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $login;
    private $pass;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $login, $pass)
    {
        $this->user = $user;
        $this->login = $login;
        $this->pass = $pass;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Password Change',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.change-password',
            with: ['user' => $this->user, 'login' => $this->login, 'pass' => $this->pass]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
