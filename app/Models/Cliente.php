<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'idUsuario';
    public $timestamps = false; // Desactivar las marcas de tiempo 

    protected $fillable = [
        'idUsuario',
        'nombreCliente',
        'telefono',
        'rfc',
        'calle',
        'numeroExterior',
        'numeroInterior',
        'cp',
        'colonia',
        'estado',
        'ciudad',
        'estatus'
    ];
}
