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
        Schema::create('equipamentos_acessorios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_equipamento');
            $table->foreign('id_equipamento')->references('id')->on('equipamentos');
            $table->unsignedBigInteger('id_acessorio');
            $table->foreign('id_acessorio')->references('id')->on('acessorios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipamentos_acessorios');
    }
};
