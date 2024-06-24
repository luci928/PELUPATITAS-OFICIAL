<?php
session_start();
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cod_producto = $_POST['cod_producto'];
    $cantidad = $_POST['cantidad'];

    // Verificar que el cliente esté logueado
    if (isset($_SESSION['cliente'])) {
        $cliente_dni = $_SESSION['cliente'];

        // Verificar si el carrito ya existe
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // Agregar el producto al carrito
        if (isset($_SESSION['carrito'][$cod_producto])) {
            $_SESSION['carrito'][$cod_producto] += $cantidad;
        } else {
            $_SESSION['carrito'][$cod_producto] = $cantidad;
        }

        // Redireccionar de nuevo a la página de productos
        header("Location: view_products.php");
    } else {
        echo "Debes iniciar sesión para añadir productos al carrito.";
    }
}
?>
