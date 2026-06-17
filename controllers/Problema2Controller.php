<?php
/**
 * Problema2Controller.php
 * Calcula la suma de los números del 1 al 1,000.
 * Resultado esperado: 500,500
 * Estructura usada: while (requerido por el tema del taller)
 */

$suma = 0;
$i    = 1;

// Bucle while: se ejecuta mientras i sea menor o igual a 1000
while ($i <= 1000) {
    $suma += $i; // Acumular el valor de i en la suma total
    $i++;        // Incrementar el contador
}

// Enviar el resultado a la vista
require_once 'views/problema2/result.php';