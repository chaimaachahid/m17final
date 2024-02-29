<?php 
require("../../../lang/lang.php");
$strings = tr();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($strings['kayit']); ?></title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <style>
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <script id="VLBar" title="<?= htmlspecialchars($strings['kayit']); ?>" category-id="2" src="/public/assets/js/vlnav.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <?php
    if(isset($_REQUEST['delete']) and $_REQUEST['delete'] == 1)
    {
        if(isset($_REQUEST['search']))
        {
            unset($_REQUEST['search']);
        }
    }
    include('dependencies/dbConnect.php');
    global $mysqli;
    ?> 

    <main>
        <div class="container" style="padding: 60px;">
            <div class="container-fluid">
                <h1 class="mt-4"><?php echo htmlspecialchars($strings['kayit']); ?></h1>
                <div class="form-group">
                    <span></span>
                </div>
                <div class="row">
                    <div class="col-4">
                        <form method="GET">
                            <input type="text" placeholder="<?php echo htmlspecialchars($strings['search']); ?>" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" name="search" >
                            <button class="btn btn-primary" type="submit"><?php echo htmlspecialchars($strings['search']); ?></button>
                        </form>
                    </div>
                    <div class="col-8">
                        <form method="GET">
                            <button class="btn btn-primary" type="submit" style="margin-left:-90px"><?php echo htmlspecialchars($strings['reset']); ?></button>         
                            <!-- <input placeholder="Delete" style="display:none" value="1" name="delete"> -->
                        </form>
                    </div>
                </div>
                <div class="mt-4">
                    <fieldset>
                        <div class="form-group">
                            <div class="">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th><?php echo htmlspecialchars($strings['username']); ?></th>
                                                <th><?php echo htmlspecialchars($strings['email']); ?></th>
                                                <th><?php echo htmlspecialchars($strings['name']); ?></th>
                                                <th><?php echo htmlspecialchars($strings['surname']); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(isset($_GET['search']) && !empty($_GET['search'])) {
                                                $search = htmlspecialchars($_GET['search']);
                                                $query = $mysqli->prepare("SELECT * FROM users WHERE name LIKE ?");
                                                $searchParam = "%$search%";
                                                $query->bind_param("s", $searchParam);
                                                $query->execute();
                                                $result = $query->get_result();
                                            } else {
                                                $result = $mysqli->query("SELECT * FROM users");
                                            }

                                            while($list = $result->fetch_assoc()) {
                                                echo '<tr>';
                                                echo '<td>' . htmlspecialchars($list['id']) . '</td>';
                                                echo '<td>' . htmlspecialchars($list['username']) . '</td>';
                                                echo '<td>' . htmlspecialchars($list['email']) . '</td>';
                                                echo '<td>' . htmlspecialchars($list['name']) . '</td>';
                                                echo '<td>' . htmlspecialchars($list['surname']) . '</td>';
                                                echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
