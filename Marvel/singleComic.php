<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $connection = mysqli_connect('localhost','root','','Tiendas_Comics');
        if(!$connection){ die("Database Connection Failed"); }

        $id = $_GET['id'];
    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Comic Info</title>

    
    <link href="css/Bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/SingleComic.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">Tienda de comics</a>
    </nav>

    <br><br>

    <div class="container">
        <div class="row">


            <div class="card md-8">
                <div class="row g-0" id="single-comic-row">
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title">Titulo</h5>
                            <p class="card-text">ID: <?php echo $id; ?> </p>
                            <p class="card-text">Volumen: </p>
                            <p class="card-text">Fecha de lanzamiento: </p>
                            <p class="card-text">Páginas: </p>
                            <p class="card-text">Descripción: </p>


                            <details>
                                <summary>Disponibilidad en sucursales: </summary>
                                <div class="details-content">
                                
                                    <ol class="list-group list-group-numbered" id="tiendas-disponibles">
                                        <?php
                                            $query = "SELECT `iCantidad`,`sNombre`,`sDireccion`,`iTelefono` FROM inventario AS i RIGHT JOIN sucursales AS s ON i.id_Sucursal = s.id_Sucursal WHERE iCantidad > 0 AND id_Comic = $id ORDER BY i.id_Sucursal";
                                            $result = $connection->query($query);
                                            if($result->num_rows > 0){ while($row = $result->fetch_assoc()){
                                                $cantidad = $row['iCantidad'];
                                                $nombreLocal = $row['sNombre'];
                                                $direccionLocal = $row['sDireccion'];
                                                $telefonoLocal = $row['iTelefono'];
                                                ?>

                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold"><?php echo $nombreLocal; ?></div>
                                                        Direction: <?php echo $direccionLocal; ?>
                                                        <br>
                                                        Phone: <?php echo $telefonoLocal; ?>
                                                    </div>
                                                    <span class="badge bg-primary rounded-pill"><?php echo $cantidad;?> Available</span>
                                                </li>

                                                <?php
                                            } }
                                        ?>
                                    </ol>
                                
                                </div>
                            </details>


                            <p class="card-text float-end"><small class="text-muted"><a href="#">Pagina Oficial</a></small></p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>               

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
    <script src="js/gettingSingleComic.js"></script>
</body>
</html>