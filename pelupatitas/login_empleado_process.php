<?php
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dni = $_POST['dni'];

    // Verificar el DNI del empleado
    $sql = "SELECT * FROM Empleado WHERE DNI='$dni'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Sesión iniciada como empleado
        session_start();
        $_SESSION['empleado'] = $dni;
        // Redireccionar a la página del empleado
        header("Location: empleado_dashboard.php");
    } else {
        echo "DNI incorrecto. Inténtalo de nuevo.";
    }

    $conn->close();
}
?>
