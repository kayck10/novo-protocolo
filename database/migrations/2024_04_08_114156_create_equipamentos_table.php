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
            $table->timestamps();
            $table->text('tombamento');
            $table->boolean('prioridade');
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
