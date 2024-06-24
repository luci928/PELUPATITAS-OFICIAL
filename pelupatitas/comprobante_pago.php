<?php
session_start();
include('includes/config.php');

if (!isset($_SESSION['cliente'])) {
    header("Location: login.php");
    exit();
}

$cod_pedido = $_GET['cod_pedido']; // Obtener el código del pedido de la URL

$sql_pedido = "SELECT * FROM Pedido WHERE Cod_pedido='$cod_pedido'";
$result_pedido = $conn->query($sql_pedido);

$sql_comprobante = "SELECT * FROM Comprobantes WHERE Cod_Pedido='$cod_pedido'";
$result_comprobante = $conn->query($sql_comprobante);

if ($result_pedido->num_rows > 0 && $result_comprobante->num_rows > 0) {
    $pedido = $result_pedido->fetch_assoc();
    $comprobante = $result_comprobante->fetch_assoc();
} else {
    echo "No se encontraron los detalles del pedido o el comprobante de pago.";
    exit();
}

?>

<?php include('includes/header.php'); ?>
<main>
    <h2>Comprobante de Pago</h2>
    <h3>Detalles del Pedido</h3>
    <p><strong>Código de Pedido:</strong> <?php echo $pedido['Cod_pedido']; ?></p>
    <p><strong>Fecha Esperada:</strong> <?php echo $pedido['Fecha_esperada']; ?></p>
    <p><strong>Estado:</strong> <?php echo $pedido['Estado']; ?></p>
    <p><strong>Comentarios:</strong> <?php echo $pedido['Comentarios']; ?></p>

    <h3>Detalles del Comprobante</h3>
    <p><strong>Código de Comprobante:</strong> <?php echo $comprobante['cod_comprobante']; ?></p>
    <p><strong>Tipo:</strong> <?php echo $comprobante['Tipo']; ?></p>
    <p><strong>Fecha del Pedido:</strong> <?php echo $comprobante['Fecha_pedido']; ?></p>
    <p><strong>Monto Total:</strong> <?php echo $comprobante['Monto_total']; ?></p>
</main>
<?php include('includes/footer.php'); ?>
