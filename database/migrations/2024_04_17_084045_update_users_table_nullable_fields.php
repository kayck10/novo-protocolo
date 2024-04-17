<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTableNullableFields extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('data_nascimento')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('data_nascimento')->change();
        });
    }
}
