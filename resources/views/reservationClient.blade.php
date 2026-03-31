@extends('layouts.app')

@section('title', 'Réserver une course - Urban Drive')

@section('styles')
<style>
    .reservation-container {
        max-width: 1000px; margin: 0 auto; background: white;
        border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    .reservation-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white; padding: 2.5rem; text-align: center;
    }
    .reservation-header h1 { margin-bottom: 0.5rem; font-size: 2rem; }
    .header-subtitle { opacity: 0.9; font-size: 1.1rem; margin-bottom: 1rem; }
    .header-actions { display: flex; justify-content: center; gap: 1rem; margin-top: 1rem; }
    .btn-white {
        padding: 0.7rem 1.5rem; border-radius: 5px; text-decoration: none;
        font-weight: bold; background: rgba(255,255,255,0.2);
        color: white; border: 2px solid white; transition: all 0.3s ease;
    }
    .btn-white:hover { background: white; color: #667eea; }

    .reservation-content { padding: 2.5rem; }

    /* Étapes visuelles */
    .steps-indicator {
        display: flex; justify-content: center; align-items: center;
        gap: 0; margin-bottom: 3rem;
    }
    .step {
        display: flex; flex-direction: column; align-items: center; gap: 0.5rem;
        flex: 1; position: relative;
    }
    .step-circle {
        width: 45px; height: 45px; border-radius: 50%;
        background: #e0e0e0; color: #999; font-weight: bold;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.1rem; transition: all 0.3s ease; z-index: 1;
    }
    .step.active .step-circle { background: #667eea; color: white; }
    .step.done .step-circle { background: #4CAF50; color: white; }
    .step-label { font-size: 0.85rem; color: #999; text-align: center; }
    .step.active .step-label { color: #667eea; font-weight: bold; }
    .step-line {
        flex: 1; height: 2px; background: #e0e0e0; margin-bottom: 1.5rem;
    }

    /* Sections du formulaire */
    .form-section {
        background: #f8f9fa; border-radius: 10px;
        padding: 2rem; margin-bottom: 2rem;
        border-left: 4px solid #667eea;
    }
    .form-section-title {
        font-size: 1.2rem; font-weight: bold; color: #333;
        margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.7rem;
    }
    .form-section-title span { font-size: 1.5rem; }

    .form-row { display: flex; gap: 1.5rem; flex-wrap: wrap; margin-bottom: 1.2rem; }
    .form-group { flex: 1; min-width: 220px; }
    .form-label {
        display: block; font-weight: 600; color: #444;
        margin-bottom: 0.5rem; font-size: 0.95rem;
    }
    .form-control {
        width: 100%; padding: 0.75rem 1rem;
        border: 2px solid #e0e0e0; border-radius: 8px;
        font-size: 1rem; transition: border-color 0.3s ease;
        background: white;
    }
    .form-control:focus { outline: none; border-color: #667eea; }
    textarea.form-control { resize: vertical; min-height: 100px; }

    /* Sélection véhicule */
    .vehicules-grid {
        display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 1rem; margin-top: 0.5rem;
    }
    .vehicule-option {
        border: 2px solid #e0e0e0; border-radius: 10px;
        padding: 1.2rem 1rem; text-align: center;
        cursor: pointer; transition: all 0.3s ease; background: white;
    }
    .vehicule-option:hover { border-color: #667eea; transform: translateY(-3px); }
    .vehicule-option.selected {
        border-color: #667eea; background: #ede9ff;
        box-shadow: 0 4px 12px rgba(102,126,234,0.2);
    }
    .vehicule-emoji { font-size: 2rem; margin-bottom: 0.5rem; }
    .vehicule-nom { font-weight: bold; color: #333; margin-bottom: 0.3rem; }
    .vehicule-desc { font-size: 0.8rem; color: #666; margin-bottom: 0.5rem; }
    .vehicule-prix { font-weight: bold; color: #667eea; font-size: 0.95rem; }

    /* Estimation prix */
    .prix-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 10px; padding: 2rem; text-align: center;
        color: white; margin-bottom: 2rem;
    }
    .prix-label { opacity: 0.9; font-size: 1rem; margin-bottom: 0.5rem; }
    .prix-montant { font-size: 3rem; font-weight: bold; margin-bottom: 0.3rem; }
    .prix-note { opacity: 0.8; font-size: 0.85rem; }

    /* Bouton submit */
    .btn-submit {
        width: 100%; padding: 1.1rem; background: #667eea; color: white;
        border: none; border-radius: 8px; font-size: 1.15rem; font-weight: bold;
        cursor: pointer; transition: all 0.3s ease; letter-spacing: 0.5px;
    }
    .btn-submit:hover { background: #5a6fd8; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(102,126,234,0.4); }

    /* Alertes */
    .alert-success {
        background: #d4edda; color: #155724; padding: 1rem 1.5rem;
        border-radius: 8px; margin-bottom: 1.5rem; border-left: 4px solid #28a745;
    }
    .alert-danger {
        background: #f8d7da; color: #721c24; padding: 1rem 1.5rem;
        border-radius: 8px; margin-bottom: 1.5rem; border-left: 4px solid #dc3545;
    }
    .alert-danger ul { margin: 0.5rem 0 0 1.2rem; }
</style>
@endsection

@section('content')
<div class="reservation-container">

    {{-- Header --}}
    <div class="reservation-header">
        <h1>🚗 Réserver une course</h1>
        <div class="header-actions">
            <a href="/client/{{ $num }}" class="btn-white">← Retour à l'espace client</a>
        </div>
    </div>

    <div class="reservation-content">

        {{-- Alertes --}}
        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert-danger">
                <strong>Veuillez corriger les erreurs suivantes :</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('reservationClt', ['num' => $num]) }}" id="reservationForm">
            @csrf

            {{-- Section 1 : Adresses --}}
            <div class="form-section">
                <div class="form-section-title">
                    <span>📍</span> Votre trajet
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Adresse de départ *</label>
                        <input type="text" class="form-control" name="adresse_depart"
                               value="{{ old('adresse_depart') }}" required
                               placeholder="Ex: 123 Avenue des Champs-Élysées, Paris">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Adresse d'arrivée *</label>
                        <input type="text" class="form-control" name="adresse_arrivee"
                               value="{{ old('adresse_arrivee') }}" required
                               placeholder="Ex: 56 Rue de Rivoli, Paris">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Date et heure de départ <em style="font-weight:normal; color:#999">(optionnel)</em></label>
                        <input type="datetime-local" class="form-control"
                               name="date_depart_souhaitee" min="{{ date('Y-m-d\TH:i') }}"
                               value="{{ old('date_depart_souhaitee') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nombre de passagers *</label>
                        <select class="form-control" name="nombre_passagers" required>
                            @for($i = 1; $i <= 8; $i++)
                                <option value="{{ $i }}" {{ old('nombre_passagers', 1) == $i ? 'selected' : '' }}>
                                    {{ $i }} passager(s)
                                </option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>

            {{-- Section 2 : Véhicule --}}
            <div class="form-section">
                <div class="form-section-title">
                    <span>🚙</span> Type de véhicule *
                </div>
                @php
                    $vehicules = [
                        'eco'      => ['emoji' => '🚗', 'nom' => 'Éco',      'desc' => 'Économique'],
                        'standard' => ['emoji' => '🚙', 'nom' => 'Standard', 'desc' => 'Berline confortable'],
                        'comfort'  => ['emoji' => '🏁', 'nom' => 'Confort',  'desc' => 'Haut de gamme'],
                        'premium'  => ['emoji' => '⭐', 'nom' => 'Luxe',     'desc' => 'Voiture premium'],
                    ];
                @endphp
                <div class="vehicules-grid">
                    @foreach($vehicules as $type => $info)
                        <div class="vehicule-option {{ old('type_vehicule', 'standard') === $type ? 'selected' : '' }}"
                             data-type="{{ $type }}" onclick="selectVehicule('{{ $type }}')">
                            <div class="vehicule-emoji">{{ $info['emoji'] }}</div>
                            <div class="vehicule-nom">{{ $info['nom'] }}</div>
                            <div class="vehicule-desc">{{ $info['desc'] }}</div>
                            <div class="vehicule-prix">{{ number_format($tarifs[$type], 2, ',', ' ') }} €/km</div>
                        </div>
                    @endforeach
                </div>
                <input type="hidden" name="type_vehicule" id="type_vehicule"
                       value="{{ old('type_vehicule', 'standard') }}">
            </div>

            {{-- Section 3 : Notes --}}
            <div class="form-section">
                <div class="form-section-title">
                    <span>📝</span> Informations complémentaires
                </div>
                <div class="form-group">
                    <label class="form-label">Notes pour le chauffeur <em style="font-weight:normal; color:#999">(optionnel)</em></label>
                    <textarea class="form-control" name="notes_client"
                              placeholder="Ex: Bagages volumineux, arrêt intermédiaire, besoin d'aide...">{{ old('notes_client') }}</textarea>
                </div>
            </div>

            {{-- Estimation prix --}}
            <div class="prix-card">
                <div class="prix-label">Estimation du prix</div>
                <div class="prix-montant" id="prixEstime">--</div>
                <div class="prix-note">* Basé sur une distance estimée de 10 km — le prix final peut varier selon le trafic</div>
            </div>

            <button type="submit" class="btn-submit">
                Confirmer la réservation →
            </button>

        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const tarifs = @json($tarifs);

    function selectVehicule(type) {
        document.querySelectorAll('.vehicule-option').forEach(o => o.classList.remove('selected'));
        document.querySelector(`[data-type="${type}"]`).classList.add('selected');
        document.getElementById('type_vehicule').value = type;
        calculerEstimation();
    }

    function calculerEstimation() {
        const type       = document.getElementById('type_vehicule').value;
        const passagers  = parseInt(document.getElementById('nombre_passagers').value) || 1;
        const tarifBase  = tarifs[type];

        // +10% par passager supplémentaire
        const multiplicateur = 1 + ((passagers - 1) * 0.10);
        const prix = Math.max(10 * tarifBase * multiplicateur, 5);

        document.getElementById('prixEstime').textContent = prix.toFixed(2) + ' €';
    }

    // ✅ Recalcul au changement de passagers
    document.getElementById('nombre_passagers').addEventListener('change', calculerEstimation);

    document.addEventListener('DOMContentLoaded', calculerEstimation);
</script>
@endsection