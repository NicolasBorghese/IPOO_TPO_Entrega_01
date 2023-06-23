<?php

class Empresa{

    //ATRIBUTOS
    private $idEmpresa;
    private $nombreEmpresa;
    private $direccionEmpresa;
    private $colViajes;
    private $mensajeOperacion;

    //CONSTRUCTOR
    /**
     * Crea una instancia de la clase Empresa
     */
    public function __construct(){
        $this->idEmpresa = "";
        $this->nombreEmpresa = "";
        $this->direccionEmpresa = "";
        $this->colViajes = [];
        $this->mensajeOperacion = "";
    }

    /**
     * Función que asigna los valores ingresados por párametro
     * a los atributos de la Empresa
     * @param int $idEmpresa
     * @param string $nombreEmpresa
     * @param string $direccionEmpresa
     * @param array $colViajes
     */
    public function cargar($idEmpresa, $nombreEmpresa, $direccionEmpresa, $colViajes){

        $this->setIdEmpresa($idEmpresa);
        $this->setNombreEmpresa($nombreEmpresa);
        $this->setDireccionEmpresa($direccionEmpresa);
        $this->setColViajes($colViajes);
    }

    /*/=======================================================================================\*\
    ||                                        OBSERVADORES                                     ||
    \*\=======================================================================================/*/

    /**
     * Devuelve el ID empresa de la Empresa.
     * 
     * @return int
     */
    public function getIdEmpresa(){
        return $this->idEmpresa;
    }

    /**
     * Devuelve el nombre de la Empresa.
     * 
     * @return string
     */
    public function getNombreEmpresa(){
        return $this->nombreEmpresa;
    }

    /**
     * Devuelve la dirección de la Empresa.
     * 
     * @return string
     */
    public function getDireccionEmpresa(){
        return $this->direccionEmpresa;
    }

    /**
     * Devuelve la colección de viajes de la Empresa.
     * 
     * @return array
     */
    public function getColViajes(){
        return $this->colViajes;
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
     * Modifica el ID empresa de la Empresa.
     * 
     * @param int $idEmpresa
     */
    public function setIdEmpresa($idEmpresa){
        $this->idEmpresa = $idEmpresa;
    }

    /**
     * Modifica el nombre de la Empresa.
     * 
     * @param string $nombreEmpresa
     */
    public function setNombreEmpresa($nombreEmpresa){
        $this->nombreEmpresa = $nombreEmpresa;
    }

    /**
     * Modifica la dirección de la Empresa.
     * 
     * @param string $direccionEmpresa
     */
    public function setDireccionEmpresa($direccionEmpresa){
        $this->direccionEmpresa = $direccionEmpresa;
    }

    /**
     * Modifica la colección de viajes de la Empresa.
     * 
     * @param array $colViajes
     */
    public function setColViajes($colViajes){
        $this->colViajes = $colViajes;
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
     * Devuelve un string que contiene toda la información del estado de una instancia de tipo Empresa
     * 
     * @return string
     */
    public function __toString(){
        //string $cadena
        $cadena = "=====================================================================================\n";
        $cadena = $cadena. "[ID Empresa: ".$this->getIdEmpresa()."]";
        $cadena = $cadena. "[Nombre empresa: ".$this->getNombreEmpresa()."]";
        $cadena = $cadena. "[Dirección: ".$this->getDireccionEmpresa()."]\n\n";
        $cadena = $cadena ." _______________________________| Viajes de la empresa |______________________________\n";
        $cadena = $cadena ."|                                                                                     |\n";
        $cadena = $cadena . $this->mostrarColViajes();
        $cadena = $cadena ."=====================================================================================\n";

        return $cadena;
    }

    /**
     * Devuelve un string con la información de todos los viajes de la empresa
     * 
     * @return string
     */
    public function mostrarColViajes(){
        // string $cadena
        $cadena = "";

        if(count($this->getColViajes())  == 0){
            $cadena = "[Esta empresa no tiene viajes cargados]\n";
        } else {
            for($i = 0; $i < count($this->getColViajes()); $i++){
                $cadena = $cadena. "Viaje N°". ($i+1) ." ".($this->getColViajes()[$i])."\n\n";
            }
        }
        return $cadena;
    }

    /*/=======================================================================================\*\
    ||                            RELACIONADOS A LA BASE DE DATOS                              ||
    \*\=======================================================================================/*/

    /**
	 * Recupera los datos de una empresa en la base de datos a partir de un ID de empresa ingresado
     * y los setea al objeto empresa actual.
     * Retorna true si tiene éxito en la operación, false en caso contrario
     * 
	 * @param int $idEmpresa
	 * @return boolean
	 */		
    public function Buscar($idEmpresa){
		$base = new BaseDatos();
		$consulta = "SELECT * FROM empresa WHERE idempresa = '".$idEmpresa."'";
		$exito = false;
		if($base->Iniciar()){
			if($base->Ejecutar($consulta)){
				if($fila = $base->Registro()){	

				    $this->setIdEmpresa($idEmpresa);
                    $this->setNombreEmpresa($fila['enombre']);
					$this->setDireccionEmpresa($fila['edireccion']);

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
     * Debido a un bug de recursion infinito se actualiza la colección de viajes aparte
     */
    public function actualizarColViajes(){
        $viaje = new Viaje();
        $colViajes = $viaje->listar("viaje.idempresa = ".$this->getIdEmpresa());
        $this->setColViajes($colViajes);
    }

    /**
     * Busca todos las empresas que cumplan una condición y devuelve un arreglo
     * que las contiene.
     * 
     * @param string $condicion
     * @return array|null
     */
    public function listar($condicion){
	    $colEmpresas = null;
		$base = new BaseDatos();
		$consulta = "SELECT * FROM empresa";
		if ($condicion != ""){
            $consulta = $consulta." WHERE ".$condicion;
		}
		$consulta.=" ORDER BY idempresa";

		if($base->Iniciar()){
			if($base->Ejecutar($consulta)){				
				$colEmpresas = array();

				while($fila = $base->Registro()){

					$idEmpresa = $fila['idempresa'];
                    $nombreEmpresa = $fila['enombre'];
                    $direccionEmpresa = $fila['edireccion'];

                    $viaje = new Viaje();
                    $colViajes = $viaje->listar("viaje.idempresa = ".$idEmpresa);

					$empresa = new Empresa();
					$empresa->cargar($idEmpresa, $nombreEmpresa, $direccionEmpresa, $colViajes);
					array_push($colEmpresas, $empresa);
				}

		 	} else {
                $this->setMensajeOperacion($base->getError());
			}
		} else {
            $this->setMensajeOperacion($base->getError());
		}	
		return $colEmpresas;
	}

    /**
     * Inserta una nueva empresa a la base de datos según los datos actuales almacenados
     * en los atributos del objeto Empresa.
     * Retorna true si tiene éxito en la operación, false en caso contrario
     * 
     * @return boolean
     */
    public function insertar(){
		$base = new BaseDatos();
		$exito = false;

		$consulta = "INSERT INTO empresa(enombre, edireccion) 
        VALUES ('".$this->getNombreEmpresa()."', '".$this->getDireccionEmpresa()."')";

		if($base->Iniciar()){

            if($id = $base->devuelveIDInsercion($consulta)){
                $this->setIdEmpresa($id);
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
     * Modifica todos los campos de la empresa actual (identificado por su ID de empresa)
     * en la base de datos según el estado actual de todos sus atributos.
     * Previamente se tuvo que hacer un set a cada atributo a modificar.
     * Retorna true si tiene éxito en la operación, false en caso contrario
     * 
     * @return boolean
     */
    public function modificar(){
	    $exito = false; 
	    $base = new BaseDatos();

		$consulta = "UPDATE empresa SET enombre = '".$this->getNombreEmpresa().
        "', edireccion = '".$this->getDireccionEmpresa().
        "' WHERE idempresa = ".$this->getIdEmpresa().";";

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
     * Elimina una empresa de la base de datos según su ID de empresa.
     * Lee el ID de empresa de la empresa actual y lo envía en la consulta.
     * Retorna true si tiene éxito en la operación, false en caso contrario
     * 
     * @return boolean
     */
    public function eliminar(){
		$base = new BaseDatos();
		$exito = false;
		if($base->Iniciar()){
            $consulta = "DELETE FROM empresa WHERE idempresa = ".$this->getIdEmpresa().";";
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
     * Elimina la empresa
     */
    public function eliminarEmpresa(){

        $this->actualizarColViajes();
        $colViajes = $this->getColViajes();
        for ($i = 0; $i < count($colViajes); $i++){
            $colViajes[$i]->eliminarViaje();
        }
        $this->eliminar();
    }
}

?>