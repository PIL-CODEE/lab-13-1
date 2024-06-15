<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    // Definimos los atributos que se pueden asignar en masa.
    protected $fillable = ['id_libro', 'id_usuario', 'fecha_inicio', 'fecha_devolucion', 'estado'];
    public $timestamps = false;

    // Definición de la relación con Book
    public function book()
    {
        return $this->belongsTo(Book::class, 'id_libro');
    }

    // Definición de la relación con User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
