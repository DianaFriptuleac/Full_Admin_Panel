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
        // Modifico la tabella "categories" già esistente
        Schema::table('categories', function (Blueprint $table) {
            // Aggiungo una nuova colonna "name" di tipo VARCHAR(255)
            // after('id') indica che la colonna verrà posizionata subito dopo la colonna "id"
            $table->string('name')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Modifica la tabella "categories"
        Schema::table('categories', function (Blueprint $table) {
            // Elimina la colonna "name" dalla tabella
            $table->dropColumn('name');
        });
    }
};
/*
Nel mio caso, inizialmente la migration di creazione della tabella aveva un errore:
$table->sting('name'); invece di $table->string('name');
Quando ho eseguito: php artisan migrate
Laravel ha interrotto la migration con un errore e la colonna name non è stata creata
Per aggiungerla senza eliminare tutta la tabella, ho creato una nuova migration di modifica, usando:

Schema::table('categories', function (Blueprint $table) {
    $table->string('name')->after('id');
});
Questa non crea una nuova tabella, ma modifica una tabella già esistente, aggiungendo la colonna name
 */
