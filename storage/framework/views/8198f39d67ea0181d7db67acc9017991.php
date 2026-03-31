<?php $__env->startSection('title', 'Avis sur les Chauffeurs - Urban Drive'); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    // Gestion des étoiles
    document.querySelectorAll('.stars-input input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const starsContainer = this.closest('.stars-input');
            const allLabels = starsContainer.querySelectorAll('label');
            const selectedValue = parseInt(this.value);

            allLabels.forEach(label => {
                const labelFor = label.getAttribute('for');
                const starValue = parseInt(labelFor.split('_').pop());
                label.style.color = starValue <= selectedValue ? '#FFD700' : '#e0e0e0';
            });
        });
    });

    // Vérifier qu'une étoile est sélectionnée avant soumission
    document.querySelectorAll('.form-avis').forEach(form => {
        form.addEventListener('submit', function(e) {
            const note = this.querySelector('input[name="note_chauffeur"]:checked');
            if (!note) {
                e.preventDefault();
                alert('Veuillez sélectionner une note avant de soumettre votre avis.');
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .avis-container {
        max-width: 1000px; margin: 0 auto; background: white;
        border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    .avis-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white; padding: 2.5rem; text-align: center;
    }
    .avis-header h1 { margin-bottom: 0.5rem; font-size: 2rem; }
    .header-subtitle { opacity: 0.9; font-size: 1.1rem; margin-bottom: 1rem; }
    .header-actions { display: flex; justify-content: center; gap: 1rem; margin-top: 1rem; }
    .btn-white {
        padding: 0.7rem 1.5rem; border-radius: 5px; text-decoration: none;
        font-weight: bold; background: rgba(255,255,255,0.2);
        color: white; border: 2px solid white; transition: all 0.3s ease;
    }
    .btn-white:hover { background: white; color: #667eea; }

    .avis-content { padding: 2.5rem; }

    /* Stats */
    .stats-grid {
        display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem; margin-bottom: 2.5rem;
    }
    .stat-card {
        background: #f8f9fa; border-left: 4px solid #667eea;
        padding: 1.5rem; border-radius: 10px; text-align: center;
        transition: transform 0.3s ease;
    }
    .stat-card:hover { transform: translateY(-3px); }
    .stat-icon { font-size: 1.8rem; margin-bottom: 0.5rem; }
    .stat-number { font-size: 2rem; font-weight: bold; color: #667eea; margin-bottom: 0.3rem; }
    .stat-label { color: #666; font-size: 0.9rem; }

    /* Section titre */
    .section-title {
        font-size: 1.4rem; font-weight: bold; color: #333;
        margin-bottom: 1.5rem; padding-bottom: 0.7rem;
        border-bottom: 2px solid #667eea;
        display: flex; justify-content: space-between; align-items: center;
    }

    /* Trajets à noter */
    .a-noter-card {
        background: #fffbeb; border: 2px solid #f59e0b;
        border-radius: 12px; padding: 1.5rem; margin-bottom: 1.2rem;
        transition: all 0.3s ease;
    }
    .a-noter-card:hover { box-shadow: 0 4px 12px rgba(245,158,11,0.2); }
    .a-noter-top {
        display: flex; justify-content: space-between;
        align-items: center; margin-bottom: 1rem;
    }
    .a-noter-trajet { font-weight: bold; color: #333; }
    .a-noter-date { color: #666; font-size: 0.9rem; }
    .a-noter-route {
        display: flex; align-items: center; gap: 0.8rem;
        color: #555; margin-bottom: 1rem; font-size: 0.95rem;
    }
    .fleche { color: #667eea; font-weight: bold; }

    /* Étoiles interactives */
        .stars-input {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
            gap: 0.3rem;
            margin-bottom: 0.5rem;
        }
        .stars-input input[type="radio"] {
            display: none;
        }
        .stars-input label {
            font-size: 2.5rem;
            color: #e0e0e0;
            cursor: pointer;
            transition: color 0.2s ease;
        }
        /* Étoile survolée et suivantes */
        .stars-input label:hover,
        .stars-input label:hover ~ label {
            color: #FFD700;
        }
        /* Étoile cochée et suivantes */
        .stars-input input[type="radio"]:checked ~ label,
        .stars-input input[type="radio"]:checked + label {
            color: #FFD700;
        }
    .form-textarea {
        width: 100%; padding: 0.75rem 1rem;
        border: 2px solid #e0e0e0; border-radius: 8px;
        font-size: 0.95rem; resize: vertical; min-height: 80px;
        transition: border-color 0.3s ease; font-family: Arial, sans-serif;
    }
    .form-textarea:focus { outline: none; border-color: #667eea; }

    .btn-soumettre {
        padding: 0.6rem 1.5rem; background: #667eea; color: white;
        border: none; border-radius: 8px; font-size: 0.95rem;
        font-weight: bold; cursor: pointer; transition: all 0.3s ease;
        margin-top: 0.8rem;
    }
    .btn-soumettre:hover { background: #5a6fd8; transform: translateY(-2px); }

    /* Avis existants */
    .avis-card {
        background: white; border: 2px solid #e0e0e0;
        border-radius: 12px; padding: 1.5rem; margin-bottom: 1.2rem;
        transition: all 0.3s ease;
    }
    .avis-card:hover { box-shadow: 0 4px 12px rgba(102,126,234,0.15); border-color: #667eea; }
    .avis-card-top {
        display: flex; justify-content: space-between;
        align-items: flex-start; margin-bottom: 1rem;
    }
    .chauffeur-info { display: flex; align-items: center; gap: 1rem; }
    .chauffeur-avatar {
        width: 50px; height: 50px; border-radius: 50%;
        background: #667eea; display: flex; align-items: center;
        justify-content: center; color: white; font-weight: bold; font-size: 1rem;
    }
    .chauffeur-nom { font-weight: bold; color: #333; margin-bottom: 0.2rem; }
    .chauffeur-vehicule { color: #666; font-size: 0.85rem; }
    .avis-meta { text-align: right; }
    .avis-date { color: #666; font-size: 0.85rem; margin-bottom: 0.3rem; }
    .avis-stars { color: #FFD700; font-size: 1.1rem; }
    .avis-route {
        background: #f8f9fa; padding: 0.8rem 1rem; border-radius: 8px;
        margin-bottom: 0.8rem; display: flex; align-items: center;
        gap: 0.8rem; color: #555; font-size: 0.9rem;
    }
    .avis-comment {
        color: #444; font-style: italic; line-height: 1.6;
        padding: 0.8rem; background: #f8f9fa; border-radius: 8px;
        border-left: 3px solid #667eea;
    }

    /* Alertes */
    .alert-success {
        background: #d4edda; color: #155724; padding: 1rem 1.5rem;
        border-radius: 8px; margin-bottom: 1.5rem; border-left: 4px solid #28a745;
    }
    .no-avis { text-align: center; padding: 3rem; color: #666; }
    .no-avis-icon { font-size: 3rem; margin-bottom: 1rem; opacity: 0.4; }

    /* Rating summary */
    .rating-summary {
        background: #ede9ff; border: 1px solid #c5b8ff;
        border-radius: 10px; padding: 1.5rem; margin-bottom: 2rem; text-align: center;
    }
    .global-rating { font-size: 3rem; font-weight: bold; color: #667eea; margin-bottom: 0.3rem; }
    .global-stars { font-size: 1.5rem; color: #FFD700; margin-bottom: 0.5rem; }
    .global-text { color: #4a3f8f; }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="avis-container">

    <div class="avis-header">
        <h1>⭐ Avis sur les Chauffeurs</h1>
        <div class="header-subtitle"><?php echo e(Auth::user()->name); ?></div>
        <div class="header-actions">
            <a href="/client/<?php echo e($num); ?>" class="btn-white">← Retour à l'espace client</a>
        </div>
    </div>

    <div class="avis-content">

        <?php if(session('success')): ?>
            <div class="alert-success">✅ <?php echo e(session('success')); ?></div>
        <?php endif; ?>

        
        <?php
            $totalAvis    = $avis->count();
            $noteMoyenne  = $avis->avg('note_chauffeur') ?? 0;
            $nbChauffeurs = $avis->unique('chauffeur_id')->count();
            $satisfaction = $totalAvis > 0
                ? round($avis->where('note_chauffeur', '>=', 4)->count() / $totalAvis * 100)
                : 0;
        ?>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">✍️</div>
                <div class="stat-number"><?php echo e($totalAvis); ?></div>
                <div class="stat-label">Avis donnés</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">⭐</div>
                <div class="stat-number"><?php echo e($noteMoyenne ? number_format($noteMoyenne, 1) : '--'); ?></div>
                <div class="stat-label">Note moyenne</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">👤</div>
                <div class="stat-number"><?php echo e($nbChauffeurs); ?></div>
                <div class="stat-label">Chauffeurs notés</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">😊</div>
                <div class="stat-number"><?php echo e($satisfaction); ?>%</div>
                <div class="stat-label">Satisfaction</div>
            </div>
        </div>

        
        <?php if($totalAvis > 0): ?>
        <div class="rating-summary">
            <div class="global-rating"><?php echo e(number_format($noteMoyenne, 1)); ?>/5</div>
            <div class="global-stars">
                <?php for($i = 1; $i <= 5; $i++): ?>
                    <?php echo e($i <= round($noteMoyenne) ? '★' : '☆'); ?>

                <?php endfor; ?>
            </div>
            <div class="global-text">
                <?php if($noteMoyenne >= 4.5): ?> Vous êtes un client très satisfait ! 👍
                <?php elseif($noteMoyenne >= 3.5): ?> Vous avez eu de bonnes expériences 😊
                <?php else: ?> Certains trajets ont été décevants 🙏
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        
        <?php if($trajetsANoter->count() > 0): ?>
        <div class="section-title">
            ✍️ Trajets à noter
            <span style="font-size:0.9rem; color:#f59e0b; font-weight:normal;">
                <?php echo e($trajetsANoter->count()); ?> en attente
            </span>
        </div>

        <?php $__currentLoopData = $trajetsANoter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trajet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="a-noter-card">
            <div class="a-noter-top">
                <div class="a-noter-trajet">
                    <?php if($trajet->chauffeur): ?>
                        👤 <?php echo e($trajet->chauffeur->name); ?>

                    <?php else: ?>
                        👤 Chauffeur inconnu
                    <?php endif; ?>
                </div>
                <div class="a-noter-date">
                    <?php echo e($trajet->date_heure_depart
                        ? $trajet->date_heure_depart->format('d/m/Y')
                        : '--'); ?>

                </div>
            </div>

            <div class="a-noter-route">
                <span>📍 <?php echo e($trajet->depart); ?></span>
                <span class="fleche">→</span>
                <span>🏁 <?php echo e($trajet->destination); ?></span>
                <span style="margin-left:auto; font-weight:bold; color:#667eea;">
                    <?php echo e(number_format($trajet->prix, 2, ',', ' ')); ?> €
                </span>
            </div>

           <form method="POST" action="<?php echo e(route('client.avis.soumettre', ['num' => $num])); ?>" class="form-avis">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="historique_id" value="<?php echo e($trajet->id); ?>">

               
            <div style="margin-bottom: 1rem;">
                <label style="font-weight:600; color:#444; display:block; margin-bottom:0.5rem;">
                    Note * 
                </label>
                <div class="stars-input" id="stars_<?php echo e($trajet->id); ?>">
                    <?php for($i = 5; $i >= 1; $i--): ?>
                        <input type="radio" 
                            name="note_chauffeur" 
                            id="star<?php echo e($trajet->id); ?>_<?php echo e($i); ?>"
                            value="<?php echo e($i); ?>">
                        <label for="star<?php echo e($trajet->id); ?>_<?php echo e($i); ?>" 
                            title="<?php echo e($i); ?> étoile(s)">★</label>
                    <?php endfor; ?>
                </div>
                <small style="color:#999;">Cliquez sur une étoile pour noter</small>
            </div>

                <textarea class="form-textarea" name="avis_client"
                          placeholder="Décrivez votre expérience avec ce chauffeur... (optionnel)"></textarea>

                <button type="submit" class="btn-soumettre">
                    Envoyer mon avis ✅
                </button>
            </form>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        
        <div class="section-title" style="margin-top: 2rem;">
            Vos avis récents
            <span style="font-size:0.9rem; color:#999; font-weight:normal;">
                <?php echo e($totalAvis); ?> avis
            </span>
        </div>

        <?php $__empty_1 = true; $__currentLoopData = $avis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unAvis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="avis-card">
            <div class="avis-card-top">
                <div class="chauffeur-info">
                    <div class="chauffeur-avatar">
                        <?php echo e(strtoupper(substr($unAvis->chauffeur->name ?? '?', 0, 2))); ?>

                    </div>
                    <div>
                        <div class="chauffeur-nom"><?php echo e($unAvis->chauffeur->name ?? 'Chauffeur inconnu'); ?></div>
                        <div class="chauffeur-vehicule">🚙 <?php echo e(ucfirst($unAvis->vehicule_type)); ?></div>
                    </div>
                </div>
                <div class="avis-meta">
                    <div class="avis-date">
                        <?php echo e($unAvis->date_heure_depart
                            ? $unAvis->date_heure_depart->format('d/m/Y')
                            : '--'); ?>

                    </div>
                    <div class="avis-stars">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <?php echo e($i <= $unAvis->note_chauffeur ? '★' : '☆'); ?>

                        <?php endfor; ?>
                    </div>
                </div>
            </div>

            <div class="avis-route">
                <span>📍 <?php echo e($unAvis->depart); ?></span>
                <span class="fleche">→</span>
                <span>🏁 <?php echo e($unAvis->destination); ?></span>
                <span style="margin-left:auto; font-weight:bold; color:#667eea;">
                    <?php echo e(number_format($unAvis->prix, 2, ',', ' ')); ?> €
                </span>
            </div>

            <?php if($unAvis->avis_client): ?>
            <div class="avis-comment">
                "<?php echo e($unAvis->avis_client); ?>"
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="no-avis">
            <div class="no-avis-icon">⭐</div>
            <p>Vous n'avez encore donné aucun avis.</p>
        </div>
        <?php endif; ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/ahmed/UrbanDrive/resources/views/avisSurChauffeur.blade.php ENDPATH**/ ?>