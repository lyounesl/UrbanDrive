<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class InscrireController extends Controller
{
    public function vueInscription(){
        return view('inscription');
    }

    public function inscription(Request $request)
    {
         $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);
    

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'client',
        ]);

    // Connexion
    Auth::login($user);
   

    // Redirection
    return redirect()->route('client.co', ['num' => $user->id]);
    }
    

}