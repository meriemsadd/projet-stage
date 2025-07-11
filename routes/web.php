<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\ParticipantController;
use App\Http\controllers\EvenementController;
use App\Http\controllers\AcceuilController;

Route::get('/',[AcceuilController::class,'index'])->name('acceuil');//la racine du projet c la page d'acceuil
Route::resource('evenements', EvenementController ::class);
Route::resource('participants', ParticipantController ::class);//sinn ghiur hado f participant Route::get('/inscription', [ParticipantController::class, 'create']);Route::post('/inscription', [ParticipantController::class, 'store'])->name('participants.store');
Route::get('/evenements/{id}',[EvenementController::class,'show'])->name('evenements.show');