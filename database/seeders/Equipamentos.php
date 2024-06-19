<?php

namespace Database\Seeders;
use App\Models\TiposEquipamentos;
use Illuminate\Database\Seeder;

class Equipamentos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        TiposEquipamentos::create(['desc' => 'Computador']);
        TiposEquipamentos::create(['desc' => 'Notebook']);
        TiposEquipamentos::create(['desc' => 'Impressora']);
        TiposEquipamentos::create(['desc' => 'Estabilizador']);
        TiposEquipamentos::create(['desc' => 'Monitor']);
        TiposEquipamentos::create(['desc' => 'Projetor']);
        TiposEquipamentos::create(['desc' => 'Roteador']);
        TiposEquipamentos::create(['desc' => 'Tablet']);
        TiposEquipamentos::create(['desc' => 'NoBreak']);
        TiposEquipamentos::create(['desc' => 'Lousa Digital']);
        TiposEquipamentos::create(['desc' => 'ChromeBook']);
        TiposEquipamentos::create(['desc' => 'All in one']);

    }
}
