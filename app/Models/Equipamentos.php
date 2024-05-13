<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamentos extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_tipos_equipamentos',
        'desc',
        'tombamento',
        'id_local',
        'acessorios',
        'inservivel',
        'data_entrada',
        'id_setor_escolas'
    ];
}
