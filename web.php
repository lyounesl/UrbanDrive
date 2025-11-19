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

Route::get('/inscription', [InscrireController::class , 'vueinscription']) -> name('vue.inscription');

Route::post('/inscription', [InscrireController::class , 'inscription']) -> name('inscription.faite');

Route::get('/connexion', [ConnexionController::class , 'connexion']);

Route::get('/client/{num}', [ClientController::class, 'consulter'])
-> where ( 'num' , '[1-9][0-9]*' )
-> name ('client.co');

Route::get('/client/{num}/historique', [ClientController::class, 'historique'])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/client/{num}/reservation',[ClientController::class, 'reservation'])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/client/{num}/annulerCourse', [AnnulerCourseController::class, 'annulerCourse'])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/client/{num}/avisSurChauffeur', [ClientController::class, 'avis'])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/chauffeur/{num}', [ChauffeurController::class, 'chauffeur'])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/chauffeur/{num}/consulterDemandes', [ConsulterDemandesController::class, 'consulterDemandes'])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/chauffeur/{num}/accepterCourse', [AccepterCourseController::class, 'accepterCourse'])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/chauffeur/{num}/refuserCourse', [RefuserCourseController::class, 'refuserCourse'])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/chauffeur/{num}/statue', [StatueController::class, 'statue'])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/chauffeur/{num}/avisSurClients', [AvisSurClientsController::class, 'avisSurClients'])
-> where ( 'num' , '[1-9][0-9]*' );

Route::get('/superviseur/{num}', [SuperviseurController::class, 'superviseur'])
-> where ( 'num' , '[1-9][0-9]*' );