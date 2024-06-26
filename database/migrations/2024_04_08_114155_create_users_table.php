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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('id_tipos_usuarios');
            $table->foreign('id_tipos_usuarios')->references('id')->on('tipos_usuarios');
            $table->unsignedBigInteger('id_funcoes');
            $table->foreign('id_funcoes')->references('id')->on('funcoes');
            $table->unsignedBigInteger('id_situacao');
            $table->foreign('id_situacao')->references('id')->on('situacaos');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('usuario');
            $table->date('data_nascimento')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
