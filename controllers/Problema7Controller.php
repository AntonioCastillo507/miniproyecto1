<?php
/**
 * Problema7Controller.php
 * Calculadora estadística de notas.
 * El usuario indica cuántas notas quiere ingresar (2-50),
 * y el sistema calcula: promedio, desviación estándar, mínimo y máximo.
 * Estructuras usadas: foreach, operador ternario
 */

$errores    = [];
$notas      = [];
$media = $desviacion = $minimo = $maximo = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitizar y validar la cantidad de notas
    $cantidad = Sanitizacion::limpiarEntero($_POST['cantidad'] ?? '');

    if (!Validacion::validarRango($cantidad, 2, 50)) {
        $errores[] = 'Ingrese entre 2 y 50 notas.';
    } else {
        // Recorrer las notas recibidas del formulario con foreach
        foreach ($_POST['nota'] as $rawNota) {
            // Sanitizar cada nota individualmente
            $nota = Sanitizacion::limpiarDecimal($rawNota);

            // Validar que cada nota esté entre 0 y 100
            if (!Validacion::validarRango($nota, 0, 100)) {
                $errores[] = "Nota inválida: debe estar entre 0 y 100.";
            } else {
                $notas[] = (float) $nota;
            }
        }
    }

    if (empty($errores)) {
        // Delegar todos los cálculos estadísticos a Utilidades (DRY)
        $media      = Utilidades::calcularMedia($notas);
        $desviacion = Utilidades::calcularDesviacionEstandar($notas);
        $minimo     = Utilidades::calcularMinimo($notas);
        $maximo     = Utilidades::calcularMaximo($notas);
        require_once 'views/problema7/result.php';
    } else {
        require_once 'views/problema7/form.php';
    }

} else {
    require_once 'views/problema7/form.php';
}