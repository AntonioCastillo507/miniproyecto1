<?php
$tituloPagina   = 'Resultado – Problema 5';
$badgeClass     = ['niño' => 'badge-nino', 'adolescente' => 'badge-adolescente', 'adulto' => 'badge-adulto', 'adulto mayor' => 'badge-mayor'];
$coloresGrafica = ['#4a90e2', '#34d399', '#f59e0b', '#f87171'];
$etiquetasG     = ['Niño', 'Adolescente', 'Adulto', 'Adulto Mayor'];
$valoresG       = [$conteo['niño'], $conteo['adolescente'], $conteo['adulto'], $conteo['adulto mayor']];
$totalPersonas  = array_sum($valoresG);
require_once 'views/layout/header.php';
?>
<div class="page-header">
    <h2>Resultado — <span class="accent">Clasificación de Edades</span></h2>
</div>

<div class="resultado" style="padding:0; overflow:hidden;">
    <table>
        <thead><tr><th>Persona</th><th>Edad</th><th>Categoría</th></tr></thead>
        <tbody>
        <?php foreach ($edades as $idx => $edad): ?>
        <tr>
            <td><?= $idx + 1 ?></td>
            <td><?= $edad ?> años</td>
            <td><span class="badge <?= $badgeClass[$categorias[$idx]] ?? '' ?>"><?= ucfirst($categorias[$idx]) ?></span></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php if (!empty($repetidas)): ?>
<div class="alert-warn" style="margin-top:16px;">
    <h3>⚠ Edades repetidas detectadas</h3>
    <table>
        <thead><tr><th>Edad</th><th>Aparece</th></tr></thead>
        <tbody>
        <?php foreach ($repetidas as $val => $veces): ?>
        <tr><td><?= $val ?> años</td><td><?= $veces ?> veces</td></tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php else: ?>
<div class="resultado" style="margin-top:16px; font-size:13px; color:#9090a0; padding:14px 20px;">
    ✅ No se detectaron edades repetidas entre las 5 personas.
</div>
<?php endif; ?>

<div class="resultado" style="margin-top:16px;">
    <h3 style="margin-bottom:16px;">Distribución por categoría</h3>
    <div class="chart-layout">
        <canvas id="graficaEdades" style="max-width:280px; max-height:280px;"></canvas>
        <div class="chart-legend">
            <?php foreach ($etiquetasG as $i => $etiq): ?>
            <div class="legend-item">
                <span class="legend-dot" style="background:<?= $coloresGrafica[$i] ?>;"></span>
                <span class="legend-name"><?= $etiq ?></span>
                <span class="legend-val"><?= $valoresG[$i] ?> (<?= $totalPersonas > 0 ? round($valoresG[$i]/$totalPersonas*100) : 0 ?>%)</span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php
// Gráfica de estadísticas de edades: siempre visible, muestra frecuencia de cada edad ingresada
$frecuenciaTotal = array_count_values($edades);
arsort($frecuenciaTotal);
$labelsFrec  = array_keys($frecuenciaTotal);
$valoresFrec = array_values($frecuenciaTotal);
$coloresFrec = array_map(fn($v) => $v > 1 ? '#f87171' : '#4a90e2', $valoresFrec);
?>
<div class="resultado" style="margin-top:16px;">
    <h3 style="margin-bottom:4px;">Estadísticas de frecuencia por edad</h3>
    <p style="font-size:12px; color:#9090a0; margin-bottom:16px;">
        Las barras <span style="color:#f87171; font-weight:600;">rojas</span> indican edades repetidas,
        las <span style="color:#4a90e2; font-weight:600;">azules</span> son únicas.
    </p>
    <canvas id="graficaFrecuencia" style="max-height:220px;"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script>
Chart.register(ChartDataLabels);

// Gráfica de pastel — distribución por categoría
new Chart(document.getElementById('graficaEdades'), {
    type: 'pie',
    data: {
        labels: ['Niño','Adolescente','Adulto','Adulto Mayor'],
        datasets: [{
            data: [<?= implode(',', $valoresG) ?>],
            backgroundColor: ['#4a90e2','#34d399','#f59e0b','#f87171'],
            borderColor: '#060608', borderWidth: 3, hoverOffset: 10
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false },
            datalabels: {
                color: '#fff',
                font: { weight: 'bold', size: 14 },
                formatter: (v, ctx) => {
                    const t = ctx.dataset.data.reduce((a,b)=>a+b,0);
                    const p = t > 0 ? Math.round(v/t*100) : 0;
                    return v > 0 ? p+'%' : '';
                }
            }
        }
    }
});

// Gráfica de barras — frecuencia por edad (repetidas en rojo)
new Chart(document.getElementById('graficaFrecuencia'), {
    type: 'bar',
    data: {
        labels: [<?= implode(',', array_map(fn($l) => '"'.$l.' años"', $labelsFrec)) ?>],
        datasets: [{
            label: 'Frecuencia',
            data: [<?= implode(',', $valoresFrec) ?>],
            backgroundColor: [<?= implode(',', array_map(fn($c) => '"'.$c.'"', $coloresFrec)) ?>],
            borderRadius: 6,
            borderSkipped: false
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                ticks: { stepSize: 1, color: '#9090a0' },
                grid: { color: '#252530' }
            },
            x: { ticks: { color: '#9090a0' }, grid: { display: false } }
        },
        plugins: {
            legend: { display: false },
            datalabels: {
                anchor: 'end', align: 'end',
                color: '#fff', font: { weight: 'bold', size: 13 },
                formatter: v => v > 1 ? v + 'x ⚠' : v + 'x'
            }
        }
    }
});
</script>
<?= Utilidades::enlaceMenu() ?>
<?php require_once 'views/layout/footer.php'; ?>