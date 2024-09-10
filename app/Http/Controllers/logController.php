<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\log;

class logController extends Controller
{
    public function salvar($dados)
    {
        log::create([
            'id_inscricao' => $dados['inscricao_id'],
            'acao' => $dados['acao'],
            'updated_at' => $dados['updated_at'],
            'created_at' => $dados['created_at'],
            'user_idexterno' => $dados['user_idexterno'],
        ]);
    }
}
