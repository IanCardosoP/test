<?php
// Redirección a mostrar datos
session_start(); // Requerido para  gestionar redireccionamientos
header("Location: datos.php");

function infoError($cadena) {
    // Codificar la cadena para url
    $msg_url = urlencode($cadena);
    // Redirigir con parámetro GET
    if (!headers_sent()) {
        header("Location: error.php?msg=$msg_url");
        return;
    }
    // Redirección con JavaScript si se han enviado headers
    echo "<script> window.location.href='error.php?msg=$msg_url' </script>";
    exit; // Terminar la funcion
}

// Comprobar !null de foto de perfil
/* if (!isset($_FILES['fotoPerfil']['name'])){
    infoError("No se seleccionó foto de perfil");
} */





// Obtener información de la foto de perfil
/* $fotoPerfil = $_FILES['fotoPerfil'];

$name = $_FILES['fotoPerfil']['name'];
$type = $_FILES['fotoPerfil']['type'];
$tamanio = $_FILES['fotoPerfil']['size'];
$tmp = $_FILES['fotoPerfil']['tmp_name']; */


// Validar el formato de la imagen
/* if (!in_array($type, array('image/jpeg', 'image/png'))) {
    die (infoError("El formato de la imagen de perfil no es válido. Debe ser JPG o PNG."));
} */

// Comprobar tamanio menor a 1MB
/* if ($tamanio > 1000000){
    infoError("Foto de perfil más pesada que lo permitido.");
}   */
 

// Almacenar imagen en la carpeta de fotos
/* if(!file_exists('archivos')) {
    // Crear la carpeta 'archivos' si no existe
    if (!mkdir('archivos', 0777, true)) {
        infoError("Error al crear la carpeta 'archivos'");
    }
} */

// Obtener el nombre de archivo y la ruta de destino
/* $nombreArchivo = $_FILES['fotoPerfil']['name'];
$rutaDestino = 'archivos/' . $nombreArchivo; */

// Mover el archivo a la carpeta de destino
/* if(!move_uploaded_file($_FILES['fotoPerfil']['tmp_name'], $rutaDestino)){
    infoError('Archivo no se pudo guardar');
}  */



//Validar IMPUT TEXTs
if (!filter_has_var(INPUT_POST, "nombre") || 
    !filter_has_var(INPUT_POST, "email") || 
    !filter_has_var(INPUT_POST, "telefono")) {
        infoError("Datos faltantes.");
} else {
    // Si todas las variables están presentes asignamos y comparamos el correo electrónico
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $confirm_email = filter_input(INPUT_POST, "confirm_email", FILTER_VALIDATE_EMAIL);
    if (!$email) {
        infoError("Correo electrónico inválido.");
    } elseif ($email != $confirm_email) {        
        infoError("Los campos e-mail no coinciden entre sí.");
    }
}

// Sanitizando y asignando IMPUT TEXTs
$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
$direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
$telefono = $_POST['telefono'];

// gestion de telefono, validacion y asignacion
if (!preg_match("/^\d{10}$/", $telefono)) {
    infoError("Numero de teléfono no válido");
} else {
    $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_NUMBER_INT);
}

// gestion de radio-buttons y asignacion estado civil
if (!isset($_POST['estado_civil'])) {
    infoError("Estado civil no seleccionado");
} else {
    $estado_civil = $_POST['estado_civil'];
}

// gestion de aficiones y asignacion de aficiones
if (!isset($_POST['aficiones'])) {
    $aficiones = "Ninguna seleccionada";
} else {
    $aficiones = $_POST['aficiones'];
    $cine = in_array('cine', $aficiones);
    $leer = in_array('leer', $aficiones);
    $viajar = in_array('viajar', $aficiones);
}

// gestion de estado y signacion de estado de la rep.
if (!isset($_POST['estado'])) {
    infoError("Estado de la republica no seleccionado");
} else {
    $estado = $_POST['estado'];
}


// Sección Base de Datos
$servidor = "localhost";
$usuario = "root";
$clave = "";
$bd = "prueba";

$conn = new mysqli($servidor, $usuario, $clave, $bd);

// Verificar conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

$insertar = "INSERT INTO `usuarios` (`nombre`, `direccion`, `email`, `telefono`, `estadoCivil`, `leer`, `cine`, `viajar`, `estado`, `id`) VALUES ('$nombre', '$direccion', '$email', '$telefono', '$estado_civil', '$leer', '$cine', '$viajar', '$estado')"; 
$stmt->bind_param("sssssbbbs", $nombre, $direccion, $email, $telefono, $estado_civil, $leer, $cine, $viajar, $estado);

if ($stmt->execute()) {
    echo "Registro completado";
} else {
    echo "Error al insertar datos: " . $stmt->error;
}

$stmt->close();
$conn->close();


/* Fin sección Base de Datos */
// Almacenar variables en la sesión
$_SESSION['nombre'] = $nombre;
$_SESSION['direccion'] = $direccion;
$_SESSION['email'] = $email;
$_SESSION['telefono'] = $telefono;
$_SESSION['estado_civil'] = $estado_civil;
$_SESSION['aficiones'] = $aficiones;
$_SESSION['estado'] = $estado;


$_SESSION['imgName'] = $_FILES['fotoPerfil']['name'];


/* $_SESSION['rutaDestino'] = 'archivos/' . $nombreArchivo;

$_SESSION['fotoPerfil'] = $fotoPerfil;
$_SESSION['fotoPerfil']['name'] = $name; */




?>

