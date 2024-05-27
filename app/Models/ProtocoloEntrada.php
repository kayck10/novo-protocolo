<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProtocoloEntrada extends Model
{
    use HasFactory;
    protected $table = "protocolo_entrada";
    protected $fillable = ['id_local', 'data_entrada'];

    public function local()
    {
        return $this->belongsTo(Local::class, 'id_local');
    }
}
