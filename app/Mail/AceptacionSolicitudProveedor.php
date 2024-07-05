<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AceptacionSolicitudProveedor extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $correo;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre, $correo)
    {
        $this->nombre = $nombre;
        $this->correo = $correo;
    }

    public function build(){
        
        return $this->from($this->correo)
        ->subject('Qwikly - Solicitud de ingreso como proveedor ACEPTADA')
        ->view('correos.correoAceptacion');
        
        // return $this->view('correos.correoRechazo', [$this->nombre,
        //                                     $this->motivo]);
    }
}
