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
            // Adiciona a coluna diretor_id como unsigned big integer
            $table->unsignedBigInteger('diretor_id')->after('user_id');
            
            // Cria a chave estrangeira referenciando a tabela diretores
            $table->foreign('diretor_id')
                  ->references('id')
                  ->on('diretores')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('filmes', function (Blueprint $table) {
            // Remove a chave estrangeira primeiro
            $table->dropForeign(['diretor_id']);
            
            // Remove a coluna diretor_id
            $table->dropColumn('diretor_id');
        });
    }
};