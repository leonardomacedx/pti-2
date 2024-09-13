<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('atendimento', function (Blueprint $table) {
            $table->id();
            $table->string('cpf', 11);
            $table->foreign('cpf')->references('cpf')->on('pacientes');
            $table->char('atendido', 1)->default('N');
            $table->dateTime('data_hora_atendimento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atendimento');
    }
};
