<?php include('includes/header.php'); ?>
<main>
    <h2>Realizar Pedido</h2>
    <form method="post" action="make_order_process.php">
        <label for="cod_cliente">Código de Cliente:</label>
        <input type="text" id="cod_cliente" name="cod_cliente" required><br>

        <label for="cod_producto">Código de Producto:</label>
        <input type="text" id="cod_producto" name="cod_producto" required><br>

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" required><br>

        <input type="submit" value="Realizar Pedido">
    </form>
</main>
<?php include('includes/footer.php'); ?>
