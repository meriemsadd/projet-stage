<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Participant;
use Barryvdh\DomPDF\Facade\Pdf;


use SimpleSoftwareIO\QrCode\Facades\QrCode;
use SimpleSoftwareIO\QrCode\Renderer\ImageRenderer;
use SimpleSoftwareIO\QrCode\Renderer\Image\GDImageBackEnd;
use SimpleSoftwareIO\QrCode\Renderer\RendererStyle\RendererStyle;


class InvitationParticipant extends Mailable
{
    use Queueable, SerializesModels;

    public $participant;

    public function __construct(Participant $participant)
    {
        $this->participant = $participant;
    }

    public function build()
    {
        // Génère le PDF à partir de la vue 'pdf.invitation'
        $pdf = Pdf::loadView('invitation', ['participant' => $this->participant]);

        return $this->subject('Invitation à l\'événement')
                    ->view('emails.invitation')
                    ->attachData($pdf->output(), 'invitation.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
