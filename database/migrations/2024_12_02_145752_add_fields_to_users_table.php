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
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable(); // URL immagine profilo
            $table->text('bio')->nullable();      // Breve descrizione utente
            $table->string('gender')->nullable(); // Sesso
            $table->date('date_of_birth')->nullable(); // Data di nascita
            $table->timestamp('last_login_at')->nullable(); // Ultimo accesso
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['avatar', 'bio', 'last_login_at']);
        });
    }
};
