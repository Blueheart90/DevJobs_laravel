<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    protected $fillable = [
        'titulo', 'imagen', 'descripcion', 'skills', 'categoria_id', 'experiencia_id', 'ubicacion_id', 'salario_id'
    ];

    // Relación 1:n de Vacante a Categoria
    // Obtiene la categoria de la Vacante via FK
    public function categoria()
    {
        // una Vacante tiene una categoria
        return $this->belongsTo(Categoria::class);
    }

    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }

    public function experiencia()
    {
        return $this->belongsTo(Experiencia::class);
    }

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function candidatos()
    {
        return $this->hasMany(Candidato::class);
    }
    // Relación 1:1 reclutador y vacante
    public function reclutador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }




}
