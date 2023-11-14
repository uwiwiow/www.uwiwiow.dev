<?php
session_start();

include("includes/connection.php");
include("includes/functions.php");

$user_data = check_login();

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <title>Descargas</title>
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
<main class="main">
    <section class="resource">
        <h2>Exposicion</h2>
        <a class="a_button" href="assets/downloads/metodo-burbuja.pptx">Descargar</a>
    </section>
    <section class="resource">
        <h2>Excel exposicion</h2>
        <a class="a_button" href="assets/downloads/bubble-sort.xlsm">Descargar</a>
    </section>
</main>
</body>
</html>