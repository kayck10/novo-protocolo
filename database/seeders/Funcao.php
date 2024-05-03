<?php

namespace Database\Seeders;

use App\Models\Funcoes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Funcao extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Funcoes::create(['desc' => 'Chefe do Setor']);
        Funcoes::create(['desc' => 'Técnico de Suporte']);
        Funcoes::create(['desc' => 'Programador']);
        Funcoes::create(['desc' => 'Estagiário Superior']);
        Funcoes::create(['desc' => 'Estagiário Técnico']);
        Funcoes::create(['desc' => 'Estagiário Médio']);
    }
}
