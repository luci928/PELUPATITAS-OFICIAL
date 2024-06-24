<?php include('includes/header.php'); ?>
<main>
    <h2>Iniciar Sesión como Cliente</h2>
    <form method="post" action="login_cliente_process.php">
        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" required><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
    <p>¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a></p>
</main>
<?php include('includes/footer.php'); ?>
