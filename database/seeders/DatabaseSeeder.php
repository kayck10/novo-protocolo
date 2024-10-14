<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            Origens::class,
            Funcao::class,
            TiposUsuario::class,
            StatusAtendimentos::class,
            Equipamentos::class,
            SetorEscolas::class,
            Situacao::class,
            statusManutencoes::class,
        ]);
    }
}
