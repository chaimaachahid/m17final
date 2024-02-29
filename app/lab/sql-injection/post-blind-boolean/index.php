<?php

require("../../../lang/lang.php");
$strings = tr();

// Conexión a la base de datos usando PDO
try {
    $db = new PDO('mysql:host=localhost; dbname=sql_injection', 'sql_injection', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configurar el modo de error para lanzar excepciones
} catch (PDOException $e) {
    // Manejo de errores de conexión
    exit('Error de conexión: ' . $e->getMessage());
}

$result = ""; // Inicializar la variable de resultado

if (isset($_POST['search'])) {
    $search = $_POST['search'];

    try {
        // Consulta preparada para prevenir la inyección SQL
        $query = $db->prepare("SELECT * FROM stocks WHERE name = ?");
        $query->execute([$search]);
        $list = $query->fetch(PDO::FETCH_ASSOC);

        // Verificar si se encontraron resultados
        if (!empty($list['name'])) {
            $result = "true";
        } else {
            $result = "false";
        }
    } catch (PDOException $e) {
        // Manejo de errores de consulta
        exit('Error de consulta: ' . $e->getMessage());
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($strings['title']); ?></title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>

    <div class="container d-flex justify-content-center flex-column">
        <div class="header-wrapper d-flex justify-content-center" style="margin-top: 20vh;">
            <h1><?php echo htmlspecialchars($strings['header']); ?></h1>
        </div>
        <div class="body-wapper d-flex justify-content-center mt-5">
            <form action="#" method="POST">
                <div class=" mt-3 fs-5" style="margin-left: 2px;"><?php echo htmlspecialchars($strings['text']); ?> </div>
                <select class="form-select form-select-lg  mt-2" name="search" style="width: 500px;" id="opt">
                    <option selected><?php echo htmlspecialchars($strings['selected']); ?></option>
                    <option value="iphone11"><?php echo htmlspecialchars($strings['select1']); ?></option>
                    <option value="airpodspro"><?php echo htmlspecialchars($strings['select2']); ?></option>
                    <option value="applewatch7"><?php echo htmlspecialchars($strings['select3']); ?></option>
                    <option value="iphone6s"><?php echo htmlspecialchars($strings['select4']); ?></option>
                    <option value="iphone13"><?php echo htmlspecialchars($strings['select5']); ?></option>
                    <option value="apple20w"><?php echo htmlspecialchars($strings['select6']); ?></option>
                    <option value="ipad9"><?php echo htmlspecialchars($strings['select7']); ?></option>
                    <option value="iphonese"><?php echo htmlspecialchars($strings['select8']); ?></option>
                </select>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-warning mt-5 "><?php echo htmlspecialchars($strings['check']); ?></button>
                </div>
            </form>
        </div>
        <?php

        if (!empty($result)) {
            if ($result == "true") {
                echo '<div class="alert-div d-flex justify-content-center mt-5">
                        <div class="alert alert-success text-center" style="width: 500px;" role="alert">';
                echo htmlspecialchars($strings['success']);
                echo '</div>
                    </div>';
            } else {
                echo '<div class="alert-div d-flex justify-content-center mt-5">
                        <div class="alert alert-danger text-center" style="width: 500px;" role="alert">';
                echo htmlspecialchars($strings['failed']);
                echo '</div>
                    </div>';
            }
        }
        ?>
    </div>
    <script id="VLBar" title="<?= htmlspecialchars($strings['title']); ?>" category-id="2" src="/public/assets/js/vlnav.min.js"></script>
</body>

</html>
