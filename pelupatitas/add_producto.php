<?php include('includes/header.php'); ?>
<main>
    <h2>Agregar Producto</h2>
    <form method="post" action="add_producto_process.php">
        <label for="nombre">Nombre del Producto:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="fecha_vencimiento">Fecha de Vencimiento:</label>
        <input type="date" id="fecha_vencimiento" name="fecha_vencimiento" required><br>

        <label for="precio_venta">Precio de Venta:</label>
        <input type="number" id="precio_venta" name="precio_venta" required><br>

        <label for="precio_distribuidor">Precio del Distribuidor:</label>
        <input type="number" id="precio_distribuidor" name="precio_distribuidor" required><br>

        <label for="stock">Stock Disponible:</label>
        <input type="number" id="stock" name="stock" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea><br>

        <label for="ruc_distribuidor">RUC del Distribuidor:</label>
        <input type="text" id="ruc_distribuidor" name="ruc_distribuidor" required value="123456789"><br>

        <input type="submit" value="Agregar Producto">
    </form>
</main>
<?php include('includes/footer.php'); ?>
