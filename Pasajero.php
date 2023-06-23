<?php

class Pasajero{

    //ATRIBUTOS
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;
    private $numeroAsiento;
    private $numeroTicket;
    private $idViaje;
    private $mensajeOperacion;

    //CONSTRUCTOR
    /**
     * Crea una instancia de la clase Pasajero
     */
    public function __construct(){
        $this->nombre = "";
        $this->apellido = "";
        $this->documento = "";
        $this->telefono = "";
        $this->numeroAsiento = "";
        $this->numeroTicket = "";
        $this->idViaje = "";
        $this->mensajeOperacion = "";
    }

    /**
     * Función que asigna los valores ingresados por párametro
     * a los atributos del Pasajero
     * @param string $nombre
     * @param string $apellido
     * @param string $documento
     * @param string $telefono
     * @param string $numeroAsiento
     * @param string $numeroTicket
     * @param int $idViaje
     */
    public function cargar($nombre, $apellido, $documento, $telefono, $numeroAsiento, $numeroTicket, $idViaje){
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setDocumento($documento);
        $this->setTelefono($telefono);
        $this->setNumeroAsiento($numeroAsiento);
        $this->setNumeroTicket($numeroTicket);
        $this->setIdViaje($idViaje);
    }

    /*/=======================================================================================\*\
    ||                                        OBSERVADORES                                     ||
    \*\=======================================================================================/*/

    /**
     * Devuelve el nombre del pasajero
     * 
     * @return string
     */
    public function getNombre(){
        return $this->nombre;
    }

    /**
     * Devuelve el apellido del pasajero
     * 
     * @return string
     */
    public function getApellido(){
        return $this->apellido;
    }

    /**
     * Devuelve el documento del pasajero
     * 
     * @return string
     */
    public function getDocumento(){
        return $this->documento;
    }

    /**
     * Devuelve el número de teléfono del pasajero
     * 
     * @return string
     */
    public function getTelefono(){
        return $this->telefono;
    }

    /**
     * Devuelve el número de asiento del pasajero
     * 
     * @return string
     */
    public function getNumeroAsiento(){
        return $this->numeroAsiento;
    }

    /**
     * Devuelve el número de ticket del pasajero
     * 
     * @return string
     */
    public function getNumeroTicket(){
        return $this->numeroTicket;
    }

    /**
     * Devuelve el número correspondiente al id del viaje
     * 
     * @return int
     */
    public function getIdViaje(){
        return $this->idViaje;
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
     * Modifica el nombre del pasajero
     * 
     * @param string $nombre
     */
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    /**
     * Modifica el apellido del pasajero
     * 
     * @param string $apellido
     */
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    /**
     * Modifica el documento del pasajero
     * 
     * @param string $documento
     */
    public function setDocumento($documento){
        $this->documento = $documento;
    }

    /**
     * Modifica el número de teléfono del pasajero
     * 
     * @param string $telefono
     */
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    /**
     * Modifica el número de asiento del pasajero
     * 
     * @param string $numeroAsiento
     */
    public function setNumeroAsiento($numeroAsiento){
        $this->numeroAsiento = $numeroAsiento;
    }

    /**
     * Modifica el número de ticket del pasajero
     * 
     * @param int $numeroTicket
     */
    public function setNumeroTicket($numeroTicket){
        $this->numeroTicket = $numeroTicket;
    }

    /**
     * Modifica el número correspondiente al id del viaje
     * 
     * @param int $idViaje
     */
    public function setIdViaje($idViaje){
        $this->idViaje = $idViaje;
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
     * Devuelve un string que contiene toda la información del estado de una instancia de tipo Pasajero
     * 
     * @return string
     */
    public function __toString(){
        //string $cadena
        $cadena = "[Nombre: ".$this->getNombre()."]";
        $cadena = $cadena. "[Apellido: ".$this->getApellido()."]";
        $cadena = $cadena. "[Documento: ".$this->getDocumento()."]";
        $cadena = $cadena. "[Teléfono: ".$this->getTelefono()."]\n";
        $cadena = $cadena. "[N°. Asiento: ".$this->getNumeroAsiento()."]";
        $cadena = $cadena. "[N°. Ticket: ".$this->getNumeroTicket()."]"; 
        $cadena = $cadena. "[ID viaje: ".$this->getIdViaje()."]";

        return $cadena;
    }

    /**
     * Retorna el porcentaje de incremento para un pasajero estandar que siempre es 10
     * 
     * @return float
     */
    public function darPorcentajeIncremento(){
        return 10;
    }

    /*/=======================================================================================\*\
    ||                            RELACIONADOS A LA BASE DE DATOS                              ||
    \*\=======================================================================================/*/

    /**
	 * Recupera los datos de un pasajero en la base de datos a partir de un documento ingresado
     * y los setea al objeto pasajero actual
     * Retorna true si tiene éxito en la operación, false en caso contrario
     * 
	 * @param string $documento
	 * @return boolean
	 */		
    public function Buscar($documento){
		$base = new BaseDatos();
		$consulta = "SELECT * FROM pasajero WHERE pdocumento = ".$documento."";
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
     * Busca todos los pasajeros que cumplan una condición y devuelve un arreglo
     * que los contiene.
     * 
     * @param string $condicion
     * @return array
     */
    public function listar($condicion){
	    $colPasajeros = null;
		$base = new BaseDatos();
		$consulta = "SELECT * FROM pasajero";
		if ($condicion != ""){
            $consulta = $consulta." WHERE ".$condicion;
		}
		$consulta.=" ORDER BY pdocumento";

		if($base->Iniciar()){
			if($base->Ejecutar($consulta)){				
				$colPasajeros = array();
				while($fila = $base->Registro()){
					
					$documento = $fila['pdocumento'];
                    $nombre = $fila['pnombre'];
                    $apellido = $fila['papellido'];
                    $telefono = $fila['ptelefono'];
                    $numeroAsiento = $fila['pnumeroasiento'];
                    $numeroTicket = $fila['pnumeroticket'];
                    $idViaje = $fila['idviaje'];
				
					$pasajero = new Pasajero();
					$pasajero->cargar($nombre, $apellido, $documento, $telefono, $numeroAsiento, $numeroTicket, $idViaje);
					array_push($colPasajeros,$pasajero);
				}
		 	} else {
                $this->setMensajeOperacion($base->getError());	
			}
		} else {
            $this->setMensajeOperacion($base->getError());
		}	
		return $colPasajeros;
	}

    /**
     * Inserta un nuevo pasajero a la base de datos según los datos actuales almacenados
     * en los atributos del objeto Pasajero.
     * Retorna true si tiene éxito en la operación, false en caso contrario
     * 
     * @return boolean
     */
    public function insertar(){
		$base = new BaseDatos();
		$exito = false;
		$consulta = "INSERT INTO pasajero(pdocumento, pnombre, papellido, ptelefono, idviaje, pnumeroasiento, pnumeroticket) 
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
		return $exito;
	}

    /**
     * Modifica todos los campos del pasajero actual (identificado por su documento)
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

		$consulta = "UPDATE pasajero SET pdocumento = ".$this->getDocumento().", pnombre = '".$this->getNombre().
        "', papellido = '".$this->getApellido()."', ptelefono = '".$this->getTelefono().
        "', idviaje = ".$this->getIdViaje().", pnumeroasiento = '".$this->getNumeroAsiento().
        "', pnumeroticket = '".$this->getNumeroTicket().
        "' WHERE pdocumento = '".$this->getDocumento()."';";

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
     * Elimina un Pasajero de la base de datos según su documento
     * Lee el documento del Pasajero actual y lo envía en la consulta.
     * Retorna true si tiene éxito en la operación, false en caso contrario
     * 
     * @return boolean
     */
    public function eliminar(){
		$base = new BaseDatos();
		$exito = false;
		if($base->Iniciar()){
            $consulta = "DELETE FROM pasajero WHERE pdocumento = ".$this->getDocumento()."";
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
     * Elimina todos los Pasajeros de la base de datos según su ID de viaje
     * recibido por parámetro
     * Retorna true si tiene éxito en la operación, false en caso contrario
     * 
     * @param int $condicion
     * @return boolean
     */
    public function eliminarPasajerosPorIdViaje($condicion){
		$base = new BaseDatos();
		$exito = false;
		if($base->Iniciar()){
            $consulta = "DELETE FROM pasajero WHERE idViaje = ".$condicion.";";
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
     * Retorna el número de documento más grande del cual se tiene registro
     * en la tabla de pasajeros.
     * 
	 * @return string
	 */		
    public function maximoDocumento(){
		$base = new BaseDatos();
		$consulta = "SELECT MAX(pdocumento) AS maxdocumento FROM pasajero";
		$maxDocumento = -1;
		if($base->Iniciar()){
			if($base->Ejecutar($consulta)){
				if($fila = $base->Registro()){	
                    
                    $maxDocumento = ($fila['maxdocumento']);

				}				
		 	} else {
                $this->setMensajeOperacion($base->getError());
			}
		} else {
            $this->setMensajeOperacion($base->getError());	
		}
        return $maxDocumento;
	}

    /**
     * Retorna el número de ticket más grande del cual se tiene registro
     * en la tabla de pasajeros.
     * 
	 * @return string
	 */		
    public function maximoTicket(){
		$base = new BaseDatos();
		$consulta = "SELECT MAX(pnumeroticket) AS maxticket FROM pasajero";
		$maxTicket = -1;
		if($base->Iniciar()){
			if($base->Ejecutar($consulta)){
				if($fila = $base->Registro()){	
                    
                    $maxTicket = ($fila['maxticket']);

				}				
		 	} else {
                $this->setMensajeOperacion($base->getError());
			}
		} else {
            $this->setMensajeOperacion($base->getError());	
		}
        return $maxTicket;
	}
}

?>