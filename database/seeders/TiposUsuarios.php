<?php

namespace Database\Seeders;

use App\Models\TiposUsuarios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiposUsuarios extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TiposUsuarios::create(['desc' => 'Administrador do Sistema']);

    }
}
