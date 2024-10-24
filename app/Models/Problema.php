<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problema extends Model
{
    use HasFactory;
    protected $fillable = ['desc', 'tipo_equipamento_id'];

    public function tipoEquipamento()
    {
        return $this->belongsTo(TiposEquipamentos::class, 'tipo_equipamento_id');
    }
}
