<?php
session_start();
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['cliente']) && isset($_SESSION['cod_pedido']) && isset($_SESSION['monto_total'])) {
    $tipo_pago = $_POST['tipo_pago'];
    $cod_pedido = $_SESSION['cod_pedido'];
    $monto_total = $_SESSION['monto_total'];

    // Insertar el comprobante de pago
    $fecha = date('Y-m-d');
    $sql_comprobante = "INSERT INTO Comprobantes (Cod_Pedido, Fecha_pedido, Monto_total, Tipo) VALUES ('$cod_pedido', '$fecha', '$monto_total', '$tipo_pago')";

    if ($conn->query($sql_comprobante) === TRUE) {
        $cod_comprobante = $conn->insert_id;

        // Redireccionar a la página del comprobante de pago
        header("Location: comprobante_pago.php?cod_pedido=$cod_pedido");
    } else {
        echo "Error: " . $sql_comprobante . "<br>" . $conn->error;
    }
} else {
    echo "Datos insuficientes para generar el comprobante de pago.";
}

$conn->close();
?>
