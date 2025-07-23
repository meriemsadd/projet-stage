<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Participant;
use App\Models\Evenement;
use App\Mail\InvitationParticipant;
use Illuminate\Support\Facades\Mail;
use App\Models\Organisme;

use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ParticipantsExport;


class ParticipantController
{
    /**
     * Display a listing of the resource.
     */
    public function index()//kat3rd ga3 les participants li 3ndna(index)
    {
        $participants=Participant::with('evenement')->get();//mn model participant yjib get(kolchi les particpan)o with(m3a les events dyalhom)
        return view('participants.index',compact('participants'));//compact(kansifto dak l variable li fih l partiicpant m3a levent dyalo)bach nkhdmoha  flview




        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($evenementId)
{
    $evenement_id = $evenementId; // <-- correspond à ce que la vue attend
    $organismes = Organisme::all();

    return view('participants.create', compact('evenement_id', 'organismes'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // 1. Sauvegarder le participant dans la base de données
    $participant = Participant::create($request->all());//on stoke dans objet pour le reutiliser
      // 🔽 Ajoute ce bloc pour gérer la signature
    if ($request->has('signature')) {
        $signatureData = $request->input('signature');
        $signatureName = 'signature_' . time() . '.png';
        $signaturePath = public_path('signatures/' . $signatureName);

        // Enlever le header "data:image/png;base64,"
        $signatureData = explode(',', $signatureData)[1];
        file_put_contents($signaturePath, base64_decode($signatureData));

        $participant->signature = 'signatures/' . $signatureName;
        $participant->save(); // On sauvegarde après avoir mis la signature
    }

    // 2. Envoyer l'e-mail
    Mail::to($participant->email)->send(new InvitationParticipant($participant));//email baséé sur ce participant

    // 3. Rediriger avec message de succès
    return redirect('/')->with('success', 'Participant ajouté avec succès ! E-mail envoyé.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)//quand je clique sur modifier
    {
    $participant=participant::findOrFail($id);//on cherche dans bd (model partciipant) qui a ce id pour le modifier 
    $evenements = Evenement::all();//kanjibo hta les events kamlin
    return view('participants.edit',compact('participant','evenements'));//l view  de edit kanrj3o bhta les donne de (participants +events)

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $participant = Participant::findOrFail($id);//on trouve le particpant de id x pour le modifiee
    $participant->update($request->all());//on le modifie selon wcha 

    return redirect('/participants')->with('success', 'Participant mis à jour !');//kaywli ydini la page de particpants , hdchi apres modif

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $participant = Participant ::findOrFail($id);
        $participant->delete();

        return redirect()->back()->with('success', 'Participant supprimé avec succès.');
    }
    public function indexByEvenement($evenementId)
{
    $evenement = Evenement::findOrFail($evenementId);
    $participants = Participant::where('evenement_id', $evenementId)->get();

    return view('participants.index', compact('participants', 'evenement'));
}

    public function exportPDF()
{
    $participants = Participant::all();
    $pdf = PDF::loadView('exports.participants', compact('paticipants'));
    return $pdf->download('participants.pdf');
}

    public function exportExcel()
{
    return Excel::download(new ParticipantsExport, 'participants.xlsx');
}

}
