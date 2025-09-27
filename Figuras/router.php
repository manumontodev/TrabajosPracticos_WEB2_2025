<?php
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
require_once 'templates/header.phtml';
require_once './templates/lista.phtml';
require_once 'filtro.php';
require_once 'verFigura.php';


if (empty($_GET['action']))
        $action = 'Home';
else
        $action = $_GET['action'];

if (isset($_GET['area'])) {
        $area = $_GET['area'];
        // Redirige a la URL limpia
        header("Location: Filtro/area/$area");
}

$params = explode('/', $action);
switch ($params[0]) {
        case 'lista':
                showList($params[0]);
                break;
        case 'Filtro':
                if (isset($params[3]) && $params[3] == 'verFigura') {
                        showFigure($params[4], $params[2]);
                        break;
                }
                filter($params);
                break;
        case 'verFigura':
                showFigure($params[1]);
                break;
        default:
                require_once 'templates/home.phtml';
                break;
}

require_once 'templates/footer.phtml';
?>