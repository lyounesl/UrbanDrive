<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'chauffeur_id', 'reservation_id',
        'adresse_depart', 'adresse_arrivee',
        'ville_depart', 'ville_arrivee',
        'distance_km', 'prix_estime',
        'type_vehicule', 'statut',
        'nombre_passagers', 'notes_client',
        'date_reservation', 'date_depart_souhaitee',
        'date_prise_en_charge', 'date_arrivee',
    ];

    protected $casts = [
        'date_reservation'      => 'datetime',
        'date_depart_souhaitee' => 'datetime',
        'date_prise_en_charge'  => 'datetime',
        'date_arrivee'          => 'datetime',
        'prix_estime'           => 'decimal:2',
        'distance_km'           => 'decimal:2',
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

    // ✅ Lien vers l'entrée historique correspondante
    public function historique()
    {
        return $this->hasOne(Historique::class, 'reservation_id');
    }

    // Scopes
    public function scopeActives($query)
    {
        return $query->whereIn('statut', ['en_attente', 'acceptee', 'en_cours']);
    }

    public function scopePourClient($query, $clientId)
    {
        return $query->where('client_id', $clientId);
    }

    // Accesseurs
    public function getEstAnnulableAttribute()
    {
        return in_array($this->statut, ['en_attente', 'acceptee']);
    }

    public function getPrixFormateAttribute()
    {
        return number_format($this->prix_estime, 2, ',', ' ') . ' €';
    }
}