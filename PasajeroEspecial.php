<?php

class PasajeroEspecial extends Pasajero{

    //ATRIBUTOS
    private $reqSilla;
    private $reqAsistencia;
    private $reqComida;

    /* Los atributos $reqSilla, $reqAsistencia y $reqComida son de tipo boolean y representan
    si el pasajero necesita ese servicio o no */

    //CONSTUCTOR
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

    //OBSERVADORES
    public function getReqSilla(){
        return $this->reqSilla;
    }

    public function getReqAsistencia(){
        return $this->reqAsistencia;
    }

    public function getReqComida(){
        return $this->reqComida;
    }

    //MODIFICADORES
    public function setReqSilla($reqSilla){
        $this->reqSilla = $reqSilla;
    }

    public function setReqAsistencia($reqAsistencia){
        $this->reqAsistencia = $reqAsistencia;
    }

    public function setReqComida($reqComida){
        $this->reqComida = $reqComida;
    }

    //PROPIOS DE LA CLASE
    public function __toString(){

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