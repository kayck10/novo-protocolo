<?php

namespace Database\Seeders;

use App\Models\StatusAtendimento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusAtendimentos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusAtendimento::create(['desc' => 'Em Aberto']);
        StatusAtendimento::create(['desc' => 'Em Andamento']);
        StatusAtendimento::create(['desc' => 'Finzalizado']);
    }
}
