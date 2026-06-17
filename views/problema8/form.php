<?php $tituloPagina = 'Problema 8 – Estación del Año'; require_once 'views/layout/header.php'; ?>
<div class="page-header">
    <h2>Problema <span class="accent">08</span> — Estación del Año</h2>
    <p>Ingresa una fecha y determinaremos a qué estación pertenece</p>
</div>
<?php if (!empty($errores)): ?><div class="error"><?= $errores[0] ?></div><?php endif; ?>
<form method="POST" action="?problema=8">
    <label>Fecha<input type="date" name="fecha" required></label>
    <button type="submit">Determinar estación</button>
</form>
<?= Utilidades::enlaceMenu() ?>
<?php require_once 'views/layout/footer.php'; ?>