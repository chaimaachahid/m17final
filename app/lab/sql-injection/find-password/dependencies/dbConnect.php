<?php
// Incluye el archivo de configuración
include('config1.php');

try { 
    // Conecta a la base de datos utilizando las credenciales del archivo de configuración
    $mysqli = new mysqli($vt_sunucu, $vt_kullanici_adi, $vt_sifre, $vt_adi);
    mysqli_set_charset($mysqli, "utf8");

    // Verifica si hay errores de conexión
    if ($mysqli->connect_errno) {
        echo "Error  " . $mysqli->connect_error;
        exit();
    }
} catch (PDOException $e) {
    echo 'Error de conexión a la base de datos: '.$e;
}
?>
