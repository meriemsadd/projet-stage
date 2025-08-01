<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;  // si tu as une table services
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Liste paginée + recherche simple par username ou email
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::with('service')
            ->when($search, function($query, $search) {
                $query->where('username', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('users.index', compact('users'));
    }

    // Formulaire création
    public function create()
    {
        $services = Service::all(); // Pour select service_id optionnel
        return view('users.create', compact('services'));
    }

    // Enregistrer nouveau utilisateur
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'service_id' => 'nullable|exists:services,id',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'service_id' => $request->service_id,
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    // Formulaire édition
    public function edit(User $user)
    {
        $services = Service::all();
        return view('users.edit', compact('user', 'services'));
    }

    // Mettre à jour utilisateur
    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'service_id' => 'nullable|exists:services,id',
        ]);

        $user->username = $request->username;
        $user->email = $request->email;
        $user->service_id = $request->service_id;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    // Supprimer utilisateur
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }

    // Optionnel: Afficher un utilisateur
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
}
