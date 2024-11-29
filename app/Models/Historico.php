<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{

    protected $fillable = ['equipamento_id', 'protocolo_entrada_id'];

    public function equipamento()
{
    return $this->belongsTo(Equipamentos::class, 'equipamento_id');
}

public function protocoloEntrada()
{
    return $this->belongsTo(ProtocoloEntrada::class, 'protocolo_entrada_id');
}

    use HasFactory;
}
