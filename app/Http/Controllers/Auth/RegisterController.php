<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Affiche le formulaire de connexion
    public function index()
    {
        return view('auth.register');
    }

    // Gère la soumission du formulaire
    public function store(Request $request)
    {
        // 1. Validation des champs envoyés
        $request->validate([
            'username' => 'required|string|unique:users,username',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:6|confirmed',

        ]);

       User::create([
            'username'=> $request->username,
            'email' => $request->email,
            'password' => Hash::make( $request->password),
        ]);

        return redirect()->route('login')->with('success', 'Compte créé avec succès. Veuillez vous connecter.');
       
    }

}
