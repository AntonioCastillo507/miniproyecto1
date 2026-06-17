<?php
$tituloPagina = 'Resultado – Problema 6';
$etiquetas    = array_keys($resultados);
$valores      = array_values($resultados);
$porcentajes  = [40, 35, 25];
$colores      = ['#4a90e2', '#f59e0b', '#f87171'];
require_once 'views/layout/header.php';
?>
<div class="page-header">
    <h2>Resultado — <span class="accent">Presupuesto Hospitalario</span></h2>
    <p>Distribución del presupuesto de $<?= number_format($presupuesto, 2) ?></p>
</div>

<div class="stats-grid">
    <?php foreach ($etiquetas as $i => $area): ?>
    <div class="stat-box">
        <div class="stat-label"><?= $area ?> (<?= $porcentajes[$i] ?>%)</div>
        <div class="stat-value" style="font-size:22px;">$<?= number_format($valores[$i], 2) ?></div>
    </div>
    <?php endforeach; ?>
</div>

<div class="resultado" style="margin-top:16px;">
    <h3 style="margin-bottom:16px;">Distribución visual</h3>
    <div class="chart-layout">
        <canvas id="graficaPresupuesto" style="max-width:280px; max-height:280px;"></canvas>
        <div class="chart-legend">
            <?php foreach ($etiquetas as $i => $area): ?>
            <div class="legend-item">
                <span class="legend-dot" style="background:<?= $colores[$i] ?>;"></span>
                <span class="legend-name"><?= $area ?></span>
                <span class="legend-val">$<?= number_format($valores[$i], 2) ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script>
Chart.register(ChartDataLabels);
new Chart(document.getElementById('graficaPresupuesto'), {
    type: 'pie',
    data: {
        labels: <?= json_encode($etiquetas) ?>,
        datasets: [{
            data: <?= json_encode($valores) ?>,
            backgroundColor: ['#4a90e2','#f59e0b','#f87171'],
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
                    return t > 0 ? Math.round(v/t*100)+'%' : '';
                }
            }
        }
    }
});
</script>
<?= Utilidades::enlaceMenu() ?>
<?php require_once 'views/layout/footer.php'; ?>