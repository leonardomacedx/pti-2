<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $pacientes = [
            ['cpf' => '12345678901', 'nome' => 'Paciente 1', 'email' => 'paciente1@example.com', 'telefone' => '1111111111', 'data_nascimento' => '1990-01-01', 'sexo' => 'M', 'convenio' => 'Convenio 1'],
            ['cpf' => '23456789012', 'nome' => 'Paciente 2', 'email' => 'paciente2@example.com', 'telefone' => '2222222222', 'data_nascimento' => '1991-02-02', 'sexo' => 'F', 'convenio' => 'Convenio 2'],
            ['cpf' => '34567890123', 'nome' => 'Paciente 3', 'email' => 'paciente3@example.com', 'telefone' => '3333333333', 'data_nascimento' => '1992-03-03', 'sexo' => 'M', 'convenio' => 'Convenio 3'],
            ['cpf' => '45678901234', 'nome' => 'Paciente 4', 'email' => 'paciente4@example.com', 'telefone' => '4444444444', 'data_nascimento' => '1993-04-04', 'sexo' => 'F', 'convenio' => 'Convenio 4'],
            ['cpf' => '56789012345', 'nome' => 'Paciente 5', 'email' => 'paciente5@example.com', 'telefone' => '5555555555', 'data_nascimento' => '1994-05-05', 'sexo' => 'M', 'convenio' => 'Convenio 5'],
            ['cpf' => '67890123456', 'nome' => 'Paciente 6', 'email' => 'paciente6@example.com', 'telefone' => '6666666666', 'data_nascimento' => '1995-06-06', 'sexo' => 'F', 'convenio' => 'Convenio 6'],
            ['cpf' => '78901234567', 'nome' => 'Paciente 7', 'email' => 'paciente7@example.com', 'telefone' => '7777777777', 'data_nascimento' => '1996-07-07', 'sexo' => 'M', 'convenio' => 'Convenio 7'],
            ['cpf' => '89012345678', 'nome' => 'Paciente 8', 'email' => 'paciente8@example.com', 'telefone' => '8888888888', 'data_nascimento' => '1997-08-08', 'sexo' => 'F', 'convenio' => 'Convenio 8'],
            ['cpf' => '90123456789', 'nome' => 'Paciente 9', 'email' => 'paciente9@example.com', 'telefone' => '9999999999', 'data_nascimento' => '1998-09-09', 'sexo' => 'M', 'convenio' => 'Convenio 9'],
            ['cpf' => '01234567890', 'nome' => 'Paciente 10', 'email' => 'paciente10@example.com', 'telefone' => '0000000000', 'data_nascimento' => '1999-10-10', 'sexo' => 'F', 'convenio' => 'Convenio 10'],
        ];

        DB::table('pacientes')->insert($pacientes);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('pacientes')->whereIn('cpf', [
            '12345678901', '23456789012', '34567890123', '45678901234', '56789012345', '67890123456', '78901234567', '89012345678', '90123456789', '01234567890'
        ])->delete();
    }
};
