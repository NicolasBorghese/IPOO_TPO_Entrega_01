<?php

class PasajeroVIP extends Pasajero{

    //ATRIBUTOS
    private $nroViajeroFrecuente;
    private $cantMillas;

    //CONSTRUCTOR
    public function __construct(
        $nombre,
        $apellido,
        $documento,
        $telefono,
        $numeroAsiento,
        $numeroTicket,
        $nroViajeroFrecuente,
        $cantMillas
    ){
        parent::__construct($nombre, $apellido, $documento, $telefono, $numeroAsiento, $numeroTicket);

        $this->nroViajeroFrecuente = $nroViajeroFrecuente;
        $this->cantMillas = $cantMillas;
    }

    //OBSERVADORES
    public function getNroViajeroFrecuente(){
        return $this->nroViajeroFrecuente;
    }

    public function getCantMillas(){
        return $this->cantMillas;
    }

    //MODIFICADORES
    public function setNroViajeroFrecuente($nroViajeroFrecuente){
        $this->nroViajeroFrecuente = $nroViajeroFrecuente;
    }

    public function setCantMillas($cantMillas){
        $this->cantMillas = $cantMillas;
    }

    //PROPIOS DE LA CLASE
    public function __toString(){
        $cadena = parent::__toString();
        $cadena = $cadena. "[N°. Viajero frecuente: ". $this->getNroViajeroFrecuente()."]";
        $cadena = $cadena. "[Cantidad de millas: ". $this->getCantMillas()."]";

        return $cadena;
    }

    /**
     * Retorna el porcentaje de incremento para un pasajero VIP que es del 35% generalmente
     * y del 30% cuando tiene más de 300 millas
     * 
     * @return float
     */
    public function darPorcentajeIncremento(){
        //float $porcIncremento
        $porcIncremento = 35;

        if($this->getCantMillas() > 300){
            $porcIncremento = 30;
        }
        return $porcIncremento;
    }
}

?>