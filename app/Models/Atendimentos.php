<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimentos extends Model
{
    use HasFactory;
    protected $fillable = [ 'id_local', 'id_equipamento', 'id_status', 'id_user', 'prioridade', 'desc_problema', 'data', 'solucao', 'externo'];

    public function tecnico()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function setor()
    {
        return $this->belongsTo(Local::class, 'id_local');
    }
    public function local()
    {
        return $this->belongsTo(Local::class, 'id_local');
    }

    public function equipamentos()
    {
        return $this->hasMany(Equipamentos::class, 'id_atendimento');
    }

}
