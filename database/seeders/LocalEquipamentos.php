<?php

namespace Database\Seeders;

use App\Models\Equipamentos;
use Illuminate\Database\Seeder;

class LocalEquipamentos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Equipamentos::create(['local' => 'Laboratório']);
        Equipamentos::create(['local' => 'Secretária']);
        Equipamentos::create(['local' => 'Diretoria']);
        Equipamentos::create(['local' => 'Sala de Professor']);
        Equipamentos::create(['local' => 'AEE']);
        Equipamentos::create(['local' => 'Outros']);

    }
}
