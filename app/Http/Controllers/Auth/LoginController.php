<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Affiche le formulaire de connexion
    public function index()
    {
        return view('auth.login');
    }

    // Gère la soumission du formulaire
    public function login(Request $request)
    {
        // 1. Validation des champs envoyés
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        // 2. Déterminer si l'utilisateur utilise un email ou un nom d'utilisateur
        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // 3. Préparer les informations d'authentification selon le type
        $credentials = [
            $loginType => $request->login,
            'password' => $request->password,
        ];

        // 4. Tentative de connexion
        if (Auth::attempt($credentials)) {
            // Connexion réussie → rediriger vers la page d'accueil
            $request->session()->regenerate();
           return redirect()->route('dashboard');

        }

        // 5. Échec de connexion → renvoyer vers le formulaire avec message d'erreur
        return back()->withErrors([
            'login' => 'Email ou mot de passe incorrect.',
        ])->onlyInput('login');
    }

    // Déconnexion
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

 

    public function showResetForm()
{
    return view('auth.loginReset'); 
}

public function reset(Request $request)
{

    $request->validate([
        'login' => 'required', // nom d’utilisateur ou e-mail
        'password' => 'required|min:6|confirmed',
    ]);

    // Recherche l'utilisateur par email ou nom d'utilisateur
    $user = User::where('email', $request->login)
                ->orWhere('username', $request->login)
                ->first();

    if (!$user) {
        return back()->withErrors(['login' => 'Aucun utilisateur trouvé avec cet identifiant.']);
    }

    // Mise à jour du mot de passe
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect()->route('login')->with('success', 'Mot de passe réinitialisé avec succès.');
}


}
