<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusAtendimento extends Model
{
    use HasFactory;
    protected $fillable = ['desc'];

    public function equipamentos()
    {
        return $this->hasMany(Equipamentos::class, 'id_status');
    }
}
