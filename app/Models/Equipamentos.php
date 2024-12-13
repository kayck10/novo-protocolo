<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamentos extends Model
{
    use HasFactory;

    protected $table = "equipamentos";

    protected $fillable = [
        'id_tipos_equipamentos',
        'id_local',
        'tombamento',
        'inservivel',
        'id_setor_escolas',
        'prioridade',
        'id_status',

    ];

    public function protocolo()
    {
        return $this->belongsTo(ProtocoloEntrada::class, 'id_protocolo', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function setorEscola()
    {
        return $this->belongsTo(SetorEscola::class, 'id_setor_escolas');
    }

    public function tiposEquipamentos()
    {
        return $this->belongsTo(TiposEquipamentos::class, 'id_tipos_equipamentos');
    }

    public function status()
    {
        return $this->belongsTo(StatusAtendimento::class, 'id_status');
    }

    public function atendimento()
    {
        return $this->belongsTo(Atendimentos::class, 'id_atendimento');
    }

    public function historico()
{
    return $this->hasMany(Historico::class, 'equipamento_id');
}

}
