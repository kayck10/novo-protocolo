<?php

namespace Database\Seeders;

use App\Models\Situacao as ModelsSituacao;
use Illuminate\Database\Seeder;

class Situacao extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       ModelsSituacao::create(['desc' => 'Ativo']);
       ModelsSituacao::create(['desc' => 'Inativo']);
    }
}
