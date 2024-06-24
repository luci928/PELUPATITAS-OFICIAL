<?php include('includes/header.php'); ?>
<main>
    <h2>Carrito de Compras</h2>
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
</main>
<?php include('includes/footer.php'); ?>
