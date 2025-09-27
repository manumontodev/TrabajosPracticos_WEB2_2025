<?php
define("SITE_HEADER", 'templates/header.phtml');
define("SITE_FOOTER", 'templates/footer.phtml');

function showHome()
{
    require_once SITE_HEADER;
    showHeader();
    require 'templates/bienvenida.phtml';
    require_once SITE_FOOTER;
}

function showAbout($nombre = null)
{
    require_once SITE_HEADER;
    showHeader();
    $developers = array(
        'slash' => 'Saul Hudson',
        'kojima' => 'Hideo Kojima',
        'manuel' => 'Manuel Montoya',
        'franquito' => 'Franco Colapinto',
        'muñeco' => 'Marcelo Daniel Gallardo'
    );
    echo '<section class="card">';
    if (isset($nombre)) {
        echo "<h1>Nombre: {$developers[$nombre]}</h1>";
        echo " <img id='img-developer' src='img/$nombre.png' alt='$developers[$nombre]'>
        <a href='About' class=card-links>Volver atrás</a>";
    } else {
        echo '
                <h1>Esta pagina debe su existencia a:</h1>';
        echo "
                <ul class=tp-list id='about-list'>";
        foreach ($developers as $nick => $name) {
            if ($nick === 'manuel')
                echo "
                    <li><a class='card-links' id='manuel' href='About/$nick'> $name</a></li>";
            else
                echo "
                    <li ><a class='card-links' href='About/$nick'> $name</a></li>";
        }
        echo "
            </ul>
        </div>";
    }
    echo '
    </section>';

    require_once SITE_FOOTER;
}
function navigate($TP)
{
    require_once SITE_HEADER;
    if ($TP > 2) {
        showErrorNavegacion($TP);
        require_once SITE_FOOTER;

        die();
    }
    showHeader($TP);
    require "./templates/bienvenida.phtml";
    require_once SITE_FOOTER;
}
function showExcercises($idUnidad, $idEjercicio)
{
    require_once SITE_HEADER;
    // obtiene el numero que corresponde al ejercicio parseando el string que viene de la URL
    $ejercicio = getExcercise($idEjercicio);
    require 'src/imprimir.php';
    showHeader($idUnidad);
    // muestra cada ejercicio en el main
    showExcerciseById($idUnidad, $ejercicio);
    require_once SITE_FOOTER;

}
function showFormulario($strForm, $unidad)
{
    require_once SITE_HEADER;
    showHeader($unidad);
    echo '
        <section class="card">
        <h2>Formulario enviado a través del metodo ' . $strForm["method"] . '!</h2>
        <h3>Nombre: ' . $strForm["name"] . '</h3>
        <h3>Apellido: ' . $strForm["surname"] . '</h3>
        <h3>Edad: ' . $strForm["age"] . '</h3>  
        <a href="Unidad/1/ejercicio5" class=card-links>Volver atrás</a>                  
        </section>';
    require_once 'Unidades/1/infoREQUEST.phtml';
    require_once SITE_FOOTER;
}
function showErrorNavegacion($numeroTP)
{
    showHeader();
    echo "
    <section class='other'>
        <h1>Error 404: no existe aun la resolución del TP$numeroTP en el directorio.</h1>
    </section>";
}
function getExcercise($ex)
{
    $str = $ex;
    $id = (int) filter_var($str, FILTER_SANITIZE_NUMBER_INT);
    return $id;
}
function showTabla($unidad, $ejercicio, $celdas)
{
    require_once 'templates/header.phtml';
    require_once 'src/imprimir.php';
    showHeader($unidad);
    $idEjercicio = getExcercise($ejercicio);
    showExcerciseById($unidad, $idEjercicio);

    if ($celdas > 1 && $celdas <= 20) {
        echo "
            <section class='card table-container'>
                    <h1>TABLA GENERADA:</h1>
                    <table id='ex4-table'> 
                        <thead>
                            <tr>
                                <th id='primer-casilla'></th>";
        for ($i = 1; $i <= $celdas; $i++) {
            echo "
                                <th>$i</th>";
        }
        echo '
                            </tr>
                        </thead>
                        <tbody>';
        for ($i = 1; $i <= $celdas; $i++) {
            echo "
                            <tr>
                                <th>$i</th>";
            for ($j = 1; $j <= $celdas; $j++) {
                $clase = ($i == $j) ? "diagonal" : "";
                echo "
                                <td class='$clase'>" . ($i * $j) . "</td>";
            }
            echo "
                            </tr>";
        }
        echo "
                        </tbody>
                    </table>
            </section>";
    }
    require_once 'templates/footer.phtml';

}
?>