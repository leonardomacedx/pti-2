<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class users extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nome',
        'cpf',
        'senha',
        'created_at',
        'updated_at',
    ];
}

