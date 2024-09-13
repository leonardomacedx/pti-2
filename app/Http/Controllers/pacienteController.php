<?php

namespace App\Http\Controllers;

use App\Models\paciente;
use Illuminate\Http\Request;

class pacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cpf = session('cpf');
        return view ('inicio.cadastro-paciente', ['cpf' => $cpf]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $cpf = preg_replace('/[.\-]/', '', $request->cpf);
        if (paciente::where('cpf', $cpf)->first()) {
            return redirect()->back()->with('error', 'CPF já cadastrado');
        }

        $paciente = new paciente();
        $paciente->cpf = $cpf;
        $paciente->nome = $request->nome;
        $paciente->email = $request->email;
        $paciente->telefone = $request->telefone;
        $paciente->data_nascimento = $request->data_nascimento;
        $paciente->sexo = $request->sexo;
        $paciente->convenio = $request->convenio;
        if ($paciente->save()) {
            session(['cpf' => $cpf]);
            return redirect()->route('cadastro-atendimento')->with('success', 'Paciente cadastrado com sucesso!');
        }
        return redirect()->back();
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
    public function destroy(string $id)
    {
        //
    }
}
