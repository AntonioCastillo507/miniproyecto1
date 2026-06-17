<?php
/**
 * Problema3Controller.php
 * Genera los N primeros múltiplos de 4.
 * El usuario ingresa N desde el formulario.
 * Estructuras usadas: for, operador ternario
 */

$errores   = [];
$multiplos = [];
$n         = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitizar el valor de N recibido del formulario
    $n = Sanitizacion::limpiarEntero($_POST['n'] ?? '');

    // Validar que N sea un número entero positivo
    if (!Validacion::validarNumeroPositivo($n)) {
        $errores[] = 'Ingrese un número entero positivo.';
    } else {
        // Generar los N primeros múltiplos de 4 con un for
        for ($i = 1; $i <= $n; $i++) {
            $multiplos[] = 4 * $i;
        }
    }

    // Operador ternario: decidir qué vista cargar según si hay errores
    $vista = empty($errores) ? 'result' : 'form';
    require_once "views/problema3/{$vista}.php";

} else {
    require_once 'views/problema3/form.php';
}