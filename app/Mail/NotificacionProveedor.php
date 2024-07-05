<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionProveedor extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre; 
    public $correo;
    public $mensaje;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre, $correo,  $mensaje)
    {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->mensaje = $mensaje;
    }

    public function build(){
        
        return $this->from($this->correo)
        ->subject('Qwikly - Tienes un nuevo mensaje')
        ->view('correos.notificacionProveedor');
        
        // return $this->view('correos.correoRechazo', [$this->nombre,
        //                                     $this->motivo]);
    }
}
