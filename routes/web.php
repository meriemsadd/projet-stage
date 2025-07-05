<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\welcomeController;


Route::get('/', [welcomeController ::class,'index']);





Route::get('/mimiya' , function (){
    return view('mimiya.mimiya');
});
