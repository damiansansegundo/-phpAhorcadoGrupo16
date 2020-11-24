<?php
/******************************************
*Completar:
* Facundo Franco Ramirez - LEGAJOS
* Damian Nicolas Leandro San Segundo - 
******************************************/




/**
* genera un arreglo de palabras para jugar
* @return array
*/
function cargarPalabras(){
    //array $coleccionPalabras

  $coleccionPalabras = array();
  $coleccionPalabras[0]= array("palabra"=> "papa" , "pista" => "se cultiva bajo tierra", "puntosPalabra"=>7);
  $coleccionPalabras[1]= array("palabra"=> "hepatitis" , "pista" => "enfermedad que inflama el higado", "puntosPalabra"=> 7);
  $coleccionPalabras[2]= array("palabra"=> "volkswagen" , "pista" => "marca de vehiculo", "puntosPalabra"=> 10);
  $coleccionPalabras[3]= array("palabra"=> "tomate" , "pista" => "fruta de color rojo", "puntosPalabra"=> 8);
  $coleccionPalabras[4]= array("palabra"=> "cargador" , "pista" => "se utiliza para administrar energia a objetos con bateria", "puntosPalabra"=> 5);
  $coleccionPalabras[5]= array("palabra"=> "trofeo" , "pista" => "objeto que premia a un jugador/competidor", "puntosPalabra"=> 8);
  $coleccionPalabras[6]= array("palabra"=> "fuego" , "pista" => "es uno de los 4 elementos de las cosmogonias", "puntosPalabra"=> 7);
  
  /*>>> Agregar al menos 4 palabras más <<<*/
  
  return $coleccionPalabras;
}

/**
* retorna un arreglo de juegos jugados
* @return array
*/

function cargarJuegos(){
    //array $coleccionJuegos

	$coleccionJuegos = array();
	$coleccionJuegos[0] = array("puntos"=> 0, "indicePalabra" => 1);
	$coleccionJuegos[1] = array("puntos"=> 10,"indicePalabra" => 2);
    $coleccionJuegos[2] = array("puntos"=> 0, "indicePalabra" => 1);
    $coleccionJuegos[3] = array("puntos"=> 8, "indicePalabra" => 0);
    $coleccionJuegos[4] = array("puntos"=> 0, "indicePalabra" => 6);
    $coleccionJuegos[5] = array("puntos"=> 9, "indicePalabra" => 5);
    $coleccionJuegos[6] = array("puntos"=> 0, "indicePalabra" => 1);
    /*>>> Agregar al menos 3 juegos realizados más <<<*/ // **YA SE AGREGARON 3 JUEGOS MAS**
    
    return $coleccionJuegos;
}

/**
* a partir de la palabra genera un arreglo para determinar si sus letras fueron o no descubiertas
* @param string $palabra
* @return array
*/
function dividirPalabraEnLetras($palabra){
    //array $coleccionLetrasGenerada
    //int $i
    
    /*>>> Completar para generar la estructura de datos b) indicada en el enunciado. 
          recuerde que los string pueden ser recorridos como los arreglos.  <<<*/

          $coleccionLetrasGenerada = [];
    for ($i = 0; $i < strlen($palabra); $i++){

        $coleccionLetrasGenerada[$i] = ["letra" => $palabra[$i], "descubierta" => false];
    }

    return $coleccionLetrasGenerada;

    // CORREGIDO
}

/**
* muestra y obtiene una opcion de menú ***válida***
* @return int
*/
function seleccionarOpcion(){

    // int $opcion 

    // FUNCION TERMINADA !!!!

    echo "--------------------------------------------------------------\n";
    echo "\n ( 1 ) Jugar con una palabra aleatoria"; 
    echo "\n ( 2 ) Jugar con una palabra elegida";
    echo "\n ( 3 ) Agregar una palabra al listado";
    echo "\n ( 4 ) Mostrar la informacion completa de un numero de juego";
    echo "\n ( 5 ) Mostrar la informacion completa del primer juego con mas puntaje";
    echo "\n ( 6 ) Mostrar la informacion completa del primer juego que supere un puntaje indicado por el usuario";
    echo "\n ( 7 ) Mostrar la lista de palabras ordenada por puntajes";
    echo "\n ( 8 ) Salir";
   do { 
       echo "\n Indique una opcion valida : " ;
    $opcion = trim(fgets(STDIN)) ;

} while ($opcion < 1 || $opcion > 8 );
    
    echo "--------------------------------------------------------------\n";
    return $opcion;
}

/**
* Determina si una palabra existe en el arreglo de palabras
* @param array $coleccionPalabras
* @param string $palabra
* @return boolean
*/
function existePalabra($coleccionPalabras,$palabra){
    //int $i, $cantPal
    //boolean $existe 

    $i=0;
    $cantPal = count($coleccionPalabras);
    $existe = false;
    while($i<$cantPal && !$existe){
        $existe = $coleccionPalabras[$i]["palabra"] == $palabra;
        $i++;
    }
    
    return $existe;
}


/**
* Determina si una letra existe en el arreglo de letras
* @param array $coleccionLetras
* @param string $letra
* @return boolean
*/
function existeLetra($coleccionLetras,$letra){
    //int $i, $cantLetras
    //boolean $existe
    
    /*>>> Completar cuerpo de la función, <<<*/ 
    // recorrido parcial

    $i=0;
    $cantLetras = count($coleccionLetras);
    $existe = false;
    while($i<$cantLetras && !$existe){
        $existe = $coleccionLetras[$i]["letra"] == $letra;
        $i++;
    }
    
    return $existe;

    // REVISAR !!!!!!!!  **FUNCIONA**
}



/**
* Solicita los datos correspondientes a un elemento de la coleccion de palabras: palabra, pista y puntaje. 
* Internamente la función también verifica que la palabra ingresada por el usuario no exista en la colección de palabras.
* @param array $coleccionPalabras                                                                                                   
* @return array  colección de palabras modificada con la nueva palabra.
*/
function cargarNuevaPalabra($coleccionPalabras){ /*>>> Completar la interfaz y cuerpo de la función. Debe respetar la documentación <<<*/
    //string $nuevaPista, $nuevaPalabra
    //int $nuevoPuntaje, $indice
    do { 
        echo "Ingrese una nueva palabra: ";                     
        $nuevaPalabra = trim(fgets(STDIN));
 
    } while (existePalabra($coleccionPalabras, $nuevaPalabra)); // CORREGIDO PARA PODER LLAMAR A LA FUNCION CORRECTAMENTE

    echo "Ingrese la pista: ";
    $nuevaPista = trim(fgets(STDIN));

    echo "Ingrese el puntaje: ";
    $nuevoPuntaje = trim(fgets(STDIN));

    //define el indice de la palabra nueva en base a la cantidad de palabras registradas
    $indice = count($coleccionPalabras);

    $coleccionPalabras[$indice]= array("palabra"=> $nuevaPalabra , "pista" => $nuevaPista , "puntosPalabra"=> $nuevoPuntaje);
    
    return $coleccionPalabras;

    //FUNCION TERMINADA

}  


/**
* Obtener indice aleatorio
* @param int $min
* @param int $max 
* @return int 
*/
function indiceAleatorioEntre($min,$max){
    $i = rand($min,$max); // Genera un número entero aleatorio 
    return $i;
    
    // FUNCION TERMINADA !!!!
}

/**
* solicitar un valor entre min y max
* @param int $min
* @param int $max
* @return int
*/
function solicitarIndiceEntre($min,$max){ 
    do{
        echo "Seleccione un valor entre $min y $max: \n";
        $i = trim(fgets(STDIN));
        echo "--------------------------------------------------------------\n";
    }while(!($i>=$min && $i<=$max));
    
    return $i;
}



/**
* Determinar si la palabra fue descubierta, es decir, todas las letras fueron descubiertas                              
* @param array $coleccionLetras                                                             
* @return boolean
*/
function palabraDescubierta($coleccionLetras){
    //int $i, $cantLetras, $noDescubierta
    //boolean $descubierta
    
    /*>>> Completar el cuerpo de la función, respetando lo indicado en la documentacion <<<*/

    $noDescubierta = 0;
    $i=0;
    $cantLetras = count($coleccionLetras);
    $descubierta = true;

    //recorre las letras y si hay por lo menos una que no fue descubierta, lo registra
    while($i<$cantLetras && $descubierta){
        $descubierta = $coleccionLetras[$i]["descubierta"] == true;

        if(!$descubierta){
            $noDescubierta = $noDescubierta + 1;
        }

        $i++;

    }

    //si hay por lo menos una letra que no fue descubierta, la palabra no fue descubierta
    if($noDescubierta == 0){
        $descubierta = true;
    } else {
        $descubierta = false;
    }

    return $descubierta;

    //FUNCION TERMINADA
}

/** solicita una letra al usuario y valida que el string ingresado tenga un unico caracter                          
* @return string                        *>>> Completar documentacion <<<*                       DOCUMENTACION TERMINADA
*/
function solicitarLetra(){
    //boolean $letraCorrecta
    //string $letra

    $letraCorrecta = false;
    do{
        echo "Ingrese una letra: ";
        $letra = strtolower(trim(fgets(STDIN)));
        if(strlen($letra)!=1){
            echo "Debe ingresar 1 letra!\n";
        }else{
            $letraCorrecta = true;
        }
        
    }while(!$letraCorrecta);
    
    return $letra;
}

/**
* Descubre todas las letras de la colección de letras iguales a la letra ingresada.                                 
* Devuelve la coleccionLetras modificada, con las letras descubiertas
* @param array $coleccionLetras
* @param string $letra
* @return array colección de letras modificada.
*/
function destaparLetra($coleccionLetras, $letra){
    //int $cantLetras, $i

    /*>>> Completar el cuerpo de la función, respetando lo indicado en la documentacion <<<*/

    
    $cantLetras = count($coleccionLetras);

    for($i = 0; $i <$cantLetras; $i++){
        //si la letra ingresada es igual a una del arreglo de letras, se la descubre
        if($coleccionLetras[$i]["letra"] == $letra){
            $coleccionLetras[$i]["descubierta"] = true;
        }
    }

    return $coleccionLetras;
    //FUNCION TERMINADA
}



/**
* obtiene la palabra con las letras descubiertas y * (asterisco) en las letras no descubiertas. Ejemplo: he**t*t*s              
* @param array $coleccionLetras
* @return string  Ejemplo: "he**t*t*s"
*/
function stringLetrasDescubiertas($coleccionLetras){
    //string $pal
    //int $cantLetras, $i

    $pal = "";

    $cantLetras = count($coleccionLetras);

    for($i = 0; $i <$cantLetras; $i++){
        //si la letra no fue descubierta, se la intercambia por un asterisco
        if($coleccionLetras[$i]["descubierta"] == false){
            $coleccionLetras[$i]["letra"] = "*";
        }
    }
    
    for($i = 0; $i <$cantLetras; $i++){
        //sumar todos los contenidos de "letra" en un string
        $pal = $pal . $coleccionLetras[$i]["letra"];
    }
    
    
    /*>>> Completar el cuerpo de la función, respetando lo indicado en la documentacion <<<*/
    
    return $pal;
    //FUNCION TERMINADA
}


/**
* Desarrolla el juego y retorna el puntaje obtenido
* Si descubre la palabra se suma el puntaje de la palabra más la cantidad de intentos que quedaron                                  
* Si no descubre la palabra el puntaje es 0.
* @param array $coleccionPalabras
* @param int $indicePalabra
* @param int $cantIntentos
* @return int puntaje obtenido
*/
function jugar($coleccionPalabras, $indicePalabra, $cantIntentos){
    $pal = $coleccionPalabras[$indicePalabra]["palabra"];
    $coleccionLetras = dividirPalabraEnLetras($pal);
    //print_r($coleccionLetras);
    $puntaje = 0;
    
    
    /*>>> Completar el cuerpo de la función, respetando lo indicado en la documentacion <<<*/
    
    //Mostrar pista:
    echo $coleccionPalabras[$indicePalabra]["pista"] . "\n";
    echo "--------------------------------------------------------------\n";
    
    //solicitar letras mientras haya intentos y la palabra no haya sido descubierta:
    do {
        $letra = solicitarLetra();

        //se registra si la letra existe en la palabra o no
        $letraExiste = existeLetra($coleccionLetras, $letra);

        //si la letra ingresada existe en la palabra, se registra en la coleccion de letras
        $coleccionLetras = destaparLetra($coleccionLetras, $letra);

        //si la letra existe, se muestra en pantalla el progreso de la palabra y sino, se resta un intento
        if ($letraExiste){
            echo "La letra '$letra' PERTENECE a la palabra.\n";
            echo "palabra a descubrir: " . stringLetrasDescubiertas($coleccionLetras) . "\n";
            echo "--------------------------------------------------------------\n";                     
        } else {
            $cantIntentos = $cantIntentos -1;
            echo "La letra '$letra' NO PERTENECE a la palabra. Quedan $cantIntentos intentos.\n";
            echo "palabra a descubrir: " . stringLetrasDescubiertas($coleccionLetras) . "\n";
            echo "--------------------------------------------------------------\n";
        }

        $palabraFueDescubierta = palabraDescubierta($coleccionLetras);

    } while ($cantIntentos != 0 && !$palabraFueDescubierta);                                    
    
    If($palabraFueDescubierta){
        //obtener puntaje:
        $puntaje = $coleccionPalabras[$indicePalabra]["puntosPalabra"] + $cantIntentos ;   //CORREGIDO
        
        echo "\n¡¡¡¡¡¡GANASTE ".$puntaje." puntos!!!!!!\n";
    }else{
        echo "\n¡¡¡¡¡¡AHORCADO AHORCADO!!!!!!\n";
        echo  "  +-----+ \n" . "  O     |\n" . " /|\    | \n". " / \    |\n". "        | \n". "        |\n". "     ----- \n"  ;  // Dibujo del ahorcado
    }
    
    return $puntaje;

    //FUNCION TERMINADA
}

/**
* Agrega un nuevo juego al arreglo de juegos 
* @param array $coleccionJuegos
* @param int $ptos
* @param int $indicePalabra
* @return array coleccion de juegos modificada
*/
function agregarJuego($coleccionJuegos,$puntos,$indicePalabra){
    $coleccionJuegos[] = array("puntos"=> $puntos, "indicePalabra" => $indicePalabra);    
    return $coleccionJuegos;
}

/**
* Muestra los datos completos de un registro en la colección de palabras                                
* @param array $coleccionPalabras
* @param int $indicePalabra
*/
function mostrarPalabra($coleccionPalabras,$indicePalabra){
    //$coleccionPalabras[0]= array("palabra"=> "papa" , "pista" => "se cultiva bajo tierra", "puntosPalabra"=>7);
    echo "palabra en indice: $indicePalabra\n";
    echo "palabra = " . $coleccionPalabras[$indicePalabra]["palabra"] . "\n";
    echo "pista = " . $coleccionPalabras[$indicePalabra]["pista"] . "\n";
    echo "puntaje = " . $coleccionPalabras[$indicePalabra]["puntosPalabra"] . "\n";
    
    /*>>> Completar el cuerpo de la función, respetando lo indicado en la documentacion <<<*/
    //FUNCION TERMINADA 
}


/**
* Muestra los datos completos de un juego                                                                   
* @param array $coleccionJuegos
* @param array $coleccionPalabras
* @param int $indiceJuego
*/
function mostrarJuego($coleccionJuegos,$coleccionPalabras,$indiceJuego){
    //array("puntos"=> 8, "indicePalabra" => 1)
    echo "\n\n";
    echo "<-<-< Juego ".$indiceJuego." >->->\n";
    echo "  Puntos ganados: ".$coleccionJuegos[$indiceJuego]["puntos"]."\n";
    echo "  Información de la palabra:\n";
    mostrarPalabra($coleccionPalabras,$coleccionJuegos[$indiceJuego]["indicePalabra"]);
    echo "\n";
}




/*>>> Implementar las funciones necesarias para la opcion 5 del menú <<<*/
/**
* Obtiene el indice de la partida con mas puntaje                                                                  
* @param array $coleccionJuegos
* @return int
*/
function indiceMayorPuntaje($coleccionJuegos){

    $indiceDeMayorPuntaje = 0;
    $mayorPuntaje = 0;
    for($i = 0; $i < count($coleccionJuegos); $i++){
        if ($coleccionJuegos[$i]["puntos"] > $mayorPuntaje){
            $mayorPuntaje = $coleccionJuegos[$i]["puntos"];
            $indiceDeMayorPuntaje = $i; 
        }                                                                         
    }

    return $indiceDeMayorPuntaje;
    //FUNCION TERMINADA
}


/*>>> Implementar las funciones necesarias para la opcion 6 del menú <<<*/
/**
* Obtiene el indice de la partida con mas puntaje                                                                  
* @param array $coleccionJuegos
* @param int $puntajeIngresado
* @return int
*/
function MayorPuntajeIngresado($coleccionJuegos){

    // int $indiceMayorPuntaje
    $indiceDeMayorPuntaje = -1;
    echo "ingrese un puntaje : " ;
    $puntajeIngresado = trim(fgets(STDIN)) ;

    for($i = 0; $i < count($coleccionJuegos); $i++){
        if ($coleccionJuegos[$i]["puntos"] > $puntajeIngresado){
            $puntajeIngresado = $coleccionJuegos[$i]["puntos"];
            $indiceDeMayorPuntaje = $i; 
        }                                                                         
    }

    return $indiceDeMayorPuntaje;
    //FUNCION TERMINADA
}

/*>>> Implementar las funciones necesarias para la opcion 7 del menú <<<*/


/**
 * muestra el arreglo de palabras en orden alfabetico
 * @param array $coleccionPalabras
 */
function palabrasEnOrden($coleccionPalabras){

    
    sort($coleccionPalabras);
    print_r($coleccionPalabras) ;
  
    
}



/******************************************/
/************** PROGRAMA PRINCIAL *********/
/******************************************/
define("CANT_INTENTOS", 6); //Constante en php para cantidad de intentos que tendrá el jugador para adivinar la palabra.

//array $coleccionPalabrasJuego
//int $indicePalabra

$coleccionPalabrasEnJuego = cargarPalabras();
$coleccionJuegosActual = cargarJuegos();

do{
    $opcion = seleccionarOpcion();
    switch ($opcion) {
    case 1: //Jugar con una palabra aleatoria
        $indicePalabra = indiceAleatorioEntre(0,count($coleccionPalabrasEnJuego))-1;
        jugar($coleccionPalabrasEnJuego, $indicePalabra, CANT_INTENTOS);

        break;
    case 2: //Jugar con una palabra elegida
        $indicePalabra = solicitarIndiceEntre(0,count($coleccionPalabrasEnJuego))-1;
        jugar($coleccionPalabrasEnJuego, $indicePalabra, CANT_INTENTOS);                             

        break;
    case 3: //Agregar una palabra al listado                                                   
        $coleccionPalabrasEnJuego = cargarNuevaPalabra($coleccionPalabrasEnJuego); // puse $coleccionPalabrasEnJuego creo que es esa la variable ahi REVISAR por las dudas

        break;
    case 4: //Mostrar la información completa de un número de juego
        $indiceJuego = solicitarIndiceEntre(0,count($coleccionJuegosActual))-1;
        mostrarJuego($coleccionJuegosActual,$coleccionPalabrasEnJuego,$indiceJuego);                                      

        break;
    case 5: //Mostrar la información completa del primer juego con más puntaje                          
        $indiceJuego = indiceMayorPuntaje($coleccionJuegosActual);
        mostrarJuego($coleccionJuegosActual,$coleccionPalabrasEnJuego,$indiceJuego);

        break;
    case 6: //Mostrar la información completa del primer juego que supere un puntaje indicado por el usuario
        $indiceMayor = MayorPuntajeIngresado($coleccionJuegosActual) ;
        mostrarJuego($coleccionJuegosActual,$coleccionPalabrasEnJuego,$indiceMayor) ;
        break;
    case 7: //Mostrar la lista de palabras ordenada por orden alfabetico
        palabrasEnOrden($coleccionPalabrasEnJuego) ;

        break;
    }
}while($opcion != 8);