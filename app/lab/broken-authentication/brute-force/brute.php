<?php

$db = new PDO('sqlite:users.db');
$html = "";

// Definir el número máximo de intentos fallidos antes de bloquear la IP
$max_attempts = 1;

// Obtener la dirección IP del usuario
$ip_address = $_SERVER['REMOTE_ADDR'];

// Comprobar si se han enviado el nombre de usuario y la contraseña
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Verificar si la IP está bloqueada
    $q = $db->prepare("SELECT * FROM blocked_ips WHERE ip_address = :ip");
    $q->execute(array('ip' => $ip_address));
    $result = $q->fetch();

    if ($result) {
        // La IP está bloqueada, mostrar un mensaje
        $html = "Tu dirección IP ha sido bloqueada debido a múltiples intentos fallidos. Por favor, inténtalo más tarde.";
    } else {
        // Intento de inicio de sesión
        $q = $db->prepare("SELECT * FROM users_ WHERE username=:user AND password=:pass");
        $q->execute(array(
            'user' => $_POST['username'],
            'pass' => $_POST['password']
        ));
        $_select = $q->fetch();

        if ($_select) {
            // Inicio de sesión exitoso
            session_start();
            $_SESSION['username'] = $_POST['username'];
            $html = "¡Bienvenido!";
        } else {
            // Inicio de sesión fallido, registrar el intento
            $q = $db->prepare("INSERT INTO login_attempts (username, ip_address) VALUES (:user, :ip)");
            $q->execute(array(
                'user' => $_POST['username'],
                'ip' => $ip_address
            ));

            // Contar los intentos fallidos para esta IP
            $q = $db->prepare("SELECT COUNT(*) as count FROM login_attempts WHERE ip_address = :ip");
            $q->execute(array('ip' => $ip_address));
            $result = $q->fetch();

            if ($result['count'] >= $max_attempts) {
                // Si se supera el número máximo de intentos, bloquear la IP
                $q = $db->prepare("INSERT INTO blocked_ips (ip_address) VALUES (:ip)");
                $q->execute(array('ip' => $ip_address));
                $html = "Tu dirección IP ha sido bloqueada debido a múltiples intentos fallidos. Por favor, inténtalo más tarde.";
            } else {
                // Mostrar un mensaje de contraseña incorrecta
                $html = "Nombre de usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.";
            }
        }
    }
}
?>
