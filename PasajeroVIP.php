<?php

class PasajeroVIP extends Pasajero{

    //ATRIBUTOS
    private $nroViajeroFrecuente;
    private $cantMillas;

    //CONSTRUCTOR
    /**
     * Crea una instancia de la clase PasajeroVIP
     */
    public function __construct(){
        parent::__construct();

        $this->nroViajeroFrecuente = "";
        $this->cantMillas = 0;
    }

    /**
     * Función que asigna los valores ingresados por párametro
     * a los atributos del pasajeroVIP
     * @param string $nombre
     * @param string $apellido
     * @param string $documento
     * @param string $telefono
     * @param string $numeroAsiento
     * @param string $numeroTicket
     * @param int $idViaje
     * @param string $nroViajeroFrecuente
     * @param float $cantMillas
     */
    public function cargarSub($nombre,
    $apellido,
    $documento,
    $telefono,
    $numeroAsiento,
    $numeroTicket,
    $idViaje,
    $nroViajeroFrecuente,
    $cantMillas){
        parent::cargar($nombre, $apellido, $documento, $telefono, $numeroAsiento, $numeroTicket, $idViaje);

        $this->setNroViajeroFrecuente($nroViajeroFrecuente);
        $this->setCantMillas($cantMillas);
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

    /*/=======================================================================================\*\
    ||                            RELACIONADOS A LA BASE DE DATOS                              ||
    \*\=======================================================================================/*/

    /**
	 * Recupera los datos de un pasajero VIP en la base de datos a partir de un documento ingresado
     * y los setea al objeto pasajero VIP actual
     * Retorna true si tiene éxito en la operación, false en caso contrario
     * 
	 * @param string $documento
	 * @return boolean
	 */		
    public function Buscar($documento){
		$base = new BaseDatos();
		$consulta =
        "SELECT pasajero.*, nroviajerofrecuente, cantmillas 
        FROM pasajerovip 
        INNER JOIN pasajero ON pasajero.pdocumento = pasajerovip.pdocumento 
        WHERE pdocumento = ".$documento."";

		$exito = false;
		if($base->Iniciar()){
			if($base->Ejecutar($consulta)){
				if($fila = $base->Registro()){	

				    $this->setDocumento($documento);
					$this->setNombre($fila['pnombre']);
					$this->setApellido($fila['papellido']);
					$this->setTelefono($fila['ptelefono']);
                    $this->setNumeroAsiento($fila['pnumeroasiento']);
                    $this->setNumeroTicket($fila['pnumeroticket']);
                    $this->setIdViaje($fila['idviaje']);
                    $this->setNroViajeroFrecuente($fila['nroviajerofrecuente']);
                    $this->setCantMillas($fila['cantmillas']);

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
     * Busca todos los pasajeros VIP que cumplan una condición y devuelve un arreglo
     * que los contiene.
     * 
     * @param string $condicion
     * @return array
     */
    public function listar($condicion){
	    $colPasajerosVIP = null;
		$base = new BaseDatos();
		$consulta =
        "SELECT pasajero.*, nroviajerofrecuente, cantmillas 
        FROM pasajerovip 
        INNER JOIN pasajero ON pasajero.pdocumento = pasajerovip.pdocumento";
		if ($condicion != ""){
            $consulta = $consulta." WHERE ".$condicion;
		}
		$consulta.=" ORDER BY papellido";

		if($base->Iniciar()){
			if($base->Ejecutar($consulta)){				
				$colPasajerosVIP = array();
				while($fila=$base->Registro()){
					
					$documento = $fila['pdocumento'];
                    $nombre = $fila['pnombre'];
                    $apellido = $fila['papellido'];
                    $telefono = $fila['ptelefono'];
                    $numeroAsiento = $fila['pnumeroasiento'];
                    $numeroTicket = $fila['pnumeroticket'];
                    $idViaje = $fila['idviaje'];
                    $nroViajeroFrecuente = $fila['nroviajerofrecuente'];
                    $cantMillas = $fila['cantmillas'];

					$pasajero = new PasajeroVIP();
					$pasajero->cargarSub($nombre, $apellido, $documento, $telefono, $numeroAsiento, $numeroTicket, $idViaje,
                    $nroViajeroFrecuente, $cantMillas);
					array_push($colPasajerosVIP,$pasajero);
				}
		 	} else {
                $this->setMensajeOperacion($base->getError());	
			}
		} else {
            $this->setMensajeOperacion($base->getError());
		}	
		return $colPasajerosVIP;
	}

    /**
     * Inserta un nuevo pasajero VIP a la base de datos según los datos actuales almacenados
     * en los atributos del objeto PasajeroVIP.
     * Retorna true si tiene éxito en la operación, false en caso contrario
     * 
     * @return boolean
     */
    public function insertar(){
		$base = new BaseDatos();
		$exito = false;
		$consulta =
        "INSERT INTO pasajero(pdocumento, pnombre, papellido, ptelefono, idviaje, pnumeroasiento, pnumeroticket) 
        VALUES (".$this->getDocumento().",'".$this->getNombre()."','".$this->getApellido()."','".$this->getTelefono()."',
        ".$this->getIdViaje().",'".$this->getNumeroAsiento()."','".$this->getNumeroTicket()."')";
        
		if($base->Iniciar()){
			if($base->Ejecutar($consulta)){
			    $exito = true;
			} else {
                $this->setMensajeOperacion($base->getError());
			}
		} else {
            $this->setMensajeOperacion($base->getError());
		}

        if($exito){
            $consulta = "INSERT INTO pasajeroVIP(pdocumento, nroviajerofrecuente, cantmillas) 
            VALUES (".$this->getDocumento().",'".$this->getNroViajeroFrecuente()."','".$this->getCantMillas()."')";
            if($base->Iniciar()){
                if($base->Ejecutar($consulta)){
                    $exito = true;
                } else {
                    $this->setMensajeOperacion($base->getError());
                    $exito = false;
                }
            } else {
                $this->setMensajeOperacion($base->getError());
            }

        }
        return $exito;
	}

    /**
     * Modifica todos los campos del pasajero VIP actual (identificado por su documento)
     * en la base de datos según el estado actual de todos sus atributos.
     * Previamente se tuvo que hacer un set a cada atributo a modificar.
     * No se permite actualizar el número de ticket
     * Retorna true si tiene éxito en la operación, false en caso contrario
     * 
     * @return boolean
     */
    public function modificar(){
	    $exito = false; 
	    $base = new BaseDatos();

		$consulta =
        "UPDATE pasajero SET pdocumento = ".$this->getDocumento().", pnombre = '".$this->getNombre().
        "', papellido = '".$this->getApellido()."', ptelefono = '".$this->getTelefono().
        "', idviaje = ".$this->getIdViaje().", pnumeroasiento = '".$this->getNumeroAsiento().
        "', pnumeroticket = '".$this->getNumeroTicket().
        "' WHERE pdocumento = '". $this->getDocumento()."';\n
        UPDATE pasajerovip SET pdocumento = ".$this->getDocumento().
        ", nroviajerofrecuente = '".$this->getNroViajeroFrecuente()."', cantmillas = '".$this->getCantMillas().
        "' WHERE pdocumento = '". $this->getDocumento()."';";

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
}

?>