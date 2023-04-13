<?php

class Viaje{

    //ATRIBUTOS
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $pasajeros;
    // Estructura del arreglo de pasajeros:
    // pasajeros[numero] = ["numero de documento" => $nroDni, "nombre" => $nombre, "apellido" => $apellido];

    //CONSTRUCTOR
    /**
     * Crea una instancia de Viaje
     * Recibe un código de viaje, un destino y la cantidad máxima de pasajeros del viaje
     * 
     * @param int $codigoNuevo
     * @param string $destinoNuevo
     * @param int $cantMax
     */
    public function __construct($codigoNuevo, $destinoNuevo, $cantMax){
        $this->codigo = $codigoNuevo;
        $this->destino = $destinoNuevo;
        $this->cantMaxPasajeros = $cantMax;
        $this->pasajeros = [];
    }

    //MODIFICADORES
    /**
     * Modifíca el código del viaje, recibe por parámetro un código nuevo
     * 
     * @param int $codigoNuevo
     */
    public function setCodigo($codigoNuevo){
        $this -> codigo = $codigoNuevo;
    }

    /**
     * Modifíca el destino del viaje, recibe por parámetro un destino nuevo
     * 
     * @param string $destinoNuevo
     */
    public function setDestino($destinoNuevo){
        $this->destino = $destinoNuevo;
    }

    /**
     * Modifíca la cantidad máxima de pasajeros, recibe por parámetro una nueva cantidad máxima
     * 
     * @param int $cantMaxima
     */
    public function setCantMaxPasajeros($cantMaxima){
        $this->cantMaxPasajeros = $cantMaxima;

    }

    /**
     * Modifíca el arreglo de pasajeros, recibe por parámetro un arreglo nuevo de pasajeros
     * 
     * @param array $arregloPasajeros
     */
    public function setPasajeros($arregloPasajeros){
            $this->pasajeros = $arregloPasajeros;
    }

    //OBSERVADORES
    /**
     * Devuelve el código actual del viaje
     * 
     * @return int
     */
    public function getCodigo(){
        return $this->codigo;
    }

    /**
     * Devuelve el destino actual del viaje
     * 
     * @return string
     */
    public function getDestino(){
        return $this->destino;
    }

    /**
     * Devuelve la cantidad de pasajeros máxima establecida para el viaje actual
     * 
     * @return int
     */
    public function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }

    /**
     * Devuelve el arreglo de pasajeros del viaje actual
     * 
     * @return array
     */
    public function getPasajeros(){
        return $this->pasajeros;
    }

    //PROPIAS DE CLASE
    /**
     * Devuelve un string con todos los elementos que componen al viaje
     * 
     * @return string
     */
    public function __toString(){
        //string $viaje
        $viaje = "Código de viaje: ".$this->getCodigo()."\n";
        $viaje = $viaje ."Destino de viaje: ".$this->getDestino()."\n";
        $viaje = $viaje ."Cantidad máxima de pasajeros para este viaje: ".$this->getCantMaxPasajeros()."\n";
        $viaje = $viaje ."Información de los pasajeros del viaje: \n";
        $viaje = $viaje . $this->pasajerosAString();

        return $viaje;
    }

    /**
     * Devuelve un string con la información de todos los pasajeros del viaje
     * 
     * @return string
     */
    public function pasajerosAString(){
        // string $cadenaPasajeros, $documento, $nombre, $apellido
        $cadenaPasajeros = "";

        for($i = 0; $i < count($this->getPasajeros()); $i++){
            $documento = $this->getPasajeros()[$i]["numero de documento"];
            $nombre = $this->getPasajeros()[$i]["nombre"];
            $apellido = $this->getPasajeros()[$i]["apellido"];
            $cadenaPasajeros = $cadenaPasajeros ."Pasajero ". $i+1 .": [Documento: ".$documento.", Nombre: ".$nombre.", Apellido: ".$apellido."]\n";   
        }

        return $cadenaPasajeros;
    }
    
    /**
     * Si hay espacio en el viaje y no existe previamente el documento del pasajero a ingresar, 
     * entonces se agrega el nuevo pasajero
     * Retorna un booleano que indica si se agrego exitosamente el pasajero o no
     * 
     * @param array $nuevoPasajero
     * @return boolean
     */
    public function agregarPasajero($nuevoPasajero){
        // boolean $exito

        if (count($this->getPasajeros()) == $this->getCantMaxPasajeros()){
            $exito = false;
        } else {
            if ($this->buscaPasajero($nuevoPasajero["numero de documento"]) != -1){
                $exito = false;
            } else {
                $exito = true;
                array_push($this->pasajeros, $nuevoPasajero);
            }
        }

        return $exito;
    }

    /**
     * Recibe el documento del pasajero a quitar
     * Retorna true si es posible, false en caso contrario
     * 
     * @param int $documentoQuitar
     * @return boolean
     */
    public function quitarPasajeroPorDocumento($documentoQuitar){
        // int $posPasajero
        // boolean $puedeQuitar

        $posPasajero = $this->buscaPasajero($documentoQuitar);

        if($posPasajero == -1){
            $puedeQuitar = false;
        } else {
            $puedeQuitar = true;
            unset($this->pasajeros[$posPasajero]);
            $this->pasajeros = array_values($this->pasajeros);
        }
        return $puedeQuitar;
    }
    
    /**
     * Modifica el nombre de un pasajero por su número de documento
     * Retorna true si es posible, false en caso contrario
     * 
     * @param int $nroDocumento
     * @param string $nombreNuevo
     * @return boolean
     */
    public function modificarNombrePorDocumento($nroDocumento, $nombreNuevo){
        // int $posPasajero
        // boolean $puedeModificar

        $posPasajero = $this->buscaPasajero($nroDocumento);

        if($posPasajero == -1){
            $puedeModificar = false;
        } else {
            $puedeModificar = true;
            $this->pasajeros[$posPasajero]["nombre"] = $nombreNuevo;
        }
        return $puedeModificar;
    }

    /**
     * Modifica el apellido de un pasajero por su número de documento
     * Retorna true si es posible, false en caso contrario
     * 
     * @param int $nroDocumento
     * @param string $apellidoNuevo
     * @return boolean
     */
    public function modificarApellidoPorDocumento($nroDocumento, $apellidoNuevo){
        // int $posPasajero
        // boolean $puedeModificar

        $posPasajero = $this->buscaPasajero($nroDocumento);

        if($posPasajero == -1){
            $puedeModificar = false;
        } else {
            $puedeModificar = true;
            $this->pasajeros[$posPasajero]["apellido"] = $apellidoNuevo;
        }
        return $puedeModificar;
    }

    /**
     * Busca un pasajero por número de documento, si existe retorna su posición
     * si no existe retorna -1
     * 
     * @param $nroDocumento
     * @return int
     */
    private function buscaPasajero($nroDocumento){
        // boolean $existePasajero
        // int $posPasajero

        $existePasajero = false;
        $posPasajero = 0;

        while ($existePasajero == false && $posPasajero < count($this->getPasajeros())){
            if ($nroDocumento == $this->getPasajeros()[$posPasajero]["numero de documento"]){
                $existePasajero = true;
                $posPasajero--; 
            }
            $posPasajero++;
        }

        if($posPasajero == count($this->getPasajeros())){
            $posPasajero = -1;
        }

        return $posPasajero;
    }

    /*
    NO SE DEBERÍA MODIFICAR EL NÚMERO DE DOCUMENTO DE UN PASAJERO YA QUE SE ASUME QUE ES UN 
    IDENTIFICADOR UNÍVOCO
    (En tal caso se debe borrar y crear un pasajero nuevo)
    */
}
?>