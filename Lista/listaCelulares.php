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
    <link rel="stylesheet" href="http://localhost/base_datos/Lista/conexion.css">
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
            <thead>
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
                    <th>Comprar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['Marca']); ?></td>
                        <td><?php echo htmlspecialchars($row['Modelo']); ?></td>
                        <td><img src="fotos/<?php echo htmlspecialchars($row['Imagen']); ?>" width="80px" height="80px"></td>
                        <td><?php echo htmlspecialchars($row['Lanzamiento']); ?></td>
                        <td><?php echo htmlspecialchars($row['Pantalla']); ?></td>
                        <td><?php echo htmlspecialchars($row['Camara']); ?></td>
                        <td><?php echo htmlspecialchars($row['Procesador']); ?></td>
                        <td><?php echo htmlspecialchars($row['Memoria']); ?></td>
                        <td><?php echo htmlspecialchars($row['RAM']); ?></td>
                        <td><?php echo htmlspecialchars($row['Bateria']); ?></td>
                        <td><?php echo htmlspecialchars($row['Peso']); ?></td>
                        <td><?php echo htmlspecialchars($row['Precio']); ?></td>
                        <td><a href="#" class="compras" onclick="openPaymentPopup('<?php echo $row['Marca']; ?>', '<?php echo $row['Modelo']; ?>', '<?php echo $row['Precio']; ?>')">Comprar</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Ventana Emergente para el Formulario de Pago -->
        <div id="paymentPopup" class="modal">
            <form id="paymentForm" class="form" action="generate_invoice.php" method="post">
                <h2>Medios de Pago</h2>

                <div class="payment--options">
                    <img src="Visa.png" alt="Visa">
                    <img src="MasterCard.png" alt="MasterCard">
                </div>

                <div class="separator">
                    <span class="line"></span>
                    <p>o</p>
                    <span class="line"></span>
                </div>

                <div class="credit-card-info--form">
                    <div class="input_container">
                        <label for="card_number" class="input_label">Número de Tarjeta</label>
                        <input type="text" id="card_number" name="card_number" class="input_field" placeholder="0000 0000 0000 0000" required maxlength="16">
                    </div>

                    <div class="split">
                        <div class="input_container">
                            <label for="expiry_date" class="input_label">Fecha de Expiración</label>
                            <input type="text" id="expiry_date" name="expiry_date" class="input_field" placeholder="MM/AA" required pattern="\d{2}/\d{2}" maxlength="5">
                        </div>
                        <div class="input_container">
                            <label for="cvv" class="input_label">CVV</label>
                            <input type="text" id="cvv" name="cvv" class="input_field" placeholder="123" required maxlength="3">
                        </div>
                    </div>
                </div>

                <input type="hidden" id="marca" name="marca">
                <input type="hidden" id="modelo" name="modelo">
                <input type="hidden" id="precio" name="precio">

                <button type="submit" class="purchase--btn">Realizar Pago</button>
            </form>
        </div>

        <script>
            function openPaymentPopup(marca, modelo, precio) {
                var modal = document.getElementById('paymentPopup');
                modal.style.display = 'block';

                // Llenar los campos ocultos con los datos del celular seleccionado
                document.getElementById('marca').value = marca;
                document.getElementById('modelo').value = modelo;
                document.getElementById('precio').value = precio;
            }

            window.onclick = function(event) {
                var modal = document.getElementById('paymentPopup');
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            };
        </script>


    <?php else : ?>
        <p>No hay datos en la base de datos</p>
    <?php endif; ?>
    <button class="return-button" onclick="location.href='../UsuarioSesion/inicioSesion.html';">Cerrar Sesión</button>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputBusqueda = document.getElementById('inputBusqueda');
            const tablaDatos = document.getElementById('tablaDatos');
            const rows = tablaDatos.getElementsByTagName('tr');

            inputBusqueda.addEventListener('keyup', function() {
                const searchText = inputBusqueda.value.toLowerCase();

                for (let i = 1; i < rows.length; i++) {
                    let found = false;
                    const cells = rows[i].getElementsByTagName('td');

                    for (let j = 0; j < cells.length; j++) {
                        const cellText = cells[j].innerText.toLowerCase();

                        if (cellText.includes(searchText)) {
                            found = true;
                            break;
                        }
                    }

                    if (found) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            });
        });
    </script>

    <script>
        function validateForm() {
            var cardNumber = document.getElementById('card_number').value;
            var expiryDate = document.getElementById('expiry_date').value;
            var cvv = document.getElementById('cvv').value;

            // Validar número de tarjeta (debe tener exactamente 16 caracteres numéricos)
            if (cardNumber.length !== 16 || !(/^\d+$/.test(cardNumber))) {
                alert('El número de tarjeta debe contener exactamente 16 caracteres numéricos.');
                return false;
            }

            // Validar formato de fecha de expiración (debe ser MM/AA)
            if (!/^\d{2}\/\d{2}$/.test(expiryDate)) {
                alert('El formato de la fecha de expiración debe ser MM/AA (por ejemplo, 09/24).');
                return false;
            }

            // Validar CVV (debe tener exactamente 3 caracteres numéricos)
            if (cvv.length !== 3 || !(/^\d+$/.test(cvv))) {
                alert('El CVV debe contener exactamente 3 caracteres numéricos.');
                return false;
            }

            // Si todas las validaciones son exitosas, enviar el formulario
            return true;
        }
    </script>


</body>

</html>