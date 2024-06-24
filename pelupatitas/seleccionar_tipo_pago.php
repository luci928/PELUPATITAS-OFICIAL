<?php
session_start();
if (!isset($_SESSION['cliente']) || !isset($_SESSION['cod_pedido']) || !isset($_SESSION['monto_total'])) {
    header("Location: login.php");
    exit();
}
?>

<?php include('includes/header.php'); ?>
<main>
    <h2>Seleccionar Tipo de Pago</h2>
    <form method="post" action="generar_comprobante.php">
        <label for="tipo_pago">Tipo de Pago:</label>
        <select id="tipo_pago" name="tipo_pago" required>
            <option value="Boleta">Boleta</option>
            <option value="Factura">Factura</option>
        </select><br>
        <input type="submit" value="Generar Comprobante">
    </form>
</main>
<?php include('includes/footer.php'); ?>
