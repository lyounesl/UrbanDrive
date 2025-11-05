<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InscrireController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\SuperviseurController;


Route::get('/', function () {
    return view('accueil');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/tarifs', function () {
    return view('tarifs');
});

Route::get('/inscription', [InscrireController::class , 'inscription']);

Route::get('/inscriptionChauffeur', [InscrireController::class , 'inscriptionChauffeur']);

Route::get('/connexion', [ConnexionController::class , 'connexion']);

Route::get('/clients/{num}', [ClientController::class, 'consulter'])
-> where ( 'num' , '[1-9][0-9]*' ) ;

Route::get('/clients/{num}/historique', [ClientController::class, 'historique'])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/clients/{num}/reservation',[ClientController::class, 'reservation'])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/clients/{num}/annulerCourse', [AnnulerCourseController::class, 'annulerCourse'])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/clients/{num}/avisSurChauffeur', [ClientController::class, 'avis'])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/chauffeurs/{num}', [ChauffeurController::class, 'chauffeur'])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/chauffeurs/{num}/consulterDemandes', [ConsulterDemandesController::class, 'consulterDemandes'])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/chauffeurs/{num}/accepterCourse', [AccepterCourseController::class, 'accepterCourse'])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/chauffeurs/{num}/refuserCourse', [RefuserCourseController::class, 'refuserCourse'])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/chauffeurs/{num}/statue', [StatueController::class, 'statue'])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/chauffeurs/{num}/avisSurClients', [AvisSurClientsController::class, 'avisSurClients'])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/superviseur/{num}', [SuperviseurController::class, 'superviseur'])
-> where ( 'num' , '[1-9][0-9]*' );