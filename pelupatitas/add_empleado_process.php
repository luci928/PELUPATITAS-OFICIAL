<?php
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $sueldo = $_POST['sueldo'];
    $cargo = $_POST['cargo'];

    $sql = "INSERT INTO Empleado (DNI, Nombre, Apellido, Direccion, Sueldo, Cargo) 
            VALUES ('$dni', '$nombre', '$apellido', '$direccion', '$sueldo', '$cargo')";

    if ($conn->query($sql) === TRUE) {
        echo "Empleado agregado exitosamente";
        // Redireccionar al dashboard del gerente
        header("Location: gerente_dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
