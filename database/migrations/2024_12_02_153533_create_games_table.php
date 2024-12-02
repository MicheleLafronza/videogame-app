<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cover_url')->nullable(); // Salviamo l'URL della copertura
            $table->text('description')->nullable(); // Se vuoi salvare una descrizione
            $table->date('release_date')->nullable();
            $table->json('genres')->nullable(); // Puoi salvare i generi in formato JSON
            $table->json('platforms')->nullable(); // Piattaforme del gioco
            $table->decimal('rating', 3, 2)->nullable(); // Se vuoi salvare un rating del gioco
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
