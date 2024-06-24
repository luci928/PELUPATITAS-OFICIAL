<?php
session_start();
if (!isset($_SESSION['empleado'])) {
    header("Location: login.php");
    exit();
}
include('includes/header.php');
?>
<main>
    <h2>Dashboard del Empleado</h2>
    <p>Bienvenido, Empleado. Aquí puedes gestionar tu horario y dependientes.</p>
    
    <h3>Agregar Horario</h3>
    <form method="post" action="add_horario_process.php">
        <label for="codigo_horario">Código de Horario:</label>
        <input type="text" id="codigo_horario" name="codigo_horario" required><br>
        <label for="hora_inicio">Hora de Inicio:</label>
        <input type="time" id="hora_inicio" name="hora_inicio" required><br>
        <label for="hora_fin">Hora de Fin:</label>
        <input type="time" id="hora_fin" name="hora_fin" required><br>
        <label for="dia">Día:</label>
        <input type="text" id="dia" name="dia" required><br>
        <input type="submit" value="Agregar Horario">
    </form>

    <h3>Agregar Dependiente</h3>
    <form method="post" action="add_dependiente_process.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="sexo">Sexo:</label>
        <input type="text" id="sexo" name="sexo" required><br>
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br>
        <label for="numeros">Números:</label>
        <input type="text" id="numeros" name="numeros" required><br>
        <label for="parentesco">Parentesco:</label>
        <input type="text" id="parentesco" name="parentesco" required><br>
        <input type="submit" value="Agregar Dependiente">
    </form>
</main>
<?php include('includes/footer.php'); ?>
