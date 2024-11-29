<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public $timestamps = false;

    // Campos que podem ser preenchidos via mass-assignment
    protected $fillable = ['idCliente', 'idFuncionario', 'horario', 'total'];

    /**
     * Relacionamento com o modelo Cliente.
     * Um pedido pertence a um cliente.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idCliente'); // Relaciona o idCliente ao modelo Cliente
    }

    /**
     * Relacionamento com o modelo Funcionario.
     * Um pedido pertence a um funcionário.
     */
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'idFuncionario'); // Relaciona o idFuncionario ao modelo Funcionario
    }
}
