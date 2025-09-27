<?php
require_once 'templates/header.phtml';
$objects = [
    "flower" => ["images" => ["flower_0.jpg", "flower_1.jpg", "flower_2.jpg", "flower_3.jpg", "flower_4.jpg"], "name" => "Flores"],
    "tree" => ["images" => ["tree_0.jpg", "tree_1.jpg", "tree_2.jpg", "tree_3.jpg", "tree_4.jpg"], "name" => "Arboles"],
    "duck" => ["images" => ["duck_0.jpg", "duck_1.jpg", "duck_2.jpg", "duck_3.jpg", "duck_4.jpg"], "name" => "Patos"]
];

if (isset($_GET['object']) && isset($objects[$_GET['object']])) {
    $selected_object = $objects[$_GET['object']];
    echo '<section class="other">';
    echo "<h1>" . $selected_object["name"] . "</h1><a class='card-links' href='./'>Volver al menu anterior</a>";
    echo '</section>';
    foreach ($selected_object["images"] as $image) {
        echo '<section class="card">';
        echo "<img src='img/$image'/><br>";
        echo '</section>';
    }
} else {
    echo "<section class='card'><a class='card-links' href='../site/Unidad/2/ejercicio6'>Volver atrás</a><h1>Seleccione un objeto:</h1><br>";
    foreach ($objects as $object => $data)
        echo "<a class='card-links' href='$object'>" . $data["name"] . "</a><br>";
    echo '</div></main></section>';
}
require_once './templates/footer.phtml';
?>