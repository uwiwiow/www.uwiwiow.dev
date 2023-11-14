<?php
session_start();

    include("includes/connection.php");
    include("includes/functions.php");

$error_message = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : null;

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($email) && !empty($password)) {
            save_user($user_name, $email, $password);
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Crear cuenta</title>
    <meta charset="utf-8">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/aa75d2ce6c.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</head>
<body class="body">
<header>
    <nav class="nav">
        <ul class="nav__ul">
            <li class="nav__li"><i class="fas fa-home"></i><a href="index.php">Inicio</a></li>
            <li class="nav__li"><i class="fas fa-download"></i><a href="download.php">Descargas</a></li>
            <li class="nav__li"><i class="fas fa-user"></i><a href="profile.php">Perfil</a></li>
            <li class="nav__li"><i class="fas fa-question-circle"></i><a href="help.php">Ayuda</a></li>
            <li class="nav__li_r"><i class="fas fa-cog"></i><a href="settings.php">Ajustes</a></li>
        </ul>
        <ul class="nav__responsive-ul">
            <div class="nav__responsive-button-container">
                <div class="nav__responsive-button fas fa-bars"></div>
            </div>
            <div class="nav__li-container">
                <li class="nav__responsive-li"><i class="fas fa-home"></i><a href="index.php">Inicio</a></li>
                <li class="nav__responsive-li"><i class="fas fa-download"></i><a href="download.php">Descargas</a></li>
                <li class="nav__responsive-li"><i class="fas fa-user"></i><a href="profile.php">Perfil</a></li>
                <li class="nav__responsive-li"><i class="fas fa-question-circle"></i><a href="help.php">Ayuda</a></li>
                <li class="nav__responsive-li"><i class="fas fa-cog"></i><a href="settings.php">Ajustes</a></li>
            </div>
        </ul>
    </nav>
</header>
<div class="resource__access">
    <h2>Crear cuenta nueva</h2>
    <form method="post">
        <label for="user_name">Usuario</label>
        <input type="text"
               id="user_name"
               name="user_name"
               pattern="^[a-zA-Z0-9_-]{3,20}$"
               placeholder="Ingresa tu usuario"
               title="Ingrese un usuario válido (letras, números, guiones bajos y guiones). Debe tener entre 3 y 20 caracteres."
               required>

        <label for="email">Correo electronico</label>
        <input type="email"
               id="email"
               name="email"
               pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
               placeholder="Ingresa tu correo"
               title="Ingrese una dirección de correo electrónico válida."
               required>

        <label for="password">Contraseña</label>
        <input type="password"
               id="password"
               name="password"
               pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$"
               placeholder="Ingresa tu contraseña"
               title="La contraseña debe tener al menos 8 caracteres, incluyendo al menos una letra mayúscula, una letra minúscula y un número."
               required>

        <button class="button" type="submit" value="Signup">Crear cuenta</button>

        <?php if ($error_message): ?>
            <p><?php echo $error_message; ?></p>
        <?php endif; ?>

        <a href="login.php">Iniciar Sesión</a>
    </form>
</div>
</body>
</html>

