<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

    <script>
    function redirigirIndex() {
        window.location.href = 'index.html';
    }
    </script>

</head>
<body>
<div id="header"><h1>3.2 Actividad. Trabajando con formularios y PHP</h1><h2>Ian Cardoso Pillado</h2></div>
    <div id="main">
    <h1>Error</h1>
    <?php
    
    $msg = urldecode($_GET['msg']);
    echo "<p>$msg</p>";
    ?>

    <form name="back" id="back" action="procesar.php" method="post">

        <p> <!-- Boton send -->
        <button id="button" type="button" onclick="redirigirIndex();">Regresar</button>
        </p> <!-- End Boton send -->

    </form> 
</div>
</body>
</html>
