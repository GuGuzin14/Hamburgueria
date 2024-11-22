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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id(); // Cria a coluna id como chave primária (auto incremento)
            $table->string('descricao', 30); // Cria a coluna descricao com até 30 caracteres
            $table->string('foto', 255); // Cria a coluna foto com até 255 caracteres
            $table->double('preco', 10, 2); // Cria a coluna preco com 10 dígitos no total e 2 casas decimais
            $table->integer('estoque'); // Cria a coluna estoque como inteiro
            $table->integer('tipo'); // Cria a coluna tipo como inteiro
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
