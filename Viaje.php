<?php

include_once ("Pasajero.php");
include_once ("ResponsableV.php");

class Viaje{

    //ATRIBUTOS
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $colPasajeros;
    private $responsable;

    // Estructura del arreglo de pasajeros:
    // colPasajeros[numero] = [objPasajero];

    //CONSTRUCTOR
    /**
     * Crea una instancia de Viaje
     * Recibe un código de viaje, un destino y la cantidad máxima de pasajeros del viaje
     * 
     * @param int $codigoNuevo
     * @param string $destinoNuevo
     * @param int $cantMax
     * @param ResponsableV $responsable
     */
    public function __construct($codigoNuevo, $destinoNuevo, $cantMax, $responsable){
        $this->codigo = $codigoNuevo;
        $this->destino = $destinoNuevo;
        $this->cantMaxPasajeros = $cantMax;
        $this->colPasajeros = [];
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
    public function getColPasajeros(){
        return $this->colPasajeros;
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
        $this->codigo = $codigoNuevo;
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
     * Modifica la colección de pasajeros, recibe por parámetro un arreglo nuevo de pasajeros
     * 
     * @param array $arregloPasajeros
     */
    public function setColPasajeros($arregloPasajeros){
            $this->colPasajeros = $arregloPasajeros;
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
        $viaje = $viaje ."Pasajeros del viaje: \n";
        $viaje = $viaje . $this->colPasajerosAString();

        return $viaje;
    }

    /**
     * Devuelve un string con la información de todos los pasajeros del viaje
     * 
     * @return string
     */
    public function colPasajerosAString(){
        // string $cadenaPasajeros
        $cadenaPasajeros = "";

        if(count($this->getColPasajeros())  == 0){
            $cadenaPasajeros = "[Este viaje no tiene pasajeros cargados]";
        } else {
            for($i = 0; $i < count($this->getColPasajeros()); $i++){
                $cadenaPasajeros = $cadenaPasajeros. "Pasajero N°". $i+1 ." [".($this->getColPasajeros()[$i])."]\n";
            }
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

        if (count($this->getColPasajeros()) == $this->getCantMaxPasajeros()){
            $exito = false;
        } else {
            if ($this->buscaPasajero($nuevoPasajero->getDocumento()) != -1){
                $exito = false;
            } else {
                $exito = true;
                $pasajerosAux = $this->getColPasajeros();
                array_push($pasajerosAux, $nuevoPasajero);
                $this->setColPasajeros($pasajerosAux);
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
        // array $colPasajerosAux
        $colPasajerosAux = [];

        $posPasajero = $this->buscaPasajero($documentoQuitar);

        if($posPasajero == -1){
            $puedeQuitar = false;
        } else {
            $puedeQuitar = true;
            $colPasajerosAux = $this->getColPasajeros();

            unset($colPasajerosAux[$posPasajero]);
            $colPasajerosAux = array_values($colPasajerosAux);

            $this->setColPasajeros($colPasajerosAux);
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
        // array $colPasajerosAux
        $colPasajerosAux = [];

        $posPasajero = $this->buscaPasajero($nroDocumento);

        if($posPasajero == -1){
            $puedeModificar = false;
        } else {
            $puedeModificar = true;
            $colPasajerosAux = $this->getColPasajeros();
            $colPasajerosAux[$posPasajero]->setNombre($nombreNuevo);
            $this->setColPasajeros($colPasajerosAux);
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
        // array $colPasajerosAux
        $colPasajerosAux = [];

        $posPasajero = $this->buscaPasajero($nroDocumento);

        if($posPasajero == -1){
            $puedeModificar = false;
        } else {
            $puedeModificar = true;
            $colPasajerosAux = $this->getColPasajeros();
            $colPasajerosAux[$posPasajero]->setApellido($apellidoNuevo);
            $this->setColPasajeros($colPasajerosAux);
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

        while ($existePasajero == false && $posPasajero < count($this->getColPasajeros())){

            $docPasajeroEnCol = ($this->getColPasajeros()[$posPasajero])->getDocumento();

            if ($nroDocumento == $docPasajeroEnCol){
                $existePasajero = true;
                $posPasajero--; 
            }
            $posPasajero++;
        }

        if($posPasajero == count($this->getColPasajeros())){
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