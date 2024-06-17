<?php

namespace Database\Seeders;

use App\Models\StatusManutecoes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class statusManutencoes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusManutecoes::create(['desc' => 'Em Aberto']);
        StatusManutecoes::create(['desc' => 'Em Andamento']);
        StatusManutecoes::create(['desc' => 'Finalizado']);
        StatusManutecoes::create(['desc' => 'Prioridade']);

    }
}
