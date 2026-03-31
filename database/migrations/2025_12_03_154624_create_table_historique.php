<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historique', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('chauffeur_id')->nullable()->constrained('users')->onDelete('set null');

            // ✅ Lien vers la réservation d'origine
           $table->unsignedBigInteger('reservation_id')->nullable();
           $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('set null');

            $table->string('depart');
            $table->string('destination');
            $table->decimal('distance_km', 8, 2)->nullable(); // ✅ nullable car inconnu à la réservation
            $table->decimal('prix', 8, 2);

            // ✅ Types harmonisés
            $table->enum('vehicule_type', ['eco', 'standard', 'comfort', 'premium'])
                  ->default('standard');

            $table->enum('statut', [
                'en_attente', 'acceptee', 'en_cours',
                'terminee', 'annulee'
            ])->default('en_attente');

            $table->timestamp('date_heure_depart')->nullable();
            $table->timestamp('date_heure_arrivee')->nullable();
            $table->text('notes')->nullable();
            $table->decimal('note_chauffeur', 2, 1)->nullable();
            $table->text('avis_client')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historique');
    }
};