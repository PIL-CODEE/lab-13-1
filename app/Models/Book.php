<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // Definimos los atributos que se pueden asignar en masa.
    protected $fillable = ['titulo', 'año_edicion', 'autor', 'editorial'];
    public $timestamps = false;

    // Definición de la relación con Loan
    public function loans()
    {
        return $this->hasMany(Loan::class, 'id_libro');
    }
}
