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
        Schema::create('ideas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('status');
            // Crea una colonna di tipo VARCHAR per salvare il nome della categoria
            // (Questa colonna probabilmente è superflua se utilizzo category_id)
            $table->string('category');

            // Crea la colonna "category_id" come chiave esterna (Foreign Key)
            // Il metodo constrained() collega automaticamente category_id alla colonna id della tabella categories
            // cascadeOnDelete() fa sì che, se una categoria viene eliminata, vengano eliminate automaticamente anche tutte le idee collegate.
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();   // creo una relazione
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ideas');
    }
};
