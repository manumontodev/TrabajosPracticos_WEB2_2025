<?php
require_once 'lib/Figuras.php';
function showFigure($id, $area = null) {
    $url = "./Filtro/area/$area";
    if (!isset($area)){
        $url = "./lista";
    }
    // instancia la clase Figuras para acceder a las figuras
    $figuras = new Figuras();    
    // obtiene la figura según el ID pasado como parámetro
    $figura = $figuras->get($id);    
    // imprime el detalle de la figura
    echo 
    "<section class='card'>
    <a class='card-links' href='$url'>Volver</a>        
    <ul class='tp-list'>
    <li><strong>ID: </strong>" . $figura->getId() . "</li>
    <li><strong>Tipo: </strong>" . $figura->getName() . "</li>
    <li><strong>Perímetro: </strong>" . $figura->getPerimetro() . "</li>
    <li><strong>Área: </strong>" . $figura->getArea() . "</li>
    </ul>
    </section>";
}