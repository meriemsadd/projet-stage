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
    $evenement = Evenement::findOrFail($evenementId); // ← on récupère l'événement complet
    $organismes = Organisme::all();

    return view('participants.create', compact('evenement', 'organismes'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // 1. Validation (optionnelle mais recommandée)
    $request->validate([
        'prenom' => 'required|string|max:255',
        'nom' => 'required|string|max:255',
        'email' => 'required|email',
        'evenement_id' => 'required|exists:evenements,id',
    ]);

    // 2. Sauvegarder le participant
    $participant = Participant::create($request->all());

    // 3. Gestion de la signature si présente
    if ($request->has('signature')) {
        $signatureData = explode(',', $request->input('signature'))[1];
        $signatureName = 'signature_' . time() . '.png';
        $signaturePath = public_path('signatures/' . $signatureName);
        file_put_contents($signaturePath, base64_decode($signatureData));
        $participant->signature = 'signatures/' . $signatureName;
        $participant->save();
    }

    // 4. Envoyer l'e-mail
    Mail::to($participant->email)->send(new InvitationParticipant($participant));

    // 5. Redirection avec message flash de confirmation
    return redirect()->back()->with('success', '✅ Inscription réussie ! Vérifie ton e-mail pour confirmation.');
}


   
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
        $pdf = PDF::loadView('participants.pdf', compact('participants'));
        return $pdf->download('participants.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new ParticipantsExport, 'participants.xlsx');
    }


    
public function checkin($id)
{
    $participant = Participant::findOrFail($id);

    // Marquer le participant comme présent
    $participant->update(['present' => true]); // Assure-toi que tu as une colonne 'present' dans la table participants

    // Afficher une page de confirmation
    return view('participants.checkin-confirm', compact('participant'));
}

public function validerPresence($id)
{
    $participant = Participant::findOrFail($id);

    if ($participant->presence) {
        return view('presence.result')->with('message', '⚠️ Ce participant est déjà validé.');
    }

    $participant->presence = true;
    $participant->save();

    return view('presence.result')->with('message', '✅ Présence validée avec succès !');
}


}