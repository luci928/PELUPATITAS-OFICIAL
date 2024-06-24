<?php
session_start();
include('includes/config.php');

if (!isset($_SESSION['gerente'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cod_producto = $_POST['cod_producto'];
    $cod_cat = $_POST['cod_cat'];
    $procedencia = $_POST['procedencia'];
    $etapa_de_vida = $_POST['etapa_de_vida'];
    $tamano = $_POST['tamano'];

    $sql = "INSERT INTO Categoria_por_producto (Cod_cat_Categoria, Cod_producto_Producto, Procedencia, Etapa_de_vida_dirigido, Tamano_dirigido) 
            VALUES ('$cod_cat', '$cod_producto', '$procedencia', '$etapa_de_vida', '$tamano')";

    if ($conn->query($sql) === TRUE) {
        echo "Categoría asignada exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql_productos = "SELECT * FROM Producto";
$result_productos = $conn->query($sql_productos);

$sql_categorias = "SELECT * FROM Categoria";
$result_categorias = $conn->query($sql_categorias);
?>

<?php include('includes/header.php'); ?>
<main>
    <h2>Asignar Categoría a Producto</h2>
    <form method="post" action="">
        <label for="cod_producto">Producto:</label>
        <select id="cod_producto" name="cod_producto" required>
            <?php while($row = $result_productos->fetch_assoc()) { ?>
                <option value="<?php echo $row['Cod_producto']; ?>"><?php echo $row['Nombre']; ?></option>
            <?php } ?>
        </select><br>

        <label for="cod_cat">Categoría:</label>
        <select id="cod_cat" name="cod_cat" required>
            <?php while($row = $result_categorias->fetch_assoc()) { ?>
                <option value="<?php echo $row['Cod_cat']; ?>"><?php echo $row['Tipo']; ?></option>
            <?php } ?>
        </select><br>

        <label for="procedencia">Procedencia:</label>
        <input type="text" id="procedencia" name="procedencia"><br>

        <label for="etapa_de_vida">Etapa de Vida Dirigido:</label>
        <input type="text" id="etapa_de_vida" name="etapa_de_vida"><br>

        <label for="tamano">Tamaño Dirigido:</label>
        <input type="text" id="tamano" name="tamano"><br>

        <input type="submit" value="Asignar Categoría">
    </form>
</main>
<?php include('includes/footer.php'); ?>
