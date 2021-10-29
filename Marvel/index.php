<?php include "dbMigration.php" ?> 

<?php

$connection = mysqli_connect('localhost','root','','Tiendas_Comics');

if(!$connection){
    die("Database Connection Failed");
}








mysqli_close($connection);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel Store</title>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


</head>
<body>
        
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex justify-content-between">
            <nav id="navbar" class="navbar">

                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Log In</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">User</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Account</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Log Out</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Shopping Car</a>
                    </li>
                </ul>

            </nav>
        </div>
    </header>

    <section id="hero" class="clearfix">
        <div class="container" data-aos="fade-up">

        <div class="hero-img" data-aos="zoom-out" data-aos-delay="200">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="https://www.xtrafondos.com/wallpapers/resized/spider-man-ps4-3452.jpg?s=large" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="https://www.xtrafondos.com/wallpapers/resized/spider-man-ps4-3452.jpg?s=large" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="https://www.xtrafondos.com/wallpapers/resized/spider-man-ps4-3452.jpg?s=large" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="hero-info" data-aos="zoom-in" data-aos-delay="100">
            <h2>¡Creando<br><span>entrenenimiento</span><br>para todos!</h2>
            <div>
            <a href="#about" class="btn-get-started scrollto">Conocer mas</a>
            </div>
        </div>

        </div>
    </section>


    
</body>
</html>