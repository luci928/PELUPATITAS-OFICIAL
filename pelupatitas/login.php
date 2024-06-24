<?php include('includes/header.php'); ?>
<main>
    <h2>Iniciar Sesión</h2>
    <form method="post" action="login_cliente_process.php">
        <label for="dni_cliente">DNI:</label>
        <input type="text" id="dni_cliente" name="dni" required><br>
        <input type="submit" value="Ingresar como Cliente">
    </form>
    <form method="post" action="login_gerente_process.php">
        <label for="nombre_gerente">Nombre:</label>
        <input type="text" id="nombre_gerente" name="nombre" required><br>
        <label for="dni_gerente">DNI:</label>
        <input type="text" id="dni_gerente" name="dni" required><br>
        <input type="submit" value="Ingresar como Gerente">
    </form>
</main>
<?php include('includes/footer.php'); ?>
