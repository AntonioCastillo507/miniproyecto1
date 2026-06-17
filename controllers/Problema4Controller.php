<?php
/**
 * Problema4Controller.php
 * Calcula por separado la suma de números pares
 * e impares comprendidos entre 1 y 200.
 * Estructuras usadas: for, operador ternario
 */

$sumaPares   = 0;
$sumaImpares = 0;

// Recorrer todos los números del 1 al 200
for ($i = 1; $i <= 200; $i++) {
    // Operador ternario: si es par suma a $sumaPares, si no a $sumaImpares
    $i % 2 === 0 ? $sumaPares += $i : $sumaImpares += $i;
}

require_once 'views/problema4/result.php';