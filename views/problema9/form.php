<?php $tituloPagina = 'Problema 9 – Potencias'; require_once 'views/layout/header.php'; ?>
<div class="page-header">
    <h2>Problema <span class="accent">09</span> — Primeras 15 Potencias</h2>
    <p>Ingresa un número del 1 al 9 para ver sus primeras 15 potencias</p>
</div>
<?php if (!empty($errores)): ?><div class="error"><?= $errores[0] ?></div><?php endif; ?>
<form method="POST" action="?problema=9">
    <label>Número base (1 — 9)<input type="number" name="numero" min="1" max="9" required placeholder="1 al 9"></label>
    <button type="submit">Calcular potencias</button>
</form>
<?= Utilidades::enlaceMenu() ?>
<?php require_once 'views/layout/footer.php'; ?>