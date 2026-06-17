<?php
/**
 * Problema5Controller.php
 * Lee las edades de 5 personas y las clasifica en:
 * niño (0-12), adolescente (13-17), adulto (18-64), adulto mayor (65+).
 * También detecta edades repetidas y genera estadísticas.
 * Estructuras usadas: for, foreach, switch (dentro de Utilidades)
 */

$errores   = [];
$edades    = [];
$categorias = [];
$conteo    = ['niño' => 0, 'adolescente' => 0, 'adulto' => 0, 'adulto mayor' => 0];
$repetidas = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recorrer los 5 campos de edad del formulario
    for ($i = 1; $i <= 5; $i++) {
        // Sanitizar antes de validar (OWASP A03)
        $edad = Sanitizacion::limpiarEntero($_POST["edad{$i}"] ?? '');

        // Validar que esté en el rango permitido (0-120)
        if (!Validacion::validarRango($edad, 0, 120)) {
            $errores[] = "La edad {$i} no es válida (0-120).";
        } else {
            $edades[]     = $edad;
            // Clasificar la edad usando switch interno en Utilidades
            $cat          = Utilidades::clasificarEdad($edad);
            $categorias[] = $cat;
            $conteo[$cat]++;
        }
    }

    if (empty($errores)) {
        // Detectar edades repetidas con array_count_values
        $frecuencia = array_count_values($edades);
        foreach ($frecuencia as $val => $veces) {
            if ($veces > 1) $repetidas[$val] = $veces;
        }
    }

    // Operador ternario: elegir vista según resultado de validación
    $vista = empty($errores) ? 'result' : 'form';
    require_once "views/problema5/{$vista}.php";

} else {
    require_once 'views/problema5/form.php';
}