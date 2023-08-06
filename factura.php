<?php
require_once 'dompdf-master/dompdf/autoload.inc.php'; // Ajusta la ruta a dompdf

use Dompdf\Dompdf;

// Aquí coloca el código de conexión a la base de datos usando PDO

try {
    $conn->beginTransaction();

    // Insertar la factura y obtener su ID
    $stmt = $conn->prepare("INSERT INTO facturas (cliente, fecha, total) VALUES (:cliente, :fecha, :total)");
    // Bind los parámetros aquí

    // Resto del código para insertar detalles de la factura y calcular el total

    $conn->commit();
} catch (PDOException $e) {
    $conn->rollBack();
    echo "Error al generar la factura: " . $e->getMessage();
    exit();
}

// Crear el PDF con la factura
$dompdf = new Dompdf();
$dompdf->loadHtml('<h1>Factura</h1>
                  <p>Cliente: ' . $cliente . '</p>
                  <p>Fecha: ' . $fecha . '</p>
                  <!-- Agrega aquí el resto de los detalles de la factura -->
                  ');

// Renderiza el PDF
$dompdf->render();

// Genera el PDF y lo muestra en el navegador
$dompdf->stream("factura.pdf");

 $output = $dompdf->output();
file_put_contents('ruta_a_tu_directorio/factura.pdf', $output);
?>