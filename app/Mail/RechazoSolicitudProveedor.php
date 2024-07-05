<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RechazoSolicitudProveedor extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $motivo;
    public $correo;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre, $correo, $motivo)
    {
        $this->nombre = $nombre;
        $this->motivo = $motivo;
        $this->correo = $correo;
    }

    public function build(){
        
        return $this->from($this->correo)
        ->subject('Qwikly - Solicitud de ingreso como proveedor RECHAZADA')
        ->view('correos.correoRechazo');
        
        // return $this->view('correos.correoRechazo', [$this->nombre,
        //                                     $this->motivo]);
    }

}
