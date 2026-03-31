<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - UrbanDrive</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .register-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }
        
        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .register-header h2 {
            color: #333;
            margin-bottom: 0.5rem;
            font-size: 1.8rem;
        }
        
        .register-header p {
            color: #666;
        }
        
        .user-type-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .user-type-btn {
            padding: 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            font-weight: bold;
            color: #333;
        }
        
        .user-type-btn.active {
            border-color: #667eea;
            background: #667eea;
            color: white;
        }
        
        .user-type-btn:hover {
            border-color: #667eea;
        }
        
        .user-icon {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            display: block;
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
        
        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .btn-register {
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
            margin-bottom: 1.5rem;
        }
        
        .btn-register:hover {
            background: #5a6fd8;
            transform: translateY(-2px);
        }
        
        .separator {
            text-align: center;
            margin: 1.5rem 0;
            position: relative;
            color: #666;
        }
        
        .separator::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e0e0e0;
        }
        
        .separator span {
            background: white;
            padding: 0 1rem;
        }
        
        .login-link {
            text-align: center;
            margin-top: 1.5rem;
        }
        
        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: bold;
        }
        
        .login-link a:hover {
            text-decoration: underline;
        }
        
        .error {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        
        .alert {
            padding: 0.75rem;
            margin-bottom: 1rem;
            border-radius: 4px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        
        .chauffeur-info {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
            border-left: 4px solid #667eea;
        }
        
        .chauffeur-info h4 {
            color: #333;
            margin-bottom: 0.5rem;
        }
        
        .chauffeur-info p {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.4;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <h2>Inscription</h2>
            <p>Rejoignez la communauté UrbanDrive</p>
        </div>

        <!-- Boutons de sélection du type d'utilisateur -->
        <div class="user-type-buttons">
            <button class="user-type-btn active" data-type="client">
                <span class="user-icon">👤</span>
                Client
            </button>
            <button class="user-type-btn" data-type="chauffeur">
                <span class="user-icon">🚗</span>
                Chauffeur
            </button>
        </div>

        <!-- Affichage des erreurs -->
        <?php if($errors->any()): ?>
            <div class="alert">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($error); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <!-- Formulaire d'inscription Client -->
        <form method="POST" action="<?php echo e(route('inscription.faite')); ?>" id="client-form">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="user_type" value="client">

            <div class="form-group">
                <label class="form-label" for="nom">Nom</label>
                <input type="text" id="nom" name="nom" class="form-input" value="<?php echo e(old('nom')); ?>" required autofocus>
                <?php $__errorArgs = ['nom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label class="form-label" for="prenom">Prenom</label>
                <input type="text" id="prenom" name="prenom" class="form-input" value="<?php echo e(old('prenom')); ?>" required autofocus>
                <?php $__errorArgs = ['prenom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label class="form-label" for="email">Adresse Email</label>
                <input type="email" id="email" name="email" class="form-input" value="<?php echo e(old('email')); ?>" required>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" class="form-input" required>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="error"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password_confirmation">Confirmer le mot de passe</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" required>
                </div>
            </div>

            <button type="submit" class="btn-register">Créer mon compte</button>
        </form>

        <!-- Formulaire d'inscription Chauffeur (caché par défaut) -->
        <form method="POST" action="/chauffeur/register" id="chauffeur-form" style="display: none;">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="user_type" value="chauffeur">

            <div class="chauffeur-info">
                <h4>🎯 Devenir chauffeur UrbanDrive</h4>
                <p>Rejoignez notre réseau de chauffeurs professionnels et bénéficiez de nombreux avantages.</p>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="chauffeur_nom">Nom</label>
                    <input type="text" id="chauffeur_nom" name="nom" class="form-input" value="<?php echo e(old('nom')); ?>" required>
                    <?php $__errorArgs = ['chauffeur_nom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="error"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label class="form-label" for="chauffeur_prenom">Prénom</label>
                    <input type="text" id="chauffeur_prenom" name="prenom" class="form-input" value="<?php echo e(old('prenom')); ?>" required>
                    <?php $__errorArgs = ['chauffeur_prenom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="error"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="chauffeur_email">Email professionnel</label>
                <input type="email" id="chauffeur_email" name="email" class="form-input" value="<?php echo e(old('email')); ?>" required>
                <?php $__errorArgs = ['chauffeur_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label class="form-label" for="chauffeur_telephone">Téléphone</label>
                <input type="tel" id="chauffeur_telephone" name="telephone" class="form-input" value="<?php echo e(old('telephone')); ?>" required>
                <?php $__errorArgs = ['chauffeur_telephone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="chauffeur_password">Mot de passe</label>
                    <input type="password" id="chauffeur_password" name="password" class="form-input" required>
                    <?php $__errorArgs = ['chauffeur_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="error"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label class="form-label" for="chauffeur_password_confirmation">Confirmer le mot de passe</label>
                    <input type="password" id="chauffeur_password_confirmation" name="password_confirmation" class="form-input" required>
                </div>
            </div>

            <button type="submit" class="btn-register">Devenir chauffeur</button>
        </form>

        <div class="separator">
            <span>Déjà un compte ?</span>
        </div>

        <div class="connexion-link">
            <p><a href="/connexion">Se connecter</a></p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const clientBtn = document.querySelector('[data-type="client"]');
            const chauffeurBtn = document.querySelector('[data-type="chauffeur"]');
            const clientForm = document.getElementById('client-form');
            const chauffeurForm = document.getElementById('chauffeur-form');

            // Gestion du changement de type d'utilisateur
            clientBtn.addEventListener('click', function() {
                clientBtn.classList.add('active');
                chauffeurBtn.classList.remove('active');
                clientForm.style.display = 'block';
                chauffeurForm.style.display = 'none';
            });

            chauffeurBtn.addEventListener('click', function() {
                chauffeurBtn.classList.add('active');
                clientBtn.classList.remove('active');
                chauffeurForm.style.display = 'block';
                clientForm.style.display = 'none';
            });

            // Animation au chargement
            const container = document.querySelector('.register-container');
            container.style.opacity = '0';
            container.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                container.style.transition = 'all 0.5s ease';
                container.style.opacity = '1';
                container.style.transform = 'translateY(0)';
            }, 100);
        });
    </script>
</body>
</html><?php /**PATH /home/ahmed/UrbanDrive/resources/views/inscription.blade.php ENDPATH**/ ?>