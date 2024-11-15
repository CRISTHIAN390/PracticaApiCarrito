<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'cliente';

    // Clave primaria de la tabla
    protected $primaryKey = 'idcliente';

    // Si no usas las columnas 'created_at' y 'updated_at'
    public $timestamps = false;

    // Atributos que son asignables en masa
    protected $fillable = [
        'apellidos',
        'nombres',
        'edad',
        'dni',
        'estado'
    ];
}
