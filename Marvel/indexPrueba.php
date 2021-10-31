<?php include "php/dbMigration.php";
    $connection = mysqli_connect('localhost','root','','Tiendas_Comics');
    if(!$connection){ die("Database Connection Failed"); }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel Store</title>


    <link href="css/Bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
        <a href="#" class="navbar-brand">Tienda de comics</a>
    </nav>

    <div class="container">
        <div class="row">
            <table class="table align-middle">
                <tbody id="marvel-comics-row">
                    
                </tbody>
            </table>
        </div>
    </div>



    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="single-comic-row-modal">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae sint, officiis molestias sed error, cumque illo magni hic esse nisi iste laboriosam accusantium voluptas quam accusamus? Error deleniti labore quisquam!
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="js/gettingMarvel.js"></script>
    <script>        
        var myModal = document.getElementById('myModal');
        var myInput = document.getElementById('myInput');
        myModal.addEventListener('shown.bs.modal', function () { myInput.focus(); console.log('Hola: '+myModal.id); })
    </script>
</body>
</html>