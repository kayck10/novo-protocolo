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
        'id_protocolo',
        'tombamento',
        'solucao',
        'id_local',
        'acessorios',
        'inservivel',
        'data_entrada',
        'id_setor_escolas',
        'prioridade',
        'id_status',
        'id_users'
    ];

    public function protocolo () {
        return $this->belongsTo(ProtocoloEntrada::class, 'id_protocolo', 'id');
    }

    public function SetorEscola()
    {
        return $this->belongsTo(SetorEscola::class, 'id_setor_escolas');
    }
}

