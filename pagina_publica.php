<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Sistema de autenticación</title>
</head>

<body>
    <header>
        <h1>Sistema de autenticación</h1>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    </header>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><strong>Página pública</strong></li>
            <?php
            if (isset($_SESSION["usuario"])) {
                echo "<li><a href='privado/pagina_privada.php'>Página privada</a></li>";
                echo "<li><a href='privado/tienda.php'>Tienda</a></li>";
                echo "<li><a href='privado/carrito.php'>Carrito</a></li>";
                echo "<li><a href='privado/logout.php'>Cerrar sesión ({$_SESSION['usuario']} )</a></li>";
            } else {
                echo "<li><a href='login.php'>Iniciar sesión</a></li>";
                echo "<li><a href='registro.php'>Regístrate</a></li>";
            }
            ?>
        </ul>
    </nav>

    <main>
        <section>
            <article>
                <h1>Página pública</h1>
                <p>
                    Esta es la página pública, aquí puede acceder todo el mundo, estén o
                    registrados y hayan o no iniciado sesión.
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