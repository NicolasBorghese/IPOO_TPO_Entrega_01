<?php

class ResponsableV{

    //ATRIBUTOS
    private $numeroEmpleado;
    private $numeroLicencia;
    private $nombre;
    private $apellido;

    //CONSTRUCTOR
    /**
     * Crea una instancia de la clase ResponsableV
     * 
     * @param string $numeroEmpleado
     * @param string $numeroLicencia
     * @param string $nombre
     * @param string $apellido
     */
    public function __construct($numeroEmpleado, $numeroLicencia, $nombre, $apellido){

        $this->numeroEmpleado = $numeroEmpleado;
        $this->numeroLicencia = $numeroLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    /*/=======================================================================================\*\
    ||                                        OBSERVADORES                                     ||
    \*\=======================================================================================/*/

    /**
     * Devuelve el número de empleado del responsable
     * 
     * @return string
     */
    public function getNumeroEmpleado(){
        return $this->numeroEmpleado;
    }

    /**
     * Devuelve el número de licencia del responsable
     * 
     * @return string
     */
    public function getNumeroLicencia(){
        return $this->numeroLicencia;
    }

    /**
     * Devuelve el nombre del responsable
     * 
     * @return string
     */
    public function getNombre(){
        return $this->nombre;
    }

    /**
     * Devuelve el apellido del responsable
     * 
     * @return string
     */
    public function getApellido(){
        return $this->apellido;
    }

    /*/=======================================================================================\*\
    ||                                       MODIFICADORES                                     ||
    \*\=======================================================================================/*/

    /**
     * Modifica el número de empleado del responsable
     * 
     * @param string $numeroEmpleado
     */
    public function setNumeroEmpleado($numeroEmpleado){
        $this->numeroEmpleado = $numeroEmpleado;
    }

    /**
     * Modifica el número de licencia del responsable
     * 
     * @param string $numeroLicencia
     */
    public function setNumeroLicencia($numeroLicencia){
        $this->numeroLicencia = $numeroLicencia;
    }

    /**
     * Modifica el nombre del responsable
     * 
     * @param string $nombre
     */
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    /**
     * Modifica el apellido del responsable
     * 
     * @param string $apellido
     */
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    /*/=======================================================================================\*\
    ||                                 PROPIOS DE LA CLASE                                     ||
    \*\=======================================================================================/*/

    /**
     * Devuelve un string que contiene toda la información del estado de una instancia de tipo ResponsableV
     * 
     * @return string
     */
    public function __toString(){
        //string $cadena
        $cadena = "[N°. empleado: ".$this->getNumeroEmpleado()."]";
        $cadena = $cadena. "[N°. licencia: ".$this->getNumeroLicencia()."]";
        $cadena = $cadena. "[Nombre: ".$this->getNombre()."]";
        $cadena = $cadena. "[Apellido: ".$this->getApellido()."]";

        return $cadena;
    }

}

?>