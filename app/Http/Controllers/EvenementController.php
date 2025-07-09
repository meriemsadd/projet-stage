<?php

namespace App\Http\Controllers;
use App\Models\Evenement;
use Illuminate\Http\Request;
use App\Models\Type;


class EvenementController extends Controller
{
   
    public function index()
    {
         $evenements = Evenement::all(); // Récupère tous les événements du model evenement (base doonnee) 

         return view('evenements.index', compact('evenements'));//compact=$data = ['evenements' => $evenements];return view('evenements.index', $data);
         //cad sift l view (evenement.index) wsift m3ah les donne evenements bach nst3mlohom fl view
    }

    
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
              'date' => 'required|date',
              'heure'=> 'required|date_format:H:i',
              'description'=>'required|string',
              'type_events_id'=> 'required|exists:type_events,id',
        ]);

        Evenement::create($request->all());
        return redirect()->route('evenements.index')->with('suces','Evenement ajoute avec succes');

    }

    public function show(string $id)
    {
        
         $Evenement=Evenement::findOrFail($id);
        
       return view('evenements.show',compact('Evenement'));
      
    }

    
    public function edit(string $id)
    {

         $Evenement=Evenement::findOrFail($id);
        
       return view('evenements.edit',compact('Evenement'));
     
    }

   
    public function update(Request $request, string $id)
    {
       /* $request->validate([
            'titre' => 'required|string|max:255',
              'lieu' => 'required|string|max:255',
              'date' => 'required|date',
              'heure'=> 'required|date_format:H:i',
              'categorie'=> 'required|string'
        ]);*/ 

        $Evenement=Evenement::findOrFail($id);
        $Evenement->update($request->all());
        
         
        /*$request->update([
            'titre'=>$request->titre,
            'lieu'=>$request->lieu,
            'date'=>$request->date,
            'heure'=>$request->heure,
            'categorie'=>$request->categorie,
        ]);*/


        return redirect('/evenements')->with('suces','Evenement modifie avec succes');

    }

 
    public function destroy(string $id)
    {
       
    }
}
