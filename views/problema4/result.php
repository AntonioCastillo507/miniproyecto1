<?php $tituloPagina = 'Problema 4 – Pares e Impares'; require_once 'views/layout/header.php'; ?>
<div class="page-header">
    <h2>Problema <span class="accent">04</span> — Pares e Impares</h2>
    <p>Suma independiente de números entre 1 y 200</p>
</div>
<div class="stats-grid">
    <div class="stat-box">
        <div class="stat-label">Suma de pares</div>
        <div class="stat-value"><?= number_format($sumaPares) ?></div>
    </div>
    <div class="stat-box">
        <div class="stat-label">Suma de impares</div>
        <div class="stat-value" style="color:#f87171;"><?= number_format($sumaImpares) ?></div>
    </div>
    <div class="stat-box">
        <div class="stat-label">Total combinado</div>
        <div class="stat-value" style="color:#9090a0;"><?= number_format($sumaPares + $sumaImpares) ?></div>
    </div>
</div>
<?= Utilidades::enlaceMenu() ?>
<?php require_once 'views/layout/footer.php'; ?>