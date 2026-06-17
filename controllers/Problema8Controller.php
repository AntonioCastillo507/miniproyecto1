<?php
/**
 * Problema8Controller.php
 * Determina la estación del año según la fecha ingresada.
 * Rangos según la tabla de la profe:
 *   Verano:    21 dic - 20 mar
 *   Otoño:     21 mar - 21 jun
 *   Invierno:  22 jun - 22 sep
 *   Primavera: 23 sep - 20 dic
 * Estructuras usadas: if/else, switch (dentro de Utilidades)
 */

$errores  = [];
$fecha    = null;
$estacion = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitizar la fecha eliminando caracteres peligrosos (OWASP XSS)
    $fecha = Sanitizacion::limpiarTexto($_POST['fecha'] ?? '');

    if (empty($fecha)) {
        $errores[] = 'Ingrese una fecha válida.';
    } else {
        // Delegar la lógica de estaciones a Utilidades (DRY)
        $estacion = Utilidades::obtenerEstacion($fecha);

        if ($estacion === null) {
            $errores[] = 'Formato de fecha inválido.';
        }
    }

    // Operador ternario: elegir vista resultado o formulario
    $vista = empty($errores) ? 'result' : 'form';
    require_once "views/problema8/{$vista}.php";

} else {
    require_once 'views/problema8/form.php';
}