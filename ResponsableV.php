<?php
//Por Nicolás Borghese 2023

class ResponsableV{

    //ATRIBUTOS
    private $numeroEmpleado;
    private $numeroLicencia;
    private $nombre;
    private $apellido;
    private $mensajeOperacion;

    //CONSTRUCTOR
    /**
     * Crea una instancia de la clase ResponsableV
     */
    public function __construct(){
        $this->numeroEmpleado = "";
        $this->numeroLicencia = "";
        $this->nombre = "";
        $this->apellido = "";
        $this->mensajeOperacion = "";
    }

    /**
     * Función que asigna los valores ingresados por párametro
     * a los atributos del ResponsableV
     * @param int $numeroEmpleado
     * @param int $numeroLicencia
     * @param string $nombre
     * @param string $apellido
     */
    public function cargar($numeroEmpleado, $numeroLicencia, $nombre, $apellido){

        $this->setNumeroEmpleado($numeroEmpleado);
        $this->setNumeroLicencia($numeroLicencia);
        $this->setNombre($nombre);
        $this->setApellido($apellido);
    }

    /*/=======================================================================================\*\
    ||                                        OBSERVADORES                                     ||
    \*\=======================================================================================/*/

    /**
     * Devuelve el número de empleado del responsable
     * 
     * @return string
     */
    public function getNumeroEmpleado(){
        return $this->numeroEmpleado;
    }

    /**
     * Devuelve el número de licencia del responsable
     * 
     * @return string
     */
    public function getNumeroLicencia(){
        return $this->numeroLicencia;
    }

    /**
     * Devuelve el nombre del responsable
     * 
     * @return string
     */
    public function getNombre(){
        return $this->nombre;
    }

    /**
     * Devuelve el apellido del responsable
     * 
     * @return string
     */
    public function getApellido(){
        return $this->apellido;
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
     * Modifica el número de empleado del responsable
     * 
     * @param string $numeroEmpleado
     */
    public function setNumeroEmpleado($numeroEmpleado){
        $this->numeroEmpleado = $numeroEmpleado;
    }

    /**
     * Modifica el número de licencia del responsable
     * 
     * @param string $numeroLicencia
     */
    public function setNumeroLicencia($numeroLicencia){
        $this->numeroLicencia = $numeroLicencia;
    }

    /**
     * Modifica el nombre del responsable
     * 
     * @param string $nombre
     */
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    /**
     * Modifica el apellido del responsable
     * 
     * @param string $apellido
     */
    public function setApellido($apellido){
        $this->apellido = $apellido;
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
     * Devuelve un string que contiene toda la información del estado de una instancia de tipo ResponsableV
     * 
     * @return string
     */
    public function __toString(){
        //string $cadena
        $cadena = "[N°. empleado: ".$this->getNumeroEmpleado()."]";
        $cadena = $cadena. "[N°. licencia: ".$this->getNumeroLicencia()."]";
        $cadena = $cadena. "[Nombre: ".$this->getNombre()."]";
        $cadena = $cadena. "[Apellido: ".$this->getApellido()."]";

        return $cadena;
    }

    /**
     * Modifica los datos del responsable según los parámetros recibidos
     * 
     * @param string $nombre
     * @param string $apellido
     * @param string $numeroLicencia
     */
    public function modificarResponsable($nombre, $apellido, $numeroLicencia){
        //ResponsableV $responsable

        if($nombre != ""){
            $this->setNombre($nombre);
        }
        if($apellido != ""){
            $this->setApellido($apellido);
        }
        if($numeroLicencia != ""){
            $this->setNumeroLicencia($numeroLicencia);
        }
    }

    /*/=======================================================================================\*\
    ||                            RELACIONADOS A LA BASE DE DATOS                              ||
    \*\=======================================================================================/*/

    /**
	 * Recupera los datos de un responsable en la base de datos a partir de un número de empleado ingresado
     * y los setea al objeto responsable actual
     * Retorna true si tiene éxito en la operación, false en caso contrario
     * 
	 * @param int $numeroEmpleado
	 * @return boolean
	 */		
    public function Buscar($numeroEmpleado){
		$base = new BaseDatos();
		$consulta = "SELECT * FROM responsable WHERE rnumeroempleado = '".$numeroEmpleado."'";
		$exito = false;
		if($base->Iniciar()){
			if($base->Ejecutar($consulta)){
				if($fila = $base->Registro()){	

                    $numeroLicencia = $fila['rnumerolicencia'];
					$nombre = $fila['rnombre'];
                    $apellido = $fila['rapellido'];

                    $this->cargar($numeroEmpleado, $numeroLicencia, $nombre, $apellido);

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
     * Busca todos los responsables que cumplan una condición y devuelve un arreglo
     * que los contiene.
     * 
     * @param string $condicion
     * @return array
     */
    public function listar($condicion){
	    $colResponsables = null;
		$base = new BaseDatos();
		$consulta = "SELECT * FROM responsable";
		if ($condicion != ""){
            $consulta = $consulta." WHERE ".$condicion;
		}
		$consulta.=" ORDER BY rnumeroempleado";

		if($base->Iniciar()){
			if($base->Ejecutar($consulta)){	

				$colResponsables = array();
                
				while($fila=$base->Registro()){
					
					$numeroEmpleado = $fila['rnumeroempleado'];
                    $numeroLicencia = $fila['rnumerolicencia'];
                    $nombre = $fila['rnombre'];
                    $apellido = $fila['rapellido'];

					$responsable = new ResponsableV();
					$responsable->cargar($numeroEmpleado, $numeroLicencia, $nombre, $apellido);
					array_push($colResponsables, $responsable);
				}
		 	} else {
                $this->setMensajeOperacion($base->getError());	
			}
		} else {
            $this->setMensajeOperacion($base->getError());
		}	
		return $colResponsables;
	}

    /**
     * Inserta un nuevo responsable a la base de datos según los datos actuales almacenados
     * en los atributos del objeto Responsable.
     * Retorna true si tiene éxito en la operación, false en caso contrario
     * 
     * @return boolean
     */
    public function insertar(){
		$base = new BaseDatos();
		$exito = false;
		$consulta = "INSERT INTO responsable(rnumerolicencia, rnombre, rapellido) 
        VALUES (".$this->getNumeroLicencia().",'".$this->getNombre()."','".$this->getApellido()."')";

		if($base->Iniciar()){

            if($id = $base->devuelveIDInsercion($consulta)){
                $this->setNumeroEmpleado($id);
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
     * Modifica todos los campos del responsable actual (identificado por su número de empleado)
     * en la base de datos según el estado actual de todos sus atributos.
     * Previamente se tuvo que hacer un set a cada atributo a modificar.
     * Retorna true si tiene éxito en la operación, false en caso contrario
     * 
     * @return boolean
     */
    public function modificar(){
	    $exito = false; 
	    $base = new BaseDatos();

		$consulta = "UPDATE responsable SET rnumerolicencia = ".$this->getNumeroLicencia().
        ", rnombre = '".$this->getNombre()."', rapellido = '".$this->getApellido().
        "' WHERE rnumeroempleado = ".$this->getNumeroEmpleado().";";

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
     * Elimina un responsable de la base de datos según su número de empleado.
     * Lee el número de empleado del responsable actual y lo envía en la consulta.
     * Retorna true si tiene éxito en la operación, false en caso contrario
     * 
     * @return boolean
     */
    public function eliminar(){
		$base = new BaseDatos();
		$exito = false;
		if($base->Iniciar()){
            $consulta = "DELETE FROM responsable WHERE rnumeroempleado = ".$this->getNumeroEmpleado().";";
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
}

?>