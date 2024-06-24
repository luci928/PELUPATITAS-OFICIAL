<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelu-Patitas</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            
            background-image: url('huellas.png');

            color: #333;
        }

        header {
            background-color: brown;
            padding: 15px 0;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 10px;
        }

        nav ul li a {
            display: block;
            padding: 10px 20px;
            background-color: white;
            color: brown;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: brown;
            color: white;
        }

        main {
            padding: 20px;
            text-align: center;
        }

        footer {
            background-color: brown;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="register.php">Registrarse</a></li>
                <li><a href="login.php">Iniciar Sesión</a></li>
                <li><a href="view_products.php">Productos</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <!-- Contenido principal aquí -->
    </main>
    <footer>
        <p>&copy; 2024 Pelu-Patitas. Todos los derechos reservados.</p>
    </footer>
</body>
</html>