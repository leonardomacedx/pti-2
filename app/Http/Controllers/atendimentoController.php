<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\atendimento;
use App\Models\paciente;
use Illuminate\Http\Request;

class atendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $atendimentos = atendimento::where('atendido', 'N')->get();
        return view('inicio.listar-atendimento', compact('atendimentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cpf = session('cpf');
        $dataHoraAtual = now()->format('Y-m-d H:i');
        return view('inicio.atendimento', ['dataHoraAtual' => $dataHoraAtual, 'cpf' => $cpf]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cpf = preg_replace('/[^0-9]/', '', $request->cpf);
        $pacienteExiste = paciente::where('cpf', $cpf)->first();
        if (!$pacienteExiste) {
            session(['cpf' => $cpf]);
            return redirect()->route('cadastro-paciente')->with('error', 'Paciente não cadastrado!');
        }
        $atendimento = new atendimento();
        $atendimento->cpf = $cpf;
        $atendimento->data_hora_atendimento = $request->datahora;
        if ($atendimento->save()) {
            return redirect()->route('inicio')->with('success', 'Atendimento cadastrado com sucesso!');
        }
        return redirect()->route('cadastro-atendimento')->with('error', 'Erro ao cadastrar atendimento!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $atendimento = atendimento::find($id);
        if ($atendimento) {
            $atendimento->atendido = 'S';
            $atendimento->save();
            return redirect()->route('inicio')->with('success', 'Atendimento marcado como atendido com sucesso!');
        }
        return redirect()->route('inicio')->with('error', 'Atendimento não encontrado!');
    }
}
