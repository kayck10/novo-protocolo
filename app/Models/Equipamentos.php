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

    public function protocolo()
    {
        return $this->belongsTo(ProtocoloEntrada::class, 'id_protocolo', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function setorEscola()
    {
        return $this->belongsTo(SetorEscola::class, 'id_setor_escolas');
    }

    public function tiposEquipamentos()
    {
        return $this->belongsTo(TiposEquipamentos::class, 'id_tipos_equipamentos');
    }
}


