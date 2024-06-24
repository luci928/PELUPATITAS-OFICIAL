<?php
session_start();
include('includes/config.php');

if (!isset($_SESSION['gerente'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipo = $_POST['tipo'];
    $descripcion = $_POST['descripcion'];

    $sql = "INSERT INTO Categoria (Tipo, Descripcion) VALUES ('$tipo', '$descripcion')";

    if ($conn->query($sql) === TRUE) {
        echo "Categoría agregada exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql_categorias = "SELECT * FROM Categoria";
$result_categorias = $conn->query($sql_categorias);
?>

<?php include('includes/header.php'); ?>
<main>
    <h2>Agregar Categoría</h2>
    <form method="post" action="">
        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea><br>

        <input type="submit" value="Agregar Categoría">
    </form>

    <h2>Categorías Existentes</h2>
    <ul>
        <?php while($row = $result_categorias->fetch_assoc()) { ?>
            <li><?php echo $row['Tipo']; ?> - <?php echo $row['Descripcion']; ?></li>
        <?php } ?>
    </ul>
</main>
<?php include('includes/footer.php'); ?>
