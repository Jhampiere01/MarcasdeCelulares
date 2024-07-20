<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "marcas_de_celulares";

// Crear conexión
$conexion = new mysqli($server, $user, $password, $db);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Verificar si se ha enviado el formulario para agregar un nuevo registro
if (isset($_POST['agregar'])) {
    // Obtener datos del formulario y limpiarlos
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $lanzamiento = $_POST['lanzamiento'];
    $pantalla = $_POST['pantalla'];
    $camara = $_POST['camara'];
    $procesador = $_POST['procesador'];
    $memoria = $_POST['memoria'];
    $ram = $_POST['ram'];
    $bateria = $_POST['bateria'];
    $peso = $_POST['peso'];
    $precio = $_POST['precio'];

    if (isset($_FILES["imagen"])) {
        $file = $_FILES["imagen"];
        $filename = $file["name"];
        $mimetype = $file["type"];

        $allowed_types = array("image/jpg", "image/jpeg", "image/png", "image/webp");

        if (!in_array($mimetype, $allowed_types)) {
            header("Location: conexion.php");
        }

        if (!is_dir("fotos")) {
            mkdir("fotos", 0777);
        }

        if ($filename != "") {
            move_uploaded_file($file["tmp_name"], "fotos/" . $filename);
            $query = "INSERT INTO `modelos` (`id_modelos`, `marca`, `modelo`, `imagen`, `lanzamiento`, `pantalla`, `camara`, `procesador`, `memoria`, `ram`, `bateria`, `peso`, `precio`) VALUES (NULL, '$marca', '$modelo', '$filename', '$lanzamiento', '$pantalla', '$camara', '$procesador', '$memoria', '$ram', '$bateria', '$peso', '$precio')";
        } else {
        }

        $conexion->query($query);
    } else {
    }
}

// Verificar si se ha enviado el formulario para editar un registro existente
if (isset($_POST['editar'])) {
    $id = $_POST['id_modelos'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $lanzamiento = $_POST['lanzamiento'];
    $pantalla = $_POST['pantalla'];
    $camara = $_POST['camara'];
    $procesador = $_POST['procesador'];
    $memoria = $_POST['memoria'];
    $ram = $_POST['ram'];
    $bateria = $_POST['bateria'];
    $peso = $_POST['peso'];
    $precio = $_POST['precio'];

    $sql_update = "UPDATE modelos SET 
                   marca='$marca', 
                   modelo='$modelo', 
                   lanzamiento='$lanzamiento', 
                   pantalla='$pantalla', 
                   camara='$camara', 
                   procesador='$procesador', 
                   memoria='$memoria', 
                   ram='$ram', 
                   bateria='$bateria', 
                   peso='$peso', 
                   precio='$precio'
                   WHERE id_modelos='$id'";

    if ($conexion->query($sql_update) === TRUE) {
    } else {
        echo "Error al actualizar el registro: " . $conexion->error;
    }
}

// Verificar si se ha enviado el formulario para eliminar un registro
if (isset($_POST['eliminar'])) {
    $id = $conexion->real_escape_string($_POST['id_modelos']);

    $sql_delete = "DELETE FROM modelos WHERE id_modelos='$id'";

    if ($conexion->query($sql_delete) === TRUE) {
    } else {
        echo "Error al eliminar el registro: " . $conexion->error;
    }
}

// Consulta para obtener todos los registros
$sql_select = "SELECT * FROM modelos";
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
    <link rel="stylesheet" href="http://localhost/base_datos/Lista//conexion.css">
</head>

<body>
    <header>
        <div class="logo">
            <img src="Phone.png" alt="Logo">
        </div>
        <h2>Lista de Celulares Registrados</h2>
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
                <th>Marca</th>
                <th>Modelo</th>
                <th>Imagen</th>
                <th>Lanzamiento</th>
                <th>Pantalla</th>
                <th>Cámara</th>
                <th>Procesador</th>
                <th>Memoria</th>
                <th>RAM</th>
                <th>Batería</th>
                <th>Peso</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <form method="post">
                        <input type="hidden" name="id_modelos" value="<?php echo $row['Id_modelos']; ?>">
                        <td><input type="text" name="marca" value="<?php echo ($row['Marca']); ?>"></td>
                        <td><input type="text" name="modelo" value="<?php echo ($row['Modelo']); ?>"></td>
                        <td><img src="fotos/<?php echo ($row['Imagen']); ?>" width="80px"></td>
                        <td><input type="text" name="lanzamiento" value="<?php echo ($row['Lanzamiento']); ?>"></td>
                        <td><input type="text" name="pantalla" value="<?php echo ($row['Pantalla']); ?>"></td>
                        <td><input type="text" name="camara" value="<?php echo ($row['Camara']); ?>"></td>
                        <td><input type="text" name="procesador" value="<?php echo ($row['Procesador']); ?>"></td>
                        <td><input type="text" name="memoria" value="<?php echo ($row['Memoria']); ?>"></td>
                        <td><input type="text" name="ram" value="<?php echo ($row['RAM']); ?>"></td>
                        <td><input type="text" name="bateria" value="<?php echo ($row['Bateria']); ?>"></td>
                        <td><input type="text" name="peso" value="<?php echo ($row['Peso']); ?>"></td>
                        <td><input type="text" name="precio" value="<?php echo ($row['Precio']); ?>"></td>
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
    <button class="return-button" onclick="location.href='../Formulario/formulario.html';">Regresar</button>

    <script src="buscador.js"></script>

</body>

</html>