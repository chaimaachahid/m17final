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

    <title><?php echo htmlspecialchars($strings['title']); ?></title>  <!--Afegim htmlspecialchars per evitar errades Cross-site Scripting.-->
</head>

<body>
    <div class="container col-md-4 shadow-lg rounded">
        <div class="d-flex row justify-content-center pt-lg-5 " style="margin-top: 20vh;text-align:center;">
            <div class="alert alert-primary col-md-7 mb-5" role="alert">
            <?php echo htmlspecialchars($strings['text']); ?> <!--Afegim htmlspecialchars per evitar errades Cross-site Scripting.-->
            </div>
            <form action="#" method="get">
                <div class="justify-content-center pb-3"> 
                    <label for="height" class="form-label"><?php echo htmlspecialchars($strings['height']); ?></label>  <!--Afegim htmlspecialchars per evitar errades Cross-site Scripting.-->
                    <input type="text" name="height" id="" class="col-md-5">
                </div>
                <div class="justify-content-center">
                    <label for="base" class="form-label"><?php echo htmlspecialchars($strings['base']); ?></label> <!--Afegim htmlspecialchars per evitar errades Cross-site Scripting.-->
                    <input type="text" name="base" id="" class="col-md-5 ms-3">
                </div>
                <button class="col-md-3 btn btn-primary mb-3 mt-4 row" style="text-align: center;"><?php echo htmlspecialchars($strings['button']); ?></button> <!--Afegim htmlspecialchars per evitar errades Cross-site Scripting.-->
            </form>
        </div>
        <?php
    if (isset($_GET['base']) && isset($_GET['height'])) {
        echo '        <div class=" row justify-content-center text-center pt-lg-4">
        <div class="alert alert-success col-md-5 mb-lg-5" id="answer" role="alert" style="text-align: center;"></div>
    </div>';
        echo '<script>';
        echo 'var height = '.htmlspecialchars($_GET['height']).';';  // Afegim htmlspecialchars per evitar errades Cross-site Scripting.
        echo 'var base = '.htmlspecialchars($_GET['base']).';'; //Afegim htmlspecialchars per evitar errades Cross-site Scripting.
        echo 'var ans = base * height / 2;';
        echo 'document.getElementById("answer").innerHTML = "' . htmlspecialchars($strings['alert']) . '" + ans;'; //Afegim htmlspecialchars per evitar errades Cross-site Scripting.
        echo '</script>';
    }
    ?>
    </div>
    <script id="VLBar" title="<?= htmlspecialchars($strings['title']) ?>" category-id="1" src="/public/assets/js/vlnav.min.js"></script>  <!--Afegim htmlspecialchars per evitar errades Cross-site Scripting.-->
</body>

</html>