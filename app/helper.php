<?php

// Esta funcion recibe los valores respectivos para el proceso
function calcular_aleatorio($xn, $a, $c, $m, $n)
{
	$nx = 0;
    // Se crea un arreglo vacio
    $datos = [];

    // se reaiza un bucle dependiendo del numero n o cantidad de aleatorios
    for ($i=0; $i < $n; $i++) {
        // numero contador para saber el numero de la fila
        $nx = $nx + 1;
        // se guarda en un arreglo en la posicion 0 el valor del contador de la fila
        $arreglo[0] = $nx;
        // se guarda en un arreglo en la posicion 1 el valor de la semilla
        $arreglo[1] = $xn;
        // Se realiza el calculo respectivo efectuando la formula (a*Xn)+c
        $aporxn = ($a*$xn)+$c;
        // el resultado se guarda en la posicion 2 del arreglo
        $arreglo[2] = $aporxn;
        // se saca el modulo para el nuevo numero aleatorio
        $modulo1 = ($aporxn/$m);
        $modulo = ($modulo1 - intval($modulo1)) * $m;
        // el resultado del numero aleatorio se guarda en la posicion 3 del arreglo se redondea a dos decimales
        $arreglo[3] = round($modulo);
        // Se calcula el valor de Ri y se redondea a dos decimales
        $ri = round(($modulo1 - intval($modulo1)),2);
        // el valor de Ri se guarda en la posicion 4 del arreglo
        $arreglo[4] = $ri;
        // el valor de la variable Xn se cambia al valor sacado anteriormente en el modulo
        $xn = round($modulo);
        // el arreglo temporal creado en el bucle se guarda en arreglo principal creado fuera del bucle
        array_push($datos, $arreglo);
    }

    // la funcion retorna un arreglo multidimensional en donde se encuentran guardados los numeros aleatorios generados por el metodo congruencial
    return $datos;
}

function buscar_en_pro($arreglo, $numero)
{
    $bandera = 0;
    $valor_final = null;
    for ($i=0; $i < count($arreglo); $i++) { 
        $rango_menor = $arreglo[$i][3];
        $rango_mayor = $arreglo[$i][4];
        if ($numero >= $rango_menor && $numero <= $rango_mayor) {
            $valor_final = $arreglo[$i][0];
        }
    }
    return $valor_final;
}

function maximo($valor_1, $valor_2)
{
    $arreglo[0] = $valor_1;
    $arreglo[1] = $valor_2;
    $max = max($arreglo);
    return $max;
}