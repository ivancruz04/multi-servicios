<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Cotizaciones extends Mailable
{
    use Queueable, SerializesModels;

    public $nombreCotizacion; 
    public $fecha;
    public $nombreComercial;
    public $emailProveedor;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombreCotizacion, $fecha,  $nombreComercial, $emailProveedor)
    {
        $this->nombreCotizacion = $nombreCotizacion;
        $this->fecha = $fecha;
        $this->nombreComercial = $nombreComercial;
        $this->emailProveedor = $emailProveedor;

    }

    public function build(){
        
        return $this->from($this->emailProveedor)
        ->subject('Qwikly - Nueva Cotización')
        ->view('correos.cotizacion');
        
        // return $this->view('correos.correoRechazo', [$this->nombre,
        //                                     $this->motivo]);
    }
}
