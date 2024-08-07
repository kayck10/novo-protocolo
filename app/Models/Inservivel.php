<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inservivel extends Model
{
    use HasFactory;
    protected $table = "Inservivels";
    protected $fillable = ['id_protocolo', 'id_problema', 'marca', 'num_serie', 'modelo'];
}
