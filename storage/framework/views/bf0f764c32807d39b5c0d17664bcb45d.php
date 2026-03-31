<?php $__env->startSection('title', 'Historique des Trajets - Urban Drive'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .historique-container {
        max-width: 1000px; margin: 0 auto; background: white;
        border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    .historique-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white; padding: 2.5rem; text-align: center;
    }
    .historique-header h1 { margin-bottom: 0.5rem; font-size: 2rem; }
    .header-subtitle { opacity: 0.9; font-size: 1.1rem; margin-bottom: 1rem; }
    .header-actions { display: flex; justify-content: center; gap: 1rem; margin-top: 1rem; }
    .btn-white {
        padding: 0.7rem 1.5rem; border-radius: 5px; text-decoration: none;
        font-weight: bold; background: rgba(255,255,255,0.2);
        color: white; border: 2px solid white; transition: all 0.3s ease;
    }
    .btn-white:hover { background: white; color: #667eea; }
    .btn-blue {
        padding: 0.7rem 1.5rem; border-radius: 5px; text-decoration: none;
        font-weight: bold; background: #2196F3; color: white; transition: all 0.3s ease;
    }
    .btn-blue:hover { background: #1976D2; }
    .historique-content { padding: 2.5rem; }
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
    .filters-section {
        background: #f8f9fa; border-radius: 10px;
        padding: 1.5rem; margin-bottom: 2rem;
        display: flex; align-items: center; gap: 1rem; flex-wrap: wrap;
    }
    .filters-label { font-weight: 600; color: #444; white-space: nowrap; }
    .filters { display: flex; gap: 0.8rem; flex-wrap: wrap; }
    .filter-btn {
        padding: 0.5rem 1.2rem; background: white;
        border: 2px solid #e0e0e0; border-radius: 20px;
        cursor: pointer; transition: all 0.3s ease; font-size: 0.9rem;
    }
    .filter-btn.active { background: #667eea; color: white; border-color: #667eea; }
    .filter-btn:hover:not(.active) { border-color: #667eea; color: #667eea; }
    .section-title {
        font-size: 1.4rem; font-weight: bold; color: #333;
        margin-bottom: 1.5rem; padding-bottom: 0.7rem;
        border-bottom: 2px solid #667eea;
        display: flex; justify-content: space-between; align-items: center;
    }
    .trajets-count { font-size: 0.9rem; color: #999; font-weight: normal; }
    .trajet-card {
        background: white; border: 2px solid #e0e0e0;
        border-radius: 12px; padding: 1.8rem; margin-bottom: 1.5rem;
        transition: all 0.3s ease;
        display: flex; flex-direction: column;
    }
    .trajet-card:hover {
        box-shadow: 0 6px 20px rgba(102,126,234,0.15);
        border-color: #667eea; transform: translateY(-3px);
    }
    .trajet-top {
        display: flex; justify-content: space-between;
        align-items: center; margin-bottom: 1.5rem;
    }
    .trajet-date { font-weight: bold; color: #333; font-size: 1rem; }
    .trajet-id { color: #999; font-size: 0.85rem; margin-top: 0.2rem; }
    .trajet-statut { padding: 0.4rem 1rem; border-radius: 20px; font-size: 0.85rem; font-weight: bold; }
    .statut-terminee   { background: #d4edda; color: #155724; }
    .statut-annulee    { background: #f8d7da; color: #721c24; }
    .statut-en_attente { background: #fff3cd; color: #856404; }
    .statut-en_cours   { background: #cce5ff; color: #004085; }
    .trajet-route {
        display: grid; grid-template-columns: 1fr 60px 1fr;
        gap: 1rem; align-items: center; margin-bottom: 1.5rem;
        background: #f8f9fa; border-radius: 10px; padding: 1.2rem;
    }
    .lieu { text-align: center; }
    .lieu-badge {
        display: inline-block; font-size: 0.75rem; font-weight: bold;
        padding: 0.2rem 0.6rem; border-radius: 10px; margin-bottom: 0.4rem;
    }
    .lieu-depart  { background: #d4edda; color: #155724; }
    .lieu-arrivee { background: #cce5ff; color: #004085; }
    .lieu-nom { font-weight: bold; color: #333; font-size: 0.95rem; }
    .lieu-horaire { color: #666; font-size: 0.85rem; margin-top: 0.2rem; }
    .trajet-fleche { text-align: center; font-size: 1.8rem; color: #667eea; }
    .trajet-infos {
        display: flex; gap: 1rem; flex-wrap: wrap;
        padding-top: 1.2rem; border-top: 1px solid #e0e0e0;
        justify-content: space-between; align-items: center;
        margin-top: auto;
    }
    .info-badge { display: flex; align-items: center; gap: 0.4rem; color: #555; font-size: 0.9rem; }
    .info-badge span { font-size: 1.1rem; }
    .trajet-prix { font-weight: bold; color: #667eea; font-size: 1.2rem; }
    .trajet-note { display: flex; gap: 0.2rem; align-items: center; }
    .star-filled { color: #FFD700; }
    .star-empty  { color: #e0e0e0; }
    .trajet-boutons { min-height: 42px; display: flex; align-items: center; gap: 1rem; }
    .btn-annuler {
        padding: 0.5rem 1.2rem; background: #dc3545; color: white;
        border: none; border-radius: 8px; font-size: 0.9rem;
        cursor: pointer; transition: all 0.3s ease; font-weight: bold;
    }
    .btn-annuler:hover { background: #c82333; transform: translateY(-2px); }
    .btn-terminer {
        padding: 0.5rem 1.2rem; background: #28a745; color: white;
        border: none; border-radius: 8px; font-size: 0.9rem;
        cursor: pointer; transition: all 0.3s ease; font-weight: bold;
    }
    .btn-terminer:hover { background: #218838; transform: translateY(-2px); }
    .btn-demarrer {
        padding: 0.5rem 1.2rem; background: #fd7e14; color: white;
        border: none; border-radius: 8px; font-size: 0.9rem;
        cursor: pointer; transition: all 0.3s ease; font-weight: bold;
    }
    .btn-demarrer:hover { background: #e8690c; transform: translateY(-2px); }
    .btn-avis {
        padding: 0.5rem 1.2rem; background: #FFD700; color: #333;
        border: none; border-radius: 8px; font-size: 0.9rem;
        cursor: pointer; transition: all 0.3s ease; font-weight: bold;
        text-decoration: none; display: inline-block;
    }
    .btn-avis:hover { background: #e6c200; transform: translateY(-2px); }
    .no-trajets { text-align: center; padding: 4rem 2rem; color: #666; }
    .no-trajets-icon { font-size: 4rem; margin-bottom: 1rem; opacity: 0.4; }
    .no-trajets p { font-size: 1.1rem; margin-bottom: 1.5rem; }
    .btn-reserver {
        display: inline-block; padding: 0.8rem 2rem;
        background: #667eea; color: white; text-decoration: none;
        border-radius: 8px; font-weight: bold; transition: all 0.3s ease;
    }
    .btn-reserver:hover { background: #5a6fd8; transform: translateY(-2px); }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="historique-container">

    <div class="historique-header">
        <h1>📊 Historique des Trajets</h1>
        <div class="header-subtitle"><?php echo e(Auth::user()->name); ?> — Tous vos trajets en un coup d'œil</div>
        <div class="header-actions">
            <a href="/client/<?php echo e($num); ?>" class="btn-white">← Retour à l'espace client</a>
            <a href="/client/<?php echo e($num); ?>/reservation" class="btn-blue">🚗 Nouvelle réservation</a>
        </div>
    </div>

    <div class="historique-content">

        <?php
            $totalTrajets = $historique->count();
            $totalDepense = $historique->sum('prix');
            $nbChauffeurs = $historique->unique('chauffeur_id')->count();
            $noteMoyenne  = $historique->whereNotNull('note_chauffeur')->avg('note_chauffeur');
        ?>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">🚗</div>
                <div class="stat-number"><?php echo e($totalTrajets); ?></div>
                <div class="stat-label">Trajets effectués</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">👤</div>
                <div class="stat-number"><?php echo e($nbChauffeurs); ?></div>
                <div class="stat-label">Chauffeurs différents</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">⭐</div>
                <div class="stat-number"><?php echo e($noteMoyenne ? number_format($noteMoyenne, 1) : '--'); ?></div>
                <div class="stat-label">Note moyenne donnée</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">💶</div>
                <div class="stat-number"><?php echo e(number_format($totalDepense, 2, ',', ' ')); ?> €</div>
                <div class="stat-label">Total dépensé</div>
            </div>
        </div>

        <div class="filters-section">
            <div class="filters-label">Filtrer :</div>
            <div class="filters">
                <button class="filter-btn active" data-statut="tous">Tous</button>
                <button class="filter-btn" data-statut="terminée">✅ Terminés</button>
                <button class="filter-btn" data-statut="en_attente">⏳ En attente</button>
                <button class="filter-btn" data-statut="en_cours">🔄 En cours</button>
                <button class="filter-btn" data-statut="annulée">❌ Annulés</button>
            </div>
        </div>

        <div class="section-title">
            Derniers trajets
            <span class="trajets-count"><?php echo e($totalTrajets); ?> trajet(s)</span>
        </div>

        <?php $__empty_1 = true; $__currentLoopData = $historique; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trajet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="trajet-card" data-statut="<?php echo e($trajet->statut); ?>">

                
                <div class="trajet-top">
                    <div>
                        <div class="trajet-date">
                            <?php echo e($trajet->date_heure_depart
                                ? $trajet->date_heure_depart->format('d/m/Y à H:i')
                                : 'Date non définie'); ?>

                        </div>
                        <div class="trajet-id">#<?php echo e($trajet->id); ?></div>
                    </div>
                    <div class="trajet-statut statut-<?php echo e($trajet->statut); ?>">
                        <?php echo e(ucfirst(str_replace('_', ' ', $trajet->statut))); ?>

                    </div>
                </div>

                
                <div class="trajet-route">
                    <div class="lieu">
                        <div class="lieu-badge lieu-depart">Départ</div>
                        <div class="lieu-nom"><?php echo e($trajet->depart); ?></div>
                        <div class="lieu-horaire">
                            <?php echo e($trajet->date_heure_depart
                                ? $trajet->date_heure_depart->format('H:i')
                                : '--'); ?>

                        </div>
                    </div>
                    <div class="trajet-fleche">→</div>
                    <div class="lieu">
                        <div class="lieu-badge lieu-arrivee">Arrivée</div>
                        <div class="lieu-nom"><?php echo e($trajet->destination); ?></div>
                        <div class="lieu-horaire">
                            <?php echo e($trajet->date_heure_arrivee
                                ? $trajet->date_heure_arrivee->format('H:i')
                                : '--'); ?>

                        </div>
                    </div>
                </div>

                
                <div class="trajet-infos">

                    
                    <div style="display:flex; gap:1.5rem; flex-wrap:wrap; align-items:center;">
                        <div class="info-badge">
                            <span>🚙</span> <?php echo e(ucfirst($trajet->vehicule_type)); ?>

                        </div>
                        <?php if($trajet->distance_km): ?>
                            <div class="info-badge">
                                <span>📏</span> <?php echo e($trajet->distance_km); ?> km
                            </div>
                        <?php endif; ?>
                        <?php if($trajet->chauffeur): ?>
                            <div class="info-badge">
                                <span>👤</span> <?php echo e($trajet->chauffeur->name); ?>

                            </div>
                        <?php endif; ?>
                        <?php if($trajet->note_chauffeur): ?>
                            <div class="trajet-note">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <span class="<?php echo e($i <= $trajet->note_chauffeur ? 'star-filled' : 'star-empty'); ?>">★</span>
                                <?php endfor; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    
                    <div class="trajet-boutons">
                        <div class="trajet-prix"><?php echo e(number_format($trajet->prix, 2, ',', ' ')); ?> €</div>

                        <?php if($trajet->statut === 'en_attente' && $trajet->reservation_id): ?>
                            <form method="POST"
                                  action="<?php echo e(route('client.annuler', ['num' => $num, 'reservation' => $trajet->reservation_id])); ?>"
                                  onsubmit="return confirm('Confirmer l\'annulation de cette réservation ?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn-annuler">❌ Annuler</button>
                            </form>
                            <form method="POST"
                                  action="<?php echo e(route('client.demarrer', ['num' => $num, 'historique' => $trajet->id])); ?>"
                                  onsubmit="return confirm('Confirmer le démarrage de cette course ?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <button type="submit" class="btn-demarrer">🚗 Démarrer</button>
                            </form>
                        <?php endif; ?>

                        <?php if($trajet->statut === 'en_cours'): ?>
                            <form method="POST"
                                  action="<?php echo e(route('client.terminer', ['num' => $num, 'historique' => $trajet->id])); ?>"
                                  onsubmit="return confirm('Confirmer la fin de cette course ?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <button type="submit" class="btn-terminer">✅ Terminer</button>
                            </form>
                        <?php endif; ?>

                        <?php if($trajet->statut === 'terminee' && is_null($trajet->note_chauffeur)): ?>
                            <a href="<?php echo e(route('client.avis', ['num' => $num])); ?>" class="btn-avis">
                                ⭐ Donner un avis
                            </a>
                        <?php endif; ?>
                    </div>

                </div>
                

            </div>
            

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="no-trajets">
                <div class="no-trajets-icon">🚗</div>
                <p>Vous n'avez encore effectué aucun trajet.</p>
                <a href="/client/<?php echo e($num); ?>/reservation" class="btn-reserver">
                    Réserver mon premier trajet
                </a>
            </div>
        <?php endif; ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const statut = this.dataset.statut;
            document.querySelectorAll('.trajet-card').forEach(card => {
                card.style.display = (statut === 'tous' || card.dataset.statut === statut)
                    ? 'block' : 'none';
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/ahmed/UrbanDrive/resources/views/historiqueClient.blade.php ENDPATH**/ ?>