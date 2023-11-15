<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profilePicture"])) {
    $targetDir = "../uploads/"; // Directorio donde se almacenarán las fotos
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($_FILES["profilePicture"]['name'],PATHINFO_EXTENSION));
    $targetFile = $targetDir . $_SESSION['user_id'] . '.' . $imageFileType;
    $file_name = $_SESSION['user_id'] . '.' . $imageFileType;
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $tipo_mime = finfo_file($finfo, $_FILES['profilePicture']['tmp_name']);

    if (strpos($tipo_mime, 'image') !== false) {
        $uploadOk = 1;
    } else {
        $message = urlencode("El archivo no es una imagen.");
        header("Location: ../profile.php?error=$message");
        $uploadOk = 0;
    }

    finfo_close($finfo);

    // Verificar tamaño máximo
    if ($_FILES["profilePicture"]["size"] > 30000000) {
        $message = urlencode("El archivo es demasiado grande.");
        header("Location: ../profile.php?error=$message");
        $uploadOk = 0;
    }

    // Si todas las verificaciones son exitosas, intenta subir el archivo
    if ($uploadOk == 1) {
            try {

                include('../includes/connection.php');

                $con = getDBConnection();

                $stmt = $con->prepare("SELECT * FROM users WHERE user_id = ? limit 1");
                $stmt->bind_param("i", $_SESSION['user_id']);

                $stmt->execute();

                $result = $stmt->get_result();
                $user_data = $result->fetch_assoc();
                $filePath = '../uploads/' . $user_data['profile_picture'];
                $default = 'default.png';

                if ($result->num_rows > 0) {
                    if (file_exists($filePath) && $user_data['profile_picture'] != $default) {
                        unlink($filePath);
                    }
                }

                $stmt = $con->prepare("update users set profile_picture = ? where user_id = ?");

                if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $targetFile)) {
                    $stmt->bind_param("si", $file_name, $_SESSION['user_id']);
                    $stmt->execute();

                    $stmt->close();
                    $con->close();
                    $message = urlencode("Subido correctamente.");
                    header("Location: ../profile.php?ready=$message");
                } else {
                    $stmt->bind_param("si", $default, $_SESSION['user_id']);
                    $stmt->execute();

                    $stmt->close();
                    $con->close();
                    $message = urlencode("Ocurrió un error al subir tu archivo.");
                    header("Location: ../profile.php?error=$message");
                }
                die;

            } catch (Exception $e) {
                $message = urlencode("Error en el servidor = $e");
                header("Location: ../profile.php?error=$message");
            }

    }
}