<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProtocoloEntrada extends Model
{
    use HasFactory;
    protected $table = "protocolo_entrada";
    protected $fillable = ['id_local', 'data_entrada'];
    protected $dates = ['data_entrada'];


    public function local()
    {
        return $this->belongsTo(Local::class, 'id_local');
    }

    public function equipamentos(): HasMany
    {
        return $this->hasMany(Equipamentos::class, 'id_protocolo', 'id');
    }

    public function historico()
{
    return $this->hasMany(Historico::class, 'protocolo_entrada_id');
}

}
