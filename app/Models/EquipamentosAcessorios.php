<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipamentosAcessorios extends Model
{
    use HasFactory;
    protected $fillable = ['id_equipamento', 'id_acessorio'];

}
