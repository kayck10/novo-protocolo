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
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tipos_equipamentos')->nullable();
            $table->foreign('id_tipos_equipamentos')->references('id')->on('tipos_equipamentos');
            $table->unsignedBigInteger('id_protocolo');
            $table->foreign('id_protocolo')->references('id')->on('protocolo_entrada');
            $table->unsignedBigInteger('id_setor_escolas')->nullable();
            $table->foreign('id_setor_escolas')->references('id')->on('setor_escolas');
            $table->unsignedBigInteger('id_users')->nullable();
            $table->foreign('id_users')->references('id')->on('users');
            $table->timestamps();
            $table->text('desc')->nullable();
            $table->text('tombamento');
            $table->text('solucao')->nullable();
            $table->date('data_entrada')->nullable();
            $table->boolean('prioridade');
            $table->text('acessorios');
            $table->unsignedBigInteger('id_status')->nullable();
            $table->foreign('id_status')->references('id')->on('status_atendimentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipamentos');
    }
};
