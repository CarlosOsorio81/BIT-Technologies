<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "php/dbMigration.php"; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel Store</title>


    <link href="css/Bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <link href="css/SingleComic.css" rel="stylesheet">


</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">Tienda de comics</a>
    </nav>

    <div class="container">
        <div class="row">
            <table class="table align-middle">
                <tbody id="marvel-comics-row">
                    
                </tbody>
            </table>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="js/gettingMarvel.js"></script>
</body>
</html>