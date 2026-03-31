<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    use HasFactory;

    protected $table = 'historique';

    protected $fillable = [
        'client_id', 
        'chauffeur_id', 
        'reservation_id',
        'depart', 
        'destination',
        'distance_km', 
        'prix',
        'vehicule_type', 
        'statut',
        'date_heure_depart', 
        'date_heure_arrivee',
        'notes', 
        'note_chauffeur', 
        'avis_client',
    ];

    protected $casts = [
        'date_heure_depart'  => 'datetime',
        'date_heure_arrivee' => 'datetime',
        'prix'               => 'decimal:2',
        'distance_km'        => 'decimal:2',
        'note_chauffeur'     => 'decimal:1',
    ];

    // Relations
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function chauffeur()
    {
        return $this->belongsTo(User::class, 'chauffeur_id');
    }

    // ✅ Lien vers la réservation d'origine
    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }

    // Scopes
    public function scopeTerminees($query)
    {
        return $query->where('statut', 'terminee');
    }

    public function scopePourClient($query, $clientId)
    {
        return $query->where('client_id', $clientId);
    }
}