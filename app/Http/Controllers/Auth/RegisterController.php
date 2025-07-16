<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Affiche le formulaire d'inscription
    public function index()
    {
        $services = Service::all();
        return view('auth.register', compact('services'));
    }

    // Gère la soumission du formulaire
    public function store(Request $request)
    {
        // 1. Validation des champs envoyés
        $request->validate([
            'username' => 'required|string|unique:users,username',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'service_id' => 'required|exists:services,id',
            'signature' => 'nullable|string',
        ]);

        // 2. Création de l'utilisateur
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'service_id' => $request->service_id,
        ]);

        // 3. Si une signature est présente, la sauvegarder
        if ($request->filled('signature')) {
            $signatureData = $request->input('signature');
            $image = str_replace('data:image/png;base64,', '', $signatureData);
            $image = str_replace(' ', '+', $image);
            $imageName = 'signature_' . time() . '.png';

            \Storage::disk('public')->put("signatures/{$imageName}", base64_decode($image));

            // Mise à jour de l'utilisateur avec le chemin de la signature
            $user->signature_path = "signatures/{$imageName}";
            $user->save();
        }

        return redirect()->route('login')->with('success', 'Compte créé avec succès. Veuillez vous connecter.');
    }
}
