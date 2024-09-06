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
        Schema::table('equipamentos', function (Blueprint $table) {
            $table->text('marca')->nullable();
            $table->text('modelo')->nullable();
            $table->text('num_serie')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipamentos', function (Blueprint $table) {
            //
        });
    }
};
