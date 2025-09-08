<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

// Page d'accueil
Route::get('/', [AcceuilController::class, 'index'])->name('acceuil');

// Ressources
Route::resource('evenements', EvenementController::class);
Route::resource('participants', ParticipantController::class)->except(['create']);

// Inscriptions participants
Route::get('/inscription', [ParticipantController::class, 'create']);
Route::post('/inscription', [ParticipantController::class, 'store'])->name('participants.store');
Route::get('/participants/create/{evenementId}', [ParticipantController::class, 'create'])->name('participants.create');

// Check-in participants
Route::get('/participants/{id}/checkin', [ParticipantController::class, 'checkin'])->name('participants.checkin');
Route::get('/presence/{id}', [ParticipantController::class, 'validerPresence'])->name('presence.valider');

// Participants par événement
Route::get('/evenements/{evenement}/participants', [ParticipantController::class, 'indexByEvenement'])->name('participants.byEvenement');

// Evenement show alternative
Route::get('/evenements/{id}/show1', [EvenementController::class, 'show1'])->name('evenements.show1');

// Export
Route::get('/evenements/export/pdf', [EvenementController::class, 'exportPDF'])->name('evenements.export.pdf');
Route::get('/evenements/export/excel', [EvenementController::class, 'exportExcel'])->name('evenements.export.excel');

Route::get('/participants/export/pdf', [ParticipantController::class, 'exportPDF'])->name('participants.export.pdf');
Route::get('/participants/export/excel', [ParticipantController::class, 'exportExcel'])->name('participants.export.excel');

// Auth routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/loginReset', [LoginController::class, 'showResetForm'])->name('loginReset.form');
Route::post('/loginReset', [LoginController::class, 'reset'])->name('loginReset');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.submit');

// Dashboard
Route::middleware('auth')->group(function () {

    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // Statistiques
    Route::get('/statistiques', [StatistiqueController::class, 'index'])->name('statistiques');

    // Rapport
    Route::view('/rapport', 'rapport.index')->name('rapport.index');

    // Paramètres
Route::get('/parametres', [SettingsController::class, 'index'])->name('parametres');
Route::post('/parametres', [SettingsController::class, 'update'])->name('parametres.update');
    // Users
    Route::resource('users', UserController::class);

    // Déconnexion
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
});
