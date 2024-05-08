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
            $table->unsignedBigInteger('id_tipo')->nullable();
            $table->foreign('id_tipo')->references('id')->on('tipos_equipamentos');
            $table->text('desc')->nullable();
            $table->text('tombamento')->nullable();
            $table->text('local');
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
