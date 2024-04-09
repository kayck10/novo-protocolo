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
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_local');
            $table->foreign('id_local')->references('id')->on('local');
            $table->unsignedBigInteger('id_equipamento');
            $table->foreign('id_equipamento')->references('id')->on('equipamentos');
            $table->unsignedBigInteger('id_status');
            $table->foreign('id_status')->references('id')->on('status_atendimentos');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->text('desc_problema');
            $table->boolean('prioridade');
            $table->boolean('externo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atendimentos');
    }
};
