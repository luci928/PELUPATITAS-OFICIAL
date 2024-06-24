<?php
session_start();
include('includes/config.php');

if (isset($_SESSION['cliente']) && isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
    $cliente_dni = $_SESSION['cliente'];

    // Obtener el código de cliente
    $sql_cliente = "SELECT Cod_cliente FROM Cliente WHERE DNI_repre='$cliente_dni'";
    $result_cliente = $conn->query($sql_cliente);

    if ($result_cliente->num_rows > 0) {
        $row_cliente = $result_cliente->fetch_assoc();
        $cod_cliente = $row_cliente['Cod_cliente'];

        // Insertar el pedido en la tabla Pedido
        $sql_pedido = "INSERT INTO Pedido (Cod_Cliente) VALUES ('$cod_cliente')";

        if ($conn->query($sql_pedido) === TRUE) {
            $cod_pedido = $conn->insert_id;

            // Insertar los detalles del pedido en la tabla Detalles_Pedido
            foreach ($_SESSION['carrito'] as $cod_producto => $cantidad) {
                $sql_producto = "SELECT Precio_de_venta FROM Producto WHERE Cod_producto='$cod_producto'";
                $result_producto = $conn->query($sql_producto);

                if ($result_producto->num_rows > 0) {
                    $row_producto = $result_producto->fetch_assoc();
                    $precio_unid = $row_producto['Precio_de_venta'];

                    $sql_detalle = "INSERT INTO Detalles_Pedido (Cod_producto, Cod_Pedido, Cantidad_prod, Precio_unid) 
                                    VALUES ('$cod_producto', '$cod_pedido', '$cantidad', '$precio_unid')";

                    if (!$conn->query($sql_detalle)) {
                        echo "Error: " . $sql_detalle . "<br>" . $conn->error;
                    }
                }
            }

            // Calcular el monto total del pedido
            $sql_total = "SELECT SUM(Cantidad_prod * Precio_unid) AS Monto FROM Detalles_Pedido WHERE Cod_Pedido='$cod_pedido'";
            $result_total = $conn->query($sql_total);
            $row_total = $result_total->fetch_assoc();
            $monto_total = $row_total['Monto'];

            // Guardar el monto total en la sesión
            $_SESSION['monto_total'] = $monto_total;
            $_SESSION['cod_pedido'] = $cod_pedido;

            // Limpiar el carrito
            unset($_SESSION['carrito']);
            echo "Pedido realizado exitosamente";
            // Redireccionar a la página de seleccionar tipo de pago
            header("Location: seleccionar_tipo_pago.php");
        } else {
            echo "Error: " . $sql_pedido . "<br>" . $conn->error;
        }
    }
} else {
    echo "No hay productos en el carrito o no has iniciado sesión.";
}

$conn->close();
?>
