<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable; 
use Illuminate\Queue\SerializesModels;

class NuevoProveedor extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $correo;
    public $contrasena;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre, $correo, $contrasena)
    {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->contrasena = $contrasena;
    }

    public function build(){
        
        return $this->from($this->correo)
        ->subject('Qwikly - Bienvenido!!')
        ->view('correos.nuevoProveedor');
        
        // return $this->view('correos.correoRechazo', [$this->nombre,
        //                                     $this->motivo]);
    }
}
