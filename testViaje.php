<?php

include_once "ResponsableV.php";
include_once "Pasajero.php";
include_once "PasajeroEspecial.php";
include_once "PasajeroVIP.php";
include_once "Viaje.php";
include_once "Empresa.php";
include_once "BaseDatos.php";

//Este programa no funciona si no está bien realizada la conexión con la base de datos

/*/=======================================================================================\*\
||                                   INICIO FUNCIONES                                      ||
\*\=======================================================================================/*/

/**
 * En caso de que la base de datos no tenga cargada ninguna empresa accederá a
 * este menú para crear una y empezar a operar con ella.
 * Retorna la empresa cargada
 * 
 * @param Empresa $empresaActiva
 * 
 * @return Empresa
 */
function sinEmpresasEnSistema($empresaActiva){
    echo "\n";
    echo "=====================================================================================\n";
    echo "||          ATENCIÓN: La base de datos no encontró ninguna empresa cargada         ||\n";
    echo "||                                                                                 ||\n";
    echo "|| Ingrese los datos de la empresa para cargarla en la base de datos y así         ||\n";
    echo "|| poder comenzar a operar con ella                                                ||\n";
    echo "=====================================================================================\n";
    echo "\n";
    echo "Ingrese el nombre de la empresa: ";
    $nombreEmpresa = trim(fgets(STDIN));
    echo "Ingrese la dirección de la empresa: ";
    $direccionEmpresa = trim(fgets(STDIN));
    $empresaActiva->cargar("", $nombreEmpresa, $direccionEmpresa, []);
    $empresaActiva->insertar();
    echo "\n";

    return $empresaActiva;
}

/**
 * Menú principal que le indica al usuario las secciones a las que puede ir.
 * 
 * Recibe por parámetro la empresa con la que se está operando para generar
 * un saludo personalizado.
 * @param Empresa $empresaActiva
 * 
 * Retorna un entero que indica la opción del menú elegida
 * @return int
 */
function menuPrincipal($empresaActiva){
    do{
        
        echo "=====================================================================================\n";
        echo mensajeBienvenida($empresaActiva);
        echo "||                                                                                 ||\n";
        echo "||                                 MENÚ PRINCIPAL                                  ||\n";
        echo "||                                                                                 ||\n";
        echo "|| Ingrese por teclado el número que corresponda a la sección que desea ir:        ||\n";
        echo "||                                                                                 ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [1] EMPRESAS                                                                    ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [2] VIAJES                                                                      ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [3] RESPONSABLES DE VIAJE                                                       ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [4] PASAJEROS                                                                   ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [5] REINICIAR LA BASE DE DATOS                                                  ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [0] FINALIZAR PROGRAMA                                                          ||\n";
        echo "=====================================================================================\n";
        echo "\n";
        echo "Indique la operación que desea realizar: ";
        $opcionElegida = trim(fgets(STDIN));
        
        // OBSERVAR: el rango varía según cantidad de opciones
        if(!ctype_digit($opcionElegida) || $opcionElegida < 0 || $opcionElegida > 5){
            mensajeFueraDeRango();
        }
    // OBSERVAR: el rango varía según cantidad de opciones
    } while ($opcionElegida < 0 || $opcionElegida > 5);
    echo "\n";
    return $opcionElegida;
}

/*/=======================================================================================\*\
||                                    MENÚS EMPRESAS                                       ||
\*\=======================================================================================/*/

/**
 * Menú general de empresa que le indica al usuario las operaciones que puede realizar respecto
 * a la empresa.
 * 
 * Recibe por parámetro la empresa con la que se está operando para generar
 * un saludo personalizado.
 * @param Empresa $empresaActiva
 * 
 * Retorna un entero que indica la opción del menú elegida
 * @return int
 */
function menuGeneralEmpresa($empresaActiva){
    do{

        echo "=====================================================================================\n";
        echo mensajeBienvenida($empresaActiva);
        echo "||                                                                                 ||\n";
        echo "||                             MENÚ GENERAL DE EMPRESA                             ||\n";
        echo "||                                                                                 ||\n";
        echo "|| Ingrese por teclado el número que corresponda a la operación que desea          ||\n";
        echo "|| realizar:                                                                       ||\n";
        echo "||                                                                                 ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [1] Crear una nueva empresa                                                     ||\n";
        echo "|| [2] Visualizar información completa de la empresa activa                        ||\n";
        echo "|| [3] Modificar datos de la empresa activa/ Eliminar                              ||\n";
        echo "|| [4] Cambiar a otra empresa                                                      ||\n";
        echo "|| [5] Visualizar IDs de viajes de la empresa activa                               ||\n";
        echo "|| [6] Visualizar IDs de todos los responsables en el sistema                      ||\n";
        echo "|| [7] Visualizar IDs de empresas en el sistema                                    ||\n";
        echo "||                                                                                 ||\n";
        echo "|| [0] Volver al menú principal                                                    ||\n";
        echo "=====================================================================================\n";
        echo "\n";
        echo "Indique la operación que desea realizar: ";
        $opcionElegida = trim(fgets(STDIN));

        // OBSERVAR: el rango varía según cantidad de opciones
        if(!ctype_digit($opcionElegida) || $opcionElegida < 0 || $opcionElegida > 7){
            mensajeFueraDeRango();
        }
    // OBSERVAR: el rango varía según cantidad de opciones
    } while ($opcionElegida < 0 || $opcionElegida > 7);
    echo "\n";
    return $opcionElegida;
}

/**
 * Menú para modificar datos de la empresa
 * 
 * Recibe por parámetro la empresa con la que se está operando para generar
 * un saludo personalizado.
 * @param Empresa $empresaActiva
 * 
 * Retorna un entero que indica la opción del menú elegida
 * @return int
 */
function menuModificarEmpresa($empresaActiva){
    do{

        echo "=====================================================================================\n";
        echo mensajeBienvenida($empresaActiva);
        echo "||                                                                                 ||\n";
        echo "||                   MENÚ DE MODIFICACIÓN DE DATOS DE LA EMPRESA                   ||\n";
        echo "||                                                                                 ||\n";
        echo "|| Ingrese por teclado el número que corresponda a la operación que desea          ||\n";
        echo "|| realizar:                                                                       ||\n";
        echo "||                                                                                 ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [1] Modificar el nombre de la empresa                                           ||\n";
        echo "|| [2] Modificar la dirección de la empresa                                        ||\n";
        echo "|| [3] Eliminar empresa                                                            ||\n";
        echo "||                                                                                 ||\n";
        echo "|| [0] Volver al menú principal                                                    ||\n";
        echo "=====================================================================================\n";
        echo "\n";
        echo "Indique la operación que desea realizar: ";
        $opcionElegida = trim(fgets(STDIN));
        
        // OBSERVAR: el rango varía según cantidad de opciones
        if(!ctype_digit($opcionElegida) || $opcionElegida < 0 || $opcionElegida > 3){
            mensajeFueraDeRango();
        }
    // OBSERVAR: el rango varía según cantidad de opciones
    } while ($opcionElegida < 0 || $opcionElegida > 3);
    echo "\n";
    return $opcionElegida;
}

/*/=======================================================================================\*\
||                                     MENÚS VIAJES                                        ||
\*\=======================================================================================/*/

/**
 * Menú general de viajes que le indica al usuario las operaciones que puede realizar respecto
 * de los viajes de la empresa.
 * 
 * Recibe por parámetro la empresa con la que se está operando para generar
 * un saludo personalizado.
 * @param Empresa $empresaActiva
 * 
 * Retorna un entero que indica la opción del menú elegida
 * @return int
 */
function menuGeneralViajes($empresaActiva){
    do{

        echo "=====================================================================================\n";
        echo mensajeBienvenida($empresaActiva);
        echo "||                                                                                 ||\n";
        echo "||                              MENÚ GENERAL DE VIAJES                             ||\n";
        echo "||                                                                                 ||\n";
        echo "|| Ingrese por teclado el número que corresponda a la operación que desea          ||\n";
        echo "|| realizar:                                                                       ||\n";
        echo "||                                                                                 ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [1] Crear un viaje nuevo                                                        ||\n";
        echo "|| [2] Visualizar datos de un viaje                                                ||\n";
        echo "|| [3] Modificar datos de un viaje/ Eliminar                                       ||\n";
        echo "||                                                                                 ||\n";
        echo "|| [0] Volver al menú principal                                                    ||\n";
        echo "=====================================================================================\n";
        echo "\n";
        echo "Indique la operación que desea realizar: ";
        $opcionElegida = trim(fgets(STDIN));
        
        // OBSERVAR: el rango varía según cantidad de opciones
        if(!ctype_digit($opcionElegida) || $opcionElegida < 0 || $opcionElegida > 3){
            mensajeFueraDeRango();
        }
    // OBSERVAR: el rango varía según cantidad de opciones
    } while ($opcionElegida < 0 || $opcionElegida > 3);
    echo "\n";
    return $opcionElegida;
}

/**
 * Menú para visualizar datos del viaje
 * 
 * Recibe por parámetro la empresa con la que se está operando para generar
 * un saludo personalizado.
 * @param Empresa $empresaActiva
 * 
 * Retorna un entero que indica la opción del menú elegida
 * @return int
 */
function menuVisualizarViaje($empresaActiva){
    do{

        echo "=====================================================================================\n";
        echo mensajeBienvenida($empresaActiva);
        echo "||                                                                                 ||\n";
        echo "||                     MENÚ DE VISUALIZACIÓN DE DATOS DE VIAJES                    ||\n";
        echo "||                                                                                 ||\n";
        echo "|| Ingrese por teclado el número que corresponda a la operación que desea          ||\n";
        echo "|| realizar:                                                                       ||\n";
        echo "||                                                                                 ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [1] Mostrar los datos del viaje completo                                        ||\n";
        echo "|| [2] Mostrar la colección de pasajeros                                           ||\n";
        echo "|| [3] Mostrar el código de viaje                                                  ||\n";
        echo "|| [4] Mostrar el destino                                                          ||\n";
        echo "|| [5] Mostrar la cantidad máxima permitida de pasajeros                           ||\n";
        echo "|| [6] Mostrar al responsable del viaje                                            ||\n";
        echo "|| [7] Mostrar el costo del pasaje                                                 ||\n";
        echo "|| [8] Mostrar la recaudación total                                                ||\n";
        echo "|| [9] Mostrar los asientos disponibles                                            ||\n";
        echo "|| [10] Mostrar la cantidad de asientos disponibles                                ||\n";
        echo "||                                                                                 ||\n";
        echo "|| [0] Volver al menú principal                                                    ||\n";
        echo "=====================================================================================\n";
        echo "\n";
        echo "Indique la operación que desea realizar: ";
        $opcionElegida = trim(fgets(STDIN));
        
        // OBSERVAR: el rango varía según cantidad de opciones
        if(!ctype_digit($opcionElegida) || $opcionElegida < 0 || $opcionElegida > 10){
            mensajeFueraDeRango();
        }
    // OBSERVAR: el rango varía según cantidad de opciones
    } while ($opcionElegida < 0 || $opcionElegida > 10);
    echo "\n";
    return $opcionElegida;
}

/**
 * Menú para modificar datos del viaje
 * 
 * Recibe por parámetro la empresa con la que se está operando para generar
 * un saludo personalizado.
 * @param Empresa $empresaActiva
 * 
 * Retorna un entero que indica la opción del menú elegida
 * @return int
 */
function menuModificarViaje($empresaActiva){
    do{

        echo "=====================================================================================\n";
        echo mensajeBienvenida($empresaActiva);
        echo "||                                                                                 ||\n";
        echo "||                     MENÚ DE MODIFICACIÓN DE DATOS DE VIAJES                     ||\n";
        echo "||                                                                                 ||\n";
        echo "|| Ingrese por teclado el número que corresponda a la operación que desea          ||\n";
        echo "|| realizar:                                                                       ||\n";
        echo "||                                                                                 ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [1] Modificar el destino                                                        ||\n";
        echo "|| [2] Modificar la cantidad máxima permitida de pasajeros                         ||\n";
        echo "|| [3] Asignar un nuevo responsable de viaje                                       ||\n";
        echo "|| [4] Modificar el costo del pasaje                                               ||\n";
        echo "|| [5] Quitar todos los pasajeros del viaje                                        ||\n";
        echo "|| [6] Eliminar viaje                                                              ||\n";
        echo "||                                                                                 ||\n";
        echo "|| [0] Volver al menú principal                                                    ||\n";
        echo "=====================================================================================\n";
        echo "\n";
        echo "Indique la operación que desea realizar: ";
        $opcionElegida = trim(fgets(STDIN));
        
        // OBSERVAR: el rango varía según cantidad de opciones
        if(!ctype_digit($opcionElegida) || $opcionElegida < 0 || $opcionElegida > 6){
            mensajeFueraDeRango();
        }
    // OBSERVAR: el rango varía según cantidad de opciones
    } while ($opcionElegida < 0 || $opcionElegida > 6);
    echo "\n";
    return $opcionElegida;
}

/*/=======================================================================================\*\
||                                  MENÚS RESPONSABLES                                     ||
\*\=======================================================================================/*/

/**
 * Menú general de responsables que le indica al usuario las operaciones que puede realizar respecto
 * de los responsables de la empresa.
 * 
 * Recibe por parámetro la empresa con la que se está operando para generar
 * un saludo personalizado.
 * @param Empresa $empresaActiva
 * 
 * Retorna un entero que indica la opción del menú elegida
 * @return int
 */
function menuGeneralResponsables($empresaActiva){
    do{

        echo "=====================================================================================\n";
        echo mensajeBienvenida($empresaActiva);
        echo "||                                                                                 ||\n";
        echo "||                           MENÚ GENERAL DE RESPONSABLES                          ||\n";
        echo "||                                                                                 ||\n";
        echo "|| Ingrese por teclado el número que corresponda a la operación que desea          ||\n";
        echo "|| realizar:                                                                       ||\n";
        echo "||                                                                                 ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [1] Crear un responsable nuevo                                                  ||\n";
        echo "|| [2] Visualizar datos de un responsable                                          ||\n";
        echo "|| [3] Modificar datos de un responsable                                           ||\n";
        echo "|| [4] Eliminar responsable                                                        ||\n";
        echo "||                                                                                 ||\n";
        echo "|| [0] Volver al menú principal                                                    ||\n";
        echo "=====================================================================================\n";
        echo "\n";
        echo "Indique la operación que desea realizar: ";
        $opcionElegida = trim(fgets(STDIN));

        // OBSERVAR: el rango varía según cantidad de opciones
        if(!ctype_digit($opcionElegida) || $opcionElegida < 0 || $opcionElegida > 4){
            mensajeFueraDeRango();
        }
    // OBSERVAR: el rango varía según cantidad de opciones
    } while ($opcionElegida < 0 || $opcionElegida > 4);
    echo "\n";
    return $opcionElegida;
}

/**
 * Menú para visualizar datos del responsable
 * 
 * Recibe por parámetro la empresa con la que se está operando para generar
 * un saludo personalizado.
 * @param Empresa $empresaActiva
 * 
 * Retorna un entero que indica la opción del menú elegida
 * @return int
 */
function menuVisualizarResponsable($empresaActiva){
    do{

        echo "=====================================================================================\n";
        echo mensajeBienvenida($empresaActiva);
        echo "||                                                                                 ||\n";
        echo "||                  MENÚ DE VISUALIZACIÓN DE DATOS DEL RESPONSABLE                 ||\n";
        echo "||                                                                                 ||\n";
        echo "|| Ingrese por teclado el número que corresponda a la operación que desea          ||\n";
        echo "|| realizar:                                                                       ||\n";
        echo "||                                                                                 ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [1] Mostrar todos los datos del responsable                                     ||\n";
        echo "|| [2] Mostrar número de empleado                                                  ||\n";
        echo "|| [3] Mostrar número de licencia                                                  ||\n";
        echo "|| [4] Mostrar el nombre                                                           ||\n";
        echo "|| [5] Mostrar el apellido                                                         ||\n";
        echo "|| [6] Mostrar todos los viajes a los que se encuentra asignado                    ||\n";
        echo "||                                                                                 ||\n";
        echo "|| [0] Volver al menú principal                                                    ||\n";
        echo "=====================================================================================\n";
        echo "\n";
        echo "Indique la operación que desea realizar: ";
        $opcionElegida = trim(fgets(STDIN));
        
        // OBSERVAR: el rango varía según cantidad de opciones
        if(!ctype_digit($opcionElegida) || $opcionElegida < 0 || $opcionElegida > 6){
            mensajeFueraDeRango();
        }
    // OBSERVAR: el rango varía según cantidad de opciones
    } while ($opcionElegida < 0 || $opcionElegida > 6);
    echo "\n";
    return $opcionElegida;
}

/*/=======================================================================================\*\
||                                   MENÚS PASAJEROS                                       ||
\*\=======================================================================================/*/

/**
 * Menú general de pasajeros que le indica al usuario las operaciones que puede realizar respecto
 * de los pasajeros de la empresa.
 * 
 * Recibe por parámetro la empresa con la que se está operando para generar
 * un saludo personalizado.
 * @param Empresa $empresaActiva
 * 
 * Retorna un entero que indica la opción del menú elegida
 * @return int
 */
function menuGeneralPasajeros($empresaActiva){
    do{

        echo "=====================================================================================\n";
        echo mensajeBienvenida($empresaActiva);
        echo "||                                                                                 ||\n";
        echo "||                            MENÚ GENERAL DE PASAJEROS                            ||\n";
        echo "||                                                                                 ||\n";
        echo "|| Ingrese por teclado el número que corresponda a la operación que desea          ||\n";
        echo "|| realizar:                                                                       ||\n";
        echo "||                                                                                 ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [1] Vender pasajes                                                              ||\n";
        echo "|| [2] Visualizar datos de un pasajero                                             ||\n";
        echo "|| [3] Modificar datos de un pasajero/ Quitar pasajero del viaje                   ||\n";
        echo "||                                                                                 ||\n";
        echo "|| [0] Volver al menú principal                                                    ||\n";
        echo "=====================================================================================\n";
        echo "\n";
        echo "Indique la operación que desea realizar: ";
        $opcionElegida = trim(fgets(STDIN));
        
        // OBSERVAR: el rango varía según cantidad de opciones
        if(!ctype_digit($opcionElegida) || $opcionElegida < 0 || $opcionElegida > 3){
            mensajeFueraDeRango();
        }
    // OBSERVAR: el rango varía según cantidad de opciones
    } while ($opcionElegida < 0 || $opcionElegida > 3);
    echo "\n";
    return $opcionElegida;
}

/**
 * Menú para vender pasajes
 * 
 * Recibe por parámetro la empresa con la que se está operando para generar
 * un saludo personalizado.
 * @param Empresa $empresaActiva
 * 
 * Retorna un entero que indica la opción del menú elegida
 * @return int
 */
function menuVenderPasajes($empresaActiva){
    do{

        echo "=====================================================================================\n";
        echo mensajeBienvenida($empresaActiva);
        echo "||                                                                                 ||\n";
        echo "||                             MENÚ DE VENTA DE PASAJES                            ||\n";
        echo "||                                                                                 ||\n";
        echo "|| Ingrese por teclado el número que corresponda a la operación que desea          ||\n";
        echo "|| realizar:                                                                       ||\n";
        echo "||                                                                                 ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [1] Realizar una venta manual de un pasaje                                      ||\n";
        echo "|| [2] Realizar una venta automática de varios pasajes                             ||\n";
        echo "||                                                                                 ||\n";
        echo "|| [0] Volver al menú principal                                                    ||\n";
        echo "=====================================================================================\n";
        echo "\n";
        echo "Indique la operación que desea realizar: ";
        $opcionElegida = trim(fgets(STDIN));
        
        // OBSERVAR: el rango varía según cantidad de opciones
        if(!ctype_digit($opcionElegida) || $opcionElegida < 0 || $opcionElegida > 2){
            mensajeFueraDeRango();
        }
    // OBSERVAR: el rango varía según cantidad de opciones
    } while ($opcionElegida < 0 || $opcionElegida > 2);
    echo "\n";
    return $opcionElegida;
}

/**
 * Menú para modificar pasajero
 * 
 * Recibe por parámetro la empresa con la que se está operando para generar
 * un saludo personalizado.
 * @param Empresa $empresaActiva
 * 
 * Retorna un entero que indica la opción del menú elegida
 * @return int
 */
function menuModificarPasajero($empresaActiva){
    do{

        echo "=====================================================================================\n";
        echo mensajeBienvenida($empresaActiva);
        echo "||                                                                                 ||\n";
        echo "||                        MENÚ DE MODIFICACIÓN DE PASAJEROS                        ||\n";
        echo "||                                                                                 ||\n";
        echo "|| Ingrese por teclado el número que corresponda a la operación que desea          ||\n";
        echo "|| realizar:                                                                       ||\n";
        echo "||                                                                                 ||\n";
        echo "||---------------------------------------------------------------------------------||\n";
        echo "|| [1] Quitar el pasajero del viaje                                                ||\n";
        echo "|| [2] Modificar el nombre del pasajero                                            ||\n";
        echo "|| [3] Modificar el apellido del pasajero                                          ||\n";
        echo "|| [4] Modificar el número de teléfono del pasajero                                ||\n";
        echo "|| [5] Modificar el número de asiento del pasajero                                 ||\n";
        echo "|| [6] Modificar campos de pasajero especial                                       ||\n";
        echo "|| [7] Modificar campos de pasajero VIP                                            ||\n";
        echo "||                                                                                 ||\n";
        echo "|| [0] Volver al menú principal                                                    ||\n";
        echo "=====================================================================================\n";
        echo "\n";
        echo "Indique la operación que desea realizar: ";
        $opcionElegida = trim(fgets(STDIN));
        
        // OBSERVAR: el rango varía según cantidad de opciones
        if(!ctype_digit($opcionElegida) || $opcionElegida < 0 || $opcionElegida > 7){
            mensajeFueraDeRango();
        }
    // OBSERVAR: el rango varía según cantidad de opciones
    } while ($opcionElegida < 0 || $opcionElegida > 7);
    echo "\n";
    return $opcionElegida;
}

/*/=======================================================================================\*\
||                                FUNCIONES DE INTERFAZ                                    ||
\*\=======================================================================================/*/

/**
 * Genera un mensaje de bienvenida personalizado para los menús según el nombre
 * de la empresa que se encuentre activa.
 * 
 * @param Empresa $empresaActiva
 * @return string
 */
function mensajeBienvenida($empresaActiva){

    $parte1 = "||                                  ";
    $parte2 = "Bienvenido a: ";
    $parte3 = $empresaActiva->getNombreEmpresa();
    $parte4 = "                                 ||\n";

    $longitud = strlen($parte3);
    $mitad1 = round($longitud/2);
    $mitad2 = floor($longitud/2);
    
    $parte1 = substr($parte1, 0, (strlen($parte1)-$mitad1));
    $parte4 = substr($parte4, $mitad2);

    if($mitad1 > 34 ){
        $parte1 = "||";
        $parte3 = $parte3."\n";
    }

    $mensajeBienvenida = $parte1.$parte2.$parte3.$parte4;

    return $mensajeBienvenida;
}

/**
 * Imprime un mensaje de error cuando la opción elegida está fuera de rango
 * o no es una posible opción válida
 * 
 */
function mensajeFueraDeRango(){
    echo "\n";
    echo "=====================================================================================\n";
    echo "|| ¡ERROR! Usted ha ingresado un valor NO válido para operar.                      ||\n";
    echo "|| Verifique las opciones del menú nuevamente.                                     ||\n";
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

/*/=======================================================================================\*\
||                                 FUNCIONES GENERALES                                     ||
\*\=======================================================================================/*/

/**
 * Retorna un string que muestra todos los IDs de Viajes correspondientes a la empresa
 * recibida por parámetro.
 * 
 * @param Empresa $empresaActiva
 * @return string
 */
function visualizarIDsViajes($empresaActiva){

    $idEmpresa = $empresaActiva->getIdEmpresa();
    $nombreEmpresa = $empresaActiva->getNombreEmpresa();
    $viaje = new Viaje();
    $colViajes = $viaje->listar("viaje.idempresa = ".$idEmpresa);

    if(count($colViajes) == 0){
        $cadena = "[Esta empresa no tiene viajes cargados en la base de datos]\n";
    } else {
        $cadena = "IDs de viajes correspondientes a la empresa activa [ID empresa: ".$idEmpresa."][Nombre: ".$nombreEmpresa."]\n";
        for($i = 0; $i < count($colViajes); $i++){
            $cadena = $cadena."[ID viaje: ".$colViajes[$i]->getCodigo() ."][Destino: ".$colViajes[$i]->getDestino()."]\n";
        }
    }
    return $cadena;
}

/**
 * Retorna un string que muestra todos los IDs de los responsables cargados en la base de datos.
 * 
 * @return string
 */
function visualizarIDsResponsables(){

    $responsable = new ResponsableV();
    $colResponsables = $responsable->listar("");

    if(count($colResponsables) == 0){
        $cadena = "[Este sistema no tiene responsables cargados en la base de datos]\n";
    } else {
        $cadena = "IDs de responsables en sistema:\n";
        for($i = 0; $i < count($colResponsables); $i++){
            $cadena = $cadena."[ID responsable: ".$colResponsables[$i]->getNumeroEmpleado() .
            "][Nombre: ".$colResponsables[$i]->getNombre()."][Apellido: ".$colResponsables[$i]->getApellido()."]\n";
        }
    }
    return $cadena;
}

/**
 * Retorna un string que muestra todos los IDs de las empresas cargadas en la base de datos
 * 
 * @return string
 */
function visualizarIDsEmpresas(){

    $empresa = new Empresa();
    $colEmpresas = $empresa->listar("");

    if(count($colEmpresas) == 0){
        $cadena = "[Este sistema no tiene Empresas cargadas en la base de datos]\n";
    } else {
        $cadena = "IDs de empresas en sistema:\n";
        for($i = 0; $i < count($colEmpresas); $i++){
            $cadena = $cadena."[ID empresa: ".$colEmpresas[$i]->getIdEmpresa().
            "][Nombre: ".$colEmpresas[$i]->getNombreEmpresa()."]\n";
        }
    }
    return $cadena;
}

/**
 * Recibe por parámetro el id de un responsable y retorna un string
 * que indica a que viajes se encuentra asignado.
 * 
 * @param int $idResponsable
 * @return string
 */
function visualizarViajesResponsable($idResponsable){

    $viaje = new Viaje();
    $colViajes = $viaje->listar("rnumeroempleado = ".$idResponsable);

    if (count($colViajes) == 0){
        $cadena = "El responsable [ID: ".$idResponsable."] no se encuentra asignado a ningún viaje\n";

    } else {
        $cadena = "El responsable [ID: ".$idResponsable."] se encuentra asignado a los siguientes viajes:\n";

        for ($i = 0; $i < count($colViajes); $i++){
            $cadena = $cadena. "[ID viaje: ".$colViajes[$i]->getCodigo()."]";
            $cadena = $cadena. "[Destino: ".$colViajes[$i]->getDestino()."]";
            $cadena = $cadena. "[ID Empresa: ".$colViajes[$i]->getEmpresa()->getIdEmpresa()."]";
            $cadena = $cadena. "[Nombre Empresa: ".$colViajes[$i]->getEmpresa()->getNombreEmpresa()."]\n";
        }
    }
    return $cadena;
}

/**
 * Crea un viaje nuevo y lo guarda en la base de datos
 * 
 * @param int $idEmpresa
 */
function crearViaje($idEmpresa){

    echo "Ingrese el destino del nuevo viaje: ";
    $destino = trim(fgets(STDIN));

    do{
        $permitido = true;
        echo "Ingrese la capacidad máxima de pasajeros para el nuevo viaje: ";
        $cantMaxPasajeros = trim(fgets(STDIN));
        if(!ctype_digit($cantMaxPasajeros) || $cantMaxPasajeros < 0){
            $permitido = false;
            echo "ERROR: valor ingresado para capacidad máxima inválido\n";
        }
    }while(!$permitido);
    $cantMaxPasajeros = (int)$cantMaxPasajeros;

    echo "\n";
    echo visualizarIDsResponsables();
    echo "\n";

    echo "Ingrese el número de empleado de quien será el responsable para este viaje: ";
    $idResponsable = trim(fgets(STDIN));

    $responsable = new ResponsableV();
    $permitido = $responsable->Buscar($idResponsable);

    if($permitido){
        do{
            $permitido = true;
            echo "Ingrese el costo de pasaje para el viaje: $";
            $costo = trim(fgets(STDIN));
            if(!is_numeric($costo) || $costo < 0){
                $permitido = false;
                echo "ERROR: valor ingresado para costo de pasaje inválido\n";
            }
        }while(!$permitido);
        $costo = (float)$costo;

        $empresa = new Empresa();
        $empresa->Buscar($idEmpresa);

        $viaje = new Viaje();
        $viaje->cargar("", $destino, $cantMaxPasajeros, [], $responsable, $empresa, $costo);
        $exito = $viaje->insertar();

        echo "\n";
        if($exito){  
            echo "¡Viaje creado con éxito!\n";
        } else {
            $error = $viaje->getMensajeOperacion();
            echo $error;
        }
    } else {
        echo "\n";
        echo "ERROR: No se designo un responsable válido, será redirigido al menú principal\n";
    }
        
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
 * Pide los datos para crear un pasajero, recibe el último número de ticket
 * y el id del viaje que se le desea vender
 * y retorna un objeto de tipo Pasajero
 * 
 * @param int $idViaje
 * @param int $ultimoTicket
 * 
 * @return Pasajero
 */
function crearPasajero($idViaje, $ultimoTicket){
    //boolean $permitido, $servicioSilla, $servicioAsistencia, $servicioComida
    //string $nombre, $apellido, $documento, $telefono
    //int $numeroAsiento, $numeroTicket, $opcionElegida, $nroViajeroFrecuente, $cantMillas
    $pasajero = null;

    echo "A continuación ingrese los datos del pasajero\n\n";

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
        echo "Número de asiento elegido (campo con validación): ";
        $numeroAsiento = trim(fgets(STDIN));
        if(!ctype_digit($numeroAsiento) || $numeroAsiento < 1){
            $permitido = false;
            echo "ERROR: valor ingresado para asiento elegido inválido\n";
        }
    } while (!$permitido);

    $numeroAsiento = (int)$numeroAsiento;
    $ultimoTicket++;

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
                $pasajero = new Pasajero();
                $pasajero->cargar($nombre, $apellido, $documento, $telefono, $numeroAsiento, $ultimoTicket, $idViaje);
                break;
            case 2:
                echo "Ingrese su número de viajero frecuente: ";
                $nroViajeroFrecuente = trim(fgets(STDIN));
                do{
                    $permitido = true;
                    echo "Ingrese la cantidad de millas (campo con validación): ";
                    $cantMillas = trim(fgets(STDIN));
                    if(!ctype_digit($cantMillas) || $cantMillas < 0){
                        $permitido = false;
                        echo "ERROR: valor ingresado para cantidad de millas inválido\n";
                    }
                } while (!$permitido);
                $cantMillas = (int)$cantMillas;
                $pasajero = new PasajeroVIP();
                $pasajero->cargarSub($nombre, $apellido, $documento, $telefono, 
                $numeroAsiento, $ultimoTicket, $idViaje, $nroViajeroFrecuente, $cantMillas);
                break;
            case 3:
                echo "Ingrese \"SI\" para los servicios que desea contratar\n";
                echo "Servicio de silla de ruedas: ";
                $servicioSilla = trim(fgets(STDIN));
                echo "Servicio de asistencia para embarque/desembarque: ";
                $servicioAsistencia = trim(fgets(STDIN));
                echo "Servicio de comida especial: ";
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

                if(!$reqSilla && !$reqAsistencia && !$reqComida){
                    $pasajero = new Pasajero();
                    $pasajero->cargar($nombre, $apellido, $documento, $telefono, $numeroAsiento, $ultimoTicket, $idViaje);
                } else {
                    $pasajero = new PasajeroEspecial();
                    $pasajero->cargarSub($nombre, $apellido, $documento, $telefono, 
                    $numeroAsiento, $ultimoTicket, $idViaje, $reqSilla, $reqAsistencia, $reqComida);
                }

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
 * Pide los datos para crear un responsable y si es posible lo inserta en la base de datos
 */
function crearResponsable(){
    //ResponsableV $responsable
    //string $nombre, $apellido, 
    //int $numeroEmpleado, $numeroLicencia

    echo "Ingrese los datos del responsable para el viaje\n\n";
    echo "Nombre responsable: ";
    $nombre = trim(fgets(STDIN));
    echo "Apellido responsable: ";
    $apellido = trim(fgets(STDIN));
    echo "Número de licencia: ";
    $numeroLicencia = trim(fgets(STDIN));

    $responsable = new ResponsableV();
    $responsable->cargar(null, $numeroLicencia, $nombre, $apellido);
    $responsable->insertar();

}

/**
 * Crea un arreglo automático de pasajeros y lo retorna
 * 
 * @param int $cantPasajeros
 * @param array $colAsientos
 * @param string $maxDocumento
 * @param int $ultimoTicket
 * @param int $idViaje
 * 
 * @return array $colPasajeros
 */
function crearColeccionPasajerosAutomatica($cantPasajeros, $colAsientos, $ultimoTicket, $idViaje){
    // array $colPasajeros, $colAsientos
    // string $nombre, $apellido, $numeroAsiento, $tipoPasajero, $telefono
    // int $documento, $reqSila, $reqAsistencia, $reqComida, $nroViajeroFrecuente
    // boolean $reqSilla, $reqAsistencia, $reqComida

    $colPasajeros = [];

    $pasajero = new Pasajero();
    $maxDocumento = $pasajero->maximoDocumento();

    for ($i = 0; $i < $cantPasajeros; $i++){

        if(random_int(1,2) == 1){
            $nombre = generaNombreVaron(random_int(1,20));
        } else {
            $nombre = generaNombreMujer(random_int(1,20));
        }
        $apellido = generaApellido(random_int(1,20));
        
        $documento = $maxDocumento + ($i+1);
        
        $telefono = (random_int(100, 799)*10000) + (1000+$i);

        $asientoAleatorio = random_int(0, count($colAsientos)-1);
        $numeroAsiento = $colAsientos[$asientoAleatorio];
        unset($colAsientos[$asientoAleatorio]);
        $colAsientos = array_values($colAsientos);

        $ultimoTicket ++;

        $tipoPasajero = random_int(1, 10);

        if($tipoPasajero == 1){
            $nroViajeroFrecuente = random_int(1000, 9999);
            $cantMillas = random_int(10, 1000);
            $cantMillas = (int)$cantMillas;

            $colPasajeros[$i] = new PasajeroVIP();
            $colPasajeros[$i]->cargar($nombre, $apellido, $documento,
            $telefono, $numeroAsiento, $ultimoTicket, $idViaje, $nroViajeroFrecuente, $cantMillas);
            $colPasajeros[$i]->insertar();

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

            $colPasajeros[$i] = new PasajeroEspecial();
            $colPasajeros[$i]->cargar($nombre, $apellido, $documento,
            $telefono, $numeroAsiento, $ultimoTicket, $idViaje, $reqSilla, $reqAsistencia, $reqComida);
            $colPasajeros[$i]->insertar();

        }else{

            $colPasajeros[$i] = new Pasajero();
            $colPasajeros[$i]->cargar($nombre, $apellido, $documento,
            $telefono, $numeroAsiento, $ultimoTicket, $idViaje);
            $colPasajeros[$i]->insertar();

        }
    }

    return $colPasajeros;
}

/*/=======================================================================================\*\
||                                    PROGRAMA PRINCIPAL                                   ||
\*\=======================================================================================/*/

//INICIO EJECUCIÓN DE PROGRAMA
$empresaActiva = new Empresa();
$colEmpresas = $empresaActiva->listar("");
if(count($colEmpresas) == 0){
    $empresaActiva = sinEmpresasEnSistema($empresaActiva);
} else {
    $empresaActiva = $colEmpresas[0];
}
$empresaActiva->actualizarColViajes();

$pasajero = new Pasajero();
$maxDocumento = $pasajero->maximoDocumento();
$ultimoTicket = $pasajero->maximoTicket();

$menuActivo = "Principal";
//FIN INICIO EJECUCIÓN DE PROGRAMA

echo "\n";

//CICLO DE OPERACIONES
do {

    $colEmpresas = $empresaActiva->listar("");
    if(count($colEmpresas) == 0){
        $empresaActiva = sinEmpresasEnSistema($empresaActiva);
        $colEmpresas = $empresaActiva->listar("");
        $empresaActiva = $colEmpresas[0];
        $empresaActiva->actualizarColViajes();
    }
    
    if($menuActivo == "Principal"){
        $opcionMenu = menuPrincipal($empresaActiva);

        switch($opcionMenu){
            // [1] EMPRESAS
            case 1:
                $menuActivo = "GeneralEmpresa";
                break;
            // [2] VIAJES
            case 2:
                $menuActivo = "GeneralViajes";
                break;
            // [3] RESPONSABLES DE VIAJE
            case 3:
                $menuActivo = "GeneralResponsables";
                break;
            // [4] PASAJEROS
            case 4:
                $menuActivo = "GeneralPasajeros";
                break;
            // [5] REINICIAR LA BASE DE DATOS
            case 5:
                echo "¿Está seguro que desea reiniciar la base de datos?\n";
                echo "Ingrese (Si) para confirmar: ";
                $eleccion = trim(fgets(STDIN));
                echo "\n";
                if (strtolower($eleccion) == "si"){
                    $empresa = new Empresa();
                    $colEmpresas = $empresa->listar("");
                    for($i = 0; $i < count($colEmpresas); $i++){
                        $colEmpresas[$i]->eliminarEmpresa();
                    }

                    $responsable = new ResponsableV();
                    $colResponsables = $responsable->listar("");
                    for($i = 0; $i < count($colResponsables); $i++){
                        $colResponsables[$i]->eliminar();
                    }
                    echo "¡Base de datos reiniciada con éxito!\n";
                } else {
                    echo "Base de datos intacta. Será redirigido al menú principal\n";
                }
                detenerEjecucion();
                break;
            // [0] FINALIZAR PROGRAMA
            case 0:
                $menuActivo = "Finalizar";
                break;
            default:
                break;
        }
    }

    /*/=======================================================================================\*\
    ||                                  MENÚS EMPRESAS                                         ||
    \*\=======================================================================================/*/

    if($menuActivo == "GeneralEmpresa"){
        $opcionMenu = menuGeneralEmpresa($empresaActiva);

        switch($opcionMenu){
            // [1] Crear una nueva empresa
            case 1:
                echo "Ingrese el nombre de la nueva empresa: ";
                $nombreEmpresa = trim(fgets(STDIN));
                echo "Ingrese la dirección de la nueva empresa: ";
                $direccionEmpresa = trim(fgets(STDIN));
                $empresa = new Empresa();
                $empresa->cargar("", $nombreEmpresa, $direccionEmpresa, []);
                $empresa->insertar();

                echo "\n";
                echo "Nueva empresa creada con éxito\n";
                detenerEjecucion();
                break;
            // [2] Visualizar información completa de la empresa activa
            case 2:
                $empresaActiva->actualizarColViajes();
                echo $empresaActiva;
                detenerEjecucion();
                break;
            // [3] Modificar datos de la empresa activa/ Eliminar
            case 3:
                $menuActivo = "ModificarEmpresa";
                break;
            // [4] Cambiar a otra empresa
            case 4:
                echo visualizarIDsEmpresas();
                echo "\n";
                $empresa = new Empresa();
                $colEmpresas = $empresa->listar("");

                echo "Ingrese el ID de la empresa a la cual desea cambiar: ";
                $idEmpresa = trim(fgets(STDIN));

                $posEmpresa = 0;
                $encontrada = false;
                while (!$encontrada && $posEmpresa < count($colEmpresas)){
                    if($colEmpresas[$posEmpresa]->getIdEmpresa() == $idEmpresa){
                        $encontrada = true;
                        $empresaActiva = $colEmpresas[$posEmpresa];
                        $empresaActiva->actualizarColViajes();
                    }
                    $posEmpresa++;
                }
                echo "\n";
                if($encontrada){
                    echo "Cambio de empresa realizado con éxito a: ".$empresaActiva->getNombreEmpresa()."\n";
                } else {
                    echo "ERROR: El ID de empresa ingresado no corresponde a una empresa en la base de datos\n";
                }
                detenerEjecucion();
                break;
            // [5] Visualizar IDs de viajes de la empresa activa
            case 5:
                echo visualizarIDsViajes($empresaActiva);
                detenerEjecucion();
                break;
            // [6] Visualizar IDs de todos los responsables en el sistema
            case 6:
                echo visualizarIDsResponsables();
                detenerEjecucion();
                break;
            // [7] Visualizar IDs de empresas en el sistema
            case 7:
                echo visualizarIDsEmpresas();
                detenerEjecucion();
                break;
            // [0] Volver al menú principal
            case 0:
                $menuActivo = "Principal";
                break;
            default:
                break;
        }
    }

    if($menuActivo == "ModificarEmpresa"){
        $opcionMenu = menuModificarEmpresa($empresaActiva);
        $empresaActiva->actualizarColViajes();

        switch($opcionMenu){
            // [1] Modificar el nombre de la empresa
            case 1:
                echo "Ingrese el nuevo nombre de la empresa: ";
                $nombreEmpresa = trim(fgets(STDIN));
                $empresaActiva->setNombreEmpresa($nombreEmpresa);
                $empresaActiva->modificar();
                echo "Nombre de la empresa modificado con éxito!";
                echo "\n";
                detenerEjecucion();
                break;
            // [2] Modificar la dirección de la empresa
            case 2:
                echo "Ingrese la nueva dirección de la empresa: ";
                $direccionEmpresa = trim(fgets(STDIN));
                $empresaActiva->setDireccionEmpresa($direccionEmpresa);
                $empresaActiva->modificar();
                echo "Dirección de la empresa modificada con éxito!";
                echo "\n";
                detenerEjecucion();
                break;
            // [3] Eliminar empresa
            case 3:
                $empresaActiva->eliminarEmpresa();
                echo "Empresa eliminada con éxito!";
                echo "\n";
                detenerEjecucion();
            // [0] Volver al menú principal
            case 0:
                $menuActivo = "Principal";
                break;
            default:
                break;
        }
    }

    /*/=======================================================================================\*\
    ||                                   MENÚS VIAJES                                          ||
    \*\=======================================================================================/*/

    if($menuActivo == "GeneralViajes"){
        $opcionMenu = menuGeneralViajes($empresaActiva);

        switch($opcionMenu){
            // [1] Crear un viaje nuevo
            case 1: 
                $responsable = new ResponsableV();
                $colResponsables = $responsable->listar("");

                if(count($colResponsables) > 0){
                    $idEmpresa = $empresaActiva->getIdEmpresa();
                    crearViaje($idEmpresa);
                    $empresaActiva->actualizarColViajes();
                } else {
                    echo "No es posible crear un viaje nuevo debido a que el sistema\n";
                    echo "no cuenta con responsables en la base de datos.\n";
                    echo "Ingrese al menos un responsable al sistema para poder asignar a los viajes que desee crear.\n";
                }
                detenerEjecucion();
                $menuActivo = "Principal";
                break;
            // [2] Visualizar datos de un viaje
            case 2:
                $menuActivo = "VisualizarViaje";
                break;
            // [3] Modificar datos de un viaje/ Eliminar
            case 3:
                $menuActivo = "ModificarViaje";
                break;
            // [0] Volver al menú principal
            case 0:
                $menuActivo = "Principal";
                break;
            default:
                break;
        }
    }

    if($menuActivo == "VisualizarViaje"){

        echo visualizarIDsViajes($empresaActiva);
        if(count($empresaActiva->getColViajes()) != 0){

            echo "\n";
            echo "Ingrese el código de viaje al que desea visualizar sus datos: ";
            $idViaje = trim(fgets(STDIN));
            $viaje = new Viaje();
            $existe = $viaje->Buscar($idViaje);
            echo "\n";

            if($existe){

                do {
                    $opcionMenu = menuVisualizarViaje($empresaActiva);

                    switch($opcionMenu){
                        // [1] Mostrar los datos del viaje completo
                        case 1:
                            echo $viaje;
                            detenerEjecucion();
                            break;
                        // [2] Mostrar la colección de pasajeros
                        case 2:
                            echo "Colección de pasajeros del viaje actual:\n";
                            echo "\n";
                            echo $viaje->mostrarColPasajeros();
                            detenerEjecucion();
                            break;
                        // [3] Mostrar el código de viaje
                        case 3:
                            echo "El código del viaje es: ".$viaje->getCodigo()."\n";
                            detenerEjecucion();
                            break;
                        // [4] Mostrar el destino
                        case 4:
                            echo "El destino del viaje actual es: ".$viaje->getDestino()."\n";
                            detenerEjecucion();
                            break;
                        // [5] Mostrar la cantidad máxima permitida de pasajeros
                        case 5:
                            echo "La cantidad máxima de pasajeros permitida para el viaje es: ".$viaje->getCantMaxPasajeros()."\n";
                            detenerEjecucion();
                            break;
                        // [6] Mostrar al responsable del viaje 
                        case 6:
                            echo "El responsable del viaje es:\n";
                            echo $viaje->getResponsable();
                            echo "\n";
                            detenerEjecucion();
                            break;
                        // [7] Mostrar el costo del pasaje
                        case 7:
                            echo "El costo por pasaje del viaje es de: $".$viaje->getCostoPasaje()."\n";
                            detenerEjecucion();
                            break;
                        // [8] Mostrar la recaudación total
                        case 8:
                            echo "La recaudación total actual del viaje es de: $".$viaje->getRecaudacionTotal()."\n";
                            detenerEjecucion();
                            break;
                        // [9] Mostrar los asientos disponibles
                        case 9:
                            echo $viaje->mostrarAsientosLibres()."\n";
                            detenerEjecucion();
                            break;
                        // [10] Mostrar la cantidad de asientos disponibles
                        case 10:
                            echo "La cantidad de asientos disponibles es: ".$viaje->cantidadAsientosDisponibles()."\n";
                            detenerEjecucion();
                            break;
                        // [0] Volver al menú principal
                        case 0:
                            $menuActivo = "Principal";
                            break;
                        default:
                            break;
                    }

                } while ($opcionMenu != 0);
                
            } else {
                echo "\n";
                echo "ERROR: El código ingresado no corresponde a un viaje perteneciente a esta empresa\n";
                echo "Será redirigido al menú principal\n";
                $menuActivo = "Principal";
                detenerEjecucion();
            }
        } else {
            echo "Será redirigido al menú principal\n";
            $menuActivo = "Principal";
            detenerEjecucion();
        }
        
    }

    if($menuActivo == "ModificarViaje"){

        echo visualizarIDsViajes($empresaActiva);
        if(count($empresaActiva->getColViajes()) != 0){

            echo"\n";
            echo "Ingrese el código de viaje al que desea modificar sus datos: ";
            $idViaje = trim(fgets(STDIN));
            $viaje = new Viaje();
            $existe = $viaje->Buscar($idViaje);
            echo "\n";
            
            if($existe){

                do {
                    $opcionMenu = menuModificarViaje($empresaActiva);

                    switch($opcionMenu){
                        // [1] Modificar el destino
                        case 1:
                            echo "Destino actual del viaje: ".$viaje->getDestino()."\n";
                            echo "Ingrese el nuevo destino del viaje: ";
                            $destino = trim(fgets(STDIN));
                            $viaje->setDestino($destino);
                            $viaje->modificar();
                            echo "\n";
                            echo "¡Destino modificado con éxito!\n";
                            detenerEjecucion();
                            break;
                        // [2] Modificar la cantidad máxima permitida de pasajeros
                        case 2:
                            echo "Cantidad máxima de pasajeros permitida actual: ".$viaje->getCantMaxPasajeros()."\n";
                            echo "Ingrese la nueva cantidad máxima permitida de pasajeros para este viaje: ";
                            $cantMaxPasajeros = trim(fgets(STDIN));
                            if (!ctype_digit($cantMaxPasajeros) || $cantMaxPasajeros < 0){      
                                echo "ERROR: valor ingresado para cantidad máxima de pasajeros inválido\n";
                            } else if ($cantMaxPasajeros < $viaje->mayorAsientoOcupado()){
                                echo "ERROR: cantidad máxima ingresada no compatible\n";
                                echo "con los asientos ocupados actualmente\n";
                            }else{
                                $cantMaxPasajeros = (int)$cantMaxPasajeros;
                                $viaje->setCantMaxPasajeros($cantMaxPasajeros);
                                $viaje->modificar();
                                echo "\n";
                                echo "¡Cantidad máxima de pasajeros modificada con éxito!\n";
                            }
                            detenerEjecucion();
                            break;
                        // [3] Asignar un nuevo responsable de viaje
                        case 3:
                            echo "Ingrese el número de empleado del nuevo responsable que desea asignar al viaje: ";
                            $idResponsable = trim(fgets(STDIN));
                            $responsable = new ResponsableV();
                            $exito = $responsable->Buscar($idResponsable);
                            
                            echo "\n";
                            if($exito) {
                                $viaje->setResponsable($responsable);
                                $viaje->modificar();
                                echo "¡Nuevo responsable de viaje cargado con éxito!\n";
                            } else {
                                echo "ERROR: el N° de empleado ingresado no corresponde a un responsable cargado en la base de datos";
                            }
                            detenerEjecucion();
                            break;
                        // [4] Modificar el costo del pasaje
                        case 4:
                            echo "Costo de pasaje actual para el viaje: $".$viaje->getCostoPasaje()."\n";
                            do{
                                $permitido = true;
                                echo "Ingrese el nuevo costo de pasaje para el viaje: $";
                                $costo = trim(fgets(STDIN));
                                if(!is_numeric($costo) || $costo < 0){
                                    $permitido = false;
                                    echo "ERROR: valor ingresado para costo de pasaje inválido\n";
                                }
                            }while(!$permitido);
                            $costo = (float)$costo;
                            $viaje->setCostoPasaje($costo);
                            $viaje->actualizarRecaudacionTotal();
                            $viaje->modificar();
                            echo "¡Nuevo costo de pasaje para el viaje modificado con éxito!\n";
                            detenerEjecucion();
                            break;
                        // [5] Quitar todos los pasajeros del viaje
                        case 5:
                            $viaje->vaciarViaje();
                            echo "¡Todos los pasajeros han sido quitados del viaje con éxito!\n";
                            detenerEjecucion();
                            break;
                        // [6] Eliminar viaje
                        case 6:
                            $viaje->eliminarViaje();
                            echo "¡Viaje eliminado con éxito!\n";
                            $opcionMenu = 0;
                            $menuActivo = "Principal";
                            detenerEjecucion();
                            break;
                        // [0] Volver al menú principal
                        case 0:
                            $menuActivo = "Principal";
                            break;
                        default:
                            break;
                    }

                } while ($opcionMenu != 0);
            } else {
                echo "\n";
                echo "ERROR: El código ingresado no corresponde a un viaje perteneciente a esta empresa\n";
                echo "Será redirigido al menú principal\n";
                detenerEjecucion();
                $menuActivo = "Principal";
            }
        } else {
            echo "Será redirigido al menú principal\n";
            $menuActivo = "Principal";
            detenerEjecucion();
        }   
    }
    
    /*/=======================================================================================\*\
    ||                                  MENÚS RESPONSABLES                                     ||
    \*\=======================================================================================/*/

    if($menuActivo == "GeneralResponsables"){
        $opcionMenu = menuGeneralResponsables($empresaActiva);

        switch($opcionMenu){
            // [1] Crear un responsable nuevo
            case 1:
                crearResponsable();
                echo "\n";
                echo "¡Responsable creado con éxito!\n";
                detenerEjecucion();
                $menuActivo = "Principal";
                break;
            // [2] Visualizar datos de un responsable
            case 2:
                $menuActivo = "VisualizarResponsable";
                break;
            // [3] Modificar datos de un responsable
            case 3:
                $menuActivo = "ModificarResponsable";
                break;
            // [4] Eliminar responsable
            case 4:
                echo visualizarIDsResponsables();
                echo "\n";
                echo "Ingrese el número de empleado del responsable que desea eliminar de la BD: ";
                $idResponsable = trim(fgets(STDIN));
                $responsable = new ResponsableV();
                $existe = $responsable->Buscar($idResponsable);
                
                if($existe){
                    $viaje = new Viaje();
                    $colViajes = $viaje->listar("rnumeroempleado = ".$idResponsable);

                    if (count($colViajes) == 0){
                        $responsable->eliminar();
                        echo "\n";
                        echo "¡Responsable eliminado de la base de datos con éxito!\n";
                    } else {
                        $cadena = "El responsable no puede ser eliminado de la base de datos\n";
                        $cadena = $cadena. "por que se encuentra asignado a los siguientes viajes:\n\n";

                        for ($i = 0; $i < count($colViajes); $i++){
                            $cadena = $cadena. "[ID viaje: ".$colViajes[$i]->getCodigo()."]";
                            $cadena = $cadena. "[Destino: ".$colViajes[$i]->getDestino()."]";
                            $cadena = $cadena. "[ID Empresa: ".$colViajes[$i]->getEmpresa()->getIdEmpresa()."]";
                            $cadena = $cadena. "[Nombre: ".$colViajes[$i]->getEmpresa()->getNombreEmpresa()."]\n";
                        }
                        echo "\n";
                        echo $cadena;    
                    }
                } else {
                    echo "\n";
                    echo "ERROR: El número de empleado igresado no corresponde a un responsable en el sistema\n";
                    echo "Será redirigido al menú principal\n";
                }
                $menuActivo = "Principal";
                detenerEjecucion();
                break;
            // [0] Volver al menú principal
            case 0:
                $menuActivo = "Principal";
                break;
            default:
                break;
        }
    }

    if($menuActivo == "VisualizarResponsable"){

        echo visualizarIDsResponsables();
        echo "\n";
        echo "Ingrese el número de empleado del responsable que desea visualizar sus datos: ";
        $idResponsable = trim(fgets(STDIN));
        $responsable = new ResponsableV();
        $existe = $responsable->Buscar($idResponsable);

        if($existe){

            do {
                $opcionMenu = menuVisualizarResponsable($empresaActiva);

                switch($opcionMenu){
                    // [1] Mostrar todos los datos del responsable
                    case 1:
                        echo $responsable;
                        echo "\n";
                        detenerEjecucion();
                        break;
                    // [2] Mostrar número de empleado
                    case 2:
                        echo "El número de empleado es: ".$responsable->getNumeroEmpleado();
                        echo "\n";
                        detenerEjecucion();
                        break;
                    // [3] Mostrar número de licencia
                    case 3:
                        echo "El número de licencia es: ".$responsable->getNumeroLicencia();
                        echo "\n";
                        detenerEjecucion();
                        break;
                    // [4] Mostrar el nombre
                    case 4:
                        echo "El nombre del responsable es: ".$responsable->getNombre();
                        echo "\n";
                        detenerEjecucion();
                        break;
                    // [5] Mostrar el apellido
                    case 5:
                        echo "El apellido del responsable es: ".$responsable->getApellido();
                        echo "\n";
                        detenerEjecucion();
                        break;
                    // [6] Mostrar todos los viajes a los que se encuentra asignado
                    case 6:
                        echo visualizarViajesResponsable($idResponsable);
                        echo "\n";
                        detenerEjecucion();
                        break;
                    // [0] Volver al menú principal
                    case 0:
                        $menuActivo = "Principal";
                        break;
                    default:
                        break;
                }

            } while ($opcionMenu != 0);
            
        } else {
            echo "\n";
            echo "ERROR: El número de empleado ingresado no corresponde a ningún responsable en la base de datos\n";
            echo "Será redirigido al menú principal\n";
            detenerEjecucion();
            $menuActivo = "Principal";
        }
    }

    if($menuActivo == "ModificarResponsable"){

        echo visualizarIDsResponsables();
        echo "\n";
        echo "Ingrese el número de empleado del responsable que desea modificar sus datos: ";
        $idResponsable = trim(fgets(STDIN));
        $responsable = new ResponsableV();
        $existe = $responsable->Buscar($idResponsable);

        if($existe){
            echo "Estado del responsable:\n";
            echo $responsable."\n\n"; 
    
            echo "Ingrese los nuevos valores para cada campo que desee actualizar del responsable\n";
            echo "(ignore los campos que no desee modificar)\n\n";
            echo "Ingrese un nuevo nombre: ";
            $nombre = trim(fgets(STDIN));
            echo "Ingrese un nuevo apellido: ";
            $apellido = trim(fgets(STDIN));
            echo "Ingrese un nuevo número de licencia: ";
            $numeroLicencia = trim(fgets(STDIN));
            
            $responsable->modificarResponsable($nombre, $apellido, $numeroLicencia);
            $exito = $responsable->modificar();

            echo "\n";
            if($exito){
                echo "Responsable actualizado:\n";
                echo $responsable."\n";
            } else {
                echo $responsable->getMensajeOperacion();
            }
        } else {
            echo "\n";
            echo "ERROR: El número de empleado ingresado no corresponde a ningún responsable en la base de datos\n";
        }
        $menuActivo = "Principal";
        detenerEjecucion();        
    }

    /*/=======================================================================================\*\
    ||                                    MENÚS PASAJEROS                                      ||
    \*\=======================================================================================/*/

    if($menuActivo == "GeneralPasajeros"){
        $opcionMenu = menuGeneralPasajeros($empresaActiva);

        switch($opcionMenu){
            // [1] Vender pasajes
            case 1:
                $menuActivo = "VenderPasajes";
                break;
            // [2] Visualizar datos de un pasajero
            case 2:
                $menuActivo = "VisualizarPasajero";
                break;
            // [3] Modificar datos de un pasajero/ Quitar pasajero del viaje
            case 3:
                $menuActivo = "ModificarPasajero";
                break;
            // [0] Volver al menú principal
            case 0:
                $menuActivo = "Principal";
                break;
            default:
                break;
        }
    }

    if($menuActivo == "VenderPasajes"){
        $opcionMenu = menuVenderPasajes($empresaActiva);

        switch($opcionMenu){
            // [1] Realizar una venta manual de un pasaje
            case 1:
                $menuActivo = "VenderPasajesManual";
                break;
            // [2] Realizar una venta automática de varios pasajes
            case 2:
                $menuActivo = "VenderPasajesAutomatico";
                break;
            // [0] Volver al menú principal
            case 0:
                $menuActivo = "Principal";
                break;
            default:
                break;
        }
    }

    if($menuActivo == "VenderPasajesManual"){

        echo visualizarIDsViajes($empresaActiva);
        if(count($empresaActiva->getColViajes()) != 0){

            echo "\n";
            echo "Ingrese el código de viaje del cual desea vender un pasaje: ";
            $idViaje = trim(fgets(STDIN));
            $viaje = new Viaje();
            $existe = $viaje->Buscar($idViaje);
            
            echo "\n";
            if($existe){
                
                $pasajero = crearPasajero($idViaje, $ultimoTicket);
                $pasajero2 = new Pasajero();
                $colPasajeros = $pasajero2->listar("");
                $pos = 0;
                $exito = true;

                while($pos < count($colPasajeros) && $exito){
                    if($pasajero->getDocumento() == $colPasajeros[$pos]->getDocumento()){
                        $exito = false;
                    }
                    $pos++;
                }

                echo "\n";
                if($exito){
                    $costo = $viaje->venderPasaje($pasajero);

                    if($costo != -1){

                        $ultimoTicket ++;
                        echo "¡Pasaje vendido con éxito!\n";
                        echo "Deberá abonar: $".$costo."\n";
        
                    } else {
                        $pasajero->eliminar();
                        if($viaje->existePasajero($pasajero->getDocumento())){
                            echo "ERROR: ya existe este número de documento dentro del viaje\n";
                        }
                        if($viaje->esAsientoOcupado($pasajero->getNumeroAsiento())){
                            echo "ERROR: el asiento elegido ya se encuentra ocupado\n";
                        }
                        if($pasajero->getNumeroAsiento() > $viaje->getCantMaxPasajeros()){
                            echo "ERROR: el asiento elegido no existe dentro del viaje\n";
                        }
                        if (!$viaje->hayPasajesDisponible()){
                            echo "ERROR: el viaje tiene todos sus pasajes vendidos\n"; 
                        }
                    }
                } else {
                    echo "\n";
                    echo "ERROR: El documento de pasajero ingresado ya está se encuentra registrado en la base de datos\n";
                    echo "Será redirigido al menú principal\n";
                }   
            } else {
                echo "\n";
                echo "ERROR: El código ingresado no corresponde a un viaje perteneciente a esta empresa\n";
                echo "Será redirigido al menú principal\n";
            }
        }else{
            echo "Será redirigido al menú principal\n";
        }
        echo"\n";
        $menuActivo = "Principal";
        detenerEjecucion();
    }

    if($menuActivo == "VenderPasajesAutomatico"){

        echo visualizarIDsViajes($empresaActiva);
        if(count($empresaActiva->getColViajes()) != 0){

            echo "\n";
            echo "Ingrese el código de viaje del cual desea vender un pasaje: ";
            $idViaje = trim(fgets(STDIN));
            $viaje = new Viaje();
            $existe = $viaje->Buscar($idViaje);
            
            echo "\n";
            if($existe){
                $asientosDisponibles = $viaje->cantidadAsientosDisponibles();
                $pasajero = new Pasajero();
                $maxDocumento = $pasajero->maximoDocumento();

                echo "Ingrese la cantidad de pasajeros aleatorios que desea crear: ";
                $cantPasajeros = (trim(fgets(STDIN)));
                echo "\n";
                if (!ctype_digit($cantPasajeros) || $cantPasajeros < 0 ){
                    echo "ERROR: valor no válido para cantidad de pasajeros\n";
                } else if($cantPasajeros > $asientosDisponibles){
                    echo "ERROR: la cantidad de pasajeros ingresada excede la capacidad máxima del viaje\n";
                } else {
                    $colAsientos = $viaje->arregloAsientosLibres();
                    $colPasajeros = crearColeccionPasajerosAutomatica(
                    $cantPasajeros, $colAsientos, $ultimoTicket, $idViaje);

                    $ultimoTicket += $cantPasajeros;
                    $viaje->cargaColPasajeros($colPasajeros);
                    echo "¡Carga automática de pasajeros realizada con éxito!\n";
                }
            } else {
                echo "\n";
                echo "ERROR: El código ingresado no corresponde a un viaje perteneciente a esta empresa\n";
                echo "Será redirigido al menú principal\n";
            }
        } else {
            echo "Será redirigido al menú principal\n";
        }
        $menuActivo = "Principal";
        detenerEjecucion();
    }

    if($menuActivo == "VisualizarPasajero"){

        echo "Ingrese el documento del pasajero que desea visualizar sus datos: ";
        $documento = trim(fgets(STDIN));
        $pasajero = new Pasajero();
        $existe = $pasajero->Buscar($documento);

        /*
        if($existe){
            $pasajeroEspecial = new PasajeroEspecial();
            $existeEsp = $pasajeroEspecial->Buscar($documento);

            $pasajeroVIP = new PasajeroVIP();
            $existeVIP = $pasajeroVIP->Buscar($documento);

            if($existeEsp){
                $pasajero = $pasajeroEsepcial;
            } else if ($existeVIP){
                $pasajero = $pasajeroVIP;
            }
        }
        */

        echo "\n";
        if($existe){
            echo "Pasajero encontrado:\n";
            echo $pasajero;
        } else {
            echo "ERROR: el documento ingresado no corresponde a ningún pasajero en el sistema\n";
            echo "Será redirigido al menú principal\n";
        }
        $menuActivo = "Principal";
        detenerEjecucion();
    }

    if($menuActivo == "ModificarPasajero"){

        echo "Ingrese el documento del pasajero que desea modificar sus datos: ";
        $documento = trim(fgets(STDIN));
        $pasajero = new Pasajero();
        $existe = $pasajero->Buscar($documento);

        echo "\n";
        if($existe){

            $viaje = new Viaje();
            $idViaje = $pasajero->getIdViaje();
            $viaje->Buscar($idViaje);

            do {
                $opcionMenu = menuModificarPasajero($empresaActiva);

                switch($opcionMenu){
                    // [1] Quitar el pasajero del viaje
                    case 1:
                        $pasajero = $viaje->mostrarPasajero($documento);
                        $esPosible = $viaje->quitarPasajero($documento);
                        echo "\n";
    
                        if($esPosible){
                            echo "¡Pasajero quitado del viaje con éxito!\n";
                            echo $pasajero."\n";
                        } else {
                            echo "ERROR: no se pudo quitar al pasajero del viaje\n";
                        }
                        $opcionMenu = 0;
                        $menuActivo = "Principal";
                        detenerEjecucion();
                        break;
                    // [2] Modificar el nombre de un pasajero
                    case 2:
                        $pasajero = $viaje->mostrarPasajero($documento);
                        echo "\n";
    
                        if($pasajero != null){
                            echo "Estado del pasajero:\n";
                            echo $pasajero."\n\n";
    
                            echo "Ingrese el nuevo nombre que desea asignar al pasajero: ";
                            $nombre = trim(fgets(STDIN));
                            $viaje->modificarNombrePasajero($documento, $nombre);
                            echo "\n";
                            echo "¡Se modificó el nombre del pasajero con éxito!\n";
                            echo $pasajero."\n";
                        } else {
                            echo "ERROR: no se pudo modificar el nombre del pasajero\n";
                            echo "(no se encontro el documento ingresado en la base de datos)\n";
                        }
                        detenerEjecucion();
                        break;
                    // [3] Modificar el apellido de un pasajero
                    case 3:
                        $pasajero = $viaje->mostrarPasajero($documento);
                        echo "\n";
    
                        if($pasajero != null){
                            echo "Estado del pasajero:\n";
                            echo $pasajero."\n\n";
    
                            echo "Ingrese el nuevo apellido que desea asignar al pasajero: ";
                            $apellido = trim(fgets(STDIN));
                            $viaje->modificarApellidoPasajero($documento, $apellido);
                            echo "\n";
                            echo "¡Se modificó el apellido del pasajero con éxito!\n";
                            echo $pasajero."\n";
                        } else {
                            echo "ERROR: no se pudo modificar el apellido del pasajero\n";
                            echo "(no se encontro el documento ingresado en la base de datos)\n";
                        }
                        detenerEjecucion();
                        break;
                    // [4] Modificar el número de teléfono de un pasajero
                    case 4:
                        $pasajero = $viaje->mostrarPasajero($documento);
                        echo "\n";
    
                        if($pasajero != null){
                            echo "Estado del pasajero:\n";
                            echo $pasajero."\n\n";
    
                            echo "Ingrese el nuevo número de teléfono que desea asignar al pasajero: ";
                            $numeroTelefono = trim(fgets(STDIN));
                            $viaje->modificarTelefonoPasajero($documento, $numeroTelefono);
                            echo "\n";
                            echo "¡Se modificó el número de teléfono del pasajero con éxito!\n";
                            echo $pasajero."\n";
                        } else {
                            echo "ERROR: no se pudo modificar el número de teléfono del pasajero\n";
                            echo "(no se encontro el documento ingresado en la base de datos)\n";
                        }
                        detenerEjecucion();
                        break;
                    // [5] Modificar el número de asiento del pasajero
                    case 5:
                        if($viaje->hayPasajesDisponible()){
                            $pasajero = $viaje->mostrarPasajero($documento);
                            echo "\n";
                            if($pasajero != null){    
                                    echo $viaje->mostrarAsientosLibres()."\n";
                                    echo "Estado del pasajero:\n";
                                    echo $pasajero."\n\n";
                                    echo "Ingrese el nuevo número de asiento que desea asignar al pasajero: ";
                                    $numeroAsiento = trim(fgets(STDIN));
                                    $esPosible = $viaje->modificarAsientoPasajero($documento, $numeroAsiento);
                                    echo "\n";
                                    if($esPosible){
                                        echo $viaje->mostrarAsientosLibres()."\n";
                                        echo "¡Se modificó el número asiento del pasajero con éxito!\n";
                                        echo $pasajero."\n";
                                    } else {
                                        echo "ERROR: no se pudo modificar el número de asiento del pasajero\n";
                                        if($numeroAsiento <= $viaje->getCantMaxPasajeros() && $numeroAsiento >= 1){
                                            echo "(el número de asiento elegido ya se encuentra ocupado)\n";
                                        }else{
                                            echo "(no existe en el viaje el número de asiento elegido)\n";
                                        }
                                    }
                            } else {
                                echo "ERROR: no se pudo modificar el número de asiento del pasajero\n";
                                echo "(no se encontro el documento ingresado en la base de datos)\n";
                            }
                        } else {
                            echo "ERROR: no hay asientos disponibles para elegir en este viaje\n";
                            echo "Será redirigido al menú principal\n";
                        }
                        detenerEjecucion();
                        break;
                    // [6] Modificar campos de un pasajero especial
                    case 6:
                        $pasajero = $viaje->mostrarPasajero($documento);
                        echo "\n";

                        if($pasajero != null){
                            if($pasajero instanceof PasajeroEspecial){
                                echo "Estado del pasajero:\n";
                                echo $pasajero."\n\n";

                                echo "Ingrese Si/No para cada servicio que desee actualizar\n";
                                echo "(ignore los servicios que no desee modificar)\n\n";
                                echo "Servicio de silla de ruedas: ";
                                $servicioSilla = trim(fgets(STDIN));
                                echo "Servicio de asistencia para embarque/desembarque: ";
                                $servicioAsistencia = trim(fgets(STDIN));
                                echo "Servicio de comida especial: ";
                                $servicioComida = trim(fgets(STDIN));

                                $viaje->modificarServiciosEspecialesPasajero(
                                    $documento, $servicioSilla, $servicioAsistencia, $servicioComida);
                                echo "\n";
                                echo "Pasajero actualizado:\n";
                                echo $pasajero."\n";

                            } else {
                                echo "ERROR: el número de documento ingresado no corresponde a un pasajero de tipo especial\n";
                            }
                        } else {
                            echo "ERROR: el número de documento ingresado no existe en la base de datos\n";
                        }
                        detenerEjecucion();
                        break;
                    // [7] Modificar campos de un pasajero VIP
                    case 7:
                        $pasajero = $viaje->mostrarPasajero($documento);
                        echo "\n";

                        if($pasajero != null){
                            if($pasajero instanceof PasajeroVIP){
                                echo "Estado del pasajero:\n";
                                echo $pasajero."\n\n"; 

                                echo "Ingrese los nuevos valores para cada campo que desee actualizar\n";
                                echo "(ignore los campos que no desee modificar)\n\n";
                                echo "Ingrese un número de viajero frecuente: ";
                                $nroViajeroFrecuente = trim(fgets(STDIN));
                                do{
                                    $permitido = true;
                                    echo "Ingrese la nueva cantidad de millas (campo con validación): ";
                                    $cantMillas = trim(fgets(STDIN));
                                    if(!$cantMillas == ""){
                                        if(!ctype_digit($cantMillas) || $cantMillas < 0){
                                            $permitido = false;
                                            echo "ERROR: valor ingresado para cantidad de millas inválido\n";
                                        }
                                    }
                                } while (!$permitido);

                                $viaje->modificarCamposVIPPasajero($documento, $nroViajeroFrecuente, $cantMillas);
                                echo "\n";
                                echo "Pasajero actualizado:\n";
                                echo $pasajero."\n";

                            } else {
                                echo "ERROR: el número de documento ingresado no corresponde a un pasajero de tipo VIP\n";
                            }
                        } else {
                            echo "ERROR: el número de documento ingresado no existe en la base de datos\n";
                        }
                        detenerEjecucion();
                        break;
                    // [0] Volver al menú principal
                    case 0:
                        $menuActivo = "Principal";
                        break;
                    default:
                        break;
                }

            } while ($opcionMenu != 0);
        } else {
            echo "\n";
            echo "ERROR: El documento ingresado no corresponde a ningún pasajero en la base de datos\n";
            echo "Será redirigido al menú principal\n";
            detenerEjecucion();
            $menuActivo = "Principal";
        }
    }

} while ($menuActivo != "Finalizar");

echo "PROGRAMA FINALIZADO!\n";
echo "\n";

?>