<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Aggiunge title se manca
        if (! Schema::hasColumn('ideas', 'title')) {
            Schema::table('ideas', function (Blueprint $table) {
                $table->string('title')->after('id');
            });
        }

        // Aggiunge description se manca
        if (! Schema::hasColumn('ideas', 'description')) {
            Schema::table('ideas', function (Blueprint $table) {
                $table->text('description')->after('title');
            });
        }

        // Aggiunge status se manca
        if (! Schema::hasColumn('ideas', 'status')) {
            Schema::table('ideas', function (Blueprint $table) {
                $table->string('status')
                    ->default('pending')
                    ->after('description');
            });
        }

        // Aggiunge priority se manca
        if (! Schema::hasColumn('ideas', 'priority')) {
            Schema::table('ideas', function (Blueprint $table) {
                $table->string('priority')
                    ->default('medium')
                    ->after('status');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('ideas', 'priority')) {
            Schema::table('ideas', function (Blueprint $table) {
                $table->dropColumn('priority');
            });
        }

        if (Schema::hasColumn('ideas', 'status')) {
            Schema::table('ideas', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }

        if (Schema::hasColumn('ideas', 'description')) {
            Schema::table('ideas', function (Blueprint $table) {
                $table->dropColumn('description');
            });
        }

        if (Schema::hasColumn('ideas', 'title')) {
            Schema::table('ideas', function (Blueprint $table) {
                $table->dropColumn('title');
            });
        }
    }
};