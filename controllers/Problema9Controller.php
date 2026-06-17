<?php
/**
 * Problema9Controller.php
 * Solicita un número del 1 al 9 y genera sus primeras 15 potencias.
 * Ejemplo: base=4 → 4^1=4, 4^2=16, 4^3=64 ... 4^15
 * Estructuras usadas: for, operador ternario
 */

$errores   = [];
$numero    = null;
$potencias = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitizar el número base ingresado
    $numero = Sanitizacion::limpiarEntero($_POST['numero'] ?? '');

    // Validar que esté en el rango permitido (1-9)
    if (!Validacion::validarRango($numero, 1, 9)) {
        $errores[] = 'Ingrese un número entero entre 1 y 9.';
    } else {
        // Calcular las 15 primeras potencias con un for
        for ($exp = 1; $exp <= 15; $exp++) {
            $potencias[$exp] = pow($numero, $exp);
        }
    }

    // Operador ternario: decidir qué vista mostrar
    $vista = empty($errores) ? 'result' : 'form';
    require_once "views/problema9/{$vista}.php";

} else {
    require_once 'views/problema9/form.php';
}