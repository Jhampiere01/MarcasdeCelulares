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

if (isset($_POST['editar'])) {
    $id = $_POST['id_no_registrados'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $sql_update = "UPDATE usuarios SET 
                   usuario='$usuario', 
                   correo='$correo', 
                   contraseña='$contraseña'
                   WHERE id_no_registrados='$id'";

    if ($conexion->query($sql_update) === TRUE) {
    } else {
        echo "Error al actualizar el registro: " . $conexion->error;
    }
}

// Verificar si se ha enviado el formulario para eliminar un registro
if (isset($_POST['eliminar'])) {
    $id = $conexion->real_escape_string($_POST['id_no_registrados']);

    $sql_delete = "DELETE FROM usuarios WHERE id_no_registrados='$id'";

    if ($conexion->query($sql_delete) === TRUE) {
    } else {
        echo "Error al eliminar el registro: " . $conexion->error;
    }
}

// Consulta para obtener todos los registros
$sql_select = "SELECT * FROM usuarios";
$result = $conexion->query($sql_select);


// Cerrar conexión
$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="http://localhost/base_datos/AdminSesion//usuarios.css">
</head>

<body>
    <header>
        <div class="logo">
            <img src="Phone.png" alt="Logo">
        </div>
        <h2>Usuarios Registrados</h2>
        <div class="buscador">
            <div class="input-wrapper">
                <input id="inputBusqueda" placeholder="Buscar..." type="search" class="input">
                <i class="bi bi-search icono"></i>
            </div>
        </div>
    </header>
    <?php if ($result->num_rows > 0) : ?>
        <table id="tablaDatos">
            <tr>
                <th>Usuario</th>
                <th>Perfil</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Acciones</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <form method="post">
                        <input type="hidden" name="id_no_registrados" value="<?php echo $row['Id_No_Registrados']; ?>">
                        <td><input type="text" name="usuario" value="<?php echo ($row['Usuario']); ?>"></td>
                        <td><img src="../UsuarioSesion/fotos/<?php echo ($row['Imagen']); ?>" width="80px" height="80px"></td>
                        <td><input type="text" name="correo" value="<?php echo ($row['Correo']); ?>"></td>
                        <td><input type="text" name="contraseña" value="<?php echo ($row['Contraseña']); ?>"></td>
                        <td class="button-cell">
                            <input type="submit" name="editar" value="Guardar">
                            <input type="submit" name="eliminar" value="Eliminar">
                        </td>
                    </form>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else : ?>
        <p>No hay datos en la base de datos</p>
    <?php endif; ?>
    <button class="return-button" onclick="location.href='ingresoAdmin.html';">Regresar</button>

    <script src="buscador.js"></script>

</body>

</html>