<?php
include('includes/header.php');
include('includes/config.php');

$sql = "SELECT * FROM Producto";
$result = $conn->query($sql);
?>

<main>
    <h2>Productos</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock Disponible</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["Nombre"]. "</td><td>" . $row["Descripcion"]. "</td><td>" . $row["Precio_de_venta"]. "</td><td>" . $row["Stock_Disponible"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No hay productos disponibles</td></tr>";
        }
        ?>
    </table>
</main>

<?php include('includes/footer.php'); ?>
