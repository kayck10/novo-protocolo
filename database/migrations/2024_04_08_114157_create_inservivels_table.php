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
        Schema::create('inservivels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_problema')->nullable();
            $table->foreign('id_problema')->references('id')->on('problemas');
            $table->unsignedBigInteger('id_equipamento')->nullable();
            $table->foreign('id_equipamento')->references('id')->on('equipamentos');
            $table->text('marca');
            $table->text('modelo');
            $table->text('num_serie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inservivels');
    }
};
