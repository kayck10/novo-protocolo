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
            $table->unsignedBigInteger('id_local');
            $table->foreign('id_local')->references('id')->on('local');
            $table->unsignedBigInteger('id_setor_escolas')->nullable();
            $table->foreign('id_setor_escolas')->references('id')->on('setor_escolas');
            $table->text('desc')->nullable();
            $table->text('tombamento')->nullable();
            $table->text('acessorios')->nullable();
            $table->boolean('inservivel')->nullable();
            $table->date('data_entrada');
            $table->timestamps();
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
