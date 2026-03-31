<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InscrireController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\SuperviseurController;

// Pages statiques
Route::get('/', fn() => view('accueil'));
Route::get('/contact', fn() => view('contact'));
Route::get('/tarifs', fn() => view('tarifs'));

// Inscription
Route::get('/inscription', [InscrireController::class, 'vueInscription'])->name('vue.inscription');
Route::post('/inscription', [InscrireController::class, 'inscription'])->name('inscription.faite');

// Connexion / Déconnexion
Route::get('/connexion', [ConnexionController::class, 'vueConnexion'])->name('vue.connexion');
Route::post('/connexion', [ConnexionController::class, 'connexion'])->name('connexionFaite');
Route::post('/deconnexion', [ConnexionController::class, 'logout'])->name('logout'); 

// Client
Route::get('/client/{num}', [ClientController::class, 'consulter'])
    ->where('num', '[1-9][0-9]*')
    ->name('client.co');

Route::get('/client/{num}/historique', [ClientController::class, 'historique'])
    ->where('num', '[1-9][0-9]*')
    ->name('client.historique');

Route::match(['get','post'], '/client/{num}/reservation', [ClientController::class, 'reservation'])
    ->where('num', '[1-9][0-9]*')
    ->name('reservationClt');

Route::delete('/client/{num}/annuler/{reservation}', [ClientController::class, 'annuler'])
    ->where('num', '[1-9][0-9]*')
    ->name('client.annuler');

Route::patch('/client/{num}/terminer/{historique}', [ClientController::class, 'terminerCourse'])
    ->where('num', '[1-9][0-9]*')
    ->name('client.terminer');

Route::get('/client/{num}/avisSurChauffeur', [ClientController::class, 'avis'])
    ->where('num', '[1-9][0-9]*')
    ->name('client.avis');

Route::post('/client/{num}/avisSurChauffeur', [ClientController::class, 'soumettreAvis'])
    ->where('num', '[1-9][0-9]*')
    ->name('client.avis.soumettre');

Route::patch('/client/{num}/demarrer/{historique}', [ClientController::class, 'demarrerCourse'])
    ->where('num', '[1-9][0-9]*')
    ->name('client.demarrer');


// Chauffeur
Route::get('/chauffeur/{num}', [ChauffeurController::class, 'consulter'])
    ->where('num', '[1-9][0-9]*')
    ->name('chauffeur.consulter');

Route::get('/chauffeur/{num}/consulterDemandes', [ChauffeurController::class, 'consulterDemandes'])
    ->where('num', '[1-9][0-9]*')
    ->name('chauffeur.demandes');

Route::get('/chauffeur/{num}/accepterCourse', [ChauffeurController::class, 'accepterCourse'])
    ->where('num', '[1-9][0-9]*')
    ->name('chauffeur.accepter');

Route::get('/chauffeur/{num}/refuserCourse', [ChauffeurController::class, 'refuserCourse'])
    ->where('num', '[1-9][0-9]*')
    ->name('chauffeur.refuser');

Route::get('/chauffeur/{num}/statut', [ChauffeurController::class, 'statut'])
    ->where('num', '[1-9][0-9]*')
    ->name('chauffeur.statut');

Route::get('/chauffeur/{num}/avisSurClients', [ChauffeurController::class, 'avisSurClients'])
    ->where('num', '[1-9][0-9]*')
    ->name('chauffeur.avis');

// Superviseur
Route::get('/superviseur/{num}', [SuperviseurController::class, 'consulter'])
    ->where('num', '[1-9][0-9]*')
    ->name('superviseur.consulter');