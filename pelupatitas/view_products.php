<?php include('includes/header.php'); ?>
<main>
    <h2>Productos Disponibles</h2>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio de Venta</th>
            <th>Stock Disponible</th>
            <th>Acción</th>
        </tr>
        <?php
        include('includes/config.php');
        $sql = "SELECT * FROM Producto";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['Nombre']}</td>
                        <td>{$row['Descripcion']}</td>
                        <td>{$row['Precio_de_venta']}</td>
                        <td>{$row['Stock_Disponible']}</td>
                        <td>
                            <form method='post' action='add_to_cart.php'>
                                <input type='hidden' name='cod_producto' value='{$row['Cod_producto']}'>
                                <input type='number' name='cantidad' value='1' min='1' max='{$row['Stock_Disponible']}' required>
                                <input type='submit' value='Añadir al Carrito'>
                            </form>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay productos disponibles</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</main>
<?php include('includes/footer.php'); ?>
