<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $table = 'cotizaciones'; // Nombre de la tabla en la base de datos
    public $timestamps = false; // Desactivar las marcas de tiempo 

    protected $fillable = [
        'nombreCotizacion',
        'descripcion',
        'fecha',
        'telefono',
        'idCliente',
        'idProveedor',
        'respuesta'
    ];
}
