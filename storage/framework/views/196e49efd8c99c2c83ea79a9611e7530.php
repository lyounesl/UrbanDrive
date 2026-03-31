<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UrbanDrive - VTC Premium</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffffffff;
            color: #333;
            min-height: 100vh;
        }
        
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
            background: #ffffffff;
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
        
        .hero {
            text-align: center;
            padding: 6rem 2rem 4rem;
            max-width: 800px;
            margin: 0 auto;
            background: white;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            color: #666;
            line-height: 1.6;
        }
        
        .cta-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            margin-bottom: 3rem;
        }
        
        .btn-primary {
            background: #667eea;
            color: white;
            padding: 1rem 2rem;
            font-size: 1.1rem;
        }
        
        .btn-primary:hover {
            background: #5a6fd8;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }
        
        .btn-secondary {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
            padding: 1rem 2rem;
            font-size: 1.1rem;
        }
        
        .btn-secondary:hover {
            background: #667eea;
            color: white;
            transform: translateY(-3px);
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            padding: 4rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
            background: white;
        }
        
        .feature-card {
            background: white;
            border: 2px solid #ffffffff;
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            border-color: #667eea;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #667eea;
        }
        
        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #333;
        }
        
        .feature-card p {
            color: #666;
            line-height: 1.5;
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            padding: 4rem 2rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin-top: 4rem;
            color: white;
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: bold;
            color: #FFD700;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        .app-download {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            margin-top: 4rem;
        }
        
        .app-download h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #333;
        }
        
        .app-download p {
            color: #666;
            margin-bottom: 2rem;
        }
        
        .app-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 2rem;
        }
        
        .app-btn {
            background: #ffffffff;
            border: 2px solid #ffffffff;
            border-radius: 10px;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease;
        }
        
        .app-btn:hover {
            background: #667eea;
            color: white;
            transform: translateY(-3px);
            border-color: #667eea;
        }
        
        .app-icon {
            font-size: 2rem;
        }
        
        .app-text {
            text-align: left;
        }
        
        .app-text small {
            opacity: 0.7;
            font-size: 0.8rem;
        }
        
        .footer {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 3rem 2rem;
            text-align: center;
            margin-top: 4rem;
            color: white;
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
        
        .mobile-menu {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #333;
        }
        
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .mobile-menu {
                display: block;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .features {
                grid-template-columns: 1fr;
            }
            
            .app-buttons {
                flex-direction: column;
                align-items: center;
            }
        }
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

    <!-- Section Hero -->
    <section class="hero" id="accueil">
        <h1>UrbanDrive</h1>
        <p>Voyagez avec style et sécurité. Notre service VTC vous offre des trajets confortables avec des chauffeurs professionnels, 24h/24 et 7j/7.</p>
    </section>

    <!-- Features -->
    <section class="features" id="services">
        <div class="feature-card">
            <div class="feature-icon">⚡</div>
            <h3>Rapidité</h3>
            <p>Votre chauffeur en moins de 7 minutes en moyenne dans Paris et sa région</p>
        </div>
        
        <div class="feature-card">
            <div class="feature-icon">🛡️</div>
            <h3>Sécurité</h3>
            <p>Chauffeurs vérifiés et véhicules régulièrement contrôlés pour votre sécurité</p>
        </div>
        
        <div class="feature-card">
            <div class="feature-icon">💎</div>
            <h3>Confort</h3>
            <p>Véhicules haut de gamme avec sièges chauffants, climatisation et bouteilles d'eau offertes</p>
        </div>
        
        <div class="feature-card">
            <div class="feature-icon">💰</div>
            <h3>Prix Fixes</h3>
            <p>Pas de surprise, le prix est fixé à la réservation, même en cas d'embouteillages</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-links">
            <a href="/tarifs">Tarifs</a>
            <a href="/contact">Contact</a>
        </div>
    </footer>

    <script>
        // Animation simple pour le scroll
        document.addEventListener('DOMContentLoaded', function() {
            const featureCards = document.querySelectorAll('.feature-card');
            featureCards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });
    </script>
</body>
</html><?php /**PATH /home/ahmed/UrbanDrive/resources/views/accueil.blade.php ENDPATH**/ ?>