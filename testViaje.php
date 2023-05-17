<?php
include_once "Viaje.php";

/*/=======================================================================================\*\
||                                         FUNCIONES                                       ||
\*\=======================================================================================/*/

/**
 * Imprime en pantalla un menú de opciones y 
 * retorna un entero que representa la opcion elegida
 * 
 * @return int
 */
function menuPrincipal(){
    // int $opcionElegida
    do{
        echo "=====================================================================================\n";
        echo "||                              [Viaje Feliz]                                      ||\n";
        echo "||                                                                                 ||\n";
        echo "||                              MENÚ PRINCIPAL                                     ||\n";
        echo "||                                                                                 ||\n";
        echo "|| Ingrese por teclado el número que corresponda a la sección que desea ir:        ||\n";
        echo "||                                                                                 ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [1] CREAR/MODIFICAR VIAJE (vender pasajes, asignar responsable ...)             ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [2] OBSERVAR DATOS DEL VIAJE (ver pasajeros, ver destino ...)                   ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [3] QUITAR/MODIFICAR PASAJEROS DEL VIAJE (cambiar nombre pasajero ...)          ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [0] FINALIZAR PROGRAMA                                                          ||\n";
        echo "=====================================================================================\n";
        echo "\n";
        echo "Indique la operación que desea realizar: ";
        $opcionElegida = trim(fgets(STDIN));
        
        // OBSERVAR: el rango varía según cantidad de opciones
        if($opcionElegida < 0 || $opcionElegida > 3 || !ctype_digit($opcionElegida)){
            mensajeFueraDeRango();
        }
    // OBSERVAR: el rango varía según cantidad de opciones
    } while ($opcionElegida < 0 || $opcionElegida > 3);
    echo "\n";
    return $opcionElegida;  
}

/**
 * Imprime en pantalla un menú de opciones y 
 * retorna un entero que representa la opcion elegida
 * 
 * @return int
 */
function menuModificarViaje(){
    // int $opcionElegida
    do{
        echo "=====================================================================================\n";
        echo "||                              [Viaje Feliz]                                      ||\n";
        echo "||                                                                                 ||\n";
        echo "||                      MENÚ PARA CREAR/MODIFICAR VIAJE                            ||\n";
        echo "||                                                                                 ||\n";
        echo "|| Ingrese por teclado el número que corresponda a la operación que desea          ||\n";
        echo "|| realizar:                                                                       ||\n";
        echo "||                                                                                 ||\n";
        echo "|| [1] Crear un viaje nuevo                                                        ||\n";
        echo "|| [2] Vender un pasaje del viaje a un pasajero                                    ||\n";
        echo "|| [3] Asignar una colección de pasajeros nueva al viaje                           ||\n";
        echo "|| [4] Asignar un nuevo responsable de viaje al viaje                              ||\n";
        echo "|| [5] Modificar el destino del viaje                                              ||\n";
        echo "|| [6] Modificar la capacidad máxima permitida de pasajeros para el viaje          ||\n";
        echo "|| [7] Modificar el costo por pasaje para el viaje                                 ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [0] VOLVER AL MENÚ PRINCIPAL                                                    ||\n";
        echo "=====================================================================================\n";
        echo "\n";
        echo "Indique la operación que desea realizar: ";
        $opcionElegida = trim(fgets(STDIN));
        
        // OBSERVAR: el rango varía según cantidad de opciones
        if($opcionElegida < 0 || $opcionElegida > 7 || !ctype_digit($opcionElegida)){
            mensajeFueraDeRango();
        }
    // OBSERVAR: el rango varía según cantidad de opciones
    } while ($opcionElegida < 0 || $opcionElegida > 7);
    echo "\n";
    return $opcionElegida;  
}

/**
 * Imprime en pantalla un menú de opciones y 
 * retorna un entero que representa la opcion elegida
 * 
 * @return int
 */
function menuObservarViaje(){
    // int $opcionElegida
    do{
        echo "=====================================================================================\n";
        echo "||                              [Viaje Feliz]                                      ||\n";
        echo "||                                                                                 ||\n";
        echo "||                     MENÚ PARA OBSERVAR DATOS DEL VIAJE                          ||\n";
        echo "||                                                                                 ||\n";
        echo "|| Ingrese por teclado el número que corresponda a la operación que desea          ||\n";
        echo "|| realizar:                                                                       ||\n";
        echo "||                                                                                 ||\n";
        echo "|| [1] Visualizar la información completa del viaje                                ||\n";
        echo "|| [2] Visualizar la colección del pasajeros                                       ||\n";
        echo "|| [3] Visualizar el código del viaje                                              ||\n";
        echo "|| [4] Visualizar el destino del viaje                                             ||\n";
        echo "|| [5] Visualizar la cantidad máxima de pasajeros permitida                        ||\n";
        echo "|| [6] Visualizar al responsable del viaje                                         ||\n";
        echo "|| [7] Visualizar el costo por pasaje del viaje                                    ||\n";
        echo "|| [8] Visualizar la recaudación total actual del viaje                            ||\n";
        echo "|| [9] Visualizar los asientos libres                                              ||\n";
        echo "|| [10] Visualizar la cantidad de asientos disponibles                             ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [0] VOLVER AL MENÚ PRINCIPAL                                                    ||\n";
        echo "=====================================================================================\n";
        echo "\n";
        echo "Indique la operación que desea realizar: ";
        $opcionElegida = trim(fgets(STDIN));
        
        // OBSERVAR: el rango varía según cantidad de opciones
        if($opcionElegida < 0 || $opcionElegida > 10 || !ctype_digit($opcionElegida)){
            mensajeFueraDeRango();
        }
    // OBSERVAR: el rango varía según cantidad de opciones
    } while ($opcionElegida < 0 || $opcionElegida > 10);
    echo "\n";
    return $opcionElegida;  
}

/**
 * Imprime en pantalla un menú de opciones y 
 * retorna un entero que representa la opcion elegida
 * 
 * @return int
 */
function menuModificarPasajero(){
    // int $opcionElegida
    do{
        echo "=====================================================================================\n";
        echo "||                              [Viaje Feliz]                                      ||\n";
        echo "||                                                                                 ||\n";
        echo "||               MENÚ PARA QUITAR/MODIFICAR PASAJEROS DEL VIAJE                    ||\n";
        echo "||                                                                                 ||\n";
        echo "|| Ingrese por teclado el número que corresponda a la operación que desea          ||\n";
        echo "|| realizar:                                                                       ||\n";
        echo "||                                                                                 ||\n";
        echo "|| [1] Quitar un pasajero del viaje                                                ||\n";
        echo "|| [2] Quitar todos los pasajeros del viaje                                        ||\n";
        echo "|| [3] Modificar el nombre de un pasajero                                          ||\n";
        echo "|| [4] Modificar el apellido de un pasajero                                        ||\n";
        echo "|| [5] Modificar el número de teléfono de un pasajero                              ||\n";
        echo "|| [6] Modificar el número de asiento del pasajero                                 ||\n";
        echo "|| [7] Visualizar pasajero por número de documento                                 ||\n";
        echo "|| [8] Visualizar pasajero por número de asiento                                   ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [0] VOLVER AL MENÚ PRINCIPAL                                                    ||\n";
        echo "=====================================================================================\n";
        echo "\n";
        echo "Indique la operación que desea realizar: ";
        $opcionElegida = trim(fgets(STDIN));
        
        // OBSERVAR: el rango varía según cantidad de opciones
        if($opcionElegida < 0 || $opcionElegida > 8 || !ctype_digit($opcionElegida)){
            mensajeFueraDeRango();
        }
    // OBSERVAR: el rango varía según cantidad de opciones
    } while ($opcionElegida < 0 || $opcionElegida > 8);
    echo "\n";
    return $opcionElegida;  
}

/**
 * Imprime un mensaje de error cuando la opción elegida está fuera de rango
 * 
 */
function mensajeFueraDeRango(){
    echo "\n";
    echo "=====================================================================================\n";
    echo "|| ¡ERROR! Usted ha ingresado un valor NO válido,                                  ||\n";
    echo "|| verifique las opciones del menú nuevamente.                                     ||\n";
    echo "=====================================================================================\n";
    detenerEjecucion();
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
            break;
        default:
            $nombre = "Null";
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
            break;
        default:
            $nombre = "Null";
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
    // string $apellido

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
            break;
        default:
            $apellido = "Null";
            break;
    }
    return $apellido;
}

/**
 * Pide los datos para crear un pasajero y retorna un objeto de tipo Pasajero
 * 
 * @return Pasajero
 */
function crearPasajero(){
    //boolean $permitido, $servicioSilla, $servicioAsistencia, $servicioComida
    //string $nombre, $apellido, $documento, $telefono
    //int $numeroAsiento, $numeroTicket, $opcionElegida, $numeroVFrecuente, $cantMillas
    echo "Ingrese los datos del pasajero a continuación\n";

    echo "Nombre del pasajero: ";
    $nombre = trim(fgets(STDIN));
    echo "Apellido del pasajero: ";
    $apellido = trim(fgets(STDIN));
    do{
        $permitido = true;
        echo "Número de documento del pasajero (campo obligatorio): ";
        $documento = trim(fgets(STDIN));
        if($documento == ""){
            $permitido = false;
            echo "ERROR: No puede ingresar un número de documento nulo.\n";
        }
    } while (!$permitido);
    echo "Teléfono del pasajero: ";
    $telefono = trim(fgets(STDIN));
    do{
        $permitido = true;
        echo "Número de asiento elegido (campo obligatorio): ";
        $numeroAsiento = trim(fgets(STDIN));
        if(!ctype_digit($numeroAsiento) || $numeroAsiento < 1){
            $permitido = false;
            echo "ERROR: valor ingresado para asiento elegido inválido.\n";
        }
    } while (!$permitido);
    echo "Número de ticket: ";
    $numeroTicket = trim(fgets(STDIN));

    do{
        $permitido = true;
        echo "=====================================================================================\n";
        echo "||             Indique que tipo de pasaje desea adquirir ingresando:               ||\n";
        echo "||                                                                                 ||\n";
        echo "|| [1] Pasaje estandar                                                             ||\n";
        echo "|| [2] Pasaje VIP                                                                  ||\n";
        echo "|| [3] Pasaje con servicio especiales                                              ||\n";
        echo "=====================================================================================\n";
        echo "Opcion elegida: ";
        $opcionElegida = trim(fgets(STDIN));

        switch($opcionElegida){
            case 1:
                $pasajero = new Pasajero($nombre, $apellido, $documento, $telefono, $numeroAsiento, $numeroTicket);
                break;
            case 2:
                echo "Ingrese su número de viajero frecuente: ";
                $numeroVFrecuente = trim(fgets(STDIN));
                do{
                    $permitido = true;
                    echo "Ingrese la cantidad de millas (campo obligatorio): ";
                    $cantMillas = trim(fgets(STDIN));
                    if(!ctype_digit($cantMillas) || $cantMillas < 0){
                        $permitido = false;
                        echo "ERROR: valor ingresado para cantidad de millas inválido.\n";
                    }
                } while (!$permitido);
                $pasajero = new PasajeroVIP($nombre, $apellido, $documento, $telefono, 
                $numeroAsiento, $numeroTicket, $numeroVFrecuente, $cantMillas);
                break;
            case 3:
                echo "Ingrese \"SI\" para los servicios que desea contratar\n";
                echo "Servicio de silla de ruedas: ";
                $servicioSilla = trim(fgets(STDIN));
                echo "Servicio de asistencia para embarque/desembarque: ";
                $servicioAsistencia = trim(fgets(STDIN));
                echo "Servicio de comida especial :";
                $servicioComida = trim(fgets(STDIN));

                $reqSilla = false;
                $reqAsistencia = false;
                $reqComida = false;

                if(strtolower($servicioSilla) == "si"){
                    $reqSilla = true;
                }
                if(strtolower($servicioAsistencia) == "si"){
                    $reqAsistencia = true;
                }
                if(strtolower($servicioComida) == "si"){
                    $reqComida = true;
                }
                $pasajero = new PasajeroEspecial($nombre, $apellido, $documento, $telefono, 
                $numeroAsiento, $numeroTicket, $reqSilla, $reqAsistencia, $reqComida);
                break;
            default:
                $permitido = false;
                mensajeFueraDeRango();
                break;
        }

    }while (!$permitido);

    return $pasajero;
}

/**
 * Pide los datos para crear un responsable y retorna un objeto de tipo ResponsableV
 * 
 * @return ResponsableV
 */
function crearResponsable(){
    //ResponsableV $responsable
    //string $nombre, $apellido, 
    //int $numeroEmpleado, $numeroLicencia
    echo "Ingrese los datos del responsable para el viaje\n";
    echo "Nombre responsable: ";
    $nombre = trim(fgets(STDIN));
    echo "Apellido responsable: ";
    $apellido = trim(fgets(STDIN));
    echo "Número de empleado: ";
    $numeroEmpleado = trim(fgets(STDIN));
    echo "Número de licencia: ";
    $numeroLicencia = trim(fgets(STDIN));

    $responsable = new ResponsableV($numeroEmpleado, $numeroLicencia, $nombre, $apellido);
    
    return $responsable;
}

/**
 * Crea un arreglo automático de pasajeros y lo setea al viaje actual recibido por parámetro
 * junto con la cantidad de pasajeros a agregar
 * 
 * @param Viaje $viaje
 * @param int $cantPasajeros
 * 
 * @return array $colPasajeros
 */
function crearColeccionPasajerosAutomatica($viaje, $cantPasajeros){
    // array $colPasajeros
    // string $nombre, $apellido
    // int $documento, $numeroAsiento, $numeroTicket, $tipoPasajero
    // boolean $reqSilla, $reqAsistencia, $reqComida

    $colPasajeros = [];
    $colAsientos = [];

    for ($j=0; $j < $viaje->getCantMaxPasajeros(); $j++){
        $colAsientos[$j] = $j+1;
    }

    for ($i = 0; $i < $cantPasajeros; $i++){
        if(random_int(1,2) == 1){
            $nombre = generaNombreVaron(random_int(1,20));
        } else {
            $nombre = generaNombreMujer(random_int(1,20));
        }
        $apellido = generaApellido(random_int(1,20));
        $documento = 1000 + $i+1;
        $telefono = "299 500 000".$i+1;

        $asientoAleatorio = random_int(0, count($colAsientos)-1);
        $numeroAsiento = $colAsientos[$asientoAleatorio];
        unset($colAsientos[$asientoAleatorio]);
        $colAsientos = array_values($colAsientos);

        $numeroTicket = 31000 + $i+1;

        $tipoPasajero = random_int(1, 10);

        if($tipoPasajero == 1){
            $numeroVFrecuente = random_int(1000, 9999);
            $cantMillas = random_int(10, 1000);
            $colPasajeros[$i] = new PasajeroVIP($nombre, $apellido, $documento,
            $telefono, $numeroAsiento, $numeroTicket, $numeroVFrecuente, $cantMillas);
        }else if($tipoPasajero == 2 || $tipoPasajero == 3){
            if(random_int(1, 3) == 1){
                $reqSilla = true;
            }else{
                $reqSilla = false;
            }
            if(random_int(1, 3) == 1){
                $reqAsistencia = true;
            }else{
                $reqAsistencia = false;
            }
            if(random_int(1, 3) == 1){
                $reqComida = true;
            }else{
                $reqComida = false;
            }
            if(!$reqSilla && !$reqAsistencia && !$reqComida){
                $reqComida = true;
            }
            $colPasajeros[$i] = new PasajeroEspecial($nombre, $apellido, $documento,
            $telefono, $numeroAsiento, $numeroTicket, $reqSilla, $reqAsistencia, $reqComida);
        }else{
            $colPasajeros[$i] = new Pasajero($nombre, $apellido, $documento,
            $telefono, $numeroAsiento, $numeroTicket);
        }
    }

    return $colPasajeros;
}

/*/=======================================================================================\*\
||                                    PROGRAMA PRINCIPAL                                   ||
\*\=======================================================================================/*/

// ***** Declaración de variables *****/
// Viaje $viaje
// ResponsableV $responsable
// int $codigo, $capMaxima, $cantPasajeros, $documento, $opcionMenuPrincipal, $opcionMenuOperaciones
// string $destino, $nombre, $apellido, $numeroTelefono
// array $colPasajeros
// boolean $esPosible, $permitido

$responsable = new ResponsableV(997, 31721, "Nicolás", "Borghese");
$viaje = new Viaje(1001, "Plottier", 20, [], $responsable, 100);
$colPasajeros = crearColeccionPasajerosAutomatica($viaje, 10);
$viaje->setColPasajeros($colPasajeros);
$viaje->actualizarRecaudacionTotal();

echo "\n";
echo "El programa cuenta con un primer viaje precargado\n";
echo "\n";

do {

    $opcionMenuPrincipal = menuPrincipal();

    switch ($opcionMenuPrincipal){
        //MENÚ PARA CREAR/MODIFICAR VIAJE
        case 1:
            $opcionMenuOperaciones = menuModificarViaje();
            switch($opcionMenuOperaciones){
                // [1] Crear un viaje nuevo
                case 1:
                    echo "Ingrese el código correspondiente al nuevo viaje: ";
                    $codigo = trim(fgets(STDIN));
                    echo "Ingrese el destino del nuevo viaje: ";
                    $destino = trim(fgets(STDIN));
                    do{
                        $permitido = true;
                        echo "Ingrese la capacidad máxima de pasajeros para el nuevo viaje: ";
                        $capMaxima = trim(fgets(STDIN));
                        if(!ctype_digit($capMaxima) || $capMaxima < 0){
                            $permitido = false;
                            echo "ERROR: valor ingresado para capacidad máxima inválido.\n";
                        }
                    }while(!$permitido);
                    $responsable = crearResponsable();
                    do{
                        $permitido = true;
                        echo "Ingrese el costo de pasaje para el viaje: ";
                        $costo = (float)trim(fgets(STDIN));
                        if(!is_float($costo) || $costo < 0){
                            $permitido = false;
                            echo "ERROR: valor ingresado para costo de pasaje inválido.\n";
                        }
                    }while(!$permitido);
                    $viaje = new Viaje($codigo, $destino, $capMaxima, [], $responsable, $costo);
                    detenerEjecucion();
                    break;
                // [2] Vender un pasaje del viaje a un pasajero
                case 2:
                    $pasajero = crearPasajero();
                    $permitido = true;
                    if($viaje->existePasajero($pasajero->getDocumento())){
                        echo "ERROR: ya existe este número de documento dentro del viaje\n";
                        $permitido = false;
                    }
                    if($viaje->esAsientoOcupado($pasajero->getNumeroAsiento())){
                        echo "ERROR: el asiento elegido ya se encuentra ocupado\n";
                        $permitido = false;
                    }
                    if($pasajero->getNumeroAsiento() > $viaje->getCantMaxPasajeros()){
                        echo "ERROR: el asiento elegido no existe dentro del viaje\n";
                        $permitido = false;
                    }
                    if (!$viaje->hayPasajesDisponible()){
                        echo "ERROR: el viaje tiene todos sus pasajes vendidos\n"; 
                        $permitido = false;
                    }
                    if ($permitido){
                        $costo = $viaje->venderPasaje($pasajero);
                        echo "\n";
                        echo "Pasaje vendido con éxito!\n";
                        echo "Deberá abonar: $".$costo."\n";
                    }
                    detenerEjecucion();
                    break;
                // [3] Asignar una colección de pasajeros nueva al viaje
                case 3:
                    echo "Ingrese la cantidad de pasajeros aleatorios que desea crear: ";
                    $cantPasajeros = intval(trim(fgets(STDIN)));
                    if ($cantPasajeros < 0){
                        echo "ERROR: valor no válido para cantidad de pasajeros\n";
                    } else {
                        if ($cantPasajeros > $viaje->getCantMaxPasajeros()){
                            echo "ERROR: la cantidad de pasajeros ingresada excede la capacidad máxima del viaje\n";
                        } else {
                            $colPasajeros = crearColeccionPasajerosAutomatica($viaje, $cantPasajeros);
                            $viaje->setColPasajeros($colPasajeros);
                            $viaje->actualizarRecaudacionTotal();
                            echo "Carga automática de pasajeros realizada con éxito!\n";
                        }
                    }
                    detenerEjecucion();
                    break;
                // [4] Asignar un nuevo responsable de viaje al viaje
                case 4:
                    $responsable = crearResponsable();
                    $viaje->setResponsable($responsable);
                    echo "Nuevo responsable cargado con éxito!";
                    detenerEjecucion();
                    break;
                // [5] Modificar el destino del viaje
                case 5:
                    echo "Ingrese el nuevo destino del viaje: ";
                    $destino = trim(fgets(STDIN));
                    $viaje->setDestino($destino);
                    echo "Destino modificado con éxito!\n";
                    detenerEjecucion();
                    break;
                // [6] Modificar la cantidad máxima permitida de pasajeros para el viaje
                case 6:
                    echo "Ingrese la nueva cantidad máxima permitida de pasajeros para este viaje: ";
                    $capMaxima = trim(fgets(STDIN));
                    if (!ctype_digit($capMaxima) || $capMaxima < 0){      
                        echo "ERROR: valor ingresado para cantidad máxima de pasajeros inválido\n";
                    } else if ($capMaxima < $viaje->mayorAsientoOcupado()){
                        echo "ERROR: cantidad máxima ingresada no compatible\n";
                        echo "con los asientos ocupados actualmente\n";
                    }else{
                        $viaje->setCantMaxPasajeros($capMaxima);
                        echo "Cantidad máxima de pasajeros modificada con éxito!\n";
                    }
                    detenerEjecucion();
                    break;
                // [7] Modificar el costo por pasaje para el viaje
                case 7:
                    do{
                        $permitido = true;
                        echo "Ingrese el nuevo costo de pasaje para el viaje: ";
                        $costo = (float)trim(fgets(STDIN));
                        if($costo < 0){
                            $permitido = false;
                            echo "ERROR: valor ingresado para costo de pasaje inválido.\n";
                        }
                    }while(!$permitido);
                    $viaje->setCostoPasaje($costo);
                    $viaje->actualizarRecaudacionTotal();
                    echo "Nuevo costo para cada pasaje del viaje modificado con éxito!\n";
                    detenerEjecucion();
                    break;
                // Vuelve al menú principal
                case 0:    
                    break;
                // En caso de error accederá a esta opción y volverá al menú principal
                default:
                    break;
            }
            break;
        //MENÚ PARA OBSERVAR DATOS DEL VIAJE
        case 2:
            $opcionMenuOperaciones = menuObservarViaje();
            switch($opcionMenuOperaciones){
                // [1] Visualizar la información completa del viaje
                case 1:
                    echo $viaje;
                    detenerEjecucion();
                    break;
                // [2] Visualizar la colección del pasajeros
                case 2:
                    echo "Colección de pasajeros del viaje actual:\n";
                    echo "\n";
                    echo $viaje->colPasajerosAString();
                    detenerEjecucion();
                    break;
                // [3] Visualizar el código del viaje
                case 3:
                    echo "El código del viaje es: ".$viaje->getCodigo()."\n";
                    detenerEjecucion();
                    break;
                // [4] Visualizar el destino del viaje
                case 4:
                    echo "El destino del viaje actual es: ".$viaje->getDestino()."\n";
                    detenerEjecucion();
                    break;
                // [5] Visualizar la cantidad máxima de pasajeros permitida
                case 5:
                    echo "La cantidad máxima de pasajeros permitida para el viaje es: ".$viaje->getCantMaxPasajeros()."\n";
                    detenerEjecucion();
                    break;
                // [6] Visualizar al responsable del viaje
                case 6:
                    echo "El responsable del viaje es:\n";
                    echo $viaje->getResponsable();
                    echo "\n";
                    detenerEjecucion();
                    break;
                // [7] Visualizar el costo por pasaje del viaje
                case 7:
                    echo "El costo por pasaje del viaje es: $".$viaje->getCostoPasaje()."\n";
                    detenerEjecucion();
                    break;
                // [8] Visualizar la recaudación total actual del viaje
                case 8:
                    echo "La recaudación total actual del viaje es: $".$viaje->getRecaudacionTotal()."\n";
                    detenerEjecucion();
                    break;
                // [9] Visualizar los asientos libres
                case 9:
                    echo "Los asientos libres del viaje son aquellos que tienen número visible:\n";
                    echo "\n";
                    echo $viaje->mostrarAsientosLibres()."\n";
                    detenerEjecucion();
                    break;
                // [10] Visualizar la cantidad de asientos disponibles
                case 10:
                    echo "La cantidad de asientos disponibles es: ".$viaje->cantidadAsientosDisponibles()."\n";
                    detenerEjecucion();
                    break;
                // Vuelve al menú principal
                case 0:
                    break;
                // En caso de error accederá a esta opción y volverá al menú principal
                default:
                    break;
            }
            break;
        //MENÚ PARA QUITAR/MODIFICAR PASAJEROS DEL VIAJE
        case 3:
            $opcionMenuOperaciones = menuModificarPasajero();
            switch($opcionMenuOperaciones){
                // [1] Quitar un pasajero del viaje
                case 1:
                    echo "Ingrese el número de documento del pasajero que desea quitar del viaje: ";
                    $documento = trim(fgets(STDIN));
                    $esPosible = $viaje->quitarPasajeroPorDocumento($documento);
        
                    if($esPosible){
                        echo "Pasajero quitado del viaje con éxito!\n";
                    } else {
                        echo "ERROR: No se pudo quitar el pasajero del viaje\n";
                        echo "(no se encontro el documento cargado en el viaje actual)\n";
                    }
                    detenerEjecucion();
                    break;
                // [2] Quitar todos los pasajeros del viaje
                case 2:
                    $viaje->vaciarViaje();
                    echo "Todos los pasajeros han sido quitados del viaje con éxito!\n";
                    detenerEjecucion();
                    break;
                // [3] Modificar el nombre de un pasajero
                case 3:
                    echo "Ingrese el número de documento del pasajero al que desea cambiar su nombre: ";
                    $documento = trim(fgets(STDIN));
                    echo "Ingrese el nuevo nombre que desea asignar al pasajero: ";
                    $nombre = trim(fgets(STDIN));
                    $esPosible = $viaje->modificarNombrePorDocumento($documento, $nombre);
        
                    if($esPosible){
                        echo "Se modificó el nombre del pasajero con éxito!\n";
                    } else {
                        echo "ERROR: no se pudo modificar el nombre del pasajero\n";
                        echo "(no se encontro el documento cargado en el viaje actual)\n";
                    }
                    detenerEjecucion();
                    break;
                // [4] Modificar el apellido de un pasajero
                case 4:
                    echo "Ingrese el número de documento del pasajero al que desea cambiar su apellido: ";
                    $documento = trim(fgets(STDIN));
                    echo "Ingrese el nuevo apellido que desea asignar al pasajero: ";
                    $apellido = trim(fgets(STDIN));
                    $esPosible = $viaje->modificarApellidoPorDocumento($documento, $apellido);
        
                    if($esPosible){
                        echo "Se modificó el apellido del pasajero con éxito!\n";
                    } else {
                        echo "ERROR: no se pudo modificar el apellido del pasajero\n";
                        echo "(no se encontro el documento cargado en el viaje actual)\n";
                    }
                    detenerEjecucion();
                    break;
                // [5] Modificar el número de teléfono de un pasajero
                case 5:
                    echo "Ingrese el número de documento del pasajero al que desea cambiar su número de teléfono: ";
                    $documento = trim(fgets(STDIN));
                    echo "Ingrese el nuevo número de teléfono que desea asignar al pasajero: ";
                    $numeroTelefono = trim(fgets(STDIN));
                    $esPosible = $viaje->modificarTelefonoPorDocumento($documento, $numeroTelefono);
        
                    if($esPosible){
                        echo "Se modificó el número de teléfono del pasajero con éxito!\n";
                    } else {
                        echo "ERROR: no se pudo modificar el número de teléfono del pasajero\n";
                        echo "(no se encontro el documento cargado en el viaje actual)\n";
                    }
                    detenerEjecucion();
                    break;
                // [6] Modificar el número de asiento del pasajero
                case 6:
                    echo "Ingrese el número de documento del pasajero al que desea cambiar su número de asiento: ";
                    $documento = trim(fgets(STDIN));
                    echo "Ingrese el nuevo número de asiento que desea asignar al pasajero: ";
                    $numeroAsiento = trim(fgets(STDIN));
                    $esPosible = $viaje->modificarAsientoPorDocumento($documento, $numeroAsiento);
        
                    if($esPosible){
                        echo "Se modificó el número asiento del pasajero con éxito!\n";
                    } else {
                        echo "ERROR: No se pudo modificar el número de asiento del pasajero.\n";
                        if(!$viaje->existePasajero($documento)){
                            echo "(no se encontro el documento cargado en el viaje actual)\n";
                        }else{
                            if($numeroAsiento <= $viaje->getCantMaxPasajeros()){
                                "(el número de asiento elegido se encuentra ocupado por otro pasajero)\n";
                            }else{
                                "(no existe en el viaje el número de asiento elegido)\n";
                            }
                        }
                    }
                    detenerEjecucion();
                    break;
                // [7] Visualizar pasajero por número de documento
                case 7:
                    echo "Ingrese el número de documento del pasajero que desea visualizar sus datos: ";
                    $documento = trim(fgets(STDIN));
                    $pasajero = $viaje->visualizarPasajeroPorDocumento($documento);
                    if($pasajero == null){
                        echo "ERROR: el documento ingresado no corresponde a ningún pasajero en el viaje\n";
                    } else {
                        echo "El pasajero encontrado es:\n";
                        echo $pasajero;
                        echo "\n";
                    }
                    detenerEjecucion();
                    break;
                // [8] Visualizar pasajero por número de asiento
                case 8:
                    echo "Ingrese el número de asiento del pasajero que desea visualizar sus datos: ";
                    $numeroAsiento = trim(fgets(STDIN));
                    $pasajero = $viaje->visualizarPasajeroPorNroAsiento($numeroAsiento);
                    if($pasajero == null){
                        echo "ERROR: el número de asiento ingresado no corresponde a ningún pasajero en el viaje\n";
                    } else {
                        echo "pasajero encontrado:\n";
                        echo $pasajero;
                        echo "\n";
                    }
                    detenerEjecucion();
                    break;
                // Vuelve al menú principal
                case 0:
                    break;
                // En caso de error accederá a esta opción y volverá al menú principal
                default:
                    break;
            }
    }

} while ($opcionMenuPrincipal != 0);

echo "¡PROGRAMA FINALIZADO!\n";
echo "\n";

?>