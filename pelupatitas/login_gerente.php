<?php include('includes/header.php'); ?>
<main>
    <h2>Iniciar Sesión como Gerente</h2>
    <form method="post" action="login_gerente_process.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" required><br>

        <input type="submit" value="Iniciar Sesión">
    </form>
</main>
<?php include('includes/footer.php'); ?>
