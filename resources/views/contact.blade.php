<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - UrbanDrive</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        /* Header */
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
        
        /* Main Content */
        .contact-container {
            max-width: 1200px;
            margin: 2rem auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
            flex: 1;
        }
        
        .contact-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 3rem 2rem;
            text-align: center;
        }
        
        .contact-header h1 {
            margin-bottom: 1rem;
            font-size: 2.5rem;
        }
        
        .contact-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        
        .contact-content {
            padding: 3rem 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
        }
        
        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }
        
        .info-card {
            background: #f8f9fa;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 2rem;
            transition: all 0.3s ease;
        }
        
        .info-card:hover {
            border-color: #667eea;
            transform: translateY(-2px);
        }
        
        .info-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #667eea;
        }
        
        .info-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 0.5rem;
        }
        
        .info-details {
            color: #666;
            line-height: 1.5;
        }
        
        .info-details strong {
            color: #333;
        }
        
        .contact-form {
            background: #f8f9fa;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 2rem;
        }
        
        .form-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
            font-weight: bold;
        }
        
        .form-input, .form-textarea, .form-select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        
        .form-input:focus, .form-textarea:focus, .form-select:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .form-textarea {
            resize: vertical;
            min-height: 120px;
        }
        
        .form-select {
            background: white;
        }
        
        .btn-submit {
            width: 100%;
            padding: 1rem;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-submit:hover {
            background: #5a6fd8;
            transform: translateY(-2px);
        }
        
        .faq-section {
            padding: 3rem 2rem;
            background: #f8f9fa;
            margin: 2rem;
            border-radius: 8px;
        }
        
        .faq-title {
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .faq-grid {
            display: grid;
            gap: 1.5rem;
        }
        
        .faq-item {
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 1.5rem;
            transition: all 0.3s ease;
        }
        
        .faq-item:hover {
            border-color: #667eea;
        }
        
        .faq-question {
            font-size: 1.1rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 0.5rem;
        }
        
        .faq-answer {
            color: #666;
            line-height: 1.5;
        }
        
        /* Footer */
        .footer {
            background: #ffffffff;
            padding: 3rem 2rem;
            text-align: center;
            color: white;
            margin-top: auto;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            text-align: left;
            color: #000000ff;
        }
        
        .footer-section h3 {
            color: #001affff;
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }
        
        .footer-links {
            color: #000000ff;
            text-decoration: none;
            transition: color 0.3s ease;
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 0.5rem;
        }
        
        .footer-links a {
            color: #000000ff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: #ffffffff;
        }
        
        .footer-bottom {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #ffffffff;
            text-align: center;
        }
        
        .copyright {
            opacity: 0.7;
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .mobile-menu {
                display: block;
            }
            
            .contact-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
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

    <!-- Main Content -->
    <div class="contact-container">
        <!-- En-tête Contact -->
        <div class="contact-header">
            <h1>Contactez-nous</h1>
            <div class="contact-subtitle">Notre équipe est à votre écoute pour répondre à toutes vos questions</div>
        </div>
        
        <!-- Contenu principal -->
        <div class="contact-content">
            <!-- Informations de contact -->
            <div class="contact-info">
                <div class="info-card">
                    <div class="info-icon">📞</div>
                    <div class="info-title">Téléphone</div>
                    <div class="info-details">
                        <strong>Service Client :</strong> 01 23 45 67 89<br>
                        <strong>Urgences :</strong> 01 23 45 67 90<br>
                        <strong>Disponible 24h/24 et 7j/7</strong>
                    </div>
                </div>
                
                <div class="info-card">
                    <div class="info-icon">✉️</div>
                    <div class="info-title">Email</div>
                    <div class="info-details">
                        <strong>Support :</strong> support@urbandrive.fr<br>
                        <strong>Commercial :</strong> commercial@urbandrive.fr<br>
                        <strong>Recrutement :</strong> jobs@urbandrive.fr
                    </div>
                </div>
                
                <div class="info-card">
                    <div class="info-icon">🏢</div>
                    <div class="info-title">Adresse</div>
                    <div class="info-details">
                        <strong>UrbanDrive SAS</strong><br>
                        123 Avenue des Champs-Élysées<br>
                        75008 Paris, France<br>
                        <em>Sur rendez-vous uniquement</em>
                    </div>
                </div>
                
                <div class="info-card">
                    <div class="info-icon">🕒</div>
                    <div class="info-title">Horaires</div>
                    <div class="info-details">
                        <strong>Service Client :</strong> 24h/24 - 7j/7<br>
                        <strong>Support technique :</strong> 8h-20h<br>
                        <strong>Service commercial :</strong> 9h-18h
                    </div>
                </div>
            </div>
            
            <!-- Formulaire de contact -->
            <div class="contact-form">
                <h3 class="form-title">Envoyez-nous un message</h3>
                <form>
                    <div class="form-group">
                        <label class="form-label" for="nom">Nom complet *</label>
                        <input type="text" id="nom" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="email">Adresse email *</label>
                        <input type="email" id="email" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="telephone">Téléphone</label>
                        <input type="tel" id="telephone" class="form-input">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="sujet">Sujet *</label>
                        <select id="sujet" class="form-select" required>
                            <option value="">Choisissez un sujet</option>
                            <option value="reservation">Problème de réservation</option>
                            <option value="chauffeur">Problème avec un chauffeur</option>
                            <option value="facturation">Question de facturation</option>
                            <option value="compte">Problème de compte</option>
                            <option value="autre">Autre demande</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="message">Message *</label>
                        <textarea id="message" class="form-textarea" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn-submit">Envoyer le message</button>
                </form>
            </div>
        </div>
        
        <!-- FAQ -->
        <div class="faq-section">
            <h2 class="faq-title">Questions Fréquentes</h2>
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">Comment annuler une réservation ?</div>
                    <div class="faq-answer">Vous pouvez annuler votre réservation depuis votre espace client jusqu'à 30 minutes avant l'heure prévue du trajet sans frais.</div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">Que faire si mon chauffeur est en retard ?</div>
                    <div class="faq-answer">Contactez immédiatement notre service client au 01 23 45 67 89. Nous localiserons votre chauffeur et vous tiendrons informé.</div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">Comment modifier mon profil client ?</div>
                    <div class="faq-answer">Connectez-vous à votre espace client, allez dans "Mon profil" et modifiez les informations souhaitées.</div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">Quels moyens de paiement acceptez-vous ?</div>
                    <div class="faq-answer">Nous acceptons les cartes bancaires (Visa, Mastercard), PayPal, et les virements bancaires pour les comptes entreprises.</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>UrbanDrive</h3>
                <p>Service VTC premium disponible 24h/24 et 7j/7.</p>
            </div>
            
            <div class="footer-section">
                <h3>Liens rapides</h3>
                <ul class="footer-links">
                    <li><a href="/">Accueil</a></li>
                    <li><a href="/tarifs">Tarifs</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Contact</h3>
                <ul class="footer-links">
                    <li>📞 01 23 45 67 89</li>
                    <li>✉️ contact@urbandrive.fr</li>
                    <li>🏢 123 Av. Champs-Élysées<br>75008 Paris</li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="copyright">
                © 2024 UrbanDrive. Tous droits réservés. VTC agréé par l'État.
            </div>
        </div>
    </footer>

    <script>
        // Animation des cartes au chargement
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.info-card, .faq-item');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    card.style.transition = 'all 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</body>
</html>