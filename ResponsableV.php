<?php

class ResponsableV{

    //ATRIBUTOS
    private $numeroEmpleado;
    private $numeroLicencia;
    private $nombre;
    private $apellido;

    //CONSTRUCTOR
    public function __construct($numeroEmpleado, $numeroLicencia, $nombre, $apellido){
        $this->numeroEmpleado = $numeroEmpleado;
        $this->numeroLicencia = $numeroLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    //OBSERVADORES
    public function getNumeroEmpleado(){
        return $this->numeroEmpleado;
    }

    public function getNumeroLicencia(){
        return $this->numeroLicencia;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    //MODIFICADORES
    public function setNumeroEmpleado($numeroEmpleado){
        $this->numeroEmpleado = $numeroEmpleado;
    }

    public function setNumeroLicencia($numeroLicencia){
        $this->numeroLicencia = $numeroLicencia;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    //PROPIOS DE CLASE
    /**
     * Devuelve un string que contiene toda la información del estado de una instancia de tipo ResponsableV
     * 
     * @return string
     */
    public function __toString(){
        //string $cadena
        $cadena = "Número de empleado: ".$this->getNumeroEmpleado();
        $cadena = $cadena. ", Número de licencia: ".$this->getNumeroLicencia();
        $cadena = $cadena. ", Nombre: ".$this->getNombre();
        $cadena = $cadena. ", Apellido: ".$this->getApellido();

        return $cadena;
    }


}

?>