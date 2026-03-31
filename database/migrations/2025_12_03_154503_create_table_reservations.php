<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('chauffeur_id')->nullable()->constrained('users')->onDelete('set null');

            // Informations de la course
            $table->string('adresse_depart');
            $table->string('adresse_arrivee');
            $table->string('ville_depart')->nullable();
            $table->string('ville_arrivee')->nullable();
            $table->decimal('distance_km', 6, 2)->nullable();
            $table->decimal('prix_estime', 8, 2);

            // ✅ Types harmonisés
            $table->enum('type_vehicule', ['eco', 'standard', 'comfort', 'premium'])
                  ->default('standard');

            // Statut
            $table->enum('statut', [
                'en_attente', 'acceptee', 'en_cours',
                'terminee', 'annulee', 'refusee'
            ])->default('en_attente');

            // ✅ Champs ajoutés manquants
            $table->integer('nombre_passagers')->default(1);
            $table->text('notes_client')->nullable();

            // Dates
            $table->timestamp('date_reservation')->useCurrent();
            $table->timestamp('date_depart_souhaitee')->nullable();
            $table->timestamp('date_prise_en_charge')->nullable();
            $table->timestamp('date_arrivee')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};