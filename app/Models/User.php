<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB; //referencia para hacer operaciones con la clase DB 

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
        'preRegistro'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adminlte_image()
    {

        $rol = $this->rol;

        if ($rol === 1) {
            $image = "/img/admin.png";
            return $image;
        } else if ($rol === 2) {
            $logotipo = DB::table('proveedores')
                ->select('logotipo')
                ->where('idUsuario', '=', $this->id)
                ->get();

            foreach ($logotipo as $logo) {
                return asset($logo->logotipo); // Corregido aquí
            }

            
        } else {
            $image = "/img/cliente.png";
            return $image;
        }
    }
}
