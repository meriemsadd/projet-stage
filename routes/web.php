<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\ParticipantController;
use App\Http\controllers\EvenementController;
use App\Http\controllers\AcceuilController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/',[AcceuilController::class,'index'])->name('acceuil');//la racine du projet c la page d'acceuil
Route::resource('evenements', EvenementController ::class);
Route::resource('participants', ParticipantController::class)->except(['create']);//sinn ghiur hado f participant Route::get('/inscription', [ParticipantController::class, 'create']);Route::post('/inscription', [ParticipantController::class, 'store'])->name('participants.store');
Route::get('/participants/create/{evenementId}', [ParticipantController::class, 'create'])->name('participants.create');
Route::get('/evenements/{evenement}/participants', [ParticipantController::class, 'indexByEvenement'])->name('participants.byEvenement');
Route::get('/evenements/{id}/show1', [EvenementController::class, 'show1'])->name('evenements.show1');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/loginReset', [LoginController::class, 'reset'])->name('loginReset');
Route::get('/loginReset', [LoginController::class, 'showResetForm'])->name('loginReset.form');

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.submit');
