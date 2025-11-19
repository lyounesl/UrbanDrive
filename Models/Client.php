<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    private static $connexion = null ;
		
		private function __construct(){
			self::$connexion = new PDO( 'mysql:host=localhost;dbname=UrbanDrive', 'Urban', 'azerty' ) ;
		}

        private static function getConnexion(){
			if( self::$connexion == null ){
				new Client(); ;
			}
			return self::$connexion ;
        }

        public static function getClient( $email , $mdp ){
			
			$bd = self::getConnexion() ;
			$sql = "select id , nom , prenom from Clients where email = :email and mdp = :mdp" ;
			$st = $bd->prepare( $sql ) ;
			$st->execute( array( ':email' => $email , ':mdp' => $mdp ) ) ;
			$client = $st->fetch( PDO::FETCH_ASSOC ) ;
			$st->closeCursor() ;
			
			return $client ;
			
		}


}
