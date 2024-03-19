<?php
session_start();
// Recuperar variables de la sesión
$nombre = $_SESSION['nombre'];
$direccion = $_SESSION['direccion'];
$email = $_SESSION['email'];
$telefono = $_SESSION['telefono'];
$estado_civil = $_SESSION['estado_civil'];
$aficiones = $_SESSION['aficiones'];
$estado = $_SESSION['estado'];

    $cine = in_array('cine', $aficiones);
    $leer = in_array('leer', $aficiones);
    $viajar = in_array('viajar', $aficiones);

/* $fotoPerfil = $_SESSION['fotoPerfil'];
$name = $_SESSION['fotoPerfil']['name'];
$rutaDestino = $_SESSION['rutaDestino'] */



?>

<!-- Requerimento para manejar las seciones con redireccionamientos -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Mostrar datos</title>
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
    
<!--  -->
     
    
<br><br>


<table>
            <tr>
                <th>Dato</th>
                <th>Valor</th>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><?php echo $nombre;?></td>
            </tr>
            <!-- <tr>
                <td>Datos de foto</td>
                <td><?php 
                echo "size: ".$fotoPerfil['size'] . "bites";
                echo "<br>";
                echo "tipo: ".$fotoPerfil['type'];
                echo "<br>";
                echo "ruta: ".$fotoPerfil['tmp_name'];
                echo "<br>";
                echo "name: ".$fotoPerfil['name'];
                ?></td>
            </tr> -->
            <tr>
                <td>Dirección</td>
                <td><?php echo $direccion; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <td>Teléfono</td>
                <td><?php echo $telefono; ?></td>
            </tr>
            <tr>
                <td>Estado Civil</td>
                <td><?php echo $estado_civil; ?></td>
            </tr>
            <tr>
                <td>Aficiones</td>
                <td><?php print_r($aficiones); ?></td>
            </tr>
            <tr>
                <td>Estado</td>
                <td><?php echo $estado; ?></td>
            </tr>
        </table>
        <form name="back" id="back" action="procesar.php" method="post">

<p> <!-- Boton send -->
<button id="button" type="button" onclick="redirigirIndex();">Regresar</button>
</p> <!-- End Boton send -->

</form> 
    </div>

</body>

</html>