<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller {

    public function consulter($num)
    
    {
    // Récupérer l'utilisateur connecté
    $user = Auth::user();
    
    // Vérifier que l'utilisateur accède à son propre profil
    if ($user->id != $num) {
        abort(403, 'Accès non autorisé');
    }
    
    // Passer les données à la vue
    return view('client', [ 'user' => $user,'num' => $num]);
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