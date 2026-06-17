<?php $tituloPagina = 'Problema 7 – Calculadora de Notas'; require_once 'views/layout/header.php'; ?>
<div class="page-header">
    <h2>Problema <span class="accent">07</span> — Calculadora de Notas</h2>
    <p>Ingresa cuántas notas deseas analizar y el sistema calculará sus estadísticas</p>
</div>
<?php if (!empty($errores)): ?>
    <?php foreach ($errores as $e): ?><div class="error"><?= $e ?></div><?php endforeach; ?>
<?php endif; ?>
<div class="card">
    <label style="margin-bottom:0;">Cantidad de notas a ingresar
        <div style="display:flex; gap:10px; margin-top:6px;">
            <input type="number" id="cantidadInput" min="2" max="50" placeholder="Ej: 5" style="flex:1;">
            <button type="button" class="btn-secondary" onclick="generarCampos()" style="margin:0; white-space:nowrap;">
                Generar campos
            </button>
        </div>
    </label>
</div>
<form method="POST" action="?problema=7" id="formNotas">
    <input type="hidden" name="cantidad" id="hiddenCantidad">
    <div id="camposNotas" style="display:grid; grid-template-columns:repeat(auto-fill,minmax(120px,1fr)); gap:12px;"></div>
    <button type="submit" id="btnCalcular" style="display:none; margin-top:16px;">Calcular estadísticas</button>
</form>
<script>
function generarCampos() {
    const n = parseInt(document.getElementById('cantidadInput').value);
    if (!n || n < 2 || n > 50) { alert('Ingrese entre 2 y 50'); return; }
    document.getElementById('hiddenCantidad').value = n;
    let html = '';
    for (let i = 1; i <= n; i++) {
        html += `<label>Nota ${i}<input type="number" step="0.01" name="nota[]" min="0" max="100" required placeholder="0-100"></label>`;
    }
    document.getElementById('camposNotas').innerHTML = html;
    document.getElementById('btnCalcular').style.display = 'inline-block';
}
</script>
<?= Utilidades::enlaceMenu() ?>
<?php require_once 'views/layout/footer.php'; ?>