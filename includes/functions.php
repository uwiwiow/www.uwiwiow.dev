<?php

function check_login() {

    if (isset($_SESSION['user_id'])) {

        $con = getDBConnection();

        $stmt = $con->prepare("SELECT * FROM users WHERE user_id = ? limit 1");
        $stmt->bind_param("i", $_SESSION['user_id']);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }

        $stmt->close();
        $con->close();

    }

    // redirect to log in
    header("Location: login.php");
    die;

}

function random_num($length) {
    $text = "";

    if ($length < 5) { $length= 5; }

    $len = rand(4, $length);

    for ($i = 0; $i < $len; $i++) {
        $text .= rand(0,9);
    }

    return $text;
}

function save_user($user_name, $email, $password) {
    try {
        $con = getDBConnection();

        $user_id = random_num(20);
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $con->prepare("INSERT INTO users (user_id, user_name, password, email) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $user_id, $user_name, $hashed_password, $email);

        $stmt->execute();

        // Verificar si hubo un error durante la ejecución de la consulta
        if ($stmt->errno) {
            $error_code = $stmt->errno;

            // Manejar diferentes tipos de errores según el código de error
            if ($error_code == 1062) {
                // Duplicado en índice único
                if (strpos($stmt->error, 'idx_user_id') !== false) {
                    header("Location: signup.php?error=Error interno porfavor intente de nuevo");
                } elseif (strpos($stmt->error, 'idx_user_name') !== false) {
                    header("Location: signup.php?error=Ese nombre de usuario ya esta en uso");
                } elseif (strpos($stmt->error, 'idx_email') !== false) {
                    header("Location: signup.php?error=Esa direccion de correo ya esta en uso");
                } else {
                    // Otro tipo de error duplicado
                    header("Location: signup.php?error=Entrada duplicada. Por favor intente de nuevo");
                }
            } else {
                // Otro tipo de error
                header("Location: signup.php?error=Error en la base de datos");
            }
        } else {
            // Éxito en la ejecución de la consulta
            $stmt->close();
            $con->close();
            header("Location: login.php");
        }
    } catch (Exception $e) {
        header("Location: signup.php?error=Error en el servidor");
    }
}

function load_user($user_name, $password) {
    try {
        $con = getDBConnection();

        $stmt = $con->prepare("SELECT * from users where user_name = ?");
        $stmt->bind_param("s", $user_name);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user_data = $result->fetch_assoc();
            $hashed_password = $user_data['password'];
            if (password_verify($password, $hashed_password)) {

                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: index.php");

            } else {
                $error = urlencode("Contraseña incorrecta");
                header("Location: login.php?error=$error");
            }
        }

        $stmt->close();
        $con->close();

    } catch (Exception $e) {
        $error = urlencode("Sucedió un error inesperado = $e");
        header("Location: login.php?error=$error");
    }
}

function close_session() {
    session_start();

    if (isset($_SESSION['user_id'])) {
        unset($_SESSION['user_id']);
        unset($user_data);
    }

    session_destroy();

    header("Location: login.php");
    exit();
}