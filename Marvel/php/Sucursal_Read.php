<?php include "functions_CRUD_sucursales.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="col-xs-6">
            <?php
                showAllData();
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <pre>

                    <?php
                    print_r($row);
                    ?>

                    </pre>
                    <?php
                }
            ?>
        </div>

    </div>
</body>
</html>