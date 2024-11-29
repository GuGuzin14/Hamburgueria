<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionarios';

    protected $fillable = [
        'matricula',
        'login',
        'senha',
    ];

    public $timestamps = true; // Timestamps automáticos ativados (se necessário)
}
