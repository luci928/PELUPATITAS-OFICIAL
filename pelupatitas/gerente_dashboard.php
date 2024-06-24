<?php
session_start();
if (!isset($_SESSION['gerente'])) {
    header("Location: login.php");
    exit();
}
include('includes/header.php');
?>
<main>
    <h2>Dashboard del Gerente</h2>
    <p>Bienvenido, <?php echo $_SESSION['gerente']; ?>. Aquí puedes gestionar los empleados, productos y distribuidores.</p>
    <button onclick="location.href='add_producto.php'">Agregar Producto</button>
    <button onclick="location.href='add_empleado.php'">Agregar Empleado</button>
    <button onclick="location.href='add_distribuidor.php'">Agregar Distribuidor</button>
    <button onclick="location.href='add_categoria.php'">Agregar Categoría</button>
    <button onclick="location.href='asignar_categoria.php'">Asignar Categoría</button>
    <br><br>
    <a href="logout.php">Cerrar Sesión</a>
</main>
<?php include('includes/footer.php'); ?>

