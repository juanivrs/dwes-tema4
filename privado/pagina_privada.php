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
    <title>Sistema de autenticación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>
    <header>
        <h1>Sistema de autenticación</h1>
    </header>

    <nav>
        <ul>
            <li><a href="../index.php">Home</strong></li>
            <li><a href="../pagina_publica.php">Página pública</a></li>
            <li><strong>Página privada</strong></li>
            <li><a href="tienda.php">Tienda</a></li>
            <li><a href="carrito.php">Carrito</a></li>
            <li><a href="logout.php">Cerrar sesión (<?= $_SESSION['usuario'] ?>)</a></li>
        </ul>
    </nav>

    <main>
        <section>
            <article>
                <h1>Página privada</h1>
                <p>
                    Esta es la página privada, aquí solo debería acceder usuarios
                    registrados y que hayan iniciado sesión.
                </p>
            </article>
        </section>
    </main>

    <footer>
        <small>&copy; sitio web</small>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>