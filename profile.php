<?php
session_start();

include("includes/connection.php");
include("includes/functions.php");

$user_data = check_login();

$error_message = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : null;
$message = isset($_GET['ready']) ? htmlspecialchars($_GET['ready']) : null;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/aa75d2ce6c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
<!--TODO cambiar estilos-->

<main class="profile">
    <section class="resource_config">
        <p style="color: var(--fg3)">hello <?php echo $user_data['user_name'] ?>!</p>
        <img src="uploads/<?php echo $user_data['profile_picture'] ?>" alt="Profile picture" width="100vh" height="100vh" style="border-radius: 50%">
    </section>

    <h2 style="color: var(--fg3)">Subir Foto de Perfil</h2>

    <form id="profilePictureForm" action="form_scripts/profile_picture.php" method="post" enctype="multipart/form-data">
        <label for="profilePicture" style="color: var(--fg3)">Selecciona una foto de perfil:</label>
        <input type="file" name="profilePicture" id="profilePicture" style="color: var(--fg3)" accept="image/*">
    </form>

    <?php if ($error_message): ?>
        <p style="color: var(--fg2)"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <?php if ($message): ?>
        <p style="color: var(--fg3)"><?php echo $message; ?></p>
    <?php endif; ?>
</main>

</body>
</html>
