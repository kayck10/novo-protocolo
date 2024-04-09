<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manutencoes extends Model
{
    use HasFactory;
    protected $fillable = ['id_equipamento' , 'id_local', 'id_user', 'id_status'];

}
