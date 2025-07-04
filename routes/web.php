<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['name' => 'sfiyaa']);
});

Route::get('/mimiya' , function (){
    return view('mimiya.mimiya');
});
