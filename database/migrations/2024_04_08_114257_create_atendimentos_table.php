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
                $table->unsignedBigInteger('id_local')->nullable();
                $table->foreign('id_local')->references('id')->on('local');
                $table->unsignedBigInteger('id_equipamento')->nullable();
                $table->foreign('id_equipamento')->references('id')->on('equipamentos');
                $table->unsignedBigInteger('id_status')->default(1)->nullable();
                $table->foreign('id_status')->references('id')->on('status_atendimentos');
                $table->unsignedBigInteger('id_user')->nullable();
                $table->foreign('id_user')->references('id')->on('users');
                $table->text('desc_problema')->nullable();
                $table->text('solucao')->nullable();
                $table->boolean('prioridade')->default(false);
                $table->date('data');
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
