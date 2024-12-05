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
        Schema::create('protocolo_entrada', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_local');
            $table->foreign('id_local')->references('id')->on('local');
            $table->datetime('data_entrada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('protocolo_entradas');
    }
};
