<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailReponseInscription extends Mailable
{
    use Queueable, SerializesModels;

    public $fournisseur;
    public $statut;

    /**
     * Create a new message instance.
     */
    public function __construct($fournisseur, $statut)
    {
        $this->fournisseur = $fournisseur;
        $this->statut = $statut;
    }

    public function build()
    {
        if ($this->statut === 'refuser') {
            return $this->subject('Votre demande d\'inscription a été refusée')
                        ->view('emails.refus_inscription')
                        ->with(['fournisseur' => $this->fournisseur]);
        }

        return $this->subject('Votre demande d\'inscription a été acceptée')
                    ->view('emails.acceptation_inscription')
                    ->with(['fournisseur' => $this->fournisseur]);
    }
}
