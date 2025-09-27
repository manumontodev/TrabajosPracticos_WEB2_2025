<?php
require_once 'src/sections.php';
require_once 'config/ConfigApp.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

if (!empty($_GET['action'])) {
    $unidad = $_GET['action'];
} else {
    $unidad = 'Home';
}

$params = explode('/', $unidad);

switch ($params[0]) {
    case 'Home':
        showHome();
        break;
    case 'About':
        if (isset($params[1])) {
            showAbout($params[1]);
        } else {
            showAbout();
        }
        break;

    case 'Unidad':
        if (!empty($params[3]) && $params[3] === 'Formulario') {
            if ($params[1] === '1')
                $unidad = $params[1];
            else {
                echo "<h1>Error! Unidad invalida.</h1><a href='../../1/ejercicio5'>Volver atrás</a>";
                break;
            }
             if (empty($_GET['nombre-get'])) {
                 $strForm = array(
                     'name' => $_POST['nombre-post'],
                     'surname' => $_POST['apellido-post'],
                     'age' => $_POST['edad-post'],
                     'method' => 'POST'
                 );
                 showFormulario($strForm, $unidad);
                 break;
             } else {
                 $strForm = array(
                     'name' => $_GET['nombre-get'],
                     'surname' => $_GET['apellido-get'],
                     'age' => $_GET['edad-get'],
                     'method' => 'GET'
                 );
             }
                showFormulario($strForm, $unidad);
                break;
        }
        // condicion en que esten cargados todos los parametros de la URL (para el ej de la tabla [ex4 TP2]))
        if (!empty($params[1]) && !empty($params[2]) && !empty($params[3]) && !empty($params[4])) {
            $flag = false;  // bandera que permitira saber desde donde se genera la tabla
            foreach ($params as $value) {
                switch ($value) {
                    // todos los parametros que corresponden al ej 4 del TP2
                    case 'Unidad':
                    case '2':
                    case 'ejercicio4':
                    case 'tabla':
                    case '5':
                    case '10':
                    case '15':
                    case '20':
                        $flag = true;
                        break;
                    default:
                        $flag = false;

                }
            }
            if ($flag) {
                showTabla($params[1], $params[2], $params[4]);
                break;
            } else {
                echo '<section><h1>Error! La tabla solo puede generarse mediante el ejercicio 4!</h1>';
                echo '<h2><a href="../">Volver atrás</a></h2>';
                die();
            }
        }
        // esta no sirve de nada aun -> borrar en el futuro
        if (!empty($params[1]) && !empty($params[2]) && empty($params[3])) {
            showExcercises($params[1], $params[2]);
            break;
        }
        // si se esta navegando dentro de las pestañas de los TP 
        // pero no se tiene seleccionado un ejercicio, 
        // esconde los links de los ejercicios        
        if (!empty($params[1]) && empty($params[2]) && empty($params[3])) {
            navigate($params[1]);
            break;
        }
        // en caso de ingresar una URL invalida (por ej Unidad 5)
        if (empty($params[1]) && empty($params[2]) && empty($params[3])) {
            echo '<h1>ERROR 404: No existe el archivo en el directorio.</h1>';
            break;
        }
    // case 'Formulario':

    default:
        break;
}


require_once SITE_FOOTER;



?>