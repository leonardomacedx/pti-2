<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'cpf',
        'nome',
        'email',
        'telefone',
        'data_nascimento',
        'sexo',
        'convenio',
        'created_at',
        'updated_at',
    ];
}
