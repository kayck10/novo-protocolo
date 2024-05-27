<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimentos extends Model
{
    use HasFactory;
    protected $fillable = [ 'id_local', 'id_equipamento', 'id_status', 'id_user', 'prioridade', 'desc_problema', 'data', 'solucao'];

}
