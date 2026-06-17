<?php $tituloPagina = 'Problema 6 – Presupuesto'; require_once 'views/layout/header.php'; ?>
<div class="page-header">
    <h2>Problema <span class="accent">06</span> — Presupuesto Hospitalario</h2>
    <p>Ginecología 40% · Traumatología 35% · Pediatría 25%</p>
</div>
<?php if (!empty($errores)): ?><div class="error"><?= $errores[0] ?></div><?php endif; ?>
<form method="POST" action="?problema=6">
    <label>Presupuesto anual total ($)<input type="number" step="0.01" name="presupuesto" required placeholder="Ej: 20000"></label>
    <button type="submit">Distribuir</button>
</form>
<?= Utilidades::enlaceMenu() ?>
<?php require_once 'views/layout/footer.php'; ?>