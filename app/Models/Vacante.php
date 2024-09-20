<?php

namespace App\Models;

use App\Models\Salario;
use App\Models\Candidato;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model
{
    use HasFactory;

    protected $casts = ['ultimo_dia' => 'date'];

    protected $fillable = [
        'titulo',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'descripcion',
        'imagen',
        'user_id',
    ];

    //Para poder retornar el nombre y no los IDs de la BD en mostrar-vacante.blade

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }
    public function candidatos()
    {
        return $this->hasMany(Candidato::class)->orderBy('created_at', 'DESC');
    }
    public function reclutador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
