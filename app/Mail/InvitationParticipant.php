<?php

namespace App\Mail;
use App\Models\Participant;//pour acceder au donnee du participant

use Illuminate\Bus\Queueable;//Permet de mettre l'envoi de l'e-mail en file d’attente (asynchrone).
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;//Sérialise (convertit) les objets comme Participant pour les utiliser dans un e-mail.

class InvitationParticipant extends Mailable
{
    use Queueable, SerializesModels;

    public $participant;//pour sera accessible depuis l view

    public function __construct(Participant $participant)//constructeur , Reçoit le participant au moment de l’envoi.
    {
        $this->participant = $participant;
    }

    public function build(){//Construit l’e-mail (titre + contenu HTML).
        return $this->subject('Invitation à l évenement x ')//subject pour definir le titre de l email
                    ->view('emails.invitation');//sa se voit ce fichier html 
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invitation Participant',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
{
    return new Content(
        view: 'emails.invitation',
    );
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
