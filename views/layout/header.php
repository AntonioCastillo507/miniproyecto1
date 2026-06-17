<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $tituloPagina ?? 'Mini Proyecto 1' ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg:      #060608;
            --surface: #0f0f12;
            --surface2:#18181c;
            --surface3:#222228;
            --accent:  #f5c518;
            --accent2: #d4a900;
            --text:    #ffffff;
            --muted:   #9090a0;
            --border:  #252530;
            --radius:  10px;
            --shadow:  0 4px 28px rgba(0,0,0,.6);
        }

        *, *::before, *::after { box-sizing:border-box; margin:0; padding:0; }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 15px;
            line-height: 1.65;
            min-height: 100vh;
        }

        .topbar {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: 14px 40px;
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .topbar-title {
            font-size: 17px;
            font-weight: 700;
            color: var(--accent);
        }
        .topbar-sub {
            font-size: 12px;
            color: var(--muted);
            border-left: 1px solid var(--border);
            padding-left: 14px;
        }

        .wrapper {
            max-width: 860px;
            margin: 40px auto;
            padding: 0 24px;
        }

        h2 {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -.01em;
            color: var(--text);
            line-height: 1.2;
            margin-bottom: 6px;
        }
        h2 .accent { color: var(--accent); }

        h3 {
            font-size: 14px;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 12px;
        }

        .page-header {
            margin-bottom: 28px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border);
        }
        .page-header p { color: var(--muted); font-size: 13px; margin-top: 5px; }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 24px;
            margin-bottom: 20px;
            box-shadow: var(--shadow);
        }

        form {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 28px;
            margin-top: 20px;
            box-shadow: var(--shadow);
        }

        label {
            display: block;
            margin-bottom: 16px;
            font-size: 11px;
            font-weight: 600;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: .08em;
        }

        input[type=text],
        input[type=number],
        input[type=email],
        input[type=date] {
            display: block;
            width: 100%;
            margin-top: 7px;
            padding: 11px 14px;
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 7px;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 15px;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }
        input::placeholder { color: #404050; }
        input:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(245,197,24,.1);
        }
        input::-webkit-calendar-picker-indicator { filter: invert(1); }

        button[type=submit] {
            display: inline-block;
            margin-top: 10px;
            padding: 12px 28px;
            background: var(--accent);
            color: #000;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 700;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            letter-spacing: .02em;
            transition: background .2s, transform .1s;
        }
        button[type=submit]:hover { background: var(--accent2); transform: translateY(-1px); }

        .btn-secondary {
            display: inline-block;
            padding: 10px 20px;
            background: var(--surface2);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            font-weight: 500;
            border: 1px solid var(--border);
            border-radius: 7px;
            cursor: pointer;
            transition: background .2s;
        }
        .btn-secondary:hover { background: var(--surface3); }

        .btn-menu {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 20px;
            padding: 10px 20px;
            background: transparent;
            color: var(--muted);
            border: 1px solid var(--border);
            border-radius: 7px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: color .2s, border-color .2s, background .2s;
        }
        .btn-menu:hover {
            color: var(--accent);
            border-color: var(--accent);
            background: rgba(245,197,24,.05);
        }

        .resultado {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 24px;
            margin-top: 20px;
            box-shadow: var(--shadow);
        }
        .resultado p {
            padding: 10px 0;
            border-bottom: 1px solid var(--border);
            font-size: 15px;
            color: var(--text);
        }
        .resultado p:last-child { border-bottom: none; }
        .resultado p strong { color: var(--accent); }

        .big-result {
            font-size: 64px;
            font-weight: 700;
            color: var(--accent);
            letter-spacing: -.02em;
            line-height: 1;
        }

        .error {
            background: rgba(248,113,113,.08);
            border: 1px solid rgba(248,113,113,.3);
            border-radius: 7px;
            padding: 12px 16px;
            color: #fca5a5;
            font-size: 13px;
            margin: 12px 0;
        }

        table { width:100%; border-collapse:collapse; font-size:14px; }
        thead tr { background: var(--surface2); }
        th {
            padding: 11px 14px;
            text-align: center;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .1em;
            color: var(--accent);
            border-bottom: 1px solid var(--border);
        }
        td {
            padding: 11px 14px;
            text-align: center;
            border-bottom: 1px solid var(--border);
            color: var(--text);
        }
        tbody tr:last-child td { border-bottom: none; }
        tbody tr:hover { background: var(--surface2); }

        .badge { display:inline-block; padding:3px 11px; border-radius:20px; font-size:11px; font-weight:600; }
        .badge-nino        { background:rgba(96,165,250,.12);  color:#93c5fd; border:1px solid rgba(96,165,250,.25); }
        .badge-adolescente { background:rgba(52,211,153,.12);  color:#6ee7b7; border:1px solid rgba(52,211,153,.25); }
        .badge-adulto      { background:rgba(245,158,11,.12);  color:#fcd34d; border:1px solid rgba(245,158,11,.25); }
        .badge-mayor       { background:rgba(248,113,113,.12); color:#fca5a5; border:1px solid rgba(248,113,113,.25); }

        .stats-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(160px,1fr)); gap:14px; margin:16px 0; }
        .stat-box {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 20px 16px;
            text-align: center;
        }
        .stat-label { font-size:10px; text-transform:uppercase; letter-spacing:.09em; color:var(--muted); margin-bottom:8px; font-weight:600; }
        .stat-value { font-size:30px; font-weight:700; color:var(--accent); letter-spacing:-.01em; }

        .chart-layout { display:flex; align-items:center; gap:32px; flex-wrap:wrap; margin-top:16px; }
        .chart-legend { flex:1; min-width:180px; }
        .legend-item { display:flex; align-items:center; gap:10px; padding:9px 0; border-bottom:1px solid var(--border); font-size:13px; }
        .legend-item:last-child { border-bottom:none; }
        .legend-dot  { width:10px; height:10px; border-radius:3px; flex-shrink:0; }
        .legend-name { color:var(--muted); }
        .legend-val  { margin-left:auto; font-weight:600; color:var(--text); }

        .alert-warn {
            background: rgba(248,113,113,.06);
            border: 1px solid rgba(248,113,113,.2);
            border-radius: 8px;
            padding: 16px 18px;
            margin-top: 16px;
        }
        .alert-warn h3 { color:#fca5a5; font-size:12px; margin-bottom:10px; }

        .estacion-card  { text-align:center; padding:48px 24px; }
        .estacion-icon  { font-size:72px; line-height:1; margin-bottom:14px; }
        .estacion-label { font-size:52px; font-weight:700; letter-spacing:-.02em; }
        .estacion-fecha { font-size:13px; color:var(--muted); margin-top:8px; }

        ::-webkit-scrollbar { width:5px; }
        ::-webkit-scrollbar-track { background:var(--bg); }
        ::-webkit-scrollbar-thumb { background:var(--surface3); border-radius:3px; }
    </style>
</head>
<body>

<div class="topbar">
    <span class="topbar-title">Mini Proyecto 1</span>
    <span class="topbar-sub">Desarrollo de Software VII &nbsp;·&nbsp; Prof. Irina Fong &nbsp;·&nbsp; UTP</span>
</div>

<div class="wrapper">