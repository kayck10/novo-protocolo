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
        Schema::create('historicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipamento_id');
            $table->unsignedBigInteger('protocolo_entrada_id');
            $table->timestamps();
            $table->foreign('equipamento_id')->references('id')->on('equipamentos')->onDelete('cascade');
            $table->foreign('protocolo_entrada_id')->references('id')->on('protocolo_entrada')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historicos');
    }
};
