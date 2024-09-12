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
        return view('usuario.cadastro_usuario');
    }

    public function store(Request $request)
    {

        $cpf = preg_replace('/[^0-9]/', '', $request->cpf);
        $usuario = new users();
        $usuario->nome = $request->nome;
        $usuario->cpf = $cpf;
        $usuario->senha = Hash::make($request->senha);
        if ($usuario->save()) {
            return redirect('/')->with('success', 'Cadastro realizado com sucesso!');

        }
        return redirect('/cadastro-usuario')->with('error', 'Erro ao realizar cadastro.');
    }

    public function show()
    {
    }
    function gerarSenha($comprimento = 8)
    {
        $letrasMaiusculas = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $letrasMinusculas = 'abcdefghijklmnopqrstuvwxyz';
        $numeros = '0123456789';
        $caracteresEspeciais = '!@#$%^&*()_+-=[]{}|;:,.<>?';
        $senha = '';
        $senha .= $letrasMaiusculas[rand(0, strlen($letrasMaiusculas) - 1)];
        $senha .= $letrasMinusculas[rand(0, strlen($letrasMinusculas) - 1)];
        $senha .= $numeros[rand(0, strlen($numeros) - 1)];
        $senha .= $caracteresEspeciais[rand(0, strlen($caracteresEspeciais) - 1)];

        $todosCaracteres = $letrasMaiusculas . $letrasMinusculas . $numeros . $caracteresEspeciais;
        for ($i = strlen($senha); $i < $comprimento; $i++) {
            $senha .= $todosCaracteres[rand(0, strlen($todosCaracteres) - 1)];
        }

        $senha = str_shuffle($senha);

        return $senha;
    }
}
