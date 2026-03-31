<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Historique;
use App\Models\Reservation;

class ClientController extends Controller
{
    private array $tarifs = [
        'eco'      => 1.20,
        'standard' => 1.50,
        'comfort'  => 2.00,
        'premium'     => 4.00,
    ];

    public function consulter($num)
    {
        if (Auth::id() != $num) {
            abort(403, 'Accès non autorisé');
        }

        $user = Auth::user();

        return view('client', ['user' => $user, 'num' => $num]);
    }

   public function historique($num)
{
    if (Auth::id() != $num) {
        abort(403, 'Accès non autorisé');
    }

    $historique = Historique::pourClient($num)
        ->with('chauffeur') 
        ->orderBy('created_at', 'desc')
        ->get();

    return view('historiqueClient', [
        'num'        => $num,
        'historique' => $historique
    ]);
}

   public function reservation(Request $request, $num)
{
    if (Auth::id() != $num) {
        abort(403, 'Accès non autorisé');
    }

    if ($request->isMethod('get')) {
        return view('reservationClient', [
            'num'    => $num,
            'tarifs' => $this->tarifs
        ]);
    }

    $request->validate([
        'adresse_depart'        => 'required|string|max:255',
        'adresse_arrivee'       => 'required|string|max:255',
        'type_vehicule'         => 'required|in:eco,standard,comfort,premium',
        'nombre_passagers'      => 'required|integer|min:1|max:8',
        'date_depart_souhaitee' => 'nullable|date|after:now',
        'notes_client'          => 'nullable|string|max:500',
    ]);

    // ✅ 1. Créer dans reservations
    $reservation = Reservation::create([
        'client_id'             => $num,
        'adresse_depart'        => $request->adresse_depart,
        'adresse_arrivee'       => $request->adresse_arrivee,
        'type_vehicule'         => $request->type_vehicule,
        'nombre_passagers'      => $request->nombre_passagers,
        'date_depart_souhaitee' => $request->date_depart_souhaitee,
        'notes_client'          => $request->notes_client,
        'prix_estime'           => $this->calculerPrix($request->type_vehicule, $request->nombre_passagers),
        'statut'                => 'en_attente',
    ]);

    // ✅ 2. Créer dans historique (même données mappées)
    Historique::create([
        'client_id'         => $num,
        'reservation_id'    => $reservation->id,  // lien entre les deux
        'depart'            => $request->adresse_depart,
        'destination'       => $request->adresse_arrivee,
        'vehicule_type'     => $request->type_vehicule,
        'prix'              => $this->calculerPrix($request->type_vehicule, $request->nombre_passagers),
        'statut'            => 'en_attente',
        'date_heure_depart' => $request->date_depart_souhaitee,
        'notes'             => $request->notes_client,
    ]);

    return redirect()->route('client.co', ['num' => $num])
        ->with('success', 'Réservation créée ! Prix estimé : ' . $reservation->prix_formate);
}


private function calculerPrix(string $typeVehicule, int $nombrePassagers = 1): float
{
    $prixBase = round(10 * $this->tarifs[$typeVehicule], 2);
    
    // +10% par passager supplémentaire au delà du 1er
    $multiplicateur = 1 + (($nombrePassagers - 1) * 0.10);
    
    return round($prixBase * $multiplicateur, 2);
}



    public function avis($num)
    {
        if (Auth::id() != $num) {
            abort(403, 'Accès non autorisé');
        }

        // Avis déjà donnés
        $avis = Historique::pourClient($num)
            ->whereNotNull('note_chauffeur')
            ->orderBy('date_heure_depart', 'desc')
            ->with('chauffeur')
            ->get();

        // Trajets terminés sans avis = disponibles pour noter
        $trajetsANoter = Historique::pourClient($num)
            ->where('statut', 'terminee')
            ->whereNull('note_chauffeur')
            ->orderBy('date_heure_depart', 'desc')
            ->with('chauffeur')
            ->get();

        return view('avisSurChauffeur', [
            'num'           => $num,
            'avis'          => $avis,
            'trajetsANoter' => $trajetsANoter,
        ]);
    }

    public function soumettreAvis(Request $request, $num)
    {
        if (Auth::id() != $num) {
            abort(403, 'Accès non autorisé');
        }

        $request->validate([
            'historique_id'  => 'required|exists:historique,id',
            'note_chauffeur' => 'required|integer|min:1|max:5',
            'avis_client'    => 'nullable|string|max:500',
        ]);

        // Vérifier que le trajet appartient au client et est terminé
        $trajet = Historique::where('id', $request->historique_id)
            ->where('client_id', $num)
            ->where('statut', 'terminee')
            ->whereNull('note_chauffeur') // pas encore noté
            ->firstOrFail();

        $trajet->update([
            'note_chauffeur' => $request->note_chauffeur,
            'avis_client'    => $request->avis_client,
        ]);

        return redirect()->route('client.avis', ['num' => $num])
            ->with('success', 'Votre avis a bien été enregistré !');
    }

public function annuler($num, $reservationId)
{
    if (Auth::id() != $num) {
        abort(403, 'Accès non autorisé');
    }

    // Récupérer la réservation
    $reservation = Reservation::where('id', $reservationId)
        ->where('client_id', $num)
        ->where('statut', 'en_attente') // ✅ seulement si en attente
        ->firstOrFail();

    // ✅ Mettre à jour le statut dans historique
    Historique::where('reservation_id', $reservation->id)
        ->update(['statut' => 'annulee']);

    // ✅ Supprimer de la table reservations
    $reservation->delete();

    return redirect()->route('client.historique', ['num' => $num])
        ->with('success', 'Réservation annulée avec succès.');
}

public function terminerCourse($num, $historique)
{
    if (Auth::id() != $num) {
        abort(403, 'Accès non autorisé');
    }

    $trajet = Historique::where('id', $historique)
        ->where('client_id', $num)
        ->where('statut', 'en_cours')
        ->firstOrFail();

    $trajet->update([
        'statut'             => 'terminee',
        'date_heure_arrivee' => now(),
    ]);

    return redirect()->route('client.historique', ['num' => $num])
        ->with('success', '🎉 Course terminée ! Vous pouvez maintenant laisser un avis.');
}

public function demarrerCourse($num, $historique)
{
    if (Auth::id() != $num) {
        abort(403, 'Accès non autorisé');
    }

    $trajet = Historique::where('id', $historique)
        ->where('client_id', $num)
        ->where('statut', 'en_attente')
        ->firstOrFail();

    $trajet->update([
        'statut'            => 'en_cours',
        'date_heure_depart' => now(), // ✅ on enregistre l'heure de départ réelle
    ]);

    return redirect()->route('client.historique', ['num' => $num])
        ->with('success', '🚗 Course démarrée ! Bonne route !');
}


}