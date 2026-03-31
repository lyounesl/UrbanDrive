<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarifs - UrbanDrive</title>
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
        .tarifs-container {
            max-width: 1200px;
            margin: 2rem auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
            flex: 1;
        }
        
        .tarifs-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 3rem 2rem;
            text-align: center;
        }
        
        .tarifs-header h1 {
            margin-bottom: 1rem;
            font-size: 2.5rem;
        }
        
        .tarifs-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        
        .tarifs-content {
            padding: 3rem 2rem;
        }
        
        .pricing-intro {
            text-align: center;
            margin-bottom: 3rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .pricing-intro h2 {
            color: #333;
            margin-bottom: 1rem;
            font-size: 2rem;
        }
        
        .pricing-intro p {
            color: #666;
            font-size: 1.1rem;
            line-height: 1.6;
        }
        
        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }
        
        .pricing-card {
            background: white;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 2.5rem 2rem;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .pricing-card.featured {
            border-color: #667eea;
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.2);
        }
        
        .pricing-card:hover {
            border-color: #667eea;
            transform: translateY(-5px);
        }
        
        .pricing-badge {
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            background: #FFD700;
            color: #333;
            padding: 0.5rem 1.5rem;
            border-radius: 20px;
            font-weight: bold;
            font-size: 0.9rem;
        }
        
        .pricing-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #667eea;
        }
        
        .pricing-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 1rem;
        }
        
        .pricing-price {
            font-size: 2.5rem;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 0.5rem;
        }
        
        .pricing-unit {
            color: #666;
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .pricing-features {
            list-style: none;
            margin-bottom: 2rem;
            text-align: left;
        }
        
        .pricing-features li {
            padding: 0.5rem 0;
            color: #666;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .pricing-features li:last-child {
            border-bottom: none;
        }
        
        .pricing-features li::before {
            content: "✓";
            color: #4CAF50;
            font-weight: bold;
            margin-right: 0.5rem;
        }
        
        .btn-pricing {
            display: inline-block;
            padding: 1rem 2rem;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .btn-pricing:hover {
            background: #5a6fd8;
            transform: translateY(-2px);
        }
        
        .cost-calculator {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 3rem 2rem;
            margin-bottom: 3rem;
        }
        
        .calculator-title {
            text-align: center;
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 2rem;
        }
        
        .calculator-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .calculator-input {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
        }
        
        .input-label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
            font-weight: bold;
        }
        
        .input-field {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }
        
        .input-field:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .calculator-result {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            border: 2px solid #667eea;
            text-align: center;
            margin-top: 2rem;
        }
        
        .result-title {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 1rem;
        }
        
        .result-price {
            font-size: 2.5rem;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 0.5rem;
        }
        
        .result-details {
            color: #666;
            font-size: 0.9rem;
        }
        
        .tarifs-table {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            border: 1px solid #e0e0e0;
        }
        
        .table-title {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .table th {
            background: #667eea;
            color: white;
            padding: 1rem;
            text-align: left;
        }
        
        .table td {
            padding: 1rem;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .table tr:hover {
            background: #f8f9fa;
        }
        
        .price-highlight {
            color: #667eea;
            font-weight: bold;
            font-size: 1.1rem;
        }
        
        /* Footer */
        .footer {
            background: #ffffffff;
            padding: 3rem 2rem;
            text-align: center;
            color: rgb(0, 0, 0);
            margin-top: auto;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            text-align: left;
        }
        
        .footer-section h3 {
            color: rgb(0, 26, 255);
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 0.5rem;
        }
        
        .footer-links a {
            color: rgb(0, 0, 0);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: #000000ff;
        }
        
        .footer-bottom {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #5488c2ff;
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
            
            .pricing-grid {
                grid-template-columns: 1fr;
            }
            
            .pricing-card.featured {
                transform: none;
            }
            
            .calculator-grid {
                grid-template-columns: 1fr;
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
    <div class="tarifs-container">
        <!-- En-tête Tarifs -->
        <div class="tarifs-header">
            <h1>Nos Tarifs</h1>
            <div class="tarifs-subtitle">Des prix transparents et compétitifs pour tous vos déplacements</div>
        </div>
        
        <!-- Contenu principal -->
        <div class="tarifs-content">
            <!-- Introduction -->
            <div class="pricing-intro">
                <h2>Tarification au kilomètre</h2>
                <p>
                    Chez UrbanDrive, nous croyons en la transparence. Nos tarifs sont calculés au kilomètre 
                    avec un prix de base fixe. Aucune surprise, le prix affiché est le prix payé.
                </p>
            </div>
            
            <!-- Grille de tarifs -->
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-icon">🚗</div>
                    <div class="pricing-title">Économique</div>
                    <div class="pricing-price">1,20€</div>
                    <div class="pricing-unit">par kilomètre</div>
                    <ul class="pricing-features">
                        <li>Véhicules compacts et écologiques</li>
                        <li>Climatisation standard</li>
                        <li>Bagages limités (2 valises)</li>
                        <li>Support client 24h/24</li>
                        <li>Paiement sécurisé</li>
                    </ul>
                </div>
                
                <div class="pricing-card featured">
                    <div class="pricing-badge">Le plus populaire</div>
                    <div class="pricing-icon">🚙</div>
                    <div class="pricing-title">Confort</div>
                    <div class="pricing-price">1,50€</div>
                    <div class="pricing-unit">par kilomètre</div>
                    <ul class="pricing-features">
                        <li>Berlines confortables</li>
                        <li>Climatisation automatique</li>
                        <li>Espace bagages (4 valises)</li>
                        <li>Chauffeurs expérimentés</li>
                        <li>Wi-Fi gratuit à bord</li>
                        <li>Eau minérale offerte</li>
                    </ul>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-icon">⭐</div>
                    <div class="pricing-title">Premium</div>
                    <div class="pricing-price">2,00€</div>
                    <div class="pricing-unit">par kilomètre</div>
                    <ul class="pricing-features">
                        <li>Véhicules haut de gamme</li>
                        <li>Chauffeurs VIP</li>
                        <li>Espace bagages illimité</li>
                        <li>Wi-Fi haut débit</li>
                        <li>Collations offertes</li>
                        <li>Service prioritaire</li>
                        <li>Assistance personnalisée</li>
                    </ul>
                </div>
            </div>
            
            <!-- Calculateur de coût -->
            <div class="cost-calculator">
                <h2 class="calculator-title">Estimez le coût de votre trajet</h2>
                <div class="calculator-grid">
                    <div class="calculator-input">
                        <label class="input-label">Distance (km)</label>
                        <input type="number" id="distance" class="input-field" placeholder="Ex: 15" min="1" value="10">
                    </div>
                    
                    <div class="calculator-input">
                        <label class="input-label">Type de véhicule</label>
                        <select id="vehicle-type" class="input-field">
                            <option value="1.20">Économique (1,20€/km)</option>
                            <option value="1.50" selected>Confort (1,50€/km)</option>
                            <option value="2.00">Premium (2,00€/km)</option>
                        </select>
                    </div>
                    
                     <div class="calculator-input">
                        <label class="input-label">Nombre de passagers</label>
                        <select id="nombre-passagers" class="input-field">
                            @for($i = 1; $i <= 4; $i++)
                                <option value="{{ $i }}">{{ $i }} passager(s)</option>
                            @endfor
                        </select>
                    </div>

                    <div class="calculator-input">
                        <label class="input-label">Frais de base</label>
                        <input type="text" id="base-fee" class="input-field" value="5,00€" readonly>
                    </div>
                </div>
                
                <div class="calculator-result">
                    <div class="result-title">Coût estimé de votre trajet</div>
                    <div class="result-price" id="total-cost">20,00€</div>
                    <div class="result-details" id="cost-details">Pour 10 km avec véhicule Confort</div>
                </div>
            </div>
            
            <!-- Tableau des tarifs détaillés -->
            <div class="tarifs-table">
                <h3 class="table-title">Détail des tarifs et suppléments</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Économique</th>
                            <th>Confort</th>
                            <th>Premium</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Prix au kilomètre</td>
                            <td class="price-highlight">1,20€</td>
                            <td class="price-highlight">1,50€</td>
                            <td class="price-highlight">2,00€</td>
                        </tr>
                        <tr>
                            <td>Frais de base</td>
                            <td>5,00€</td>
                            <td>5,00€</td>
                            <td>5,00€</td>
                        </tr>
                        <tr>
                            <td>Frais en plus par personne</td>
                            <td>+10%</td>
                            <td>+10%</td>
                            <td>+10%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>UrbanDrive</h3>
                <p>Service VTC disponible 24h/24 et 7j/7.</p>
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
            function calculateCost() {
                const distance       = parseFloat(document.getElementById('distance').value) || 0;
                const pricePerKm     = parseFloat(document.getElementById('vehicle-type').value);
                const passagers      = parseInt(document.getElementById('nombre-passagers').value) || 1;
                const baseFee        = 5.00;

                // +10% par passager supplémentaire
                const multiplicateur = 1 + ((passagers - 1) * 0.10);
                const totalCost      = (distance * pricePerKm * multiplicateur) + baseFee;

                document.getElementById('total-cost').textContent = totalCost.toFixed(2) + '€';

                const vehicleType = document.getElementById('vehicle-type').options[
                    document.getElementById('vehicle-type').selectedIndex
                ].text;

                document.getElementById('cost-details').textContent =
                    `Pour ${distance} km, ${passagers} passager(s) avec ${vehicleType.split(' (')[0]}`;
            }

            document.addEventListener('DOMContentLoaded', function() {
                calculateCost();

                document.getElementById('distance').addEventListener('input', calculateCost);
                document.getElementById('vehicle-type').addEventListener('change', calculateCost);
                document.getElementById('nombre-passagers').addEventListener('change', calculateCost);

                const cards = document.querySelectorAll('.pricing-card');
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