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
    /**
     * Crea una instancia de la clase Pasajero
     * 
     * @param string $nombre
     * @param string $apellido
     * @param string $documento
     * @param string $telefono
     * @param string $numeroAsiento
     * @param int $numeroTicket
     */
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

    /*/=======================================================================================\*\
    ||                                        OBSERVADORES                                     ||
    \*\=======================================================================================/*/

    /**
     * Devuelve el nombre del pasajero
     * 
     * @return string
     */
    public function getNombre(){
        return $this->nombre;
    }

    /**
     * Devuelve el apellido del pasajero
     * 
     * @return string
     */
    public function getApellido(){
        return $this->apellido;
    }

    /**
     * Devuelve el documento del pasajero
     * 
     * @return string
     */
    public function getDocumento(){
        return $this->documento;
    }

    /**
     * Devuelve el número de teléfono del pasajero
     * 
     * @return string
     */
    public function getTelefono(){
        return $this->telefono;
    }

    /**
     * Devuelve el número de asiento del pasajero
     * 
     * @return string
     */
    public function getNumeroAsiento(){
        return $this->numeroAsiento;
    }

    /**
     * Devuelve el número de ticket del pasajero
     * 
     * @return int
     */
    public function getNumeroTicket(){
        return $this->numeroTicket;
    }

    /*/=======================================================================================\*\
    ||                                       MODIFICADORES                                     ||
    \*\=======================================================================================/*/

    /**
     * Modifica el nombre del pasajero
     * 
     * @param string $nombre
     */
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    /**
     * Modifica el apellido del pasajero
     * 
     * @param string $apellido
     */
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    /**
     * Modifica el documento del pasajero
     * 
     * @param string $documento
     */
    public function setDocumento($documento){
        $this->documento = $documento;
    }

    /**
     * Modifica el número de teléfono del pasajero
     * 
     * @param string $telefono
     */
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    /**
     * Modifica el número de asiento del pasajero
     * 
     * @param string $numeroAsiento
     */
    public function setNumeroAsiento($numeroAsiento){
        $this->numeroAsiento = $numeroAsiento;
    }

    /**
     * Modifica el número de ticket del pasajero
     * 
     * @param int $numeroTicket
     */
    public function setNumeroTicket($numeroTicket){
        $this->numeroTicket = $numeroTicket;
    }

    /*/=======================================================================================\*\
    ||                                 PROPIOS DE LA CLASE                                     ||
    \*\=======================================================================================/*/

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

?>
