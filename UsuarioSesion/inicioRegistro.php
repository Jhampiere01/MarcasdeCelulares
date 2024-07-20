<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "marcas_de_celulares";

$conexion = new mysqli($server, $user, $password, $db);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Verificar si se ha enviado el formulario
if (isset($_POST['inscribirse'])) {
    // Obtener datos del formulario y limpiarlos (si es necesario)
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    // // Preparar la consulta SQL para insertar datos en la tabla

    if (isset($_FILES["imagen"])) {
        $file = $_FILES["imagen"];
        $filename = $file["name"];
        $mimetype = $file["type"];

        $allowed_types = array("image/jpg", "image/jpeg", "image/png", "image/webp");

        if (!in_array($mimetype, $allowed_types)) {
            header("Location: inicioRegistro.php");
        }

        if (!is_dir("fotos")) {
            mkdir("fotos", 0777);
        }

        if ($filename != "") {
            move_uploaded_file($file["tmp_name"], "fotos/" . $filename);
            $query = "INSERT INTO `usuarios` (`id_no_registrados`, `usuario`, `correo`, `contraseña`, `imagen`) VALUES (NULL, '$usuario', '$correo', '$contraseña', '$filename')";
        } else {
        }
    } else {
    }

    // Ejecutar consulta
    if ($conexion->query($query) === TRUE) {
        // Redirigir a otro archivo después de la inserción exitosa
        header("Location: ../Lista/listaCelulares.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conexion->error;
    }
}
