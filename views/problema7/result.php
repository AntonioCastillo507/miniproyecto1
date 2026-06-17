<?php $tituloPagina = 'Resultado – Problema 7'; require_once 'views/layout/header.php'; ?>
<div class="page-header">
    <h2>Resultado — <span class="accent">Estadísticas de Notas</span></h2>
    <p>Basado en <?= count($notas) ?> nota(s): <?= implode(', ', $notas) ?></p>
</div>
<div class="stats-grid">
    <div class="stat-box"><div class="stat-label">Promedio</div><div class="stat-value"><?= number_format($media, 2) ?></div></div>
    <div class="stat-box"><div class="stat-label">Desv. Estándar</div><div class="stat-value"><?= number_format($desviacion, 2) ?></div></div>
    <div class="stat-box"><div class="stat-label">Nota Mínima</div><div class="stat-value" style="color:#f87171;"><?= $minimo ?></div></div>
    <div class="stat-box"><div class="stat-label">Nota Máxima</div><div class="stat-value" style="color:#34d399;"><?= $maximo ?></div></div>
</div>
<?= Utilidades::enlaceMenu() ?>
<?php require_once 'views/layout/footer.php'; ?>