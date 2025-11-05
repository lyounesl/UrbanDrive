<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InscrireController extends Controller
{
    public function inscription(){
        return view('inscription');
    }

    public function inscriptionChauffeur(){
        return view('inscriptionChauffeur');
    }
}