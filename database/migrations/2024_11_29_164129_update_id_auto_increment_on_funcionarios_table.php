<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateIdAutoIncrementOnFuncionariosTable extends Migration
{
    public function up()
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->id()->change(); // Atualiza a coluna 'id' para ser auto-increment
        });
    }

    public function down()
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->change(); // Reverte a mudança, se necessário
        });
    }
}
