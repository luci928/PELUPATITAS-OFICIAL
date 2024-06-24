<?php
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $precio_venta = $_POST['precio_venta'];
    $precio_distribuidor = $_POST['precio_distribuidor'];
    $stock = $_POST['stock'];
    $descripcion = $_POST['descripcion'];
    $ruc_distribuidor = $_POST['ruc_distribuidor'];

    // Verifica si el distribuidor existe
    $sql_check = "SELECT * FROM Distribuidor WHERE RUC = '$ruc_distribuidor'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        $sql = "INSERT INTO Producto (Nombre, Fecha_de_Vencimiento, Precio_de_venta, Precio_de_distribuidor, Stock_Disponible, Descripcion, RUC_Distribuidor) 
                VALUES ('$nombre', '$fecha_vencimiento', '$precio_venta', '$precio_distribuidor', '$stock', '$descripcion', '$ruc_distribuidor')";

        if ($conn->query($sql) === TRUE) {
            echo "Producto agregado exitosamente";
            // Redireccionar al dashboard del gerente
            header("Location: gerente_dashboard.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: El RUC del distribuidor no existe.";
    }

    $conn->close();
}
?>
