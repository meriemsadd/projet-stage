<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\ParticipantController;
use App\Http\controllers\EvenementController;
use App\Http\controllers\AcceuilController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\ControllersAuth\RegisterController;

Route::get('/', [AcceuilController::class, 'index'])->name('acceuil');

Route::resource('evenements', EvenementController::class);
Route::resource('participants', ParticipantController::class)->except(['create']);

Route::get('/inscription', [ParticipantController::class, 'create']);
Route::post('/inscription', [ParticipantController::class, 'store'])->name('participants.store');
Route::get('/participants/create/{evenementId}', [ParticipantController::class, 'create'])->name('participants.create');
Route::get('/participants/{id}/checkin', [ParticipantController::class, 'checkin'])->name('participants.checkin');

Route::get('/evenements/{evenement}/participants', [ParticipantController::class, 'indexByEvenement'])->name('participants.byEvenement');
Route::get('/evenements/{id}/show1', [EvenementController::class, 'show1'])->name('evenements.show1');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/loginReset', [LoginController::class, 'reset'])->name('loginReset');
Route::get('/loginReset', [LoginController::class, 'showResetForm'])->name('loginReset.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.submit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


//route de statistique
Route::middleware('auth')->group(function () {
    Route::get('/statistiques', function () {
        return view('statistiques.index');  // Cette vue doit exister (voir plus bas)
    })->name('statistiques');
});

// Statistiques
Route::middleware('auth')->group(function () {
    Route::get('/statistiques', function () {
        return view('statistiques.index');  // Cette vue doit exister
    })->name('statistiques');
});

// Rapport
Route::middleware('auth')->group(function () {
    Route::get('/rapport', function () {
        return view('rapport.index');  // Crée aussi cette vue
    })->name('rapport.index');
});

// Événements - Export
Route::get('/evenements/export/pdf', [EvenementController::class, 'exportPDF'])->name('evenements.export.pdf');
Route::get('/evenements/export/excel', [EvenementController::class, 'exportExcel'])->name('evenements.export.excel');

// Participants - Export
Route::get('/participants/export/pdf', [ParticipantController::class, 'exportPDF'])->name('participants.export.pdf');
Route::get('/participants/export/excel', [ParticipantController::class, 'exportExcel'])->name('participants.export.excel');


use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // ou redirect('/login');
})->name('logout');

use App\Http\Controllers\UserController;

Route::resource('users', UserController::class)->middleware('auth');


