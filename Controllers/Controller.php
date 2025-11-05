<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function connexion(){
        return view('connexion');
    }
}
