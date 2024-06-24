<?php
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ruc = $_POST['ruc'];
    $correo_electronico = $_POST['correo_electronico'];
    $direccion = $_POST['direccion'];

    $sql = "INSERT INTO Distribuidor (RUC, Correo_electronico, Direccion) VALUES ('$ruc', '$correo_electronico', '$direccion')";

    if ($conn->query($sql) === TRUE) {
        echo "Distribuidor agregado exitosamente";
        // Redireccionar al dashboard del gerente
        header("Location: gerente_dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
