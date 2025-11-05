<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller {

    public function consulter($num){
        return view('client', ['num' => $num]);
 }

   public function historique($num)
    {
        return view('historiqueClient', ['num' => $num]);
    }
    
    public function reservation($num)
    {
        return view('reservationClient', ['num' => $num]);
    }
    
    public function avis($num)
    {
        return view('avisSurChauffeur', ['num' => $num]);
    }
}