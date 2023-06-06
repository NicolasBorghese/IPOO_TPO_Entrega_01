<?php

class PasajeroEspecial extends Pasajero{

    //ATRIBUTOS
    private $reqSilla;
    private $reqAsistencia;
    private $reqComida;

    /* Los atributos $reqSilla, $reqAsistencia y $reqComida son de tipo boolean y representan
    si el pasajero necesita ese servicio o no */

    //CONSTUCTOR
    /**
     * Crea una instancia de la clase PasajeroEspecial
     * 
     * @param string $nombre
     * @param string $apellido
     * @param string $documento
     * @param string $telefono
     * @param string $numeroAsiento
     * @param int $numeroTicket
     * @param boolean $reqSilla
     * @param boolean $reqAsistencia
     * @param boolean $reqComida
     */
    public function __construct(
        $nombre,
        $apellido,
        $documento,
        $telefono,
        $numeroAsiento,
        $numeroTicket,
        $reqSilla,
        $reqAsistencia,
        $reqComida
    ){
        parent::__construct($nombre, $apellido, $documento, $telefono, $numeroAsiento, $numeroTicket);

        $this->reqSilla = $reqSilla;
        $this->reqAsistencia = $reqAsistencia;
        $this->reqComida = $reqComida;
    }

    /*/=======================================================================================\*\
    ||                                        OBSERVADORES                                     ||
    \*\=======================================================================================/*/

    /**
     * Devuelve un booleano que indica si el pasajero necesita el servicio de silla de ruedas
     * 
     * @return boolean
     */
    public function getReqSilla(){
        return $this->reqSilla;
    }

    /**
     * Devuelve un booleano que indica si el pasajero necesita el servicio de asistencia de 
     * embarque/desembarque
     * 
     * @return boolean
     */
    public function getReqAsistencia(){
        return $this->reqAsistencia;
    }

    /**
     * Devuelve un booleano que indica si el pasajero necesita el servicio de comida especial
     * 
     * @return boolean
     */
    public function getReqComida(){
        return $this->reqComida;
    }

    /*/=======================================================================================\*\
    ||                                       MODIFICADORES                                     ||
    \*\=======================================================================================/*/

    /**
     * Modifica el estado del requerimiento de silla de ruedas
     * 
     * @param boolean $reqSilla
     */
    public function setReqSilla($reqSilla){
        $this->reqSilla = $reqSilla;
    }

    /**
     * Modifica el estado del requerimiento de asistencia de embarque/desembarque
     * 
     * @param boolean $reqAsistencia
     */
    public function setReqAsistencia($reqAsistencia){
        $this->reqAsistencia = $reqAsistencia;
    }

    /**
     * Modifica el estado del requerimiento de comida especial
     * 
     * @param boolean $reqComida
     */
    public function setReqComida($reqComida){
        $this->reqComida = $reqComida;
    }

    /*/=======================================================================================\*\
    ||                                 PROPIOS DE LA CLASE                                     ||
    \*\=======================================================================================/*/

    /**
     * Devuelve un string que contiene toda la información del estado
     * de una instancia de tipo PasajeroEspecial
     * 
     * @return string
     */
    public function __toString(){
        //string $cadena
        $cadena = parent::__toString();
        $cadena = $cadena . "[Silla de ruedas: ".$this->reqAString($this->getReqSilla())."]";
        $cadena = $cadena . "[Asistencia: ".$this->reqAString($this->getReqAsistencia())."]";
        $cadena = $cadena . "[Comida especial: ".$this->reqAString($this->getReqComida())."]";

        return $cadena;
    }

    /**
     * Esta función lee el estado de un requerimiento y lo traduce a su equivalente en string
     * 
     * @param boolean $requerimiento
     * @return string
     */
    public function reqAString($requerimiento){
        //string $valor
        $valor = "No";
        if($requerimiento){
            $valor = "Si";
        }
        return $valor;
    }

    /**
     * Esta función devuelve la cantidad de servicios especiales que requiere el pasajero
     * 
     * @return int
     */
    public function cantidadServicios(){
        //int $cant
        $cant = 0;
        if($this->getReqSilla()){
            $cant++;
        }
        if($this->getReqAsistencia()){
            $cant++;
        }
        if($this->getReqComida()){
            $cant++;
        }

        return $cant;
    }

    /**
     * Retorna el porcentaje de incremento para un pasajero especial.
     * Si requiere un servicio especial el incremento es del 15%, si requiere 2 o más es del 30%
     * 
     * @return float
     */
    public function darPorcentajeIncremento(){
        //float $porcIncremento
        $porcIncremento = parent::darPorcentajeIncremento();
        
        if($this->cantidadServicios() == 1){
            $porcIncremento = 15;
        } else if ($this->cantidadServicios() > 1){
            $porcIncremento = 30;
        }
        return $porcIncremento;
    }
}

?>