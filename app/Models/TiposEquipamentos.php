<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposEquipamentos extends Model
{
    use HasFactory;
    protected $fillable = ['desc', 'imagem'];

    public function problemas()
    {
        return $this->hasMany(Problema::class, 'tipo_equipamento_id');
    }
}
