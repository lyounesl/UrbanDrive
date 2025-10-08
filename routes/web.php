<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InscrireController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return view('inscription');
});

Route::get('/inscription', [InscrireController::class , 'inscription']);

Route::get('/connexion', [ConnexionController::class , 'connexion']);

Route::get('/Clients/{num}', [ClientController::class, 'consulter'])
-> where ( 'num' , '[1-9][0-9]*' ) ;

Route::get('/Clients/{num}/historique', [HistoriqueClientController::class, ''])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/Clients/{num}/reservation',[ReservationClientController::class, ''])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/Clients/{num}/annulerCourse', [AnnulerCourseController::class, ''])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/Clients/{num}/avisSurChauffeur', [AvisSurChauffeurController::class, ''])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/Chauffeurs/{num}', [ChauffeurController::class, ''])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/Chauffeurs/{num}/consulterDemandes', [ConsulterDemandesController::class, ''])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/Chauffeurs/{num}/accepterCourse', [AccepterCourseController::class, ''])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/Chauffeurs/{num}/refuserCourse', [RefuserCourseController::class, ''])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/Chauffeurs/{num}/statue', [StatueController::class, ''])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/Chauffeurs/{num}/avisSurClients', [AvisSurClientsController::class, ''])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/Superviseur/{num}', [SuperviseurController::class, ''])
-> where ( 'num' , '[1-9][0-9]*' );