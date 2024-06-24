<?php
session_start();
if (!isset($_SESSION['cliente'])) {
    header("Location: login_cliente.php");
    exit();
}
include('includes/header.php');
?>
<main>
    <h2>Dashboard del Cliente</h2>
    <p>Bienvenido, <?php echo $_SESSION['cliente']; ?>. Aquí puedes ver tus pedidos y realizar nuevas compras.</p>
    <button onclick="location.href='view_products.php'">Ver Productos</button>
    <button onclick="location.href='make_order.php'">Realizar Pedido</button>
    <br><br>
    <a href="logout.php">Cerrar Sesión</a>
</main>
<?php include('includes/footer.php'); ?>
