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
    /*
    NO SE DEBERÍA MODIFICAR EL CÓDIGO DE UN VIAJE YA QUE SE ASUME QUE ES UN
    IDENTIFICADOR ÚNIVOCO DEL VIAJE
    (En tal caso se debe borrar y crear un viaje nuevo)

    public function setCodigo($codigoNuevo){
        $this -> codigo = $codigoNuevo;
    }
    */

    /**
     * Modifíca el destino del viaje, recibe por parametro un destino nuevo
     * 
     * @param string $destinoNuevo
     */
    public function setDestino($destinoNuevo){
        $this->destino = $destinoNuevo;
    }

    /**
     * Modifíca la cantidad máxima de pasajeros
     * Returna un booleano para indicar si la operación es válida
     * 
     * @param int $cantMaxima
     * @return boolean $numeroValido
     */
    public function setCantMaxPasajeros($cantMaxima){
        // boolean $numeroValido
        if (ctype_digit($cantMaxima) && $cantMaxima >= 0){
            $numeroValido = true;
            $this->cantMaxPasajeros = $cantMaxima;
        } else {
            $numeroValido = false;
        }
        return $numeroValido;
    }

    /**
     * Modifíca el arreglo de pasajeros, recibe por parametro un arreglo nuevo de pasajeros
     * Retorna un booleano que indica si el arreglo de pasajeros se modificó exitosamente
     * o si excede la cantidad permitida por el viaje
     * 
     * @param array $arregloPasajeros
     * @return boolean
     */
    public function setPasajeros($arregloPasajeros){
        // boolean $puedeAgregar
        if(count($arregloPasajeros) > $this->cantMaxPasajeros){
            $puedeAgregar = false;
        }else{
            $puedeAgregar = true;
            $this->pasajeros = $arregloPasajeros;
        }
        return $puedeAgregar;
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
        $viaje = "Código de viaje: ".$this->codigo."\n";
        $viaje = $viaje ."Destino de viaje: ".$this->destino."\n";
        $viaje = $viaje ."Cantidad máxima de pasajeros para este viaje: ".$this->cantMaxPasajeros."\n";
        $viaje = $viaje ."Información de los pasajeros del viaje: \n";

        for($i = 0; $i < count($this->pasajeros); $i++){

            $documento = $this->pasajeros[$i]["numero de documento"];
            $nombre = $this->pasajeros[$i]["nombre"];
            $apellido = $this->pasajeros[$i]["apellido"];
            $viaje = $viaje ."Pasajero ". $i+1 .": [Documento: ".$documento.", Nombre: ".$nombre.", Apellido: ".$apellido."]\n";   
        }
        return $viaje;
    }
    
    /**
     * Si hay espacio en el viaje y no existe previamente el documento del pasajero a ingresar, 
     * entonces se agrega el nuevo pasajero
     * Retorna un string que indica si se agrego el pasajero exitosamente 
     * o cual fue el error por el cual no se pudo agregar
     * 
     * @param array $nuevoPasajero
     * @return string
     */
    public function agregarPasajero($nuevoPasajero){
        // string $mensaje

        if (count($this->pasajeros) == $this->cantMaxPasajeros){
            $mensaje = "ERROR: Límite máximo de pasajeros alcanzado\n";
        } else {
            if ($this->buscaPasajero($nuevoPasajero["numero de documento"]) != -1){
                $mensaje = "ERROR: Documento ya existente en el viaje\n";
            } else {
                $mensaje = "Pasajero agregado exitosamente\n";
                array_push($this->pasajeros, $nuevoPasajero);
            }
        }

        return $mensaje;
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

        while ($existePasajero == false && $posPasajero < count($this->pasajeros)){
            if ($nroDocumento == $this->pasajeros[$posPasajero]["numero de documento"]){
                $existePasajero = true;
                $posPasajero--; 
            }
            $posPasajero++;
        }

        if($posPasajero == count($this->pasajeros)){
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