<?php
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];

    $sql = "SELECT * FROM Empleado WHERE Nombre='$nombre' AND DNI='$dni' AND Cargo='Gerente'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Sesión iniciada como gerente
        echo "Bienvenido, $nombre.";
        // Redireccionar a la página del gerente
        header("Location: gerente_dashboard.php");
    } else {
        echo "Credenciales incorrectas. Inténtalo de nuevo.";
    }

    $conn->close();
}
?>
