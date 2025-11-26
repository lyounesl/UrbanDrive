<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChauffeurController extends Controller
{
    public function chauffeur( $num ){
        return view('chauffeur',['num' => $num]);
    }
}
