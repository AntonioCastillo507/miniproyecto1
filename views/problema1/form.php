<?php $tituloPagina = 'Problema 1 – Estadísticas'; require_once 'views/layout/header.php'; ?>
<div class="page-header">
    <h2>Problema <span class="accent">01</span> — Estadísticas</h2>
    <p>Ingresa 5 números positivos para calcular sus estadísticas básicas</p>
</div>
<?php if (!empty($errores)): ?>
    <?php foreach ($errores as $e): ?><div class="error"><?= $e ?></div><?php endforeach; ?>
<?php endif; ?>
<form method="POST" action="?problema=1">
    <div style="display:grid; grid-template-columns:repeat(5,1fr); gap:12px;">
        <?php for ($i = 1; $i <= 5; $i++): ?>
        <label>N° <?= $i ?><input type="number" step="any" name="numero<?= $i ?>" required placeholder="0"></label>
        <?php endfor; ?>
    </div>
    <button type="submit">Calcular</button>
</form>
<?= Utilidades::enlaceMenu() ?>
<?php require_once 'views/layout/footer.php'; ?>