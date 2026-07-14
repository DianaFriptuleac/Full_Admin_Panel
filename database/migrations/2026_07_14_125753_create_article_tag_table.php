<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Crea tabella di collegamento tra article e tag
        Schema::create('article_tag', function (Blueprint $table) {
            $table->id();

            // Collegamento con la tabella articles
            $table->foreignId('article_id')
                ->constrained()
                ->cascadeOnDelete();

            // Collegamento con la tabella tags
            $table->foreignId('tag_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();

            // Impedisce di collegare due volte lo stesso tag allo stesso articolo
            $table->unique(['article_id', 'tag_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('article_tag');
    }
};