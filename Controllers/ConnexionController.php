<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    public function vueconnexion()
    {
        return view('connexion');
    }


    public function connexion(Request $request)
    {
       $email = $_POST[ "email" ] ;
	   $mdp = $_POST[ "mdp" ] ;
	
	    require "Models/Client.php" ;
	    $client = User::getClient( $email , $mdp ) ;
	
	    if( $client !== FALSE ){
		    session_start() ;
		
		    $_SESSION[ "id" ] = $client[ "id" ] ;
		    $_SESSION[ "nom" ] = $client[ "nom" ] ; 
		    $_SESSION[ "prenom" ] = $client[ "prenom" ] ; 
		
		    header( "Location: /clients/{num}" );
	    }
	    else {
		    $erreur = 'E-mail ou mot de passe incorrect.' ;
		    require "vues/connexion.blade.php" ;
	    }

    }



    public function déconnexion(Request $request)
    {
        session_destroy() ;
	
	    header( "Location: /" );

    }
}