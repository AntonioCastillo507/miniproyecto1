<?php $tituloPagina = 'Resultado – Problema 1'; require_once 'views/layout/header.php'; ?>
<div class="page-header">
    <h2>Resultado — <span class="accent">Estadísticas</span></h2>
    <p>Números ingresados: <?= implode(', ', $numeros) ?></p>
</div>
<div class="stats-grid">
    <div class="stat-box"><div class="stat-label">Media</div><div class="stat-value"><?= number_format($media, 2) ?></div></div>
    <div class="stat-box"><div class="stat-label">Desv. Estándar</div><div class="stat-value"><?= number_format($desviacion, 2) ?></div></div>
    <div class="stat-box"><div class="stat-label">Mínimo</div><div class="stat-value"><?= number_format($minimo, 2) ?></div></div>
    <div class="stat-box"><div class="stat-label">Máximo</div><div class="stat-value"><?= number_format($maximo, 2) ?></div></div>
</div>
<?= Utilidades::enlaceMenu() ?>
<?php require_once 'views/layout/footer.php'; ?>