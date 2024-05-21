<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProtocoloEntrada extends Model
{
    use HasFactory;
    protected $table = "protocolo_entrada";
    protected $fillable = ['id_local', 'data_entrada'];
}
