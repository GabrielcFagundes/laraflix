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
    Schema::table('filmes', function (Blueprint $table) {
        $table->string('subtitulo')->nullable();
        $table->string('imagem')->nullable();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::table('filmes', function (Blueprint $table) {
        $table->dropColumn(['subtitulo', 'imagem']);
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
    });
}

};
