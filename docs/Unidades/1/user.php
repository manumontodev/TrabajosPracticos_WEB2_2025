<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos enviados por REQUEST</title>
    <link rel="stylesheet" href="./../../css/styles.css">
</head>

<body>

    <main class="container-principal">
        <div class="container-ejercicios">
            
            <section class="card">
                <?php

                    
                    if (!empty($_POST['nombre-post']) && !empty($_POST['apellido-post']) && !empty($_POST['edad-post'])) {
                        $name = $_POST['nombre-post'];
                        $surname = $_POST['apellido-post'];
                        $age = $_POST['edad-post'];

                        // IMPRIMO PARAMETROS DEL REQUEST
                        echo '<h3>Parametros recibidos mediante el metodo POST!</h3>';
                        echo "<h2>Nombre: $name</h2><h2>Apellido: $surname</h2><h2>Edad: $age</h2>";
                        echo "<a class='card-links' href='../../router.php?unidad=1&ex=5'>Volver al menu anterior</a>";
                    } 
                    else if (!empty($_GET['nombre-get']) && !empty($_GET['apellido-get']) && !empty($_GET['edad-get'])) {
                        $name = $_GET['nombre-get'];
                        $surname = $_GET['apellido-get'];
                        $age = $_GET['edad-get'];

                        // IMPRIMO PARAMETROS DEL REQUEST
                        echo '<h3>Parametros recibidos mediante el metodo GET!</h3>';
                        echo "<h2>Nombre: $name</h2><h2>Apellido: $surname</h2><h2>Edad: $age</h2>";
                        echo "<a class='card-links' href='../../router.php?unidad=1&ex=5'>Volver al menu anterior</a>";
                        echo '</section>';
                } else {
                        echo "No se pudo validar el formulario";
                    }
                ?>
            </section>

            <section class="other">
                <h1>a.- POST vs GET</h1>
                <h3>* GET:</h3>
                <p> Envía los datos en la URL (ej: pagina.php?nombre=Juan&edad=20).<br>
                    Se pueden ver en la barra del navegador, quedan en el historial y tienen límite de caracteres. <br>
                    Es útil cuando la información no es sensible y querés que se pueda compartir o guardar en favoritos
                    (ej: buscadores, filtros).
                </p><br>
                <h3>
                    * POST:</h3>
                <p> Los datos viajan en el cuerpo de la petición, no quedan visibles en la URL y permiten enviar más
                    información (incluso archivos). <br>
                    Es lo más recomendable para formularios con datos sensibles (ej: contraseñas, registros, inicios de
                    sesión) o largos.
                </p>

                <h1>b.- $_POST, $_GET y $_REQUEST</h1>
                <p>$_POST: contiene los datos enviados al servidor por el método POST.</p>

                <p>$_GET: contiene los datos enviados por la URL usando el método GET.</p>

                <p>$_REQUEST: combina ambos (GET y POST, e incluso COOKIE en algunos casos según la configuración).</p>
                <p>Es más general, pero puede ser inseguro/confuso porque no diferencia de dónde vino el dato. </p>
                <p>En la práctica se prefiere usar directamente $_POST o $_GET para tener control.</p>               

                <h1>c.- Diferencias entre cliente y servidor:</h1>

                <p>- Cliente (HTML/JS): evita que el usuario mande datos mal cargados, mejora la experiencia (avisa al
                    toque sin recargar la página). Pero puede ser manipulado o desactivado.
                </p>
                <p>- Servidor (PHP): es obligatorio. Garantiza que los datos son correctos aunque el usuario deshabilite
                    la validación en el navegador o envíe la petición de otra forma. Es la validación que realmente
                    protege la aplicación.
                </p>
            </section>
</body>

</html>