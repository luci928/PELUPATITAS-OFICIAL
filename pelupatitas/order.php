<?php
include('includes/header.php');
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cod_cliente = $_POST['cod_cliente'];
    $fecha_esperada = $_POST['fecha_esperada'];
    $sql = "INSERT INTO Pedido (Cod_Cliente, Fecha_esperada) VALUES ('$cod_cliente', '$fecha_esperada')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Pedido realizado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>

<main>
    <h2>Realizar Pedido</h2>
    <form method="post" action="order.php">
        <label for="cod_cliente">Código de Cliente:</label>
        <input type="text" id="cod_cliente" name="cod_cliente" required><br>

        <label for="fecha_esperada">Fecha Esperada:</label>
        <input type="date" id="fecha_esperada" name="fecha_esperada" required><br>

        <input type="submit" value="Realizar Pedido">
    </form>
</main>

<?php include('includes/footer.php'); ?>
