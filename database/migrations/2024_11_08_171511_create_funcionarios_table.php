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
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->unsignedBigInteger('id'); // Cria a coluna idFuncionario
            $table->integer('matricula'); // Cria a coluna matricula
            $table->string('login', 15); // Cria a coluna login
            $table->string('senha', 10); // Cria a coluna senha

            // Define idFuncionario como chave estrangeira
            $table->foreign('id')
                  ->references('id')
                  ->on('usuarios')
                  ->onDelete('cascade');

            // Define idFuncionario como chave primária
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
