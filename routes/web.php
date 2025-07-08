<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\ParticipantController;
use App\Http\controllers\EvenementController;

Route::resource('evenements', EvenementController ::class);
Route::resource('participants', ParticipantController ::class);
