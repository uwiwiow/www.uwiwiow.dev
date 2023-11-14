<?php
session_start();

    include("includes/connection.php");
    include("includes/functions.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (isset($_POST['Logout'])) {
            close_session();
        }
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <title>Ajustes</title>
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
            <li class="nav__li_r_alt"><i class="fas fa-cog"></i><a href="settings.php">Ajustes</a></li>
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
<main class="main">
    <section class="resource_config">
        <h2>Modo Oscuro</h2>
        <button class="button" onclick="switchTheme()">Activar/Desactivar</button>
    </section>
    <section class="close_session">
        <form method="post">
            <button class="button" type="submit" value="Logout" name="Logout">Cerrar Sesión</button>
        </form>
    </section>
</main>
</body>
</html>