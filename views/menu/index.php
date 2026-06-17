<?php $tituloPagina = 'Menú Principal – Mini Proyecto 1'; ?>
<?php require_once 'views/layout/header.php'; ?>

<div class="page-header">
    <h2>Selecciona un <span class="accent">Problema</span></h2>
    <p>9 ejercicios de estructuras de control y clases en PHP</p>
</div>

<?php
$problemas = [
    1 => ['titulo' => 'Estadísticas',        'desc' => 'Media, desv. estándar, mín y máx de 5 números'],
    2 => ['titulo' => 'Suma 1 al 1,000',      'desc' => 'Sumatoria de los primeros 1,000 enteros'],
    3 => ['titulo' => 'Múltiplos de 4',       'desc' => 'Genera los N primeros múltiplos de 4'],
    4 => ['titulo' => 'Pares e Impares',      'desc' => 'Suma independiente entre 1 y 200'],
    5 => ['titulo' => 'Clasificar Edades',    'desc' => 'Clasifica 5 edades con gráfica de distribución'],
    6 => ['titulo' => 'Presupuesto Hospital', 'desc' => 'Distribuye presupuesto por área médica'],
    7 => ['titulo' => 'Calculadora de Notas', 'desc' => 'Estadísticas de N notas con foreach'],
    8 => ['titulo' => 'Estación del Año',     'desc' => 'Determina la estación según la fecha'],
    9 => ['titulo' => 'Potencias',            'desc' => 'Las 15 primeras potencias de un número'],
];
?>

<div style="display:grid; grid-template-columns:repeat(3,1fr); gap:14px;">
<?php foreach ($problemas as $num => $p): ?>
<a href="?problema=<?= $num ?>"
   style="display:block; background:#0f0f12; border:1px solid #252530; border-radius:10px;
          padding:20px; text-decoration:none; color:#fff;
          transition:border-color .2s, transform .15s, box-shadow .2s;"
   onmouseover="this.style.borderColor='#f5c518';this.style.transform='translateY(-3px)';this.style.boxShadow='0 8px 24px rgba(245,197,24,.1)'"
   onmouseout="this.style.borderColor='#252530';this.style.transform='';this.style.boxShadow=''">
    <div style="font-size:11px; font-weight:700; letter-spacing:.1em; color:#f5c518; margin-bottom:8px; text-transform:uppercase;">
        Problema <?= str_pad($num, 2, '0', STR_PAD_LEFT) ?>
    </div>
    <div style="font-size:15px; font-weight:600; margin-bottom:6px;"><?= $p['titulo'] ?></div>
    <div style="font-size:12px; color:#606070; line-height:1.5;"><?= $p['desc'] ?></div>
</a>
<?php endforeach; ?>
</div>

<?php require_once 'views/layout/footer.php'; ?>