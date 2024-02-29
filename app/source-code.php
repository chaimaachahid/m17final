<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Source Code</title>
</head>
<body>
    <?php
    // Lista blanca de archivos permitidos
    $allowed_files = array("file1.php", "file2.php", "file3.php");
    
    // Verificar si se proporciona un parámetro 'page' en la URL y si está en la lista blanca
    if(isset($_GET['page']) && in_array($_GET['page'], $allowed_files)){
        // Obtener el contenido del archivo de manera segura
        $contents = file_get_contents($_GET['page'], true); 
        // Resaltar el código fuente
        highlight_string($contents);
    } else {
        // Si el archivo no está permitido o no se proporciona en la URL, mostrar un mensaje de error
        echo "Archivo no permitido";
    }
    ?>
</body>
</html>
