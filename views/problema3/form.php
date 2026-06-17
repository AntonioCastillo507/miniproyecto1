<?php $tituloPagina = 'Problema 3 – Múltiplos de 4'; require_once 'views/layout/header.php'; ?>
<div class="page-header">
    <h2>Problema <span class="accent">03</span> — Múltiplos de 4</h2>
    <p>Genera los N primeros múltiplos del número 4 &nbsp;·&nbsp; Límite: 1 – 10,000</p>
</div>
<?php if (!empty($errores)): ?><div class="error"><?= $errores[0] ?></div><?php endif; ?>
<div class="card" style="font-size:13px; color:#9090a0; line-height:1.7;">
    <strong style="color:#f5c518;">⚠ Nota sobre desbordamiento</strong><br>
    Si N fuera ilimitado, un valor como 999,999,999 intentaría crear un arreglo con casi mil millones de
    entradas, agotando la memoria del servidor (<em>desbordamiento de memoria</em>). Adicionalmente,
    cuando 4 × N supera <code>PHP_INT_MAX</code> (≈ 9.2 × 10<sup>18</sup>) el resultado pasa a
    <em>float</em> y pierde precisión exacta (<em>desbordamiento de entero</em>).
    Por eso se limita N a 10,000.
</div>
<form method="POST" action="?problema=3">
    <label>Cantidad de múltiplos (N) — entre 1 y 10,000
        <input type="number" name="n" min="1" max="10000" required placeholder="Ej: 10">
    </label>
    <button type="submit">Generar lista</button>
</form>
<?= Utilidades::enlaceMenu() ?>
<?php require_once 'views/layout/footer.php'; ?>