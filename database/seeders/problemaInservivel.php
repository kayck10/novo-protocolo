<?php

namespace Database\Seeders;

use App\Models\Problema;
use Illuminate\Database\Seeder;

class problemaInservivel extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Problema::create(['desc' => 'PLACA MÃE']);
        Problema::create(['desc' => 'PROCESSADOR']);
        Problema::create(['desc' => 'MEMÓRIA']);
        Problema::create(['desc' => 'GABINETE']);
        Problema::create(['desc' => 'PLACA DE REDE ETHERNET']);
        Problema::create(['desc' => 'VÍDEO INTEGRADO']);
    }
}
