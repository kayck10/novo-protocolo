<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TiposUsuarios extends Model
{
    use HasFactory;
    protected $fillable = ['desc'];

    public function users()
    {
        return $this->hasMany(User::class, 'id_tipos_usuarios');
    }
}

