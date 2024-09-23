<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class problemaAtendimento extends Model
{
    use HasFactory;
    protected $fillable = ['atendimento_id', 'desc'];

    public function atendimento()
    {
        return $this->belongsTo(Atendimentos::class, 'atendimento_id');
    }
}
