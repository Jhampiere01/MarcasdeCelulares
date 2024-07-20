<?php
require_once('tcpdf/tcpdf.php');

// Obtener los datos del formulario
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$cardNumber = $_POST['card_number'];
$expiryDate = $_POST['expiry_date'];
$cvv = $_POST['cvv'];

// Crear un nuevo PDF
$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tu Nombre o Empresa');
$pdf->SetTitle('Factura de Compra');
$pdf->SetMargins(10, 10, 10); // Márgenes (izquierda, arriba, derecha)
$pdf->SetFont('helvetica', '', 12);

$pdf->AddPage();

// Encabezado de la factura
$pdf->SetFont('helvetica', 'B', 25); // Fuente en negrita, tamaño 18
$pdf->Cell(0, 10, 'Factura de Compra', 0, 1, 'C');
$pdf->SetFont('helvetica', 'B', 10); // Fuente en negrita, tamaño 14
$pdf->SetTextColor(255, 0, 0); // Color rojo (RGB: 255, 0, 0)
$pdf->Cell(0, 10, '(D´Tito Phone Store)', 0, 1, 'C');
$pdf->SetTextColor(0, 0, 0); // Restaurar color de texto a negro
$pdf->Ln(5); // Espacio adicional después del subtítulo



// Detalles del producto
$pdf->SetFont('helvetica', 'B', 14);
$pdf->Cell(0, 10, 'Detalles del Producto', 0, 1);
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(0, 10, 'Marca: ' . htmlspecialchars($marca), 0, 1);
$pdf->Cell(0, 10, 'Modelo: ' . htmlspecialchars($modelo), 0, 1);
$pdf->Cell(0, 10, 'Precio: ' . htmlspecialchars($precio), 0, 1); // Mostrar precio como caracteres
$pdf->Ln(5);

// Detalles de la tarjeta
$pdf->SetFont('helvetica', 'B', 14);
$pdf->Cell(0, 10, 'Detalles de la Tarjeta', 0, 1);
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(0, 10, 'Numero de Tarjeta: ' . substr($cardNumber, 0, 4) . ' **** **** ' . substr($cardNumber, -4), 0, 1);
$pdf->Cell(0, 10, 'Fecha de Expiracion: ' . htmlspecialchars($expiryDate), 0, 1);
$pdf->Cell(0, 10, 'CVV: ***', 0, 1); // Por seguridad, no mostrar el CVV completo en el PDF
$pdf->Ln(10);

// Información adicional
$pdf->SetFont('helvetica', 'I', 10);
$pdf->MultiCell(0, 10, 'Gracias por su compra. Para cualquier consulta, contáctenos al teléfono: 902558733 o por correo electrónico: harith.992004@gmail.com', 0, 'J');
$pdf->Ln(5);

// Agregar un pie de página
$pdf->SetY(265); // Posición a 15 mm del final de la página
$pdf->SetFont('helvetica', 'I', 10);
$pdf->Cell(0, 10, 'Este documento es una factura válida y sirve como comprobante de compra.', 0, 1, 'C');

// Salida del PDF como descarga
$pdf->Output('factura.pdf', 'D');
