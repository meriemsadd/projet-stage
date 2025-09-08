<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Participant;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Imagick;
use ImagickPixel;
use ImagickDraw;

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
        // Données à encoder dans le QR code
        $data = "http://192.168.1.7:8000/presence/{$this->participant->id}";


        // Générer le QR code en PNG en mémoire
        $qrContent = QrCode::format('png')->size(180)->generate($data);

        // Charger avec Imagick pour styliser si besoin
        $image = new Imagick();
        $image->readImageBlob($qrContent);

        // Exemple : ajouter un fond blanc autour du QR code
        $canvas = new Imagick();
        $canvas->newImage(220, 220, new ImagickPixel('white')); // taille légèrement supérieure
        $canvas->compositeImage($image, Imagick::COMPOSITE_OVER, 20, 20);
        $canvas->setImageFormat('png');

        // Convertir en base64 pour le PDF
        $qrBase64 = base64_encode($canvas->getImageBlob());

        // Générer le PDF en passant le QR code en base64
        $pdf = Pdf::loadView('invitation', [
            'participant' => $this->participant,
            'qrBase64'    => $qrBase64,
        ]);

        return $this->subject('Invitation à l\'événement')
                    ->view('emails.invitation')
                    ->attachData($pdf->output(), 'invitation.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
