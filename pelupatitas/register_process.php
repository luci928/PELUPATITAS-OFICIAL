<?php
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_empresa = $_POST['nombre_empresa'];
    $nombre_repre = $_POST['nombre_repre'];
    $dni_repre = $_POST['dni_repre'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $ciudad = $_POST['ciudad'];
    $region = $_POST['region'];
    $pais = $_POST['pais'];
    $codigo_postal = $_POST['codigo_postal'];

    $sql = "INSERT INTO Cliente (Nombre, Nombre_repre, DNI_repre, Correo_electronico, Direccion_local, Ciudad, Region, Pais, Codigo_postal) 
            VALUES ('$nombre_empresa', '$nombre_repre', '$dni_repre', '$correo', '$direccion', '$ciudad', '$region', '$pais', '$codigo_postal')";

    if ($conn->query($sql) === TRUE) {
        // Obtener el último ID insertado
        $ultimo_id = $conn->insert_id;
        
        // Insertar el teléfono del cliente
        $sql_telefono = "INSERT INTO telefono_de_cliente (Telefono, Cod_Cliente) VALUES ('$telefono', '$ultimo_id')";
        if ($conn->query($sql_telefono) === TRUE) {
            echo "Registro exitoso";
            // Redireccionar a la página de inicio de sesión del cliente
            header("Location: login_cliente.php");
        } else {
            echo "Error: " . $sql_telefono . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

