<?php
$iconos          = ['Verano' => '☀️', 'Otoño' => '🍂', 'Invierno' => '❄️', 'Primavera' => '🌸'];
$coloresEstacion = ['Verano' => '#f59e0b', 'Otoño' => '#f87171', 'Invierno' => '#60a5fa', 'Primavera' => '#34d399'];
$tituloPagina    = 'Resultado – Problema 8';
require_once 'views/layout/header.php';
?>
<div class="page-header">
    <h2>Resultado — <span class="accent">Estación del Año</span></h2>
</div>
<div class="resultado">
    <div class="estacion-card">
        <div class="estacion-icon"><?= $iconos[$estacion] ?? '' ?></div>
        <div class="estacion-label" style="color:<?= $coloresEstacion[$estacion] ?? '#f5c518' ?>;">
            <?= $estacion ?>
        </div>
        <div class="estacion-fecha">Fecha ingresada: <?= $fecha ?></div>
    </div>
</div>
<?= Utilidades::enlaceMenu() ?>
<?php require_once 'views/layout/footer.php'; ?>