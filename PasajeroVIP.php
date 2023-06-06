<?php

class PasajeroVIP extends Pasajero{

    //ATRIBUTOS
    private $nroViajeroFrecuente;
    private $cantMillas;

    //CONSTRUCTOR
    /**
     * Crea una instancia de la clase PasajeroVIP
     * 
     * @param string $nombre
     * @param string $apellido
     * @param string $documento
     * @param string $telefono
     * @param string $numeroAsiento
     * @param int $numeroTicket
     * @param string $nroViajeroFrecuente
     * @param int $cantMillas
     */
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

    /*/=======================================================================================\*\
    ||                                        OBSERVADORES                                     ||
    \*\=======================================================================================/*/

    /**
     * Devuelve el número de viajero frecuente del pasajero
     * 
     * @return string
     */
    public function getNroViajeroFrecuente(){
        return $this->nroViajeroFrecuente;
    }

    /**
     * Devuelve la cantidad de millas que tiene el pasajero
     * 
     * @return int
     */
    public function getCantMillas(){
        return $this->cantMillas;
    }

    /*/=======================================================================================\*\
    ||                                       MODIFICADORES                                     ||
    \*\=======================================================================================/*/

    /**
     * Modifica el número de viajero frecuente del pasajero
     * 
     * @param string $nroViajeroFrecuente
     */
    public function setNroViajeroFrecuente($nroViajeroFrecuente){
        $this->nroViajeroFrecuente = $nroViajeroFrecuente;
    }

    /**
     * Modifica la cantidad de millas que tiene el pasajero
     * 
     * @param int $cantMillas
     */
    public function setCantMillas($cantMillas){
        $this->cantMillas = $cantMillas;
    }

    /*/=======================================================================================\*\
    ||                                 PROPIOS DE LA CLASE                                     ||
    \*\=======================================================================================/*/

    /**
     * Devuelve un string que contiene toda la información del estado de una instancia de tipo PasajeroVIP
     * 
     * @return string
     */
    public function __toString(){
        //string $cadena
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