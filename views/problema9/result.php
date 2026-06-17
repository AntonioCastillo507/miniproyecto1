<?php $tituloPagina = 'Resultado – Problema 9'; require_once 'views/layout/header.php'; ?>
<div class="page-header">
    <h2>Primeras 15 potencias de <span class="accent"><?= $numero ?></span></h2>
</div>
<div class="resultado" style="padding:0; overflow:hidden;">
    <table>
        <thead><tr><th>Exponente</th><th>Expresión</th><th>Resultado</th></tr></thead>
        <tbody>
        <?php foreach($potencias as $exp => $resultado): ?>
        <tr>
            <td style="color:#9090a0;"><?= $exp ?></td>
            <td style="color:#606070;"><?= $numero ?><sup><?= $exp ?></sup></td>
            <td style="color:#f5c518; font-weight:700;"><?= number_format($resultado) ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= Utilidades::enlaceMenu() ?>
<?php require_once 'views/layout/footer.php'; ?>