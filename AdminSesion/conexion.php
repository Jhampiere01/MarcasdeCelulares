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

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Convertir la contraseña ingresada a MD5
    $contraseña_md5 = md5($contraseña);

    // Consulta SQL para verificar las credenciales (comparando con MD5)
    $sql = "SELECT * FROM administradores WHERE Usuario = '$usuario' AND Contraseña = '$contraseña_md5'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        header("Location: ingresoAdmin.html");
        exit;
    } else {
        $mensaje = "Usuario o contraseña incorrectos.";
        echo "<script>alert('$mensaje'); window.location.replace('adminSesion.html');</script>";
    }
}
