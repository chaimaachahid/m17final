<?php
require("../../../lang/lang.php");
$strings = tr();

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <title><?php echo $strings['title'];  ?></title>
</head>

<body>
  <div class="container d-flex justify-content-center align-items-center h-100 mx-auto">
    <?php

    if (isset($_GET['q'])) {
      $q = $_GET['q'];
      echo '<div class="alert alert-danger" style="margin-top: 30vh;" role="alert" >';
      echo '' . htmlspecialchars($strings['text']) . ' <b>' . htmlspecialchars($q) . '</b> '; //vulnerabilidad
      echo '<a href="index.php">' . htmlspecialchars($strings['try']) . '</a>';//vulnerabilidad

      echo "</div>";
    } else {
      echo '<form method="GET" action="#" style="margin-top: 30vh;" class="row g-3 col-md-6 row justify-content-center mx-auto">';
      echo '<input class="form-control" type="text" placeholder="' . htmlspecialchars($strings['search']) . '" name="q">'; //AQUI VULNERABILIDAD
      echo '<button type="submit" class="col-md-3 btn btn-primary mb-3">' . htmlspecialchars($strings['s_button']) . '</button>'; //AQUI VULNERABILIDAD
      echo '</form>';
    }

    ?>

  </div>

  <script id="VLBar" title="<?= htmlspecialchars($strings['title']) ?>" category-id="1" src="/public/assets/js/vlnav.min.js"></script> 

</body>

</html>