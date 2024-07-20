<?php
// Incluir la biblioteca TCPDF
require_once('tcpdf/tcpdf.php');

// Datos de conexión a la base de datos
$server = "localhost";
$user = "root";
$password = "";
$db = "marcas_de_celulares";

// Crear instancia de TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Establecer información del documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tu Nombre');
$pdf->SetTitle('Reporte de Usuarios y Productos');
$pdf->SetSubject('Reporte de usuarios y productos desde la base de datos');
$pdf->SetKeywords('PDF, Reporte, Base de Datos');

// Configurar encabezado
$pdf->setPrintHeader(false); // No imprimir encabezado automático

// Agregar página
$pdf->AddPage();

// Título de la página para usuarios
$pdf->SetFont('helvetica', 'B', 20); // Tamaño del título
$pdf->MultiCell(0, 10, 'Reporte de Usuarios', 0, 'C'); // Título centrado
$pdf->Ln(10); // Espacio antes de la tabla de usuarios

// Conectar a la base de datos para usuarios
$conn = new mysqli($server, $user, $password, $db);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL para usuarios
$sql_usuarios = "SELECT Usuario, Correo, Contraseña FROM usuarios";
$result_usuarios = $conn->query($sql_usuarios);

// Crear tabla de usuarios en el PDF
if ($result_usuarios->num_rows > 0) {
    // Cabecera de la tabla de usuarios
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(60, 10, 'Usuario', 1, 0, 'C');
    $pdf->Cell(70, 10, 'Correo', 1, 0, 'C');
    $pdf->Cell(60, 10, 'Contraseña', 1, 1, 'C');

    // Datos de la tabla de usuarios
    $pdf->SetFont('helvetica', '', 10);
    while ($row = $result_usuarios->fetch_assoc()) {
        $pdf->Cell(60, 10, $row['Usuario'], 1, 0, 'C');
        $pdf->Cell(70, 10, $row['Correo'], 1, 0, 'C');
        $pdf->Cell(60, 10, $row['Contraseña'], 1, 1, 'C');
    }
} else {
    $pdf->Cell(0, 10, 'No se encontraron usuarios', 0, 1, 'C');
}

// Cerrar conexión de usuarios
$conn->close();

// Salto de página para comenzar la siguiente sección
$pdf->AddPage('L'); // Cambiar a orientación horizontal

// Título de la página para celulares
$pdf->SetFont('helvetica', 'B', 20); // Tamaño del título
$pdf->MultiCell(0, 10, 'Reporte de Celulares', 0, 'C'); // Título centrado
$pdf->Ln(10); // Espacio antes de la tabla de celulares

// Conectar a la base de datos para celulares (ejemplo)
$conn_celulares = new mysqli($server, $user, $password, $db);
if ($conn_celulares->connect_error) {
    die("Error de conexión: " . $conn_celulares->connect_error);
}

// Consulta SQL para celulares (ejemplo)
$sql_celulares = "SELECT Marca, Modelo, Lanzamiento, Pantalla, Camara, Procesador, Memoria, RAM, Bateria, Peso, Precio FROM modelos";
$result_celulares = $conn_celulares->query($sql_celulares);

// Crear tabla de celulares en el PDF
if ($result_celulares->num_rows > 0) {
    // Cabecera de la tabla de celulares
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(30, 10, 'Marca', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Modelo', 1, 0, 'C');
    $pdf->Cell(27, 10, 'Lanzamiento', 1, 0, 'C');
    $pdf->Cell(27, 10, 'Pantalla', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Cámara', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Procesador', 1, 0, 'C');
    $pdf->Cell(20, 10, 'Memoria', 1, 0, 'C');
    $pdf->Cell(20, 10, 'RAM', 1, 0, 'C');
    $pdf->Cell(20, 10, 'Batería', 1, 0, 'C');
    $pdf->Cell(20, 10, 'Peso', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Precio', 1, 1, 'C');

    // Datos de la tabla de celulares
    $pdf->SetFont('helvetica', '', 10);
    while ($row = $result_celulares->fetch_assoc()) {
        $pdf->Cell(30, 10, $row['Marca'], 1, 0, 'C');
        $pdf->Cell(30, 10, $row['Modelo'], 1, 0, 'C');
        $pdf->Cell(27, 10, $row['Lanzamiento'], 1, 0, 'C');
        $pdf->Cell(27, 10, $row['Pantalla'], 1, 0, 'C');
        $pdf->Cell(25, 10, $row['Camara'], 1, 0, 'C');
        $pdf->Cell(30, 10, $row['Procesador'], 1, 0, 'C');
        $pdf->Cell(20, 10, $row['Memoria'], 1, 0, 'C');
        $pdf->Cell(20, 10, $row['RAM'], 1, 0, 'C');
        $pdf->Cell(20, 10, $row['Bateria'], 1, 0, 'C');
        $pdf->Cell(20, 10, $row['Peso'], 1, 0, 'C');
        $pdf->Cell(25, 10, $row['Precio'], 1, 1, 'C');
    }
} else {
    $pdf->Cell(0, 10, 'No se encontraron celulares', 0, 1, 'C');
}

// Cerrar conexión de celulares
$conn_celulares->close();

// Salida del PDF (descarga o visualización)
$pdf->Output('Reporte Base de Datos.pdf', 'D'); // Descargar directamente el PDF
