<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('HTTP/1.0 401 Unauthorized');
    echo 'No puedes acceder a esta página, <a href="../login.php">Login</a>';
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carrito de la compra</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <header>
        <h1>SuperCarrito Shop</h1>
    </header>

    <nav>
        <ul>
            <li><a href="../index.php">Home</strong></li>
            <li><a href="../pagina_publica.php">Página pública</a></li>
            <li><a href="pagina_privada.php">Página privada</a></li>
            <li><a href="tienda.php">Tienda</a></li>
            <li><strong>Carrito</strong></li>
            <li><a href="logout.php">Cerrar sesión (<?= $_SESSION['usuario'] ?>)</a></li>
        </ul>
    </nav>

    <main>
        <section>
            <h1>Cesta de la compra</h1>

            <?php
            if (!isset($_SESSION['carrito'])) {
                echo "<p>No hay productos en el carrito de la compra</p>";
            } else {
                echo "<table class='table table-dark' style='width:20%'>";
                foreach ($_SESSION["carrito"] as $nombre => $valor) {
                    echo "<tr style='border:2px solid black'>";
                    echo "<td style='border:2px solid black'>$nombre</td>";
                    echo "<td style='border:2px solid black'>$valor</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            ?>

        </section>
    </main>

    <footer>
        <small><em>&copy; El SuperCarrito de la compra</em></small>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>

</html>