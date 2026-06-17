<?php
/**
 * Problema1Controller.php
 * Calcula la media, desviación estándar, mínimo y máximo
 * de 5 números positivos ingresados por formulario.
 * Estructuras usadas: for, if/else
 * Principio DRY: cálculos delegados a Utilidades
 */

$errores = [];
$numeros = [];
$media = $desviacion = $minimo = $maximo = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recorrer los 5 campos del formulario con un for
    for ($i = 1; $i <= 5; $i++) {
        // Sanitizar el dato antes de validarlo (OWASP A03)
        $val = Sanitizacion::limpiarDecimal($_POST["numero{$i}"] ?? '');

        // Validar que sea un número positivo
        if (!Validacion::validarNumeroPositivo($val)) {
            $errores[] = "El número {$i} debe ser un valor positivo.";
        } else {
            $numeros[] = (float) $val;
        }
    }

    if (empty($errores)) {
        // Delegar los cálculos a la clase Utilidades (DRY)
        $media      = Utilidades::calcularMedia($numeros);
        $desviacion = Utilidades::calcularDesviacionEstandar($numeros);
        $minimo     = Utilidades::calcularMinimo($numeros);
        $maximo     = Utilidades::calcularMaximo($numeros);
        require_once 'views/problema1/result.php';
    } else {
        // Si hay errores, volver al formulario con los mensajes
        require_once 'views/problema1/form.php';
    }

} else {
    // Primera visita: mostrar formulario vacío
    require_once 'views/problema1/form.php';
}