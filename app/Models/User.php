<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'data_nascimento',
        'usuario',
        'email',
        'id_tipos_usuarios',
        'id_funcoes',
        'password',
        'id_situacao',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function atendimentos()
    {
        return $this->hasMany(Atendimentos::class, 'id_user');
    }

    public function tipoUsuario()
    {
        return $this->belongsTo(TiposUsuarios::class, 'id_tipos_usuarios');
    }

    public function funcao()
    {
        return $this->belongsTo(Funcoes::class, 'id_funcoes');
    }

    public function situacao()
    {
        return $this->belongsTo(Situacao::class, 'id_situacao');
    }

    public function atendimentosInternos()
    {
        return $this->hasMany(Atendimentos::class, 'id_user')->where('externo', 0); // 0 para interno
    }

    public function atendimentosEscolas()
    {
        return $this->hasMany(Atendimentos::class, 'id_user')->where('externo', 1);
    }


}
