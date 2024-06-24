<?php
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cod_cliente = $_POST['cod_cliente'];
    $cod_producto = $_POST['cod_producto'];
    $cantidad = $_POST['cantidad'];

    // Obtener precio del producto
    $sql_precio = "SELECT Precio_de_venta FROM Producto WHERE Cod_producto = '$cod_producto'";
    $result_precio = $conn->query($sql_precio);

    if ($result_precio->num_rows > 0) {
        $row = $result_precio->fetch_assoc();
        $precio_unid = $row['Precio_de_venta'];

        // Insertar pedido en la tabla Pedido
        $sql_pedido = "INSERT INTO Pedido (Cod_Cliente, Fecha_esperada) VALUES ('$cod_cliente', NOW())";

        if ($conn->query($sql_pedido) === TRUE) {
            $cod_pedido = $conn->insert_id;

            // Insertar detalles del pedido en la tabla Detalles_Pedido
            $sql_detalle = "INSERT INTO Detalles_Pedido (Cod_producto, Cod_Pedido, Cantidad_prod, Precio_unid) 
                            VALUES ('$cod_producto', '$cod_pedido', '$cantidad', '$precio_unid')";

            if ($conn->query($sql_detalle) === TRUE) {
                echo "Pedido realizado exitosamente";
                // Redireccionar a la página del cliente
                header("Location: cliente_dashboard.php");
            } else {
                echo "Error: " . $sql_detalle . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $sql_pedido . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Producto no encontrado.";
    }

    $conn->close();
}
?>


