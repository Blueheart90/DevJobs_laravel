<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function vacante()
    {
        // una Categoria pertenece a muchas vacantes
        return $this->hasMany(Vacante::class);

    }
}
