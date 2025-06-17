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
        $table->dropForeign(['diretor_id']);
        $table->dropColumn('diretor_id');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('filmes', function (Blueprint $table) {
        $table->unsignedBigInteger('diretor_id')->nullable();
        $table->foreign('diretor_id')->references('id')->on('diretores')->onDelete('cascade');
    });
}
};
