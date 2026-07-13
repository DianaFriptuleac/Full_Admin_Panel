<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Aggiunge la data di pubblicazione (published_at) alla tabella articles
     */
    public function up(): void
    {
        // Modifica la tabella "articles"
        Schema::table('articles', function (Blueprint $table) {

            // Aggiunge una colonna di tipo timestamp per memorizzare la data e l'ora di pubblicazione
            $table->timestamp('published_at')
                // Permette che il campo sia vuoto (NULL)
                ->nullable()
                // Posiziona la colonna dopo "is_published"
                ->after('is_published');
        });
    }

    /**
     * Annulla la migration.
     * Rimuove la colonna "published_at" dalla tabella "articles"
     */
    public function down(): void
    {
        // Modifica nuovamente la tabella "articles"
        Schema::table('articles', function (Blueprint $table) {
            // Elimina la colonna "published_at"
            $table->dropColumn('published_at');
        });
    }
};
