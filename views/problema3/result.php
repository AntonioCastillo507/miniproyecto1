<?php $tituloPagina = 'Resultado – Problema 3'; require_once 'views/layout/header.php'; ?>
<div class="page-header">
    <h2>Primeros <span class="accent"><?= $n ?></span> múltiplos de 4</h2>
</div>
<div class="resultado" style="padding:0; overflow:hidden;">
    <table>
        <thead><tr><th>#</th><th>Expresión</th><th>Resultado</th></tr></thead>
        <tbody>
        <?php foreach ($multiplos as $idx => $valor): ?>
        <tr>
            <td style="color:#606070;"><?= $idx + 1 ?></td>
            <td style="color:#9090a0;">4 × <?= $idx + 1 ?></td>
            <td style="color:#f5c518; font-weight:700;"><?= number_format($valor) ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= Utilidades::enlaceMenu() ?>
<?php require_once 'views/layout/footer.php'; ?>