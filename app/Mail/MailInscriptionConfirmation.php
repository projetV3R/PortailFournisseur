<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailInscriptionConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $supplier;

    /**
     * Create a new message instance.
     */
    public function __construct($supplier)
    {
        $this->supplier = $supplier;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Confirmation de votre demande d\'inscription')
                    ->view('emails.courriel_inscription_confirmation')
                    ->with(['supplier' => $this->supplier]);
    }
}
