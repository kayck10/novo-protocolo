<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;
    protected $table = "local";
    protected $fillable = ['desc'];

    public function ProtocoloEntrada () {
        return $this->hasMany(ProtocoloEntrada::class, 'id_local');
    }

    public function atendimentos()
    {
        return $this->hasMany(Atendimentos::class, 'id_user');
    }

}
