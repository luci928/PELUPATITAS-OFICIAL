<?php
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dni = $_POST['dni'];

    // Verificar el DNI del cliente
    $sql = "SELECT * FROM Cliente WHERE DNI_repre='$dni'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Sesión iniciada como cliente
        echo "Bienvenido, cliente.";
        // Redireccionar a la página del cliente
        header("Location: cliente_dashboard.php");
    } else {
        echo "DNI incorrecto. Inténtalo de nuevo.";
    }

    $conn->close();
}
?>
