<?php
include_once("Viaje.php");

/********************************************************************************/
/*********************************** FUNCIONES **********************************/
/********************************************************************************/

/**
 * Imprime en pantalla un menú de opciones y 
 * retorna un entero que representa la opcion elegida
 * 
 * @return int
 */
function menuDesplegable()
{
    // int $opcionElegida

    do{
        echo "-------------------------------------------------------------------------------------\n";
        echo "||                              [Viaje Feliz]                                      ||\n";
        echo "||                                                                                 ||\n";
        echo "||                               Menú general                                      ||\n";
        echo "||                                                                                 ||\n";
        echo "|| Ingrese por teclado el número que corresponda a la operación que desea          ||\n";
        echo "|| realizar:                                                                       ||\n";
        echo "||                                                                                 ||\n";
        echo "|| [1] Mostrar toda la información del viaje cargado actualmente                   ||\n";
        echo "|| [2] Crear un viaje nuevo                                                        ||\n";
        echo "|| [3] Asignar un nuevo arreglo de pasajeros al viaje                              ||\n";
        echo "|| [4] Agregar un nuevo pasajero al viaje                                          ||\n";
        echo "|| [5] Quitar un pasajero del viaje por su número de documento                     ||\n";
        echo "|| [6] Modificar el nombre de un pasajero por su número de documento               ||\n";
        echo "|| [7] Modificar el apellido de un pasajero por su número de documento             ||\n";
        echo "|| [8] Modificar el código del viaje actual                                        ||\n";
        echo "|| [9] Modificar el destino del viaje actual                                       ||\n";
        echo "|| [10] Modificar el responsable del viaje actual                                  ||\n";
        echo "|| [11] Modificar la capacidad máxima de pasajeros del viaje actual                ||\n";
        echo "|| [12] Mostrar el código del viaje actual                                         ||\n";
        echo "|| [13] Mostrar el destino del viaje actual                                        ||\n";
        echo "|| [14] Mostrar la cantidad máxima permitida de pasajeros para este viaje          ||\n";
        echo "|| [15] Mostrar todos los pasajeros que se encuentran en el viaje actual           ||\n";
        echo "|| [16] Mostrar quien es el responsable del viaje actual                           ||\n";
        echo "|| [0] Para finaizar el programa                                                   ||\n";
        echo "||                                                                                 ||\n";
        echo "-------------------------------------------------------------------------------------\n";
        echo "\n";
        echo "Indique la operación que desea realizar: ";
        $opcionElegida = trim(fgets(STDIN));
        
        // OBSERVAR: el rango varía según cantidad de opciones
        if($opcionElegida < 0 || $opcionElegida > 16 || !ctype_digit($opcionElegida)){
            echo "\n";
            // Mensaje de error cuando la opción elegida está fuera de rango
            echo "-------------------------------------------------------------------------------------\n";
            echo "|| ¡ERROR! Usted ha ingresado un valor NO válido,                                  ||\n";
            echo "|| verifique las opciones del menú nuevamente.                                     ||\n";
            echo "-------------------------------------------------------------------------------------\n";
            detenerEjecucion();
        }
    // OBSERVAR: el rango varía según cantidad de opciones
    } while ($opcionElegida < 0 || $opcionElegida > 16);

    echo "\n";

    return $opcionElegida;  
}

/**
 * Este módulo solicita que se ingrese un valor con el simple objeto
 * de detener la ejecución del programa y así poder leer resultados sin que se vayan para arriba.
 * 
 */
function detenerEjecucion(){
    // string $presionarEnter

    echo "\n";

    do {
        // Mensaje de parada para leer los resultados
        echo "Presione [ENTER] para continuar. ";
        // Obligación de ingresar un valor para continuar la ejecución del código
        $presionarEnter = trim(fgets(STDIN));

    }while ($presionarEnter != "");
    
    echo "\n";
}

/**
 * Recibe un número y devuelve un nombre de varón (de entre 20 nombres)
 * 
 * @param int $numero
 * @return string
 */
function generaNombreVaron($numero){
    // string $nombre

    switch ($numero){
        case 1:
            $nombre = "Juan";
            break;
        case 2:
            $nombre = "Manuel";
            break;
        case 3:
            $nombre = "José";
            break;
        case 4:
            $nombre = "Antonio";
            break;
        case 5:
            $nombre = "Carlos";
            break;
        case 6:
            $nombre = "Jorge";
            break;
        case 7:
            $nombre = "Miguel";
            break;
        case 8:
            $nombre = "Pedro";
            break;
        case 9:
            $nombre = "Alberto";
            break;
        case 10:
            $nombre = "Luis";
            break;
        case 11:
            $nombre = "Daniel";
            break;
        case 12:
            $nombre = "Fernando";
            break;
        case 13:
            $nombre = "Mario";
            break;
        case 14:
            $nombre = "Sergio";
            break;
        case 15:
            $nombre = "Marcelo";
            break;
        case 16:
            $nombre = "Guillermo";
            break;
        case 17:
            $nombre = "Pablo";
            break;
        case 18:
            $nombre = "Gabriel";
            break;
        case 19:
            $nombre = "Eduardo";
            break;
        case 20:
            $nombre = "Raul";
        default:
            $nombre = "Martín";
            break;
    }
    return $nombre;
}

/**
 * Recibe un número y devuelve un nombre de mujer (de entre 20 nombres)
 * 
 * @param int $numero
 * @return string
 */
function generaNombreMujer($numero){
    // string $nombre

    switch ($numero){
        case 1:
            $nombre = "María";
            break;
        case 2:
            $nombre = "Ana";
            break;
        case 3:
            $nombre = "Carolina";
            break;
        case 4:
            $nombre = "Andrea";
            break;
        case 5:
            $nombre = "laura";
            break;
        case 6:
            $nombre = "Paula";
            break;
        case 7:
            $nombre = "Martina";
            break;
        case 8:
            $nombre = "Valentina";
            break;
        case 9:
            $nombre = "Lucía";
            break;
        case 10:
            $nombre = "Sofía";
            break;
        case 11:
            $nombre = "Natalia";
            break;
        case 12:
            $nombre = "Julieta";
            break;
        case 13:
            $nombre = "Verónica";
            break;
        case 14:
            $nombre = "Daniela";
            break;
        case 15:
            $nombre = "Silvia";
            break;
        case 16:
            $nombre = "Patricia";
            break;
        case 17:
            $nombre = "Gabriela";
            break;
        case 18:
            $nombre = "Victoria";
            break;
        case 19:
            $nombre = "Micaela";
            break;
        case 20:
            $nombre = "Alejandra";
        default:
            $nombre = "Camila";
            break;
    }
    return $nombre;
}

/**
 * Recibe un número y devuelve un apellido (de entre 20 apellidos)
 * 
 * @param int $numero
 * @return string
 */
function generaApellido($numero){
    // string $nombre

    switch ($numero){
        case 1:
            $apellido = "González";
            break;
        case 2:
            $apellido = "Rodríguez";
            break;
        case 3:
            $apellido = "García";
            break;
        case 4:
            $apellido = "Fernández";
            break;
        case 5:
            $apellido = "López";
            break;
        case 6:
            $apellido = "Martínez";
            break;
        case 7:
            $apellido = "Pérez";
            break;
        case 8:
            $apellido = "Gómez";
            break;
        case 9:
            $apellido = "Sánchez";
            break;
        case 10:
            $apellido = "Romero";
            break;
        case 11:
            $apellido = "Díaz";
            break;
        case 12:
            $apellido = "Torres";
            break;
        case 13:
            $apellido = "Flores";
            break;
        case 14:
            $apellido = "Álvarez";
            break;
        case 15:
            $apellido = "Castro";
            break;
        case 16:
            $apellido = "Ruiz";
            break;
        case 17:
            $apellido = "Ramírez";
            break;
        case 18:
            $apellido = "Acosta";
            break;
        case 19:
            $apellido = "Vázquez";
            break;
        case 20:
            $apellido = "Herrera";
        default:
            $apellido = "Rojas";
            break;
    }
    return $apellido;
}

/**
 * Crea un arreglo automático de pasajeros y lo setea al viaje actual recibido por parámetro
 * junto con la cantidad de pasajeros a agregar
 * 
 * @param Viaje $viaje
 * @param int $cantPasajeros
 */
function cargaAutomaticaPasajeros($viaje, $cantPasajeros){
    // array $arregloPasajeros
    // string $nombre, $apellido
    // int $documento

    $arregloPasajeros = [];
    for ($i = 0; $i < $cantPasajeros; $i++){
        if(random_int(1,2) == 1){
            $nombre = generaNombreVaron(random_int(1,20));
        } else {
            $nombre = generaNombreMujer(random_int(1,20));
        }
        $apellido = generaApellido(random_int(1,20));
        $documento = 400000 + $i;
        $telefono = "299 1001".$i;

        $arregloPasajeros[$i] = new Pasajero($nombre, $apellido, $documento, $telefono);
    }

    $viaje->setPasajeros($arregloPasajeros);
}

/********************************************************************************/
/***************************** PROGRAMA PRINCIPAL *******************************/
/********************************************************************************/

// ***** Declaración de variables *****/
// Viaje $viaje
// ResponsableV $responsable
// int $codigo, $capMaxima, $cantPasajeros, $documento
// string $destino, $nombre, $apellido, $mensaje
// array $pasajero
// boolean $esPosible

$responsable = new ResponsableV(31721, 100023, "Nicolás", "Borghese");
$viaje = new Viaje(1123, "Cordoba", 40, $responsable);
cargaAutomaticaPasajeros($viaje, random_int(10,20));
echo "El programa cuenta con un primer viaje precargado\n";
echo "\n";

do {
    $opcionMenu = menuDesplegable();

    switch ($opcionMenu){
        case 1:
            // Muestra el viaje cargado actualmente
            echo $viaje;
            echo "\n";
            detenerEjecucion();
            break;
        case 2:
            // Crea un viaje nuevo
            echo "Ingrese el código correspondiente al nuevo viaje: ";
            $codigo = trim(fgets(STDIN));
            echo "Ingrese el destino del nuevo viaje: ";
            $destino = trim(fgets(STDIN));
            echo "Ingrese la capacidad máxima de pasajeros para el nuevo viaje: ";
            $capMaxima = trim(fgets(STDIN));
            echo "Ingrese los datos del responsable:\n";
            echo "Nombre responsable: ";
            $nombre = trim(fgets(STDIN));
            echo "Apellido responsable: ";
            $apellido = trim(fgets(STDIN));
            echo "Número de empleado: ";
            $numeroEmpleado = trim(fgets(STDIN));
            echo "Número de licencia: ";
            $numeroLicencia = trim(fgets(STDIN));

            $responsable = new ResponsableV($numeroEmpleado, $numeroLicencia, $nombre, $apellido);

            if (ctype_digit($capMaxima) && $capMaxima >= 0){
                $viaje = new Viaje($codigo, $destino, $capMaxima, $responsable);
                echo "Nuevo viaje creado exitosamente\n";
            } else {
                echo "ERROR: valor inválido para capacidad máxima de pasajeros\n";
            }
            detenerEjecucion();
            break;
        case 3:
            // Carga mediante set un arreglo de pasajeros aleatorios al viaje respetando la capacidad máxima de pasajeros
            echo "Ingrese la cantidad de pasajeros aleatorios que desea ingresar: ";
            $cantPasajeros = intval(trim(fgets(STDIN)));

            if ($cantPasajeros < 0){
                echo "ERROR: valor no válido para cantidad de pasajeros\n";
            } else {
                if ($cantPasajeros > $viaje->getCantMaxPasajeros()){
                    echo "ERROR: la cantidad de pasajeros excede la capacidad máxima del viaje\n";
                } else {
                    cargaAutomaticaPasajeros($viaje, $cantPasajeros);
                    echo "Carga automática de pasajeros realizada con exito\n";
                }
            }
            detenerEjecucion();
            break;
        case 4:
            // Agrega un nuevo pasajero al viaje actual
            echo "Ingrese el número de documento del pasajero: ";
            $documento = trim(fgets(STDIN));
            echo "Ingrese el nombre del pasajero: ";
            $nombre = trim(fgets(STDIN));
            echo "Ingrese el apellido del pasajero: ";
            $apellido = trim(fgets(STDIN));
            echo "Ingrese el teléfono del pasajero: ";
            $telefono = trim(fgets(STDIN));

            $pasajero = new Pasajero($nombre, $apellido, $documento, $telefono);
            $puedeAgregar = $viaje->agregarPasajero($pasajero);

            if($puedeAgregar){
                echo "El pasajero se agrego con exito\n";
            } else {
                if (count($viaje->getPasajeros()) == $viaje->getCantMaxPasajeros()){
                    echo "ERROR: el viaje se encuentra en su capacidad máxima de pasajeros\n";
                } else {
                    echo "ERROR: el documento del pasajero ya se encuentra registrado dentro del viaje\n";
                }
            }
            detenerEjecucion();
            break;
        case 5:
            // Quita un pasajero del viaje por número de documento
            echo "Ingrese el número de documento del pasajero que desea quitar del viaje: ";
            $documento = trim(fgets(STDIN));
            $esPosible = $viaje->quitarPasajeroPorDocumento($documento);

            if($esPosible){
                echo "Pasajero quitado del viaje exitosamente\n";
            } else {
                echo "No se pudo quitar el pasajero del viaje (no se encontro el documento cargado en el viaje actual)\n";
            }
            detenerEjecucion();
            break;
        case 6:
            // Modifica el nombre de un pasajero por número de documento
            echo "Ingrese el número de documento del pasajero al que desea cambiar su nombre: ";
            $documento = trim(fgets(STDIN));
            echo "Ingrese el nuevo nombre que desea asignar al pasajero: ";
            $nombre = trim(fgets(STDIN));
            $esPosible = $viaje->modificarNombrePorDocumento($documento, $nombre);

            if($esPosible){
                echo "Se modifico el nombre del pasajero exitosamente\n";
            } else {
                echo "No se pudo modificar el nombre del pasajero (no se encontro el documento cargado en el viaje actual)\n";
            }
            detenerEjecucion();
            break;
        case 7:
            // Modifica el apellido de un pasajero por número de documento
            echo "Ingrese el número de documento del pasajero al que desea cambiar su apellido: ";
            $documento = trim(fgets(STDIN));
            echo "Ingrese el nuevo apellido que desea asignar al pasajero: ";
            $apellido = trim(fgets(STDIN));
            $esPosible = $viaje->modificarApellidoPorDocumento($documento, $apellido);

            if($esPosible){
                echo "Se modifico el apellido del pasajero exitosamente\n";
            } else {
                echo "No se pudo modificar el apellido del pasajero (no se encontro el documento cargado en el viaje actual)\n";
            }
            detenerEjecucion();
            break;
        case 8:
            // Modifica el código del viaje actual
            echo "Ingrese un nuevo código para el viaje actual: ";
            $codigo = trim(fgets(STDIN));
            $viaje->setCodigo($codigo);
            echo "Código de viaje modificado exitosamente";
            detenerEjecucion();
            break;
        case 9:
            // Modifica el destino del viaje
            echo "Ingrese el nuevo destino del viaje: ";
            $destino = trim(fgets(STDIN));
            $viaje->setDestino($destino);
            echo "Destino modificado exitosamente\n";
            detenerEjecucion();
            break;
        case 10:
            // Modifica al responsable actual del viaje
            echo "Ingrese el nombre del nuevo responsable: ";
            $nombre = trim(fgets(STDIN));
            echo "Ingrese el apellido del nuevo responsable: ";
            $apellido = trim(fgets(STDIN));
            echo "Ingrese el número de empleado del nuevo responsable: ";
            $numeroEmpleado = trim(fgets(STDIN));
            echo "Ingrese el número de licencia del nuevo responsable: ";
            $numeroLicencia = trim(fgets(STDIN));

            $responsable = new ResponsableV($numeroEmpleado, $numeroLicencia, $nombre, $apellido);
            $viaje->setResponsable($responsable);
            
            break;
        case 11:
            // Modifica la cantidad máxima permitida de pasajeros en el viaje
            echo "Ingrese la nueva cantidad máxima permitida de pasajeros para este viaje: ";
            $capMaxima = trim(fgets(STDIN));
            if (ctype_digit($capMaxima)){
                $viaje->setCantMaxPasajeros($capMaxima);
                echo "Cantidad máxima de pasajeros para este viaje modificada exitosamente\n";
            } else {
                echo "Error: valor ingresado para cantidad máxima de pasajeros invalido\n";
            }
            detenerEjecucion();
            break;
        case 12:
            // Muestra el código del viaje actual
            echo "El código del viaje actual es: ".$viaje->getCodigo()."\n";
            detenerEjecucion();
            break;
        case 13:
            // Muestra el destino del viaje actual
            echo "El destino del viaje actual es: ".$viaje->getDestino()."\n";
            detenerEjecucion();
            break;
        case 14:
            // Muestra la cantidad máxima de pasajeros permitida para el viaje actual
            echo "La cantidad máxima de pasajeros permitida para el viaje actual es: ".$viaje->getCantMaxPasajeros()."\n";
            detenerEjecucion();
            break;
        case 15:
            // Muestra el arreglo de pasajeros del viaje actual
            echo "El arreglo de pasajeros del viaje actual es:\n";
            $viaje->pasajerosAString();
            echo "\n";
            detenerEjecucion();
            break;
        case 16:
            // Muestra quien es el responsable del viaje actual
            echo "El responsable del viaje actual es:\n";
            $viaje->getResponsable()."\n";
            echo"\n";
        case 0:
            // Finaliza el programa
            break;
        default:
            // En caso de error (imposible) accederá a esta opción y se finalizará el programa
            break;
    }

} while ($opcionMenu != 0);

echo "¡PROGRAMA FINALIZADO!\n";
echo "\n";

?>