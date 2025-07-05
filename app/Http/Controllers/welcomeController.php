<?php

namespace App\Http\Controllers;

class welcomeController {
    public function index(){
        return view('welcome',['name' => 'sfiyyaaaa and mimiii']);
    }

}

