<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamentos extends Model
{
    use HasFactory;
    protected $fillable = ['id_tipo', 'desc', 'tombamento', 'local', 'acessorios', 'inservivel', 'data_entrada'];

}
