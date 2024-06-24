<?php include('includes/header.php'); ?>
<main>
    <h2>Registrar Cliente</h2>
    <form method="post" action="register_process.php">
        <label for="nombre_empresa">Nombre de la Empresa:</label>
        <input type="text" id="nombre_empresa" name="nombre_empresa" required><br>

        <label for="nombre_repre">Nombre del Representante:</label>
        <input type="text" id="nombre_repre" name="nombre_repre" required><br>

        <label for="dni_repre">DNI del Representante:</label>
        <input type="text" id="dni_repre" name="dni_repre" required><br>

        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo" required><br>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br>

        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" required><br>

        <label for="region">Región:</label>
        <input type="text" id="region" name="region" required><br>

        <label for="pais">País:</label>
        <input type="text" id="pais" name="pais" required><br>

        <label for="codigo_postal">Código Postal:</label>
        <input type="text" id="codigo_postal" name="codigo_postal" required><br>

        <input type="submit" value="Registrar">
    </form>
</main>
<?php include('includes/footer.php'); ?>
