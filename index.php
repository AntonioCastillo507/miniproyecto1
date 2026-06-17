<?php
require_once 'models/Sanitizacion.php';
require_once 'models/Validacion.php';
require_once 'models/Utilidades.php';

$problema = isset($_GET['problema']) ? (int) $_GET['problema'] : 0;

switch ($problema) {
    case 1:  require_once 'controllers/Problema1Controller.php'; break;
    case 2:  require_once 'controllers/Problema2Controller.php'; break;
    case 3:  require_once 'controllers/Problema3Controller.php'; break;
    case 4:  require_once 'controllers/Problema4Controller.php'; break;
    case 5:  require_once 'controllers/Problema5Controller.php'; break;
    case 6:  require_once 'controllers/Problema6Controller.php'; break;
    case 7:  require_once 'controllers/Problema7Controller.php'; break;
    case 8:  require_once 'controllers/Problema8Controller.php'; break;
    case 9:  require_once 'controllers/Problema9Controller.php'; break;
    default: require_once 'views/menu/index.php'; break;
}