<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\emailController;



class RegisteredUserController extends Controller
{

    public function create()
    {
        return view('inicio.manutencao');
    }

    public function verificar(Request $request)
    {
        $cpf = preg_replace('/[^0-9]/', '', $request->query('cpf'));
        $funcionario = users::where('cpf', $cpf)
            ->select('nome', 'permissao_id')
            ->first();

        if ($funcionario) {
            return response()->json([
                'exists' => true,
                'nome' => $funcionario->nome,
                'permissao' => $funcionario->permissao_id
            ]);
        }

        return response()->json(['exists' => false]);
    }

    public function store(Request $request)
    {

        $cpf = preg_replace('/[^0-9]/', '', $request->cpf);
        $usuario = new users();
        $usuario->nome = $request->nome;
        $usuario->cpf = $cpf;
        $usuario->senha = Hash::make($request->senha);
        if ($usuario->save()) {
            return redirect('/manutencao')->with('success', 'Cadastro realizado com sucesso!');

        }
        return redirect('/cadastro-usuario')->with('error', 'Erro ao realizar cadastro.');
    }

    public function update(Request $request)
    {
        $cpf = preg_replace('/[^0-9]/', '', $request->cpf);
        $usuario = users::where('cpf', $cpf)->first();
        $usuario->nome = $request->nome;
        $usuario->senha = Hash::make($request->senha);
        if ($usuario->permissao != 1) {
            $usuario->permissao = $request->permissao;
        }
        if ($usuario->save()) {
            return redirect('/manutencao')->with('success', 'Usuário alterado com sucesso!');
        }
        return redirect('/manutencao')->with('error', 'Erro ao alterar usuário.');
    }
}
