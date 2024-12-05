<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{

    protected $fillable = [
        'equipamento_id',
        'id_protocolo',
        'id_users',
        'solucao',
        'desc',
        'faltamPecas',
        'acessorios',
    ];

    public function equipamento()
    {
        return $this->belongsTo(Equipamentos::class, 'equipamento_id');
    }

    public function protocoloEntrada()
    {
        return $this->belongsTo(ProtocoloEntrada::class, 'protocolo_id');
    }

    use HasFactory;
}
