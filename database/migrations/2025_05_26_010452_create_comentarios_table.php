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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filme_id');
            $table->unsignedBigInteger('user_id')->nullable(); // permite comentário anônimo
            $table->unsignedBigInteger('comentario_pai_id')->nullable(); // para respostas
            $table->string('autor')->nullable(); // nome do autor, se anônimo
            $table->text('conteudo');
            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('filme_id')->references('id')->on('filmes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('comentario_pai_id')->references('id')->on('comentarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
