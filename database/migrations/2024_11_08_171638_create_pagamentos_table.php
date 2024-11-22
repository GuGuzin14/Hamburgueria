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
        Schema::create('pagamentos', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->id(); // Cria 'id' como unsignedBigInteger e chave primária
        $table->unsignedBigInteger('idPedido');
        $table->dateTime('horario');
        $table->double('valor', 10, 2);
        $table->string('tipo', 50);

        $table->foreign('idPedido')->references('id')->on('pedidos')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};
