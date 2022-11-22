<?php
session_start();
require 'modelo.php';

if (!isset($_SESSION['usuario'])) {
    header('HTTP/1.0 401 Unauthorized');
    echo 'No puedes acceder a esta página, <a href="../login.php">Login</a>';
    exit();
} else {
    if ($_POST && isset($_POST['producto'])) {
        $prodname = htmlspecialchars(trim($_POST['producto']));
        $cantidad = (int)htmlspecialchars(trim($_POST['cantidad']));
        //comprobar si prodname esta en el array productos
        if (!empty($cantidad)) {
            isset($_SESSION['carrito'][$prodname]) ?   $_SESSION['carrito'][$prodname] += $cantidad :  $_SESSION['carrito'][$prodname] = $cantidad;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carrito de la compra</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
            <li><strong>Tienda</a></strong></li>
            <li><a href="carrito.php">Carrito</a></li>
            <li><a href="logout.php">Cerrar sesión (<?= $_SESSION['usuario'] ?>)</a></li>
        </ul>
    </nav>

    <main>
        <section>
            <form action="" method="post">
                <p>
                    <label for="producto">Elige un producto</label>
                    <select name="producto" id="producto">
                        <?php
                        foreach ($productos as $producto) {
                            echo "<option value='{$producto['id']}'>{$producto['valor']}</option>";
                        }
                        ?>
                    </select>
                </p>
                <p>
                    <label for="cantidad">Elige la cantidad</label>
                    <input type="number" name="cantidad" id="cantidad">
                </p>
                <p>
                    <input type="submit" value="Añadir al carrito">
                </p>
            </form>
        </section>
    </main>
    <footer>
        <small><em>&copy; El SuperCarrito de la compra</em></small>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>

</html>