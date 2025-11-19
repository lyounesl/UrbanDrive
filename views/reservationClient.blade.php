<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservations en Cours</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        
        .reservation-container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .reservation-header {
            background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }
        
        .reservation-header h1 {
            margin-bottom: 0.5rem;
            font-size: 2rem;
        }
        
        .client-info {
            opacity: 0.9;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }
        
        .header-actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .btn {
            padding: 0.7rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 2px solid white;
        }
        
        .btn-primary:hover {
            background: white;
            color: #2196F3;
        }
        
        .btn-secondary {
            background: #FF9800;
            color: white;
        }
        
        .btn-secondary:hover {
            background: #F57C00;
        }
        
        .reservation-content {
            padding: 2rem;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: #f8f9fa;
            border-left: 4px solid #2196F3;
            padding: 1.5rem;
            border-radius: 5px;
            text-align: center;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #2196F3;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }
        
        .reservations-list {
            margin-top: 2rem;
        }
        
        .section-title {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #2196F3;
        }
        
        .reservation-card {
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }
        
        .reservation-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }
        
        .reservation-header-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .reservation-id {
            font-weight: bold;
            color: #333;
            font-size: 1.1rem;
        }
        
        .reservation-statut {
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
        }
        
        .statut-confirme {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .statut-attente {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }
        
        .statut-encours {
            background: #cce7ff;
            color: #004085;
            border: 1px solid #b3d7ff;
        }
        
        .reservation-details {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            gap: 1rem;
            align-items: center;
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 5px;
        }
        
        .lieu {
            text-align: center;
        }
        
        .lieu-nom {
            font-weight: bold;
            color: #333;
            font-size: 1.1rem;
        }
        
        .lieu-adresse {
            color: #666;
            font-size: 0.9rem;
            margin-top: 0.3rem;
        }
        
        .lieu-horaire {
            color: #2196F3;
            font-weight: bold;
            margin-top: 0.5rem;
        }
        
        .fleche {
            text-align: center;
            font-size: 1.5rem;
            color: #2196F3;
            font-weight: bold;
        }
        
        .reservation-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .info-item {
            display: flex;
            flex-direction: column;
        }
        
        .info-label {
            font-size: 0.8rem;
            color: #666;
            margin-bottom: 0.3rem;
        }
        
        .info-value {
            font-weight: bold;
            color: #333;
        }
        
        .reservation-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            padding-top: 1rem;
            border-top: 1px solid #e0e0e0;
        }
        
        .btn-action {
            padding: 0.6rem 1.2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        
        .btn-modifier {
            background: #6c757d;
            color: white;
        }
        
        .btn-modifier:hover {
            background: #5a6268;
        }
        
        .btn-annuler {
            background: #dc3545;
            color: white;
        }
        
        .btn-annuler:hover {
            background: #c82333;
        }
        
        .btn-suivre {
            background: #28a745;
            color: white;
        }
        
        .btn-suivre:hover {
            background: #218838;
        }
        
        .no-reservations {
            text-align: center;
            padding: 3rem;
            color: #666;
        }
        
        .no-reservations-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
        
        .urgence-contact {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 5px;
            padding: 1rem;
            margin-top: 2rem;
            text-align: center;
        }
        
        .urgence-contact h3 {
            color: #856404;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="reservation-container">
        <!-- En-tête -->
        <div class="reservation-header">
            <h1>Réservations en Cours</h1>
            <div class="client-info">Client #{{ $num }}</div>
            <div class="header-actions">
                <a href="/client/{{ $num }}" class="btn btn-primary">← Retour à l'espace client</a>
                <a href="/client/{{ $num }}/nouvelle-reservation" class="btn btn-secondary">➕ Nouvelle réservation</a>
            </div>
        </div>
        
        <!-- Contenu -->
        <div class="reservation-content">
            <!-- Statistiques -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">3</div>
                    <div class="stat-label">Réservations actives</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">1</div>
                    <div class="stat-label">En attente de chauffeur</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">2</div>
                    <div class="stat-label">Trajets en cours</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">15min</div>
                    <div class="stat-label">Temps d'attente moyen</div>
                </div>
            </div>
            
            <!-- Liste des réservations -->
            <div class="reservations-list">
                <h2 class="section-title">Vos réservations actives</h2>
                
                <!-- Réservation 1 - En cours -->
                <div class="reservation-card">
                    <div class="reservation-header-info">
                        <div class="reservation-id">Réservation #RDV-7890</div>
                        <div class="reservation-statut statut-encours">En cours</div>
                    </div>
                    
                    <div class="reservation-details">
                        <div class="lieu">
                            <div class="lieu-nom">Aéroport CDG</div>
                            <div class="lieu-adresse">Terminal 2F</div>
                            <div class="lieu-horaire">Départ: 14:30</div>
                        </div>
                        <div class="fleche">→</div>
                        <div class="lieu">
                            <div class="lieu-nom">Hôtel Concorde</div>
                            <div class="lieu-adresse">Place de la Concorde, Paris</div>
                            <div class="lieu-horaire">Arrivée estimée: 15:45</div>
                        </div>
                    </div>
                    
                    <div class="reservation-info">
                        <div class="info-item">
                            <span class="info-label">Chauffeur</span>
                            <span class="info-value">Pierre Martin (Toyota Prius - AB-123-CD)</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Prix</span>
                            <span class="info-value">€52.00</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Distance</span>
                            <span class="info-value">28 km</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Temps estimé</span>
                            <span class="info-value">45 min</span>
                        </div>
                    </div>
                    
                    <div class="reservation-actions">
                        <a href="#" class="btn-action btn-suivre">📍 Suivre en direct</a>
                        <a href="#" class="btn-action btn-modifier">✏️ Modifier</a>
                        <a href="#" class="btn-action btn-annuler">❌ Annuler</a>
                    </div>
                </div>
                
                <!-- Réservation 2 - Confirmée -->
                <div class="reservation-card">
                    <div class="reservation-header-info">
                        <div class="reservation-id">Réservation #RDV-7891</div>
                        <div class="reservation-statut statut-confirme">Confirmée</div>
                    </div>
                    
                    <div class="reservation-details">
                        <div class="lieu">
                            <div class="lieu-nom">Gare Montparnasse</div>
                            <div class="lieu-adresse">Place Raoul Dautry</div>
                            <div class="lieu-horaire">Départ: 18:00</div>
                        </div>
                        <div class="fleche">→</div>
                        <div class="lieu">
                            <div class="lieu-nom">Stade de France</div>
                            <div class="lieu-adresse">Saint-Denis</div>
                            <div class="lieu-horaire">Arrivée estimée: 18:35</div>
                        </div>
                    </div>
                    
                    <div class="reservation-info">
                        <div class="info-item">
                            <span class="info-label">Chauffeur</span>
                            <span class="info-value">En attente d'assignation</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Prix</span>
                            <span class="info-value">€38.50</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Distance</span>
                            <span class="info-value">12 km</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Temps estimé</span>
                            <span class="info-value">25 min</span>
                        </div>
                    </div>
                    
                    <div class="reservation-actions">
                        <a href="#" class="btn-action btn-modifier">✏️ Modifier</a>
                        <a href="#" class="btn-action btn-annuler">❌ Annuler</a>
                    </div>
                </div>
                
                <!-- Réservation 3 - En attente -->
                <div class="reservation-card">
                    <div class="reservation-header-info">
                        <div class="reservation-id">Réservation #RDV-7892</div>
                        <div class="reservation-statut statut-attente">En attente</div>
                    </div>
                    
                    <div class="reservation-details">
                        <div class="lieu">
                            <div class="lieu-nom">Tour Eiffel</div>
                            <div class="lieu-adresse">Champ de Mars</div>
                            <div class="lieu-horaire">Départ: 21:00</div>
                        </div>
                        <div class="fleche">→</div>
                        <div class="lieu">
                            <div class="lieu-nom">Le Marais</div>
                            <div class="lieu-adresse">Rue de Rivoli</div>
                            <div class="lieu-horaire">Arrivée estimée: 21:20</div>
                        </div>
                    </div>
                    
                    <div class="reservation-info">
                        <div class="info-item">
                            <span class="info-label">Chauffeur</span>
                            <span class="info-value">Recherche en cours...</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Prix</span>
                            <span class="info-value">€18.00</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Distance</span>
                            <span class="info-value">5 km</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Temps estimé</span>
                            <span class="info-value">15 min</span>
                        </div>
                    </div>
                    
                    <div class="reservation-actions">
                        <a href="#" class="btn-action btn-modifier">✏️ Modifier</a>
                        <a href="#" class="btn-action btn-annuler">❌ Annuler</a>
                    </div>
                </div>
            </div>
            
            <!-- Contact urgence -->
            <div class="urgence-contact">
                <h3>📞 Besoin d'aide ?</h3>
                <p>Contactez notre service client au <strong>01 23 45 67 89</strong> pour toute urgence concernant vos réservations.</p>
            </div>
        </div>
    </div>
</body>
</html>