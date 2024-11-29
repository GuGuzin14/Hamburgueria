<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['id', 'status'];  // Aqui você define os campos que podem ser preenchidos via mass-assignment

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id');  // Relacionamento com o usuário
    }
}