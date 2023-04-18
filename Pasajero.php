<?php

class Pasajero{

    //ATRIBUTOS
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;

    //CONSTRUCTOR
    public function __construct($nombre, $apellido, $documento, $telefono){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->telefono = $telefono;
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

    //PROPIOS DE CLASE
    /**
     * Devuelve un string que contiene toda la información del estado de una instancia de tipo Pasajero
     * 
     * @return string
     */
    public function __toString(){
        //string $cadena
        $cadena = "Nombre: ".$this->getNombre();
        $cadena = $cadena. ", Apellido: ".$this->getApellido();
        $cadena = $cadena. ", Documento: ".$this->getDocumento();
        $cadena = $cadena. ", Teléfono: ".$this->getTelefono();

        return $cadena;
    }
}

?>