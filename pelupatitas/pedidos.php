<?php include('includes/header.php'); ?>
<main>
    <h2>Mis Pedidos</h2>
    <h3>Productos en el Carrito</h3>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Precio Total</th>
        </tr>
        <?php
        session_start();
        include('includes/config.php');
        $total = 0;

        if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $cod_producto => $cantidad) {
                $sql = "SELECT Nombre, Precio_de_venta FROM Producto WHERE Cod_producto='$cod_producto'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $nombre = $row['Nombre'];
                    $precio_unitario = $row['Precio_de_venta'];
                    $precio_total = $precio_unitario * $cantidad;
                    $total += $precio_total;

                    echo "<tr>
                            <td>$nombre</td>
                            <td>$cantidad</td>
                            <td>$precio_unitario</td>
                            <td>$precio_total</td>
                          </tr>";
                }
            }

            echo "<tr>
                    <td colspan='3'><strong>Total</strong></td>
                    <td><strong>$total</strong></td>
                  </tr>";
        } else {
            echo "<tr><td colspan='4'>Tu carrito está vacío.</td></tr>";
        }

        $conn->close();
        ?>
    </table>
    <br>
    <form method="post" action="place_order.php">
        <input type="submit" value="Realizar Pedido">
    </form>

    <h3>Detalles de Pedidos</h3>
    <table border="1">
        <tr>
            <th>Código de Pedido</th>
            <th>Fecha Esperada</th>
            <th>Fecha de Entrega</th>
            <th>Estado</th>
            <th>Comentarios</th>
        </tr>
        <?php
        include('includes/config.php');
        $cliente_dni = $_SESSION['cliente'];
        
        $sql_cliente = "SELECT Cod_cliente FROM Cliente WHERE DNI_repre='$cliente_dni'";
        $result_cliente = $conn->query($sql_cliente);
        
        if ($result_cliente->num_rows > 0) {
            $row_cliente = $result_cliente->fetch_assoc();
            $cod_cliente = $row_cliente['Cod_cliente'];
            
            $sql_pedidos = "SELECT * FROM Pedido WHERE Cod_Cliente='$cod_cliente'";
            $result_pedidos = $conn->query($sql_pedidos);

            if ($result_pedidos->num_rows > 0) {
                while ($row_pedido = $result_pedidos->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row_pedido['Cod_pedido']}</td>
                            <td>{$row_pedido['Fecha_esperada']}</td>
                            <td>{$row_pedido['Fecha_entrega']}</td>
                            <td>{$row_pedido['Estado']}</td>
                            <td>{$row_pedido['Comentarios']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay pedidos realizados.</td></tr>";
            }
        }

        $conn->close();
        ?>
    </table>
</main>
<?php include('includes/footer.php'); ?>
