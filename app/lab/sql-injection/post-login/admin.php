<?php
include("../../../lang/lang.php");
$strings = tr();

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en"
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container"><?php
include("../../../lang/lang.php");
$strings = tr();

session_start();

// Verificar si el usuario está autenticado, de lo contrario redirigir a la página de inicio de sesión
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

// Evitar ataques de secuencias de escape en la entrada del usuario
function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

// Datos del usuario (simulados)
$userData = array(
    'name' => 'LeBron James',
    'role' => 'Web Designer',
    'email' => 'laburanjames@gmail.com',
    'phone' => '+90 999 999 99 99',
    'recentProject' => 'Basketball Team',
    'bestScore' => 'Undifined'
);

// Sanitizar datos del usuario
foreach ($userData as $key => $value) {
    $userData[$key] = sanitizeInput($value);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 mt-5 pt-5">
                <div class="row z-depth-3">
                    <div class="col-sm-4 bg-info rounded-left">
                        <div class="card-blok text-center text-white">
                            <i class="fas fa-user-tie fa-7x mt-5"></i>
                            <h2 class="font-weight-bold mt-4"><?php echo $userData['name']; ?></h2>
                            <p><?php echo $userData['role']; ?></p>
                        </div>
                    </div>
                    <div class="col-sm-8 bg-white rounded-right">
                        <h3 class="mt-3 text-center">Information</h3>
                        <hr class="badge-primary mt-0 w-25">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Email:</p>
                                <h6 class="text-muted"><?php echo $userData['email']; ?></h6>
                            </div>
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Phone:</p>
                                <h6 class="text-muted"><?php echo $userData['phone']; ?></h6>
                            </div>
                        </div>
                        <h4 class="mt-3">Projects</h4>
                        <hr class="bg-primary">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Recent:</p>
                                <h6 class="text-muted"><?php echo $userData['recentProject']; ?></h6>
                            </div>
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Best Score</p>
                                <h6 class="text-muted"><?php echo $userData['bestScore']; ?></h6>
                            </div>
                        </div>
                        <hr class="bg-primary">
                        <ul class="list-unstyled d-flex justify-content-center mt-4">
                            <li><a href="#"><i class="fab fa-facebook-f px-3 h4 text-info"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube px-3 h4 text-info"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter px-3 h4 text-info"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="logout mt-3 d-flex justify-content-center">
                    <!-- Enlace para cerrar sesión -->
                    <a href="logout.php" class="btn btn-info btn-lg">
                        <span class="glyphicon glyphicon-log-out"></span> Log out
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

                            <li><a href="#"><i class="fab fa-twitter px-3 h4 text-info"></i></a></li>
                        </div>
                </div>
                <div class="logout mt-3 d-flex justify-content-center">
                <a href="index.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>
                

                </div>
            </div>

            

        </div>


    </div>
    <script id="VLBar" title="<?= $strings['title'] ?>" category-id="2" src="/public/assets/js/vlnav.min.js"></script>
    
    
</body>
</html>