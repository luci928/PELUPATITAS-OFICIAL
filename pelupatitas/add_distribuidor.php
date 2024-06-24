<?php include('includes/header.php'); ?>
<main>
    <h2>Agregar Distribuidor</h2>
    <form method="post" action="add_distribuidor_process.php">
        <label for="ruc">RUC:</label>
        <input type="text" id="ruc" name="ruc" required><br>

        <label for="correo_electronico">Correo Electrónico:</label>
        <input type="email" id="correo_electronico" name="correo_electronico" required><br>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required><br>

        <input type="submit" value="Agregar Distribuidor">
    </form>
</main>
<?php include('includes/footer.php'); ?>
