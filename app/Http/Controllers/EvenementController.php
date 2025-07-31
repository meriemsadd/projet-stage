<?php

namespace App\Http\Controllers;
use App\Models\Evenement;
use Illuminate\Http\Request;
use App\Models\Type;

use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EvenementsExport;

class EvenementController extends Controller
{
   
    public function index(Request $request)
{
    $query = Evenement::query()->with('type');

    // Recherche par mot-clé (titre)
    if ($request->filled('q')) {
        $query->where('titre', 'like', '%' . $request->q . '%');
    }

    // Filtrage par type d'événement
    if ($request->filled('type')) {
        $query->where('type_events_id', $request->type);
    }

    // Récupérer les événements appartenant à l'utilisateur connecté
    $query->where('user_id', auth()->id());

    $evenements = $query->orderByDesc('date_de_début')->get(); // ou 'date'

    // Récupérer tous les types pour les afficher dans le filtre
    $types = Type::all();

    return view('evenements.index', compact('evenements', 'types'));
}

         //compact=$data = ['evenements' => $evenements];return view('evenements.index', $data);
         //cad sift l view (evenement.index) wsift m3ah les donne evenements bach nst3mlohom fl view
    

    
    public function create()
    {
       $types=Type::all();
       return view('evenements.create',compact('types'));
       
    }

   
    public function store(Request $request)
    {
        $request->validate([
              'titre' => 'required|string|max:255',
              'lieu' => 'required|string|max:255',
              'date_de_début' => 'required|date',
               'date_de_fin' => 'required|date',
              'heure'=> 'required|date_format:H:i',
              'description'=>'required|string',
              'type_events_id'=> 'required|exists:type_events,id',
             
        ]);
        $data = $request->all();
        $data['user_id'] = auth()->id();
        Evenement::create($data);

        return redirect()->route('evenements.index')->with('suces','Evenement ajoute avec succes');

    }

    public function show1(string $id)
    {
        
         $evenement = Evenement::with('participants')->findOrFail($id);

         $participants = $evenement->participants;
       return view('evenements.show1',compact('evenement','participants'));
      
    }
    public function show(string $id)
    {
        
         $evenement = Evenement::with('type')->findOrFail($id);

        
       return view('evenements.show',compact('evenement'));
      
    }

    
    public function edit(string $id)
    {

         $Evenement=Evenement::findOrFail($id);
         $types = Type::all();
        
       return view('evenements.edit',compact('Evenement','types'));
     
    }

   
    public function update(Request $request, string $id)
    {

        $Evenement=Evenement::findOrFail($id);
        $Evenement->update($request->all());
        
        return redirect()->route('evenements.index')->with('succes','Evenement modifie avec succes');

    }

 
    public function destroy(string $id)
    {
        $evenement = Evenement::findOrFail($id);
        $evenement->delete(); 

    return redirect()->route('evenements.index')->with('success', 'Événement supprimé avec succès.');


    }

     public function exportPDF()
    {
        $evenements = Evenement::all();
        $pdf = PDF::loadView('evenements.pdf', compact('evenements'));
        return $pdf->download('evenements.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new EvenementsExport, 'evenements.xlsx');
    }
   
}
