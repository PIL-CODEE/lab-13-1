<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // Definimos los atributos que se pueden asignar en masa.
    protected $fillable = ['titulo', 'año_edicion', 'autor', 'editorial'];
    public $timestamps = false;
}
