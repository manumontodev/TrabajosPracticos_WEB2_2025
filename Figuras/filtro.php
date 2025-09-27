<?php
require_once 'lib/Figuras.php';
require_once 'lib/AreaFilter.php';

// instancio la clase Figuras para trabajar con las figuras del sistema

function filter($params) {
    $area = $params[2];
    $figuras = new Figuras();
    echo '<section class="card">
    <h1>Listado de figuras</h1>';
    echo "Las figuras con area menor a $area son:<ul class='tp-list'>";
    foreach($figuras->getBy(new AreaFilter($area)) as $figura) {
        echo "<li>" . 
        $figura->ToString() . 
        " | <a href='Filtro/area/$area/verFigura/". $figura->getId() . "'>VER </a>" .
        "</li>";
    }
    echo "
    </ul>
    <a class='card-links' href='./'>Volver</a>";
}


    ?>