<?php
include('includes/config.php');
session_start(); // Asegúrate de iniciar la sesión

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fin = $_POST['hora_fin'];
    $dia = $_POST['dia'];
    $dni_empleado = $_POST['dni_empleado']; // Obtener el DNI del empleado del formulario

    $sql = "INSERT INTO Horario (Hora_inicio, Hora_fin, Dia, DNI_Empleado) VALUES ('$hora_inicio', '$hora_fin', '$dia', '$dni_empleado')";

    if ($conn->query($sql) === TRUE) {
        echo "Horario agregado exitosamente";
        // Redireccionar a la página del gerente
        header("Location: add_empleado.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
