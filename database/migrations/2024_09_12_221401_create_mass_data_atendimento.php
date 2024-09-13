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
        $atendimentos = [
            ['cpf' => '12345678901', 'atendido' => 'N', 'data_hora_atendimento' => '2024-10-01 10:00:00'],
            ['cpf' => '23456789012', 'atendido' => 'N', 'data_hora_atendimento' => '2024-10-01 11:00:00'],
            ['cpf' => '34567890123', 'atendido' => 'N', 'data_hora_atendimento' => '2024-10-01 12:00:00'],
            ['cpf' => '45678901234', 'atendido' => 'N', 'data_hora_atendimento' => '2024-10-01 13:00:00'],
            ['cpf' => '56789012345', 'atendido' => 'N', 'data_hora_atendimento' => '2024-10-01 14:00:00'],
            ['cpf' => '67890123456', 'atendido' => 'N', 'data_hora_atendimento' => '2024-10-01 15:00:00'],
            ['cpf' => '78901234567', 'atendido' => 'N', 'data_hora_atendimento' => '2024-10-01 16:00:00'],
            ['cpf' => '89012345678', 'atendido' => 'N', 'data_hora_atendimento' => '2024-10-01 17:00:00'],
            ['cpf' => '90123456789', 'atendido' => 'N', 'data_hora_atendimento' => '2024-10-01 18:00:00'],
            ['cpf' => '01234567890', 'atendido' => 'N', 'data_hora_atendimento' => '2024-10-01 19:00:00'],
        ];

        DB::table('atendimento')->insert($atendimentos);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('atendimento')->whereIn('cpf', [
            '12345678901', '23456789012', '34567890123', '45678901234', '56789012345', '67890123456', '78901234567', '89012345678', '90123456789', '01234567890'
        ])->delete();
    }
};
