<?php

class PasajeroEspecial extends Pasajero{

    //ATRIBUTOS
    private $reqSilla;
    private $reqAsistencia;
    private $reqComida;

    /* Los atributos $reqSilla, $reqAsistencia y $reqComida son de tipo boolean y representan
    si el pasajero necesita ese servicio o no */

    //CONSTUCTOR
    /**
     * Crea una instancia de la clase PasajeroEspecial
     */
    public function __construct(){
        parent::__construct();

        $this->reqSilla = false;
        $this->reqAsistencia = false;
        $this->reqComida = false;
    }

    /**
     * Función que asigna los valores ingresados por párametro
     * a los atributos del PasajeroEspecial
     * @param string $nombre
     * @param string $apellido
     * @param string $documento
     * @param string $telefono
     * @param string $numeroAsiento
     * @param string $numeroTicket
     * @param int $idViaje
     * @param boolean $reqSilla
     * @param boolean $reqAsistencia
     * @param boolean $reqComida
     */
    public function cargarSub($nombre,
    $apellido,
    $documento,
    $telefono,
    $numeroAsiento,
    $numeroTicket,
    $idViaje,
    $reqSilla,
    $reqAsistencia,
    $reqComida){
        parent::cargar($nombre, $apellido, $documento, $telefono, $numeroAsiento, $numeroTicket, $idViaje);

        $this->setReqSilla($reqSilla);
        $this->setReqAsistencia($reqAsistencia);
        $this->setReqComida($reqComida);
    }

    /*/=======================================================================================\*\
    ||                                        OBSERVADORES                                     ||
    \*\=======================================================================================/*/

    /**
     * Devuelve un booleano que indica si el pasajero necesita el servicio de silla de ruedas
     * 
     * @return boolean
     */
    public function getReqSilla(){
        return $this->reqSilla;
    }

    /**
     * Devuelve un booleano que indica si el pasajero necesita el servicio de asistencia de 
     * embarque/desembarque
     * 
     * @return boolean
     */
    public function getReqAsistencia(){
        return $this->reqAsistencia;
    }

    /**
     * Devuelve un booleano que indica si el pasajero necesita el servicio de comida especial
     * 
     * @return boolean
     */
    public function getReqComida(){
        return $this->reqComida;
    }

    /*/=======================================================================================\*\
    ||                                       MODIFICADORES                                     ||
    \*\=======================================================================================/*/

    /**
     * Modifica el estado del requerimiento de silla de ruedas
     * 
     * @param boolean $reqSilla
     */
    public function setReqSilla($reqSilla){
        $this->reqSilla = $reqSilla;
    }

    /**
     * Modifica el estado del requerimiento de asistencia de embarque/desembarque
     * 
     * @param boolean $reqAsistencia
     */
    public function setReqAsistencia($reqAsistencia){
        $this->reqAsistencia = $reqAsistencia;
    }

    /**
     * Modifica el estado del requerimiento de comida especial
     * 
     * @param boolean $reqComida
     */
    public function setReqComida($reqComida){
        $this->reqComida = $reqComida;
    }

    /*/=======================================================================================\*\
    ||                                 PROPIOS DE LA CLASE                                     ||
    \*\=======================================================================================/*/

    /**
     * Devuelve un string que contiene toda la información del estado
     * de una instancia de tipo PasajeroEspecial
     * 
     * @return string
     */
    public function __toString(){
        //string $cadena
        $cadena = parent::__toString();
        $cadena = $cadena . "[Silla de ruedas: ".$this->reqAString($this->getReqSilla())."]";
        $cadena = $cadena . "[Asistencia: ".$this->reqAString($this->getReqAsistencia())."]";
        $cadena = $cadena . "[Comida especial: ".$this->reqAString($this->getReqComida())."]";

        return $cadena;
    }

    /**
     * Esta función lee el estado de un requerimiento en booleano y lo traduce a su equivalente en string
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
     * Esta función lee el estado de un requerimiento en string y lo traduce a booleano
     * 
     * @param boolean $requerimiento
     * @return string
     */
    public function reqABoolean($requerimiento){
        //string $valor
        $valor = false;
        if($requerimiento == "Si"){
            $valor = true;
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

    /*/=======================================================================================\*\
    ||                            RELACIONADOS A LA BASE DE DATOS                              ||
    \*\=======================================================================================/*/

    /**
	 * Recupera los datos de un pasajero especial en la base de datos a partir de un documento ingresado
     * y los setea al objeto pasajero especial actual
     * Retorna true si tiene éxito en la operación, false en caso contrario
     * 
	 * @param string $documento
	 * @return boolean
	 */		
    public function Buscar($documento){
		$base = new BaseDatos();
		$consulta =
        "SELECT pasajero.*, preqsilla, preqasistencia, preqcomida 
        FROM pasajeroespecial 
        INNER JOIN pasajero ON pasajero.pdocumento = pasajeroespecial.pdocumento 
        WHERE pdocumento = '".$documento."'";

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

                    $silla = $this->reqABoolean($fila['preqsilla']);
                    $this->setReqSilla($silla);

                    $asistencia = $this->reqABoolean($fila['preqasistencia']);
                    $this->setReqAsistencia($asistencia);

                    $comida = $this->reqABoolean($fila['preqcomida']);
                    $this->setReqComida($comida);

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
     * Busca todos los pasajeros especiales que cumplan una condición y devuelve un arreglo
     * que los contiene.
     * 
     * @param string $condicion
     * @return array
     */
    public function listar($condicion){
	    $colPasajerosEspeciales = null;
		$base = new BaseDatos();
		$consulta =
        "SELECT pasajero.*, preqsilla, preqasistencia, preqcomida 
        FROM pasajeroespecial 
        INNER JOIN pasajero ON pasajero.pdocumento = pasajeroespecial.pdocumento";
		if ($condicion != ""){
            $consulta = $consulta." WHERE ".$condicion;
		}
		$consulta.=" ORDER BY papellido";

		if($base->Iniciar()){
			if($base->Ejecutar($consulta)){				
				$colPasajerosEspeciales = array();
				while($fila=$base->Registro()){
					
					$documento = $fila['pdocumento'];
                    $nombre = $fila['pnombre'];
                    $apellido = $fila['papellido'];
                    $telefono = $fila['ptelefono'];
                    $numeroAsiento = $fila['pnumeroasiento'];
                    $numeroTicket = $fila['pnumeroticket'];
                    $idViaje = $fila['idviaje'];

                    $reqSilla = $this->reqABoolean($fila['preqsilla']);
                    $reqAsistencia = $this->reqABoolean($fila['preqasistencia']);
                    $reqComida = $this->reqABoolean($fila['preqcomida']);

					$pasajero = new PasajeroEspecial();
					$pasajero->cargarSub($nombre, $apellido, $documento, $telefono, $numeroAsiento, $numeroTicket, $idViaje,
                    $reqSilla, $reqAsistencia, $reqComida);
					array_push($colPasajerosEspeciales,$pasajero);
				}
		 	} else {
                $this->setMensajeOperacion($base->getError());	
			}
		} else {
            $this->setMensajeOperacion($base->getError());
		}	
		return $colPasajerosEspeciales;
	}

    /**
     * Inserta un nuevo pasajero especial a la base de datos según los datos actuales almacenados
     * en los atributos del objeto PasajeroEspecial.
     * Retorna true si tiene éxito en la operación, false en caso contrario
     * 
     * @return boolean
     */
    public function insertar(){
		$base = new BaseDatos();
		$exito = false;

        $silla = $this->reqAString($this->getReqSilla());
        $asistencia = $this->reqAString($this->getReqAsistencia());
        $comida = $this->reqAString($this->getReqComida());

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
		return $exito;

        if($exito){
            $consulta = "INSERT INTO pasajeroespecial(pdocumento, preqsilla, preqasistencia, preqcomida) 
            VALUES (".$this->getDocumento().",'".$silla."','".$asistencia."','".$comida."')";

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
     * Modifica todos los campos del pasajero especial actual (identificado por su documento)
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

        $silla = $this->reqAString($this->getReqSilla());
        $asistencia = $this->reqAString($this->getReqAsistencia());
        $comida = $this->reqAString($this->getReqComida());

		$consulta =
        "UPDATE pasajero SET pdocumento = ".$this->getDocumento().", pnombre = '".$this->getNombre().
        "', papellido = '".$this->getApellido()."', ptelefono = '".$this->getTelefono().
        "', idviaje = ".$this->getIdViaje().", pnumeroasiento = '".$this->getNumeroAsiento().
        "', pnumeroticket = '".$this->getNumeroTicket().
        "' WHERE pdocumento = '". $this->getDocumento()."';\n
        UPDATE pasajeroespecial SET pdocumento = ".$this->getDocumento().
        ", preqsilla = '".$silla."', preqasistencia = '".$asistencia.
        "', preqcomida = '".$comida.
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