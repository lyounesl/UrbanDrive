<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Client</title>
    <style>

        

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffffff;
            padding: 20px;
        }
        
        .client-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .client-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }
        
        .client-header h1 {
            margin-bottom: 0.5rem;
            font-size: 2rem;
        }
        
        .client-id {
            opacity: 0.9;
            font-size: 1.1rem;
        }
        
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 2rem;
        }
        
        .action-card {
            background: white;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .action-card:hover {
            transform: translateY(-5px);
            border-color: #667eea;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .action-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        .action-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 0.5rem;
        }
        
        .action-description {
            color: #666;
            line-height: 1.5;
        }
        
        .btn-action {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 1rem;
            transition: background 0.3s ease;
        }
        
        .btn-action:hover {
            background: #5a6fd8;
        }

                /* Navigation */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 3rem;
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .logo {
            font-size: 2rem;
            font-weight: bold;
            color: #667eea;
        }

        .logo span {
            color: #764ba2;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .nav-links a:hover {
            color: #667eea;
            background: #f8f9fa;
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.7rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .btn-login {
            background: transparent;
            color: #667eea;
            border-color: #667eea;
        }

        .btn-login:hover {
            background: #667eea;
            color: white;
        }

        .btn-register {
            background: #667eea;
            color: white;
        }

        .btn-register:hover {
            background: #5a6fd8;
            transform: translateY(-2px);
        }

        .mobile-menu {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #333;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .mobile-menu {
                display: block;
            }
        }

                /* Footer */
        .footer {
           background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 3rem 2rem;
            text-align: center;
            color: white;
            margin-top: auto;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: #ffffffff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #00BFFF;
        }

        .copyright {
            opacity: 0.7;
            font-size: 0.9rem;
        }
        
        /* Couleurs spécifiques pour chaque action */
        .historique { border-left: 4px solid #4CAF50; }
        .reservation { border-left: 4px solid #2196F3; }
        .avis { border-left: 4px solid #FF9800; }
        
        .historique .action-icon { color: #4CAF50; }
        .reservation .action-icon { color: #2196F3; }
        .avis .action-icon { color: #FF9800; }
    </style>
</head>
<body>

        <!-- Navigation -->
    <nav class="navbar">
        <div class="logo">Urban<span>Drive</span></div>
        
        <ul class="nav-links">
            <li><a href="/">Accueil</a></li>
            <li><a href="/tarifs">Tarifs</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
        
        <div class="auth-buttons">
            <a href="/connexion" class="btn btn-login">Connexion</a>
            <a href="/inscription" class="btn btn-register">Inscription</a>
        </div>
        
        <div class="mobile-menu">☰</div>
    </nav>

    <div class="client-container">
        <!-- En-tête du client -->
        <div class="client-header">
            <h1>Espace Client</h1>
            <div class="client-id">Client #{{ $num }}</div>
        </div>
        
        <!-- Grille des actions -->
        <div class="actions-grid">
            <!-- Historique -->
            <div class="action-card historique" onclick="window.location.href='/client/{{$num}}/historique'">
                <div class="action-icon">📊</div>
                <div class="action-title">Historique</div>
                <div class="action-description">
                    Consultez l'historique complet de vos trajets, factures et réservations passées.
                </div>
                <a href="/client/{{$num}}/historique" class="btn-action">Voir l'historique</a>
            </div>
            
            <!-- Réservation -->
            <div class="action-card reservation" onclick="window.location.href='/client/{{$num}}/reservation'">
                <div class="action-icon">🚗</div>
                <div class="action-title">Réservation</div>
                <div class="action-description">
                    Réservez un nouveau trajet avec nos chauffeurs professionnels disponibles 24h/24.
                </div>
                <a href="/client/{{$num}}/reservation" class="btn-action">Nouvelle réservation</a>
            </div>
            
            <!-- Avis sur les chauffeurs -->
            <div class="action-card avis" onclick="window.location.href='/client/{{$num}}/avisSurChauffeur'">
                <div class="action-icon">⭐</div>
                <div class="action-title">Avis Chauffeurs</div>
                <div class="action-description">
                    Donnez votre avis sur les chauffeurs et consultez les notes de vos trajets récents.
                </div>
                <a href="/client/{{$num}}/avisSurChauffeur" class="btn-action">Donner un avis</a>
            </div>
        </div>
    </div>

        <!-- Footer -->
    <footer class="footer">
        <div class="footer-links">
            <a href="#confidentialite">Confidentialité</a>
            <a href="#cgu">CGU</a>
            <a href="/contact">Contact</a>
        </div>
        <div class="copyright">
            © 2024 UrbanDrive. Tous droits réservés. VTC agréé par l'État.
        </div>
    </footer>

    <script>
        // Animation simple au chargement
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.action-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    card.style.transition = 'all 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });
    </script>
</body>
</html>