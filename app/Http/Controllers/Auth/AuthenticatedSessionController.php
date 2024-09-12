<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');  // Use sua view de login existente
    }

    public function store(Request $request)
    {
        $credentials = $request->only('cpf', 'password');
        $cpf = preg_replace('/[^0-9]/', '', $request->cpf);
        $credentials['cpf'] = $cpf;
        if ($this->validarLogin($credentials)) {
            $request->authenticate();
            $request->session()->regenerate();
            return redirect()->intended('inicio');
        } else {
            return redirect('/')->with('error', 'Usuário ou senha incorretos.');
        }
    }

    public function validarLogin($credentials)
    {
        $user = users::where('cpf', $credentials['cpf'])->first();

        if ($user && Hash::check($credentials['password'], $user->senha)) {
            return true;
        }

        return false;
    }

//    public function edit()
//    {
//        $usuario = usuarioexterno::findOrFail(Auth::id());
//
//        return view('usuario.editar-usuario', ['usuario' => $usuario]);
//    }

//    public function update(Request $request)
//    {
//
//        $usuario = usuarioexterno::findOrFail(Auth::id());
//
//            try {
//                $usuario->name = $request->nome_completo;
//                $usuario->email = $request->email;
//                $usuario->nomesocial = $request->nome_social;
//                $usuario->telefone = preg_replace('/[^0-9]/', '', $request->telefone);
//                $usuario->dtnascimento = $request->data_nascimento;
//                $usuario->sexo = $request->sexo;
//                if ($request->senha) {
//                    $usuario->password = Hash::make($request->senha);
//                }
//                $usuario->save();
//                $this->sendEmail('Alteração de cadastro', $usuario->name, $usuario->email);
//
//                return redirect('/inicio')->with('success', 'Cadastro alterado com sucesso!');
//            } catch (\Exception $e) {
//                return redirect('/editar-usuario')->with('error', 'Erro ao alterar o cadastro.');
//
//        }
//    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
