<?php $tituloPagina = 'Problema 5 – Edades'; require_once 'views/layout/header.php'; ?>
<div class="page-header">
    <h2>Problema <span class="accent">05</span> — Clasificar Edades</h2>
    <p>Ingresa las edades de 5 personas para clasificarlas por categoría</p>
</div>
<?php if (!empty($errores)): ?>
    <?php foreach ($errores as $e): ?><div class="error"><?= $e ?></div><?php endforeach; ?>
<?php endif; ?>
<form method="POST" action="?problema=5">
    <div style="display:grid; grid-template-columns:repeat(5,1fr); gap:12px;">
        <?php for($i = 1; $i <= 5; $i++): ?>
        <label>Persona <?= $i ?><input type="number" name="edad<?= $i ?>" min="0" max="120" required placeholder="edad"></label>
        <?php endfor; ?>
    </div>
    <button type="submit">Clasificar</button>
</form>
<?= Utilidades::enlaceMenu() ?>
<?php require_once 'views/layout/footer.php'; ?>