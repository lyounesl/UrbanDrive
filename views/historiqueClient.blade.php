<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des Trajets</title>
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
        
        .historique-container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .historique-header {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }
        
        .historique-header h1 {
            margin-bottom: 0.5rem;
            font-size: 2rem;
        }
        
        .client-info {
            opacity: 0.9;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }
        
        .back-button {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: rgba(255,255,255,0.2);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 1rem;
            transition: background 0.3s ease;
        }
        
        .back-button:hover {
            background: rgba(255,255,255,0.3);
        }
        
        .historique-content {
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
            border-left: 4px solid #4CAF50;
            padding: 1.5rem;
            border-radius: 5px;
            text-align: center;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #4CAF50;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }
        
        .trajets-list {
            margin-top: 2rem;
        }
        
        .section-title {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #4CAF50;
        }
        
        .trajet-card {
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }
        
        .trajet-card:hover {
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }
        
        .trajet-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .trajet-date {
            font-weight: bold;
            color: #333;
            font-size: 1.1rem;
        }
        
        .trajet-statut {
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
        }
        
        .statut-termine {
            background: #d4edda;
            color: #155724;
        }
        
        .statut-annule {
            background: #f8d7da;
            color: #721c24;
        }
        
        .trajet-details {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            gap: 1rem;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .lieu {
            text-align: center;
        }
        
        .lieu-nom {
            font-weight: bold;
            color: #333;
        }
        
        .lieu-horaire {
            color: #666;
            font-size: 0.9rem;
        }
        
        .fleche {
            text-align: center;
            font-size: 1.5rem;
            color: #4CAF50;
        }
        
        .trajet-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid #e0e0e0;
        }
        
        .chauffeur-info {
            color: #666;
        }
        
        .trajet-prix {
            font-weight: bold;
            color: #333;
            font-size: 1.1rem;
        }
        
        .btn-details {
            padding: 0.5rem 1rem;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 0.9rem;
            transition: background 0.3s ease;
        }
        
        .btn-details:hover {
            background: #45a049;
        }
        
        .no-trajets {
            text-align: center;
            padding: 3rem;
            color: #666;
        }
        
        .no-trajets-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
    </style>
</head>
<body>
    <div class="historique-container">
        <!-- En-tête -->
        <div class="historique-header">
            <h1>Historique des Trajets</h1>
            <div class="client-info">Client #{{ $num }}</div>
            <a href="/clients/{{ $num }}" class="back-button">← Retour à l'espace client</a>
        </div>
        
        <!-- Contenu -->
        <div class="historique-content">
            <!-- Statistiques -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">24</div>
                    <div class="stat-label">Trajets effectués</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">18</div>
                    <div class="stat-label">Chauffeurs différents</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">4.8/5</div>
                    <div class="stat-label">Note moyenne</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">€286</div>
                    <div class="stat-label">Total dépensé</div>
                </div>
            </div>
            
            <!-- Liste des trajets -->
            <div class="trajets-list">
                <h2 class="section-title">Derniers trajets</h2>
                
                <!-- Trajet 1 -->
                <div class="trajet-card">
                    <div class="trajet-header">
                        <div class="trajet-date">15 Déc 2024</div>
                        <div class="trajet-statut statut-termine">Terminé</div>
                    </div>
                    <div class="trajet-details">
                        <div class="lieu">
                            <div class="lieu-nom">Gare de Lyon</div>
                            <div class="lieu-horaire">14:30</div>
                        </div>
                        <div class="fleche">→</div>
                        <div class="lieu">
                            <div class="lieu-nom">Aéroport CDG</div>
                            <div class="lieu-horaire">15:15</div>
                        </div>
                    </div>
                    <div class="trajet-footer">
                        <div class="chauffeur-info">Chauffeur: Jean D. ★★★★☆</div>
                        <div class="trajet-prix">€42.50</div>
                        <a href="#" class="btn-details">Détails</a>
                    </div>
                </div>
                
                <!-- Trajet 2 -->
                <div class="trajet-card">
                    <div class="trajet-header">
                        <div class="trajet-date">12 Déc 2024</div>
                        <div class="trajet-statut statut-termine">Terminé</div>
                    </div>
                    <div class="trajet-details">
                        <div class="lieu">
                            <div class="lieu-nom">Tour Eiffel</div>
                            <div class="lieu-horaire">20:15</div>
                        </div>
                        <div class="fleche">→</div>
                        <div class="lieu">
                            <div class="lieu-nom">Hôtel Marais</div>
                            <div class="lieu-horaire">20:45</div>
                        </div>
                    </div>
                    <div class="trajet-footer">
                        <div class="chauffeur-info">Chauffeur: Marie L. ★★★★★</div>
                        <div class="trajet-prix">€28.00</div>
                        <a href="#" class="btn-details">Détails</a>
                    </div>
                </div>
                
                <!-- Trajet 3 -->
                <div class="trajet-card">
                    <div class="trajet-header">
                        <div class="trajet-date">10 Déc 2024</div>
                        <div class="trajet-statut statut-annule">Annulé</div>
                    </div>
                    <div class="trajet-details">
                        <div class="lieu">
                            <div class="lieu-nom">Opéra Garnier</div>
                            <div class="lieu-horaire">09:00</div>
                        </div>
                        <div class="fleche">→</div>
                        <div class="lieu">
                            <div class="lieu-nom">La Défense</div>
                            <div class="lieu-horaire">--:--</div>
                        </div>
                    </div>
                    <div class="trajet-footer">
                        <div class="chauffeur-info">Chauffeur: Pierre M.</div>
                        <div class="trajet-prix">€0.00</div>
                        <a href="#" class="btn-details">Détails</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>