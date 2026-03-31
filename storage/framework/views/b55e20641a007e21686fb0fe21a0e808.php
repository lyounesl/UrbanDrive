<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Urban Drive'); ?></title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 3rem;
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .logo { font-size: 2rem; font-weight: bold; color: #667eea; }
        .logo span { color: #764ba2; }
        .nav-links { display: flex; gap: 2rem; list-style: none; }
        .nav-links a {
            color: #333; text-decoration: none; font-weight: 500;
            padding: 0.5rem 1rem; border-radius: 5px; transition: color 0.3s ease;
        }
        .nav-links a:hover { color: #667eea; background: #ffffff; }
        .auth-buttons { display: flex; gap: 1rem; align-items: center; }
        .btn {
            padding: 0.7rem 1.5rem; border-radius: 5px;
            text-decoration: none; font-weight: bold;
            transition: all 0.3s ease; border: 2px solid transparent;
            cursor: pointer; font-size: 1rem;
        }
        .btn-login { background: transparent; color: #667eea; border-color: #667eea; }
        .btn-login:hover { background: #667eea; color: white; }
        .btn-register { background: #667eea; color: white; }
        .btn-register:hover { background: #5a6fd8; transform: translateY(-2px); }
        .btn-danger {
            background: transparent; color: #e53935;
            border-color: #e53935;
        }
        .btn-danger:hover { background: #e53935; color: white; }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 3rem 2rem; text-align: center;
            color: white; margin-top: auto;
        }
        .footer-links {
            display: flex; justify-content: center;
            gap: 2rem; margin-bottom: 2rem; flex-wrap: wrap;
        }
        .footer-links a { color: white; text-decoration: none; transition: color 0.3s ease; }
        .footer-links a:hover { color: #00BFFF; }
        .copyright { opacity: 0.7; font-size: 0.9rem; }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links { display: none; }
        }
        
    </style>
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>
    <nav class="navbar">
        <div class="logo">Urban<span>Drive</span></div>
        <ul class="nav-links">
            <li><a href="/">Accueil</a></li>
            <li><a href="/tarifs">Tarifs</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
        <div class="auth-buttons">
            <?php if(auth()->guard()->check()): ?>
                <span style="color:#667eea; font-weight:500;"><?php echo e(Auth::user()->name); ?></span>
                <form method="POST" action="<?php echo e(route('logout')); ?>" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-danger">Déconnexion</button>
                </form>
            <?php else: ?>
                <a href="/connexion" class="btn btn-login">Connexion</a>
                <a href="/inscription" class="btn btn-register">Inscription</a>
            <?php endif; ?>
        </div>
    </nav>

    <main style="flex: 1; padding: 20px;">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer class="footer">
        <div class="footer-links">
            <a href="#confidentialite">Confidentialité</a>
            <a href="#cgu">CGU</a>
            <a href="/contact">Contact</a>
        </div>
        <div class="copyright">© 2024 UrbanDrive. Tous droits réservés.</div>
    </footer>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH /home/ahmed/UrbanDrive/resources/views/layouts/app.blade.php ENDPATH**/ ?>