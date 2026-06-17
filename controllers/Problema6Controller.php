<?php
/**
 * Problema6Controller.php
 * Distribuye el presupuesto anual de un hospital entre 3 áreas:
 *   - Ginecología:   40%
 *   - Traumatología: 35%
 *   - Pediatría:     25%
 * Estructuras usadas: foreach, operador ternario
 */

$errores     = [];
$presupuesto = null;
$resultados  = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitizar el presupuesto ingresado (limpia caracteres no numéricos)
    $presupuesto = Sanitizacion::limpiarDecimal($_POST['presupuesto'] ?? '');

    // Validar que el presupuesto sea un número positivo
    if (!Validacion::validarNumeroPositivo($presupuesto)) {
        $errores[] = 'Ingrese un presupuesto válido y mayor a 0.';
    } else {
        // Definir las áreas con sus porcentajes (DRY: un solo array)
        $areas = [
            'Ginecología'   => 0.40,
            'Traumatología' => 0.35,
            'Pediatría'     => 0.25,
        ];

        // Calcular el monto de cada área con foreach
        foreach ($areas as $area => $pct) {
            $resultados[$area] = $presupuesto * $pct;
        }
    }

    // Operador ternario: cargar vista de resultado o formulario
    $vista = empty($errores) ? 'result' : 'form';
    require_once "views/problema6/{$vista}.php";

} else {
    require_once 'views/problema6/form.php';
}