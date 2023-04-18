<?php

include_once ("Pasajero.php");
include_once ("ResponsableV.php");

class Viaje{

    //ATRIBUTOS
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $pasajeros;
    private $responsable;

    // Estructura del arreglo de pasajeros:
    // pasajeros[numero] = [objPasajero];

    //CONSTRUCTOR
    /**
     * Crea una instancia de Viaje
     * Recibe un código de viaje, un destino y la cantidad máxima de pasajeros del viaje
     * 
     * @param int $codigoNuevo
     * @param string $destinoNuevo
     * @param int $cantMax
     */
    public function __construct($codigoNuevo, $destinoNuevo, $cantMax, $responsable){
        $this->codigo = $codigoNuevo;
        $this->destino = $destinoNuevo;
        $this->cantMaxPasajeros = $cantMax;
        $this->pasajeros = [];
        $this->responsable = $responsable;
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

    /**
     * Devuelve un objeto de tipo ResponsableV que corresponde al responsable actual
     * 
     * @return ResponsableV
     */
    public function getResponsable(){
        return $this->responsable;
    }

    //MODIFICADORES
    /**
     * Modifica el código del viaje, recibe por parámetro un código nuevo
     * 
     * @param int $codigoNuevo
     */
    public function setCodigo($codigoNuevo){
        $this -> codigo = $codigoNuevo;
    }

    /**
     * Modifica el destino del viaje, recibe por parámetro un destino nuevo
     * 
     * @param string $destinoNuevo
     */
    public function setDestino($destinoNuevo){
        $this->destino = $destinoNuevo;
    }

    /**
     * Modifica la cantidad máxima de pasajeros, recibe por parámetro una nueva cantidad máxima
     * 
     * @param int $cantMaxima
     */
    public function setCantMaxPasajeros($cantMaxima){
        $this->cantMaxPasajeros = $cantMaxima;

    }

    /**
     * Modifica el arreglo de pasajeros, recibe por parámetro un arreglo nuevo de pasajeros
     * 
     * @param array $arregloPasajeros
     */
    public function setPasajeros($arregloPasajeros){
            $this->pasajeros = $arregloPasajeros;
    }

    /**
     * Modifica al responsable actual, recibe por parámetro un objeto de tipo ResponsableV
     * 
     * @param ResponsableV $responsable
     */
    public function setResponsable($responsable){
        $this->responsable = $responsable;
    }

    //PROPIOS DE CLASE
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
        $viaje = $viaje ."Responsable del viaje: [".$this->getResponsable()."]\n";
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
        // string $cadenaPasajeros
        $cadenaPasajeros = "";

        for($i = 0; $i < count($this->getPasajeros()); $i++){
            $cadenaPasajeros = $cadenaPasajeros. "Pasajero N°". $i+1 ." [".($this->getPasajeros()[$i])."]\n";
        }

        return $cadenaPasajeros;
    }
    
    /**
     * Si hay espacio en el viaje y no existe previamente el documento del pasajero a ingresar, 
     * entonces se agrega el nuevo pasajero
     * Retorna un booleano que indica si se agrego exitosamente el pasajero o no
     * 
     * @param Pasajero $nuevoPasajero
     * @return boolean
     */
    public function agregarPasajero($nuevoPasajero){
        // boolean $exito
        // array $pasajerosAux
        $pasajerosAux = [];

        if (count($this->getPasajeros()) == $this->getCantMaxPasajeros()){
            $exito = false;
        } else {
            if ($this->buscaPasajero($nuevoPasajero->getDocumento()) != -1){
                $exito = false;
            } else {
                $exito = true;
                $pasajerosAux = $this->getPasajeros();
                array_push($pasajerosAux, $nuevoPasajero);
                $this->setPasajeros($pasajerosAux);
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
        // array $pasajerosAux
        $pasajerosAux = [];

        $posPasajero = $this->buscaPasajero($documentoQuitar);

        if($posPasajero == -1){
            $puedeQuitar = false;
        } else {
            $puedeQuitar = true;
            $pasajerosAux = $this->getPasajeros();

            unset($pasajerosAux[$posPasajero]);
            $pasajerosAux = array_values($pasajerosAux);

            $this->setPasajeros($pasajerosAux);
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
        // array $pasajerosAux
        $pasajerosAux = [];

        $posPasajero = $this->buscaPasajero($nroDocumento);

        if($posPasajero == -1){
            $puedeModificar = false;
        } else {
            $puedeModificar = true;
            $pasajerosAux = $this->getPasajeros();
            $pasajerosAux[$posPasajero]->setNombre($nombreNuevo);
            $this->setPasajeros($pasajerosAux);
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
        // array $pasajerosAux
        $pasajerosAux = [];

        $posPasajero = $this->buscaPasajero($nroDocumento);

        if($posPasajero == -1){
            $puedeModificar = false;
        } else {
            $puedeModificar = true;
            $pasajerosAux = $this->getPasajeros();
            $pasajerosAux[$posPasajero]->setApellido($apellidoNuevo);
            $this->setPasajeros($pasajerosAux);
        }
        return $puedeModificar;
    }

    /**
     * Metodo de acceso privado
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

            $docPasajeroEnCol = ($this->getPasajeros()[$posPasajero])->getDocumento();

            if ($nroDocumento == $docPasajeroEnCol){
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

    /**
     * Indica si ya existe o no un pasajero dentro del viaje comparando un documento ingresado
     * 
     * @param string $documento
     * @return boolan
     */
    public function existePasajero($documento){
        //boolean $existe
        $existe = false;
        if($this->buscaPasajero($documento) != -1){
            $existe = true;
        }
        return $existe;
    }


    /*
    NO SE DEBERÍA MODIFICAR EL NÚMERO DE DOCUMENTO DE UN PASAJERO YA QUE SE ASUME QUE ES UN 
    IDENTIFICADOR UNÍVOCO
    (En tal caso se debe borrar y crear un pasajero nuevo)
    */
}
?>