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
        Schema::create('itemPedidos', function (Blueprint $table) {
            // Cria as colunas necessárias
            $table->unsignedBigInteger('idPedido'); // Chave estrangeira para a tabela pedidos
            $table->unsignedBigInteger('idProduto'); // Chave estrangeira para a tabela produtos
            $table->integer('numItem'); // Número do item no pedido
            $table->double('valorUnitario', 10, 2); // Valor unitário com 10 dígitos no total e 2 decimais
            $table->integer('quantidade'); // Quantidade do produto
            $table->double('subtotal', 10, 2); // Subtotal com 10 dígitos no total e 2 decimais
            $table->text('observacoes')->nullable(); // Observações (opcional)
            $table->integer('status'); // Status do item

            // Define a chave primária composta
            $table->primary(['idPedido', 'numItem']);

            // Define as chaves estrangeiras
            $table->foreign('idPedido')
                  ->references('id')
                  ->on('pedidos')
                  ->onDelete('cascade');

            $table->foreign('idProduto')
                  ->references('id')
                  ->on('produtos')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itemPedidos');
    }
};
