<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avis sur les Chauffeurs</title>
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
        
        .avis-container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .avis-header {
            background: linear-gradient(135deg, #FF9800 0%, #F57C00 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }
        
        .avis-header h1 {
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
            color: #FF9800;
        }
        
        .btn-secondary {
            background: #2196F3;
            color: white;
        }
        
        .btn-secondary:hover {
            background: #1976D2;
        }
        
        .avis-content {
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
            border-left: 4px solid #FF9800;
            padding: 1.5rem;
            border-radius: 5px;
            text-align: center;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #FF9800;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }
        
        .rating-summary {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .global-rating {
            font-size: 3rem;
            font-weight: bold;
            color: #FF9800;
            margin-bottom: 0.5rem;
        }
        
        .stars {
            font-size: 1.5rem;
            color: #FFD700;
            margin-bottom: 1rem;
        }
        
        .rating-text {
            color: #856404;
            font-size: 1.1rem;
        }
        
        .avis-list {
            margin-top: 2rem;
        }
        
        .section-title {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #FF9800;
        }
        
        .filters {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }
        
        .filter-btn {
            padding: 0.5rem 1rem;
            background: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .filter-btn.active {
            background: #FF9800;
            color: white;
            border-color: #FF9800;
        }
        
        .filter-btn:hover {
            background: #e0e0e0;
        }
        
        .avis-card {
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }
        
        .avis-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }
        
        .avis-header-info {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        
        .chauffeur-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .chauffeur-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #FF9800;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
        }
        
        .chauffeur-details h3 {
            color: #333;
            margin-bottom: 0.3rem;
        }
        
        .chauffeur-vehicle {
            color: #666;
            font-size: 0.9rem;
        }
        
        .avis-meta {
            text-align: right;
        }
        
        .avis-date {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
        
        .avis-rating {
            font-size: 1.2rem;
            color: #FFD700;
        }
        
        .trajet-info {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .trajet-route {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .trajet-lieux {
            font-weight: bold;
            color: #333;
        }
        
        .trajet-fleche {
            color: #FF9800;
            font-weight: bold;
        }
        
        .trajet-prix {
            font-weight: bold;
            color: #333;
        }
        
        .avis-comment {
            margin-bottom: 1rem;
            line-height: 1.6;
            color: #333;
        }
        
        .avis-tags {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }
        
        .tag {
            background: #e3f2fd;
            color: #1976D2;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            border: 1px solid #bbdefb;
        }
        
        .avis-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
        }
        
        .btn-action {
            padding: 0.5rem 1rem;
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
        
        .btn-supprimer {
            background: #dc3545;
            color: white;
        }
        
        .btn-supprimer:hover {
            background: #c82333;
        }
        
        .btn-signaler {
            background: #ffc107;
            color: #000;
        }
        
        .btn-signaler:hover {
            background: #e0a800;
        }
        
        .no-avis {
            text-align: center;
            padding: 3rem;
            color: #666;
        }
        
        .no-avis-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
        
        .encouragement {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            padding: 1rem;
            margin-top: 2rem;
            text-align: center;
        }
        
        .encouragement h3 {
            color: #155724;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="avis-container">
        <!-- En-tête -->
        <div class="avis-header">
            <h1>Avis sur les Chauffeurs</h1>
            <div class="client-info">Client #{{ $num }}</div>
            <div class="header-actions">
                <a href="/clients/{{ $num }}" class="btn btn-primary">← Retour à l'espace client</a>
                <a href="/clients/{{ $num }}/nouvel-avis" class="btn btn-secondary">✏️ Donner un avis</a>
            </div>
        </div>
        
        <!-- Contenu -->
        <div class="avis-content">
            <!-- Statistiques -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">18</div>
                    <div class="stat-label">Avis donnés</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">4.7</div>
                    <div class="stat-label">Note moyenne</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">12</div>
                    <div class="stat-label">Chauffeurs notés</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">95%</div>
                    <div class="stat-label">Satisfaction</div>
                </div>
            </div>
            
            <!-- Résumé global -->
            <div class="rating-summary">
                <div class="global-rating">4.7/5</div>
                <div class="stars">★★★★★</div>
                <div class="rating-text">Vous êtes un client très satisfait ! Continuez ainsi 👍</div>
            </div>
            
            <!-- Liste des avis -->
            <div class="avis-list">
                <h2 class="section-title">Vos avis récents</h2>
                
                <!-- Filtres -->
                <div class="filters">
                    <button class="filter-btn active">Tous</button>
                    <button class="filter-btn">★★★★★ (8)</button>
                    <button class="filter-btn">★★★★☆ (6)</button>
                    <button class="filter-btn">★★★☆☆ (3)</button>
                    <button class="filter-btn">À modifier (2)</button>
                </div>
                
                <!-- Avis 1 -->
                <div class="avis-card">
                    <div class="avis-header-info">
                        <div class="chauffeur-info">
                            <div class="chauffeur-avatar">ML</div>
                            <div class="chauffeur-details">
                                <h3>Marie Laurent</h3>
                                <div class="chauffeur-vehicle">Peugeot 308 - AB-456-EF</div>
                            </div>
                        </div>
                        <div class="avis-meta">
                            <div class="avis-date">15 Déc 2024</div>
                            <div class="avis-rating">★★★★★</div>
                        </div>
                    </div>
                    
                    <div class="trajet-info">
                        <div class="trajet-route">
                            <span class="trajet-lieux">Gare de Lyon → Aéroport CDG</span>
                        </div>
                        <div class="trajet-prix">€42.50</div>
                    </div>
                    
                    <div class="avis-comment">
                        "Chauffeur exceptionnel ! Marie était ponctuelle, très professionnelle et la voiture était impeccable. Elle connaissait parfaitement le trajet pour éviter les embouteillages. Je recommande vivement !"
                    </div>
                    
                    <div class="avis-tags">
                        <span class="tag">Ponctuel</span>
                        <span class="tag">Conduite sûre</span>
                        <span class="tag">Voiture propre</span>
                        <span class="tag">Service excellent</span>
                    </div>
                    
                    <div class="avis-actions">
                        <a href="#" class="btn-action btn-modifier">✏️ Modifier</a>
                        <a href="#" class="btn-action btn-supprimer">🗑️ Supprimer</a>
                    </div>
                </div>
                
                <!-- Avis 2 -->
                <div class="avis-card">
                    <div class="avis-header-info">
                        <div class="chauffeur-info">
                            <div class="chauffeur-avatar">PM</div>
                            <div class="chauffeur-details">
                                <h3>Pierre Martin</h3>
                                <div class="chauffeur-vehicle">Toyota Prius - AB-123-CD</div>
                            </div>
                        </div>
                        <div class="avis-meta">
                            <div class="avis-date">12 Déc 2024</div>
                            <div class="avis-rating">★★★★☆</div>
                        </div>
                    </div>
                    
                    <div class="trajet-info">
                        <div class="trajet-route">
                            <span class="trajet-lieux">Tour Eiffel → Hôtel Marais</span>
                        </div>
                        <div class="trajet-prix">€28.00</div>
                    </div>
                    
                    <div class="avis-comment">
                        "Bon chauffeur globalement, conduite prudente. Un peu silencieux pendant le trajet, mais le service était correct. La voiture était propre et confortable."
                    </div>
                    
                    <div class="avis-tags">
                        <span class="tag">Conduite sûre</span>
                        <span class="tag">Voiture propre</span>
                        <span class="tag">Ponctuel</span>
                    </div>
                    
                    <div class="avis-actions">
                        <a href="#" class="btn-action btn-modifier">✏️ Modifier</a>
                        <a href="#" class="btn-action btn-supprimer">🗑️ Supprimer</a>
                    </div>
                </div>
                
                <!-- Avis 3 -->
                <div class="avis-card">
                    <div class="avis-header-info">
                        <div class="chauffeur-info">
                            <div class="chauffeur-avatar">SD</div>
                            <div class="chauffeur-details">
                                <h3>Sophie Dubois</h3>
                                <div class="chauffeur-vehicle">Renault Zoé - CD-789-FG</div>
                            </div>
                        </div>
                        <div class="avis-meta">
                            <div class="avis-date">10 Déc 2024</div>
                            <div class="avis-rating">★★★☆☆</div>
                        </div>
                    </div>
                    
                    <div class="trajet-info">
                        <div class="trajet-route">
                            <span class="trajet-lieux">Opéra Garnier → La Défense</span>
                        </div>
                        <div class="trajet-prix">€35.00</div>
                    </div>
                    
                    <div class="avis-comment">
                        "Trajet annulé au dernier moment sans explication claire. Décevant car j'étais pressé. Le service client a bien géré le remplacement cependant."
                    </div>
                    
                    <div class="avis-tags">
                        <span class="tag">Annulation</span>
                        <span class="tag">Service client correct</span>
                    </div>
                    
                    <div class="avis-actions">
                        <a href="#" class="btn-action btn-modifier">✏️ Modifier</a>
                        <a href="#" class="btn-action btn-signaler">🚩 Signaler</a>
                    </div>
                </div>
            </div>
            
            <!-- Encouragement -->
            <div class="encouragement">
                <h3>💡 Votre avis compte !</h3>
                <p>Vos retours aident les chauffeurs à s'améliorer et permettent à la communauté de bénéficier de meilleurs services.</p>
            </div>
        </div>
    </div>

    <script>
        // Filtrage des avis
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                // Ici vous ajouteriez la logique de filtrage
                const filter = this.textContent;
                console.log('Filtre appliqué:', filter);
            });
        });
    </script>
</body>
</html>