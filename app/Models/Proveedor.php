<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    // protected $primaryKey = 'proveedores';
    protected $table = 'proveedores'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'idUsuario';
    public $timestamps = false; // Desactivar las marcas de tiempo 

    protected $fillable = [
        'idUsuario',
        'nombreProveedor',
        'idServicio',
        'descripcion',
        'telefono',
        'logotipo',
        'rfc',
        'razonSocial',
        'nombreComercial',
        'paginaWeb',
        'facebook',
        'calle',
        'numeroExterior',
        'cp',
        'colonia',
        'ciudad',
        'estatus',
        'calificacion',
        'estrellas',
        'trabajos',
        'experiencia'
    ];
}
