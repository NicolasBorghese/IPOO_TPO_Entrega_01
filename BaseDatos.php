<?php
/* IMPORTANTE !!!!  Clase para (PHP 5, PHP 7)*/

class BaseDatos {
    private $HOSTNAME;
    private $BASEDATOS;
    private $USUARIO;
    private $CLAVE;
    private $CONEXION;
    private $QUERY;
    private $RESULT;
    private $ERROR;
    /**
     * Constructor de la clase que inicia ls variables instancias de la clase
     * vinculadas a la coneccion con el Servidor de BD
     */
    public function __construct(){
        $this->HOSTNAME = "127.0.0.1";
        $this->BASEDATOS = "bdviajefeliz";
        $this->USUARIO = "root";
        $this->CLAVE="";
        /*
        Análisis de error:
        Se asigna un valor por default que puede ser interpretado correctamente al realizar
        las consultas "mysqli_fetch_assoc()" y "mysqli_free_result()" en la función Registro
        */
        //$this->RESULT=0;
        $this->RESULT=false;
        $this->QUERY="";
        $this->ERROR="";
    }
    /**
     * Funcion que retorna una cadena
     * con una peque�a descripcion del error si lo hubiera
     *
     * @return string
     */
    public function getError(){
        return "\n".$this->ERROR;
        
    }
    
    /**
     * Inicia la coneccion con el Servidor y la  Base Datos Mysql.
     * Retorna true si la coneccion con el servidor se pudo establecer y false en caso contrario
     *
     * @return boolean
     */
    public function Iniciar(){
        $resp  = false;
        $conexion = mysqli_connect($this->HOSTNAME,$this->USUARIO,$this->CLAVE,$this->BASEDATOS);
        if ($conexion){
            if (mysqli_select_db($conexion,$this->BASEDATOS)){
                $this->CONEXION = $conexion;
                unset($this->QUERY);
                unset($this->ERROR);
                $resp = true;
            }  else {
                $this->ERROR = mysqli_errno($conexion) . ": " .mysqli_error($conexion);
            }
        }else{
            /*
            Análisis de error:
            La función mysqli_errno en PHP es utilizada para obtener el número de error de la última operación 
            realizada con la extensión MySQLi. Esta función toma como parámetro una conexión MySQLi y 
            devuelve el código de error asociado a la última operación que se realizó en dicha conexión.
            OBSERVACIÓN: Si la conexión no existe (es false) no se pueden consultar errores con mysqli_errno
            */
            //$this->ERROR =  mysqli_errno($conexion) . ": " .mysqli_error($conexion);
            $this->ERROR = "ERROR: no se pudo realizar la conexión a la base de datos";
        }
        return $resp;
    }
    
    /**
     * Ejecuta una consulta en la Base de Datos.
     * Recibe la consulta en una cadena enviada por parametro.
     *
     * @param string $consulta
     * @return boolean
     */
    public function Ejecutar($consulta){
        $resp  = false;
        unset($this->ERROR);
        $this->QUERY = $consulta;
        if($this->RESULT = mysqli_query( $this->CONEXION,$consulta)){
            $resp = true;
        } else {
            $this->ERROR =mysqli_errno( $this->CONEXION).": ". mysqli_error( $this->CONEXION);
        }
        return $resp;
    }
    
    /**
     * Devuelve un registro retornado por la ejecucion de una consulta
     * el puntero se despleza al siguiente registro de la consulta
     *
     * @return boolean
     */
    public function Registro() {
        $resp = null;
        if ($this->RESULT){
            unset($this->ERROR);
            /*Si existe un resultado para una consulta se va a guardar en forma de arreglo asociativo
            y se retornará ese array, en caso contrario retornará false o null*/
            if($temp = mysqli_fetch_assoc($this->RESULT)){
                $resp = $temp;
            }else{
                mysqli_free_result($this->RESULT);
            }
        }else{
            $this->ERROR = mysqli_errno($this->CONEXION) . ": " . mysqli_error($this->CONEXION);
        }
        return $resp ;
    }
    
    /**
     * Devuelve el id de un campo autoincrement utilizado como clave de una tabla
     * Retorna el id numerico del registro insertado, devuelve null en caso que la ejecucion de la consulta falle
     *
     * @param string $consulta
     * @return int id de la tupla insertada
     */
    public function devuelveIDInsercion($consulta){
        $resp = null;
        unset($this->ERROR);
        $this->QUERY = $consulta;
        if ($this->RESULT = mysqli_query($this->CONEXION,$consulta)){
            /*
            Análisis de error:
            La función mysqli_insert_id en PHP se utiliza para obtener el ID generado automáticamente
            por una consulta INSERT en una tabla con una columna de tipo AUTO_INCREMENT.
            Esta función toma como parámetro una conexión MySQLi y devuelve el último ID insertado
            en esa conexión.
             */
            // $id = mysqli_insert_id();
            $id = mysqli_insert_id($this->CONEXION);
            $resp =  $id;
        } else {
            $this->ERROR =mysqli_errno( $this->CONEXION) . ": " . mysqli_error( $this->CONEXION);  
        }
    return $resp;
    }
    
}
?>