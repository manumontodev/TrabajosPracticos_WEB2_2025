<?php
function showExcerciseById($idUnidad, $idExercise)
{

    // esto es preliminar y probablemente se transforme en un switch mas adelante => refactorizar
    if (!($idExercise > 0) || !($idExercise < 8)) {
        echo '<section class="other"> <h1>ERROR</h1> <h1>El ejercicio "' . $idExercise . '" aún no ha sido resuelto o es inválido</h1></section>';
        die();
    }
    if ($idUnidad === '1' || $idUnidad === '2') {
        if ($idUnidad === '1')
            require_once "./unidades/$idUnidad/calculadora.phtml";
        require_once "./unidades/$idUnidad/tp$idUnidad.ejercicios.phtml";
        // condicion para mostrar los ejercicios
            echo "<section class='card'> <h1>Ejercicio $idExercise:</h1>";
            $arrExcercises[$idExercise]();
            echo '
                </section>';
    }
}
?>