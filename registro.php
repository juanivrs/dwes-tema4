<?php
session_start();

//Si el usuario esta "logeado",¿Qué hace aquí?Lo echamos.
if (isset($_SESSION['usuario'])) {
    header('location:index.php');
    exit();
}

require 'lib/gestionUsuarios.php';

if ($_POST) {
    $errores = registroUsuario(
        isset($_POST['usuario']) ? $_POST['usuario'] : "",
        isset($_POST['clave']) ? $_POST['clave'] : "",
        isset($_POST['repite_clave']) ? $_POST['repite_clave'] : ""
    );
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registro de usuarios</title>
</head>

<body>
    <header>
        <h1>Sistema de autenticación</h1>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    </header>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="pagina_publica.php">Página pública</a></li>
            <li><a href='login.php'>Iniciar sesión</a></li>
            <li><strong>Regístrate</strong></li>
        </ul>
    </nav>

    <main>
        <h1>Regístrate</h1>
        <?php if (!$_POST || ($_POST && $errores)) { ?>

            <form action="registro.php" method="post">
                <p>
                    <label for="usuario">Nombre de usuario</label><br>
                    <input type="text" name="usuario" id="usuario" value="<?php echo $_POST && isset($_POST["usuario"]) ? htmlspecialchars($_POST["usuario"]) : "" ?>">
                    <?php
                    if (isset($usuario) && isset($errores["usuario"])) {
                        echo "<br> {$errores['usuario']}";
                    }
                    ?>
                </p>
                <p>
                    <label for="clave">Contraseña</label><br>
                    <input type="password" name="clave" id="clave">
                    <?php
                    if ($_POST) {
                        if (isset($errores["clave"])) {
                            echo "<br> {$errores['clave']}";
                        }
                    }
                    ?>
                </p>
                <p>
                    <label for="repite_clave">Repite la contraseña</label><br>
                    <input type="password" name="repite_clave" id="repite_clave">
                </p>
                <p>
                    <input type="submit" value="Registrarse">
                </p>
            </form>
        <?php } else { ?>
            <h1>Usuario Registrado</h1>
            <p> <a href="login.php">Ir a login</a> </p>
        <?php } ?>
    </main>

    <footer>
        <small>&copy; sitio web</small>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>