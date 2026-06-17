<?php $tituloPagina = 'Problema 2 – Suma'; require_once 'views/layout/header.php'; ?>
<div class="page-header">
    <h2>Problema <span class="accent">02</span> — Suma del 1 al 1,000</h2>
    <p>Resultado de la sumatoria usando un bucle <strong style="color:#f5c518;">while</strong></p>
</div>
<div class="resultado" style="text-align:center; padding:48px 24px;">
    <p style="font-size:13px; color:#9090a0; text-transform:uppercase; letter-spacing:.08em; border:none; margin-bottom:8px;">Resultado</p>
    <div class="big-result"><?= number_format($suma) ?></div>
    <p style="color:#9090a0; font-size:13px; margin-top:8px; border:none;">Σ (1 + 2 + 3 + ... + 1,000)</p>
</div>
<?= Utilidades::enlaceMenu() ?>
<?php require_once 'views/layout/footer.php'; ?>