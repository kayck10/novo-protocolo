<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class problemaAtendimento extends Model
{
    use HasFactory;
    protected $table = 'problemas_atendimento';
    protected $fillable = ['atendimento_id', 'desc_problema'];

    public function atendimento()
    {
        return $this->belongsTo(Atendimentos::class, 'atendimento_id');
    }
}
