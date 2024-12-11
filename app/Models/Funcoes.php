<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcoes extends Model
{
    use HasFactory;

    protected $fillable = ['desc'];

    public function users()
    {
        return $this->hasMany(User::class, 'id_funcoes');
    }

    public function protocolo()
    {
        return $this->belongsTo(ProtocoloEntrada::class, 'id_protocolo', 'id');
    }
}
