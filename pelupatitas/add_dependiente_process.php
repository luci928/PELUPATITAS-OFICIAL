<?php
include('includes/config.php');
session_start(); // Asegúrate de iniciar la sesión

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $sexo = $_POST['sexo'];
    $parentesco = $_POST['parentesco'];
    $dni_empleado = $_POST['dni_empleado']; // Obtener el DNI del empleado del formulario

    $sql = "INSERT INTO Dependientes (Nombres, Sexo, Parentesco, DNI_Empleado) VALUES ('$nombre', '$sexo', '$parentesco', '$dni_empleado')";

    if ($conn->query($sql) === TRUE) {
        echo "Dependiente agregado exitosamente";
        // Redireccionar a la página del gerente
        header("Location: add_empleado.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
