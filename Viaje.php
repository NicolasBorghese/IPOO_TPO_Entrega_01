<?php

class Viaje{

    //ATRIBUTOS
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $colPasajeros;
    private $responsable;
    private $empresa;
    private $costoPasaje;
    private $recaudacionTotal;
    private $mensajeOperacion;

    // Estructura del arreglo de pasajeros:
    // $colPasajeros[numero] = [objPasajero];

    //CONSTRUCTOR
    /**
     * Crea una instancia de la clase Viaje
     */
    public function __construct(){
        $this->codigo = "";
        $this->destino = "";
        $this->cantMaxPasajeros = "";
        $this->colPasajeros = [];
        $this->responsable = null;
        $this->empresa = null;
        $this->costoPasaje = "";
        $this->recaudacionTotal = "";
        $this->mensajeOperacion = "";
    }

    /**
     * Función que asigna los valores ingresados por párametro
     * a los atributos del Viaje.
     * @param int $codigoNuevo
     * @param string $destinoNuevo
     * @param int $cantMax
     * @param array $colPasajeros
     * @param ResponsableV $responsable
     * @param Empresa $empresa
     * @param float $costoPasaje
     */
    public function cargar($codigo, $destino, $cantMax, $colPasajeros, $responsable, $empresa, $costoPasaje){
        $this->setCodigo($codigo);
        $this->setDestino($destino);
        $this->setCantMaxPasajeros($cantMax);
        $this->setColPasajeros($colPasajeros);
        $this->setResponsable($responsable);
        $this->setEmpresa($empresa);
        $this->setCostoPasaje($costoPasaje);
        $this->actualizarRecaudacionTotal();
    }

    /*/=======================================================================================\*\
    ||                                        OBSERVADORES                                     ||
    \*\=======================================================================================/*/

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

    /**
     * Devuelve el objeto de tipo Empresa al que pertenece el viaje
     * 
     * @return Empresa
     */
    public function getEmpresa(){
        return $this->empresa;
    }

    /**
     * Devuelve un float que representa el costo del viaje por pasajero
     * 
     * @return float
     */
    public function getCostoPasaje(){
        return $this->costoPasaje;
    }

    /**
     * Devuelve un float que representa el total recaudado por todos los pasajes vendidos
     * 
     * @return float
     */
    public function getRecaudacionTotal(){
        return $this->recaudacionTotal;
    }

    /**
     * Devuelve el mensaje obtenido de realizar una operación en la base de datos
     * 
     * @return string
     */
    public function getMensajeOperacion(){
        return $this->mensajeOperacion;
    }

    /*/=======================================================================================\*\
    ||                                       MODIFICADORES                                     ||
    \*\=======================================================================================/*/

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

    /**
     * Modifica el objeto de tipo Empresa al que pertenece el viaje
     * 
     * @param Empresa $empresa
     */
    public function setEmpresa($empresa){
        $this->empresa = $empresa;
    }

    /**
     * Modifica el costo de viaje actual, recibe por parámetro un float
     * 
     * @param float $costoViaje
     */
    public function setCostoPasaje($costoPasaje){
        $this->costoPasaje = $costoPasaje;
    }

    /**
     * Modifica la recaudacion total del viaje, recibe por parámetro un float
     * 
     * @param float $recaudacionTotal
     */
    public function setRecaudacionTotal($recaudacionTotal){
        $this->recaudacionTotal = $recaudacionTotal;
    }

    /**
     *  Recibe un mensaje obtenido de realizar una operación en la base de datos
     * 
     * @param string $mensajeOperacion
     */
    public function setMensajeOperacion($mensajeOperacion){
        $this->mensajeOperacion = $mensajeOperacion;
    }

    /*/=======================================================================================\*\
    ||                                 PROPIOS DE LA CLASE                                     ||
    \*\=======================================================================================/*/

    /**
     * Devuelve un string con todos los elementos que componen al viaje
     * 
     * @return string
     */
    public function __toString(){
        //string $viaje
        //int $idEmpresa
        $idEmpresa = $this->getEmpresa()->getIdEmpresa();

        $viaje = "[ID Viaje: ".$this->getCodigo()."]";
        $viaje = $viaje ."[Destino : ".$this->getDestino()."]";
        $viaje = $viaje ."[Cantidad máxima de pasajeros permitida: ".$this->getCantMaxPasajeros()."]\n";
        $viaje = $viaje ."Responsable del viaje: ".$this->getResponsable()."\n";
        $viaje = $viaje ."[ID Empresa: ".$idEmpresa."]";
        $viaje = $viaje ."[Costo de pasaje: $".$this->getCostoPasaje()."]";
        $viaje = $viaje. "[Recaudación total: $".$this->getRecaudacionTotal()."]\n\n";
        $viaje = $viaje ." _______________________________| Pasajeros del viaje |_______________________________\n";
        $viaje = $viaje ."|                                                                                     |\n";
        $viaje = $viaje . $this->mostrarColPasajeros();
        
        return $viaje;
    }

    /**
     * Devuelve un string con la información de todos los pasajeros del viaje
     * 
     * @return string
     */
    public function mostrarColPasajeros(){
        // string $cadenaPasajeros
        $cadenaPasajeros = "";

        if(count($this->getColPasajeros())  == 0){
            $cadenaPasajeros = "[Este viaje no tiene pasajeros cargados]\n";
        } else {
            for($i = 0; $i < count($this->getColPasajeros()); $i++){
                $cadenaPasajeros = $cadenaPasajeros. "Pasajero N°". ($i+1) ." ".($this->getColPasajeros()[$i])."\n\n";
            }
        }
        return $cadenaPasajeros;
    }

    /**
     * Recibe por parámetro el documento de un pasajero y si existe en la colección de pasajeros
     * lo retornará
     * 
     * @param string $documento
     * @return Pasajero
     */
    public function mostrarPasajero($documento){
        //Pasajero $pasajeroObtenido
        //int $posicionObtenida
        $pasajeroObtenido = null;
        $posicionObtenida = $this->buscaPasajero($documento);
        if($posicionObtenida != -1){
            $pasajeroObtenido = $this->getColPasajeros()[$posicionObtenida];
        }
        return $pasajeroObtenido;
    }

    /**
     * Recibe por parámetro un número de asiento y si alguien tiene ese asiento asignado
     * lo retornará
     * 
     * @param int $numeroAsiento
     * @return Pasajero
     */
    public function mostrarPasajeroPorNroAsiento($numeroAsiento){
        //array $colPasajeros
        //Pasajero $pasajeroObtenido
        //boolean $encontrado
        //int $posPasajero, $asientoLeido
        $colPasajeros = $this->getColPasajeros();
        $pasajeroObtenido = null;
        $encontrado = false;
        $posPasajero = 0;

        while($posPasajero < count($colPasajeros) && !$encontrado){
            $asientoLeido = $colPasajeros[$posPasajero]->getNumeroAsiento();
            if($asientoLeido == $numeroAsiento){
                $encontrado = true;
                $pasajeroObtenido = $colPasajeros[$posPasajero];
            }
            $posPasajero++;
        }
        return $pasajeroObtenido;
    }

    /**
     * Retorna un string que indica que asientos estan libres
     * 
     * @return string
     */
    public function mostrarAsientosLibres(){
        //int $posAsiento, $ultimoAsiento, $cantidadPasajeros
        //string $asientosLibres, $imagen, $desfasaje, $ultimaImagen
        //array $colPasajeros
        $posPasajero = 0;
        $ultimoAsiento = $this->getCantMaxPasajeros();
        $this->ordenarPasajerosPorAsiento();
        $colPasajeros = $this->getColPasajeros();
        $cantidadPasajeros = count($colPasajeros);
        $desfasaje = "";
        $imagen =         "=====================================================================================\n";
        $imagen = $imagen."|| Los asientos libres del viaje son aquellos que tienen número visible            ||\n";
        $imagen = $imagen."=====================================================================================\n\n";
        $imagen = $imagen."   _======___________======_\n";
        $imagen = $imagen."  /                         \ \n";
        $imagen = $imagen." /.-------------------------.\ \n";
        $imagen = $imagen."| \_________________________/ |\n";
        $imagen = $imagen."| |  [     ]       [     ]  | |\n";
        $imagen = $imagen."| |                         | |\n";

        for ($posAsiento = 1; $posAsiento <= $ultimoAsiento; $posAsiento++){

            if((($posAsiento+3) % 4 == 0)){
                if($posPasajero < $cantidadPasajeros) {
                    if ($posAsiento == $colPasajeros[$posPasajero]->getNumeroAsiento()){
                        $posPasajero++;
                        $imagen = $imagen . "| [ -- ]";
                        $desfasaje = "--";
                    }else{
                        if($posAsiento < 10){
                            $imagen = $imagen . "| [ 0".$posAsiento." ]";
                            $desfasaje = "0".$posAsiento;
                        }else{
                            $imagen = $imagen . "| [ ".$posAsiento." ]";
                            $desfasaje = $posAsiento."";
                        } 
                    }
                } else {
                    if($posAsiento < 10){
                        $imagen = $imagen . "| [ 0".$posAsiento." ]";
                        $desfasaje = "0".$posAsiento;
                    }else{
                        $imagen = $imagen . "| [ ".$posAsiento." ]";
                        $desfasaje = $posAsiento."";
                    }    
                }
            } else if ((($posAsiento+2) % 4 == 0)) {
                if($posPasajero < $cantidadPasajeros) {
                    if ($posAsiento == $colPasajeros[$posPasajero]->getNumeroAsiento()){
                        $posPasajero++;
                        $imagen = $imagen . "[ -- ]";
                        $desfasaje = $desfasaje."--";
                    }else{
                        if($posAsiento < 10){
                            $imagen = $imagen . "[ 0".$posAsiento." ]";
                            $desfasaje = $desfasaje. "0" .$posAsiento;
                        }else{
                            $imagen = $imagen . "[ ".$posAsiento." ]";
                            $desfasaje = $desfasaje . $posAsiento."";
                        }  
                    }
                } else {
                    if($posAsiento < 10){
                        $imagen = $imagen . "[ 0".$posAsiento." ]";
                        $desfasaje = $desfasaje. "0" .$posAsiento;
                    }else{
                        $imagen = $imagen . "[ ".$posAsiento." ]";
                        $desfasaje = $desfasaje . $posAsiento."";
                    }  
                }
            } else if ((($posAsiento+1) % 4 == 0)){
                if($posPasajero < $cantidadPasajeros) {
                    if ($posAsiento == $colPasajeros[$posPasajero]->getNumeroAsiento()){
                        $posPasajero++;
                        $imagen = $imagen . "   [ -- ]";
                        $desfasaje = $desfasaje."--";
                    }else{
                        if($posAsiento < 10){
                            $imagen = $imagen . "   [ 0".$posAsiento." ]";
                            $desfasaje = $desfasaje. "0" .$posAsiento;
                        }else{
                            $imagen = $imagen . "   [ ".$posAsiento." ]";
                            $desfasaje = $desfasaje . $posAsiento."";
                        }   
                    }
                } else {
                    if($posAsiento < 10){
                        $imagen = $imagen . "   [ 0".$posAsiento." ]";
                        $desfasaje = $desfasaje. "0" .$posAsiento;
                    }else{
                        $imagen = $imagen . "   [ ".$posAsiento." ]";
                        $desfasaje = $desfasaje . $posAsiento."";
                    }    
                }
            } else if (($posAsiento % 4 == 0)){
                if($posPasajero < $cantidadPasajeros) {
                    if ($posAsiento == $colPasajeros[$posPasajero]->getNumeroAsiento()){
                        $posPasajero++;
                        if(strlen($desfasaje) < 7){
                            $imagen = $imagen . "[ -- ] |\n";
                        } else if (strlen($desfasaje) == 7){
                            $imagen = $imagen . "[ -- ]|\n";
                        } else {
                            $imagen = $imagen . "[ -- ]\n";
                        }
                        $imagen = $imagen."| |                         | |\n";
                    }else{
                        if($posAsiento < 10){
                            $imagen = $imagen . "[ 0".$posAsiento." ] |\n";
                            $imagen = $imagen."| |                         | |\n";
                        }else{
                            $desfasaje = $desfasaje . $posAsiento."";
                            if(strlen($desfasaje) < 9){
                                $imagen = $imagen . "[ ".$posAsiento." ] |\n";
                            } else if (strlen($desfasaje) == 9){
                                $imagen = $imagen . "[ ".$posAsiento." ]|\n";
                            } else {
                                $imagen = $imagen . "[ ".$posAsiento." ]\n";
                            }
                            $imagen = $imagen."| |                         | |\n";
                        }
                    }
                } else {
                    if($posAsiento < 10){
                        $imagen = $imagen . "[ 0".$posAsiento." ] |\n";
                        $imagen = $imagen."| |                         | |\n";
                    }else{
                        $desfasaje = $desfasaje . $posAsiento."";
                        if(strlen($desfasaje) < 9){
                            $imagen = $imagen . "[ ".$posAsiento." ] |\n";
                        } else if (strlen($desfasaje) == 9){
                            $imagen = $imagen . "[ ".$posAsiento." ]|\n";
                        } else {
                            $imagen = $imagen . "[ ".$posAsiento." ]\n";
                        }
                        $imagen = $imagen."| |                         | |\n";
                    }
                }
            }
        }
        $posAsiento--;

        if((($posAsiento+3) % 4 == 0)){
            $ultimaImagen = "                    | |";
            $ultimaImagen = substr($ultimaImagen, strlen($desfasaje)-2);
            $imagen = $imagen . $ultimaImagen . "\n";
            $imagen = $imagen."| |                         | |\n";
        } else if ((($posAsiento+2) % 4 == 0)){
            $ultimaImagen = "              | |";
            $ultimaImagen = substr($ultimaImagen, strlen($desfasaje)-4);
            $imagen = $imagen . $ultimaImagen . "\n";
            $imagen = $imagen."| |                         | |\n";
        }else if ((($posAsiento+1) % 4 == 0)){
            $ultimaImagen = "     | |";
            $ultimaImagen = substr($ultimaImagen, strlen($desfasaje)-6);
            $imagen = $imagen . $ultimaImagen. "\n";
            $imagen = $imagen."| |                         | |\n";
        }
        $imagen = $imagen."| '_________________________' |\n";
        $imagen = $imagen."| /                         \ |\n";
        $imagen = $imagen."|'---------------------------'|\n";
        $imagen = $imagen."'-=====-----------------=====-'\n";

        if($ultimoAsiento == 0){
            $imagen = "[El vehículo de transporte no tiene asientos para pasajeros]";
        }
        return $imagen;
    }

    /**
     * Devuelve un arreglo con los números de asientos libres
     * 
     * @return array
     */
    public function arregloAsientosLibres(){
        $posPasajero = 0;
        $ultimoAsiento = $this->getCantMaxPasajeros();
        $this->ordenarPasajerosPorAsiento();
        $colPasajeros = $this->getColPasajeros();
        $arregloAsiento = [];

        for ($asiento = 1; $asiento <= $ultimoAsiento; $asiento++){

            if($asiento <= $this->mayorAsientoOcupado()){
                if($asiento == $colPasajeros[$posPasajero]->getNumeroAsiento()){
                    $posPasajero++;
                } else {
                    $arregloAsiento[] = $asiento;
                }
            } else {
                $arregloAsiento[] = $asiento;
            }
            
        }

        return $arregloAsiento;
    }

    /**
     * Ordena los pasajeros por número de asiento
     * 
     */
    public function ordenarPasajerosPorAsiento(){
        //array $colPasajeros, $colOrdenada
        //Pasajero $pasajeroAux
        //int $posAsiento
        $colPasajeros = $this->getColPasajeros();
        $colOrdenada = [];

        for($i=0; $i < count($colPasajeros); $i++){

            array_push($colOrdenada, $colPasajeros[$i]);
            $posAsiento = count($colOrdenada)-1;

            while($posAsiento > 0 && 
            $colOrdenada[$posAsiento]->getNumeroAsiento() < $colOrdenada[$posAsiento-1]->getNumeroAsiento()){

                $pasajeroAux = $colOrdenada[$posAsiento-1];
                $colOrdenada[$posAsiento-1] = $colOrdenada[$posAsiento];
                $colOrdenada[$posAsiento] = $pasajeroAux;

                $posAsiento--;
            }
        }

        $this->setColPasajeros($colOrdenada);
    }

    /**
     * Si hay espacio disponible, el documento del pasajero no se repite y
     * el asiento elegido está libre entonces se vende
     * un pasaje al usuario ingresado por parámetro.
     * Retorna el costo final que debe abonar el pasajero
     * 
     * @param Pasajero $objPasajero
     * @return float
     */
    public function venderPasaje($objPasajero){
        //boolean $pasajeDisponible, $existeDocumento, $asientoOcupado
        //float $costoPasajeFinal
        $pasajeDisponible = $this->hayPasajesDisponible();
        $existeDocumento = $this->existePasajero($objPasajero->getDocumento());

        $numeroAsiento = $objPasajero->getNumeroAsiento();
        $asientoOcupado = $this->esAsientoOcupado($numeroAsiento);

        if($pasajeDisponible && !$existeDocumento && !$asientoOcupado && 
        $numeroAsiento <= $this->getCantMaxPasajeros()){
            $objPasajero->insertar();
            $this->agregarPasajero($objPasajero);

            $costoPasajeFinal = $this->valorFinalPasaje($objPasajero);
            $recaudacionTotal = $this->getRecaudacionTotal() + $costoPasajeFinal;
            $this->setRecaudacionTotal($recaudacionTotal);

        } else {
            $costoPasajeFinal = -1;
        }
        return $costoPasajeFinal;
    }

    /**
     * Agrega el pasajero recibido a la colección de pasajeros
     * 
     * @param Pasajero $nuevoPasajero
     */
    private function agregarPasajero($nuevoPasajero){
        // array $pasajerosAux

        $pasajerosAux = $this->getColPasajeros();
        array_push($pasajerosAux, $nuevoPasajero);
        $this->setColPasajeros($pasajerosAux);
    }

    /**
     * Metodo de acceso privado
     * Busca un pasajero por número de documento, si existe retorna su posición
     * en la colección de pasajeros, si no existe retorna -1
     * 
     * @param $documento
     * @return int
     */
    private function buscaPasajero($documento){
        // boolean $existePasajero
        // int $posPasajero
        $existePasajero = false;
        $posPasajero = 0;

        while ($existePasajero == false && $posPasajero < count($this->getColPasajeros())){

            $docPasajeroEnCol = ($this->getColPasajeros()[$posPasajero])->getDocumento();

            if ($documento == $docPasajeroEnCol){
                $existePasajero = true;
                $posPasajero--; 
            }
            $posPasajero++;
        }

        if(!$existePasajero){
            $posPasajero = -1;
        }
        return $posPasajero;
    }

    /**
     * Indica si ya existe o no un pasajero dentro del viaje comparando un documento ingresado
     * 
     * @param string $documento
     * @return boolean
     */
    public function existePasajero($documento){
        //boolean $existe
        $existe = false;
        if($this->buscaPasajero($documento) != -1){
            $existe = true;
        }
        return $existe;
    }

    /**
     * Obtiene el costo final de un pasaje para un determinado pasajero
     * 
     * @param Pasajero $objPasajero
     * @return float
     */
    public function valorFinalPasaje($objPasajero){
        //float $costoPasaje, $incrementoPasajero, $costoFinalPasaje

        $costoPasaje = $this->getCostoPasaje();
        $incrementoPasajero = $objPasajero->darPorcentajeIncremento();
        $costoFinalPasaje = $costoPasaje + (($incrementoPasajero * $costoPasaje)/100);

        return $costoFinalPasaje;
    }

    /**
     * Busca el costo del pasaje de todos los pasajeros del viaje, los suma y setea ese
     * valor para la recaudación total
     * 
     */
    public function actualizarRecaudacionTotal(){
        //array $colPasajeros
        //Pasajero $pasajeroActual
        //float $costoPasaje
        //float $recaudacionTotal

        $recaudacionTotal = 0;
        $colPasajeros = $this->getColPasajeros();

        for($i=0; $i < count($colPasajeros); $i++){
            $pasajeroActual = $colPasajeros[$i];
            $costoPasaje = $this->valorFinalPasaje($pasajeroActual);
            $recaudacionTotal = $recaudacionTotal + $costoPasaje;
        }
        $this->setRecaudacionTotal($recaudacionTotal);
        if($this->getCodigo() != ""){
            $this->modificar();
        }
    }

    /**
     * Indica si el viaje tiene pasajes disponibles o no
     * Retorna una booleano que vale true para disponibles y false para no disponibles.
     * 
     * @return boolean
     */
    public function hayPasajesDisponible(){
        //boolean $hayPasajes
        //int $asientosTotales, $asientosOcupados
        $hayPasajes = true;
        $asientosTotales = $this->getCantMaxPasajeros();
        $asientosOcupados = count($this->getColPasajeros());
        
        if($asientosOcupados == $asientosTotales){
            $hayPasajes = false;
        }
        return $hayPasajes;
    }

    /**
     * Retorna la cantidad de asientos que hay disponibles
     * 
     * @return int
     */
    public function cantidadAsientosDisponibles(){
        //int $asientosDiponibles, $asientosTotales, $asientosOcupados

        $asientosTotales = $this->getCantMaxPasajeros();
        $asientosOcupados = count($this->getColPasajeros());
        $asientosDisponibles = $asientosTotales - $asientosOcupados;

        return $asientosDisponibles;
    }

    /**
     * Retorna un int que indica cual es el asiento de mayor valor ocupado
     * 
     * @return int
     */
    public function mayorAsientoOcupado(){
        //int $asiento
        //array $colPasajeros
        $asiento = 0;
        $this->ordenarPasajerosPorAsiento();
        $colPasajeros = $this->getColPasajeros();
        if(count($colPasajeros) >= 1){
            $asiento = $colPasajeros[count($colPasajeros)-1]->getNumeroAsiento();
        }

        return $asiento;
    }

    /**
     * Indica si el número de asiento ingresado está ocupado o no
     * Retorna true si está ocupado, false en caso contrario
     * 
     * @param int $numeroAsiento
     * @return boolean
     */
    public function esAsientoOcupado($numeroAsiento){
        //array $colPasajeros
        //Pasajero $pasajeroActual
        //Boolean $asientoEncontrado

        $colPasajeros = $this->getColPasajeros();
        $posPasajero = 0;
        $asientoEncontrado = false;

        while($posPasajero < count($colPasajeros) && !$asientoEncontrado){
            $asientoPasajero = $colPasajeros[$posPasajero]->getNumeroAsiento();

            if($numeroAsiento == $asientoPasajero){
                $asientoEncontrado = true;
            }
            $posPasajero++;
        }

        return $asientoEncontrado;
    }

    /**
     * Carga una nueva colección de pasajeros y actualiza la recaudación total
     * 
     * @param array $colPasajeros
     */
    public function cargaColPasajeros($colPasajerosNueva){

        $colPasajeros = $this->getColPasajeros();
        $colPasajeros = array_merge($colPasajerosNueva, $colPasajeros);
        $this->setColPasajeros($colPasajeros);
        $this->actualizarRecaudacionTotal();
        
    }

    /**
     * Quita todos los pasajeros del viaje y setea la recaudación total en $0
     * 
     */
    public function vaciarViaje(){
        $pasajero = new Pasajero();
        $pasajero->eliminarPasajerosPorIdViaje($this->getCodigo());
        $this->setColPasajeros([]);
        $this->setRecaudacionTotal(0);
    }

    /**
     * Recibe el documento del pasajero a quitar
     * Retorna true si es posible, false en caso contrario
     * 
     * @param int $documento
     * @return boolean
     */
    public function quitarPasajero($documento){
        // int $posPasajero
        // float $costoPasaje, $recaudacionTotal
        // boolean $puedeQuitar
        // array $colPasajerosAux
        $colPasajerosAux = [];

        $posPasajero = $this->buscaPasajero($documento);

        if($posPasajero == -1){
            $puedeQuitar = false;
        } else {
            $puedeQuitar = true;
            $colPasajerosAux = $this->getColPasajeros();

            $colPasajerosAux[$posPasajero]->eliminar();

            $costoPasaje = $this->valorFinalPasaje($colPasajerosAux[$posPasajero]);
            $recaudacionTotal = $this->getRecaudacionTotal() - $costoPasaje;
            $this->setRecaudacionTotal($recaudacionTotal);

            unset($colPasajerosAux[$posPasajero]);
            $colPasajerosAux = array_values($colPasajerosAux);
            $this->setColPasajeros($colPasajerosAux);
        }

        return $puedeQuitar;
    }

    /**
     * Modifica el nombre de un pasajero identificandolo por su número de documento
     * Retorna true si es posible, false en caso contrario
     * 
     * @param int $documento
     * @param string $nombreNuevo
     * @return boolean
     */
    public function modificarNombrePasajero($documento, $nombreNuevo){
        // int $posPasajero
        // boolean $puedeModificar
        // array $colPasajerosAux
        $colPasajerosAux = [];

        $posPasajero = $this->buscaPasajero($documento);

        if($posPasajero == -1){
            $puedeModificar = false;
        } else {
            $puedeModificar = true;
            $colPasajerosAux = $this->getColPasajeros();
            $colPasajerosAux[$posPasajero]->setNombre($nombreNuevo);
            $colPasajerosAux[$posPasajero]->modificar();
            $this->setColPasajeros($colPasajerosAux);
        }
        return $puedeModificar;
    }

    /**
     * Modifica el apellido de un pasajero identificandolo por su número de documento
     * Retorna true si es posible, false en caso contrario
     * 
     * @param int $documento
     * @param string $apellidoNuevo
     * @return boolean
     */
    public function modificarApellidoPasajero($documento, $apellidoNuevo){
        // int $posPasajero
        // boolean $puedeModificar
        // array $colPasajerosAux
        $colPasajerosAux = [];

        $posPasajero = $this->buscaPasajero($documento);

        if($posPasajero == -1){
            $puedeModificar = false;
        } else {
            $puedeModificar = true;
            $colPasajerosAux = $this->getColPasajeros();
            $colPasajerosAux[$posPasajero]->setApellido($apellidoNuevo);
            $colPasajerosAux[$posPasajero]->modificar();
            $this->setColPasajeros($colPasajerosAux);
        }
        return $puedeModificar;
    }

    /**
     * Modifica el número de teléfono de un pasajero identificandolo por su número de documento
     * Retorna true si es posible, false en caso contrario
     * 
     * @param int $documento
     * @param string $telefonoNuevo
     * @return boolean
     */
    public function modificarTelefonoPasajero($documento, $telefonoNuevo){
        // int $posPasajero
        // boolean $puedeModificar
        // array $colPasajerosAux
        $colPasajerosAux = [];

        $posPasajero = $this->buscaPasajero($documento);

        if($posPasajero == -1){
            $puedeModificar = false;
        } else {
            $puedeModificar = true;
            $colPasajerosAux = $this->getColPasajeros();
            $colPasajerosAux[$posPasajero]->setTelefono($telefonoNuevo);
            $colPasajerosAux[$posPasajero]->modificar();
            $this->setColPasajeros($colPasajerosAux);
        }
        return $puedeModificar;
    }

    /**
     * Modifica el número de aiento de un pasajero identificandolo por su número de documento
     * Retorna true si es posible, false en caso contrario
     * 
     * @param int $documento
     * @param string $asientoNuevo
     * @return boolean
     */
    public function modificarAsientoPasajero($documento, $asientoNuevo){
        // int $posPasajero
        // boolean $puedeModificar
        // array $colPasajerosAux
        $colPasajerosAux = [];
        $posPasajero = $this->buscaPasajero($documento);

        if(!ctype_digit($asientoNuevo) || $posPasajero == -1 || $this->esAsientoOcupado($asientoNuevo) ||
        $asientoNuevo > $this->getCantMaxPasajeros() || $asientoNuevo < 1){
            $puedeModificar = false;
        } else {
            $asientoNuevo = (int)$asientoNuevo;
            $puedeModificar = true;
            $colPasajerosAux = $this->getColPasajeros();
            $colPasajerosAux[$posPasajero]->setNumeroAsiento($asientoNuevo);
            $colPasajerosAux[$posPasajero]->modificar();
            $this->setColPasajeros($colPasajerosAux);
        }
        return $puedeModificar;
    }

    /**
     * Busca un pasajero especial por su número de documento dentro del viaje, si existe
     * modifica los campos de pasajero especial según los datos recibidos por parámetro
     * y actualiza la recaudación total del viaje
     * Retorna true si es posible, false en caso contrario
     * 
     * @param string $documento
     * @param string $servicioSilla
     * @param string $servicioAsistencia
     * @param string $servicioComida
     * @return boolean
     */
    public function modificarServiciosEspecialesPasajero(
        $documento, $servicioSilla, $servicioAsistencia, $servicioComida){
        //int $posPasajero
        //float $recaudacionTotal
        //boolean $reqSilla, $reqAsistencia, $reqComida, $puedeModificar
        //array $colPasajeros

        $puedeModificar = false;
        $posPasajero = $this->buscaPasajero($documento);

        if($posPasajero != -1){
            $colPasajeros = $this->getColPasajeros();

            if($colPasajeros[$posPasajero] instanceof PasajeroEspecial){

                $puedeModificar = true;
                $recaudacionTotal = $this->getRecaudacionTotal();
                $recaudacionTotal -= $this->valorFinalPasaje($colPasajeros[$posPasajero]);

                if(strtolower($servicioSilla) == "si"){
                    $reqSilla = true;
                } else if (strtolower($servicioSilla) == "no"){
                    $reqSilla = false;
                } else {
                    $reqSilla = $colPasajeros[$posPasajero]->getReqSilla();
                }
    
                if(strtolower($servicioAsistencia) == "si"){
                    $reqAsistencia = true;
                } else if (strtolower($servicioAsistencia) == "no"){
                    $reqAsistencia = false;
                } else {
                    $reqAsistencia = $colPasajeros[$posPasajero]->getReqAsistencia();
                }
    
                if(strtolower($servicioComida) == "si"){
                    $reqComida = true;
                } else if (strtolower($servicioComida) == "no"){
                    $reqComida = false;
                } else {
                    $reqComida = $colPasajeros[$posPasajero]->getReqComida();
                }
    
                $colPasajeros[$posPasajero]->setReqSilla($reqSilla);
                $colPasajeros[$posPasajero]->setReqAsistencia($reqAsistencia);
                $colPasajeros[$posPasajero]->setReqComida($reqComida);
                $colPasajeros[$posPasajero]->modificar();

                $recaudacionTotal += $this->valorFinalPasaje($colPasajeros[$posPasajero]);
                $this->setRecaudacionTotal($recaudacionTotal);
                $this->setColPasajeros($colPasajeros);
            }
        }
        return $puedeModificar;
    }

    /**
     * Busca un pasajero VIP por su número de documento dentro del viaje, si existe
     * modifica los campos de pasajero VIP según los datos recibidos por parámetro
     * y actualiza la recaudación total del viaje
     * Retorna true si es posible, false en caso contrario
     * 
     * @param string $documento
     * @param string $nroViajeroFrecuente
     * @param int $cantMillas
     * @return boolean
     */
    public function modificarCamposVIPPasajero(
        $documento, $nroViajeroFrecuente, $cantMillas){
        //int $posPasajero
        //float $recaudacionTotal
        //boolean $puedeModificar
        //array $colPasajeros

        $puedeModificar = false;
        $posPasajero = $this->buscaPasajero($documento);

        if($posPasajero != -1){
            $colPasajeros = $this->getColPasajeros();

            if($colPasajeros[$posPasajero] instanceof PasajeroVIP){

                $puedeModificar = true;
                $recaudacionTotal = $this->getRecaudacionTotal();
                $recaudacionTotal -= $this->valorFinalPasaje($colPasajeros[$posPasajero]);

                if($nroViajeroFrecuente == ""){
                    $nroViajeroFrecuente = $colPasajeros[$posPasajero]->getNroViajeroFrecuente();
                }
                if(!ctype_digit($cantMillas) || $cantMillas < 0){
                    $cantMillas = $colPasajeros[$posPasajero]->getCantMillas();
                }
    
                $colPasajeros[$posPasajero]->setNroViajeroFrecuente($nroViajeroFrecuente);
                $colPasajeros[$posPasajero]->setCantMillas($cantMillas);
                $colPasajeros[$posPasajero]->modificar();

                $recaudacionTotal += $this->valorFinalPasaje($colPasajeros[$posPasajero]);
                $this->setRecaudacionTotal($recaudacionTotal);
                $this->setColPasajeros($colPasajeros);
            }
        }
        return $puedeModificar;
    }

    /*/=======================================================================================\*\
    ||                            RELACIONADOS A LA BASE DE DATOS                              ||
    \*\=======================================================================================/*/

    /**
	 * Recupera los datos de un viaje en la base de datos a partir de un código de viaje ingresado
     * y los setea al objeto viaje actual.
     * Retorna true si tiene éxito en la operación, false en caso contrario
     * 
	 * @param int $codigo
	 * @return boolean
	 */		
    public function Buscar($codigo){
		$base = new BaseDatos();
		$consulta = "SELECT * FROM viaje WHERE idviaje = '".$codigo."'";
		$exito = false;
		if($base->Iniciar()){
			if($base->Ejecutar($consulta)){
				if($fila = $base->Registro()){	

				    $this->setCodigo($codigo);
                    $this->setDestino($fila['vdestino']);
                    $this->setCantMaxPasajeros($fila['vcantmaxpasajeros']);

                    $idResponsable = $fila['rnumeroempleado'];
                    $responsable = new ResponsableV();
                    $responsable->Buscar($idResponsable);
                    if($responsable == false){
                        $this->setResponsable(null);
                    } else {
                        $this->setResponsable($responsable);
                    }

                    $idEmpresa = $fila['idempresa'];
                    $empresa = new Empresa();
                    $empresa->Buscar($idEmpresa);
                    if($empresa == false){
                        $this->setEmpresa(null);
                    } else {
                        $this->setEmpresa($empresa);
                    }
                    
                    $this->setCostoPasaje($fila['vimporte']);
                    $this->setRecaudacionTotal($fila['vrecaudacion']);

                    $pasajero = new Pasajero();
                    $pasajeroEspecial = new PasajeroEspecial();
                    $pasajeroVIP = new pasajeroVIP();

                    $colPasajerosComunes = $pasajero->listar(
                        "pasajero.idviaje = ".$codigo." AND NOT EXISTS (SELECT * FROM pasajeroespecial
                        WHERE pasajeroespecial.pdocumento = pasajero.pdocumento)
                        AND NOT EXISTS (SELECT * FROM pasajerovip
                        WHERE pasajerovip.pdocumento = pasajero.pdocumento)"
                    );
                    $colPasajerosEspeciales = $pasajeroEspecial->listar(
                        "pasajero.idviaje = ".$codigo.""
                    );
                    $colPasajerosVIP = $pasajeroVIP->listar(
                        "pasajero.idviaje = ".$codigo.""
                    );

                    $colPasajeros = array_merge($colPasajerosComunes, $colPasajerosEspeciales, $colPasajerosVIP);

                    $this->setColPasajeros($colPasajeros);

					$exito = true;
				}				
		 	} else {
                $this->setMensajeOperacion($base->getError());
			}
		} else {
            $this->setMensajeOperacion($base->getError());	
		}		
		return $exito;
	}

    /**
     * Busca todos los viajes que cumplan una condición y devuelve un arreglo
     * que los contiene.
     * 
     * @param string $condicion
     * @return array
     */
    public function listar($condicion){
	    $colViajes = null;
		$base = new BaseDatos();
		$consulta = "SELECT * FROM viaje";
		if ($condicion != ""){
            $consulta = $consulta." WHERE ".$condicion;
		}
		$consulta.=" ORDER BY idviaje";

		if($base->Iniciar()){
			if($base->Ejecutar($consulta)){				
				$colViajes = array();
				while($fila=$base->Registro()){

                    $codigo = $fila['idviaje'];
                    $destino = $fila['vdestino'];
                    $cantMaxPasajeros = $fila['vcantmaxpasajeros'];

                    $idResponsable = $fila['rnumeroempleado'];
                    $responsable = new ResponsableV();
                    $responsable->Buscar($idResponsable);
                    if($responsable == false){
                        $responsable = null;
                    }

                    $idEmpresa = $fila['idempresa'];
                    $empresa = new Empresa();
                    $empresa->Buscar($idEmpresa);
                    if($empresa == false){
                        $empresa = null;
                    }

                    $costoPasaje = $fila['vimporte'];

                    $pasajero = new Pasajero();
                    $colPasajeros = $pasajero->listar("pasajero.idviaje = ".$codigo);

                    /*
                    $pasajero = new Pasajero();
                    $pasajeroEspecial = new PasajeroEspecial();
                    $pasajeroVIP = new pasajeroVIP();

                    $colPasajerosComunes = $pasajero->listar(
                        "pasajero.idviaje = ".$codigo." AND NOT EXISTS (SELECT * FROM pasajeroespecial
                        WHERE pasajeroespecial.pdocumento = pasajero.pdocumento)
                        AND NOT EXISTS (SELECT * FROM pasajerovip
                        WHERE pasajerovip.pdocumento = pasajero.pdocumento)"
                    );
                    $colPasajerosEspeciales = $pasajeroEspecial->listar(
                        "pasajero.idviaje = ".$codigo.""
                    );
                    $colPasajerosVIP = $pasajeroVIP->listar(
                        "pasajero.idviaje = ".$codigo.""
                    );

                    $colPasajeros = array_merge($colPasajerosComunes, $colPasajerosEspeciales, $colPasajerosVIP);
                    */


					$viaje = new Viaje();
					$viaje->cargar($codigo, $destino, $cantMaxPasajeros, $colPasajeros, $responsable, $empresa, $costoPasaje);
					array_push($colViajes, $viaje);
				}
		 	} else {
                $this->setMensajeOperacion($base->getError());	
			}
		} else {
            $this->setMensajeOperacion($base->getError());
		}	
		return $colViajes;
	}

    /**
     * Inserta un nuevo viaje a la base de datos según los datos actuales almacenados
     * en los atributos del objeto Viaje.
     * Retorna true si tiene éxito en la operación, false en caso contrario
     * 
     * @return boolean
     */
    public function insertar(){
		$base = new BaseDatos();
		$exito = false;

        $idEmpresa = $this->getEmpresa()->getIdEmpresa();
        $idResponsable = $this->getResponsable()->getNumeroEmpleado();

		$consulta = "INSERT INTO viaje(vdestino, vcantmaxpasajeros, idempresa, rnumeroempleado, vimporte, vrecaudacion) 
        VALUES ('".$this->getDestino()."', ".$this->getCantMaxPasajeros().", ".
        $idEmpresa.", ".$idResponsable.", ".$this->getCostoPasaje().", ".$this->getRecaudacionTotal().")";

		if($base->Iniciar()){

            if($id = $base->devuelveIDInsercion($consulta)){
                $this->setCodigo($id);
			    $exito = true;
			} else {
                $this->setMensajeOperacion($base->getError());
            }
		} else {
            $this->setMensajeOperacion($base->getError());
		}
		return $exito;
	}

    /**
     * Modifica todos los campos del viaje actual (identificado por su código de viaje)
     * en la base de datos según el estado actual de todos sus atributos.
     * Previamente se tuvo que hacer un set a cada atributo a modificar.
     * Retorna true si tiene éxito en la operación, false en caso contrario
     * 
     * @return boolean
     */
    public function modificar(){
	    $exito = false; 
	    $base = new BaseDatos();

        $idEmpresa = $this->getEmpresa()->getIdEmpresa();
        $idResponsable = $this->getResponsable()->getNumeroEmpleado();

		$consulta = "UPDATE viaje SET idviaje = ".$this->getCodigo().
        ", vdestino = '".$this->getDestino()."', vcantmaxpasajeros = ".$this->getCantMaxPasajeros().
        ", idempresa = ".$idEmpresa.", rnumeroempleado = ".$idResponsable.", vimporte = ".$this->getCostoPasaje().
        ", vrecaudacion = ".$this->getRecaudacionTotal().
        " WHERE idviaje = ".$this->getCodigo();

		if($base->Iniciar()){
			if($base->Ejecutar($consulta)){
			    $exito =  true;
			} else {
                $this->setMensajeOperacion($base->getError());
            }
		} else {
            $this->setMensajeOperacion($base->getError());	
		}
		return $exito;
	}

    /**
     * Elimina un viaje de la base de datos según su código de viaje.
     * Lee el código de viaje del Viaje actual y lo envía en la consulta.
     * Retorna true si tiene éxito en la operación, false en caso contrario
     * 
     * @return boolean
     */
    public function eliminar(){
		$base = new BaseDatos();
		$exito = false;
		if($base->Iniciar()){
            $consulta = "DELETE FROM viaje WHERE idviaje = ".$this->getCodigo().";";
            if($base->Ejecutar($consulta)){
                $exito = true;
			} else {
                $this->setMensajeOperacion($base->getError());
            }
		} else {
            $this->setMensajeOperacion($base->getError());	
		}
		return $exito; 
	}

    /**
     * Elimina el viaje
     */
    public function eliminarViaje(){
        $colPasajeros = $this->getColPasajeros();

        for($i = 0; $i < count($colPasajeros); $i++){
            $colPasajeros[$i]->eliminar();
        }
        $this->eliminar();
    }
}

?>