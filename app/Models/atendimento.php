<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class atendimento extends Model
{
    use HasFactory;
    protected $table = 'atendimento';
    protected $fillable = [
        'id',
        'cpf',
        'atendido',
        'data_hora_atendimento',
        'updated_at',
        'created_at',
    ];
}
