<?php

namespace Database\Seeders;

use App\Models\SetorEscola;
use Illuminate\Database\Seeder;

class SetorEscolas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SetorEscola::create(['desc' => 'Laboratório']);
        SetorEscola::create(['desc' => 'Secretária']);
        SetorEscola::create(['desc' => 'Diretoria']);
        SetorEscola::create(['desc' => 'Sala de Professor']);
        SetorEscola::create(['desc' => 'AEE']);
        SetorEscola::create(['desc' => 'Outros']);
    }
}
