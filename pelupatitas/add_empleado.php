<?php include('includes/header.php'); ?>
<main>
    <h2>Agregar Empleado</h2>
    <form method="post" action="add_empleado_process.php">
        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" required><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br>

        <label for="cargo">Cargo:</label>
        <input type="text" id="cargo" name="cargo" required><br>

        <label for="correo_electronico">Correo Electrónico:</label>
        <input type="email" id="correo_electronico" name="correo_electronico" required><br>

        <label for="sueldo">Sueldo:</label>
        <input type="number" id="sueldo" name="sueldo" required><br>

        <input type="submit" value="Agregar Empleado">
    </form>

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
        <label for="dni_empleado">DNI del Empleado:</label>
        <input type="text" id="dni_empleado" name="dni_empleado" required><br>
        <input type="submit" value="Agregar Horario">
    </form>

    <h3>Agregar Dependiente</h3>
    <form method="post" action="add_dependiente_process.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="sexo">Sexo:</label>
        <input type="text" id="sexo" name="sexo" required><br>
        <label for="parentesco">Parentesco:</label>
        <input type="text" id="parentesco" name="parentesco" required><br>
        <label for="dni_empleado">DNI del Empleado:</label>
        <input type="text" id="dni_empleado" name="dni_empleado" required><br>
        <input type="submit" value="Agregar Dependiente">
    </form>
</main>
<?php include('includes/footer.php'); ?>

