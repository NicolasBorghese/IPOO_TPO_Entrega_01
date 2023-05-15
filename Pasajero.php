<?php

class Pasajero{

    //ATRIBUTOS
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;
    private $numeroAsiento;
    private $numeroTicket;

    //CONSTRUCTOR
    public function __construct(
        $nombre,
        $apellido,
        $documento,
        $telefono,
        $numeroAsiento,
        $numeroTicket
    ){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->telefono = $telefono;
        $this->numeroAsiento = $numeroAsiento;
        $this->numeroTicket = $numeroTicket;
    }

    //OBSERVADORES
    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getDocumento(){
        return $this->documento;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function getNumeroAsiento(){
        return $this->numeroAsiento;
    }

    public function getNumeroTicket(){
        return $this->numeroTicket;
    }

    //MODIFICADORES
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function setDocumento($documento){
        $this->documento = $documento;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function setNumeroAsiento($numeroAsiento){
        $this->numeroAsiento = $numeroAsiento;
    }

    public function setNumeroTicket($numeroTicket){
        $this->numeroTicket = $numeroTicket;
    }

    //PROPIOS DE LA CLASE
    /**
     * Devuelve un string que contiene toda la información del estado de una instancia de tipo Pasajero
     * 
     * @return string
     */
    public function __toString(){
        //string $cadena
        $cadena = "[Nombre: ".$this->getNombre()."]";
        $cadena = $cadena. "[Apellido: ".$this->getApellido()."]";
        $cadena = $cadena. "[Documento: ".$this->getDocumento()."]";
        $cadena = $cadena. "[Teléfono: ".$this->getTelefono()."]\n";
        $cadena = $cadena. "[N°. Asiento: ".$this->getNumeroAsiento()."]";
        $cadena = $cadena. "[N°. Ticket: ".$this->getNumeroTicket()."]"; 

        return $cadena;
    }

    /**
     * Retorna el porcentaje de incremento para un pasajero estandar que siempre es 10
     * 
     * @return float
     */
    public function darPorcentajeIncremento(){
        return 10;
    }
}
