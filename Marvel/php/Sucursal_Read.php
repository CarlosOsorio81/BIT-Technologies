<?php include "db.php"?>
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
                    global $connection;
                    $query = "SELECT * FROM Sucursales";
            
                    /*$q_sNombre = "SELECT sNombre FROM Sucursales WHERE id_Sucursal = 'id_Sucursal'";
                    $sNombre = mysqli_query($connection, $q_sNombre);
                    if(!$sNombre){
                        die("Query Failed" . mysqli_error($connection));
                    }   
                    
                    $q_sDireccion = "SELECT sDireccion FROM Sucursales WHERE id_Sucursal = 'id_Sucursal'";
                    $sDireccion = mysqli_query($connection, $q_sDireccion);
                    if(!$sDireccion){
                        die("Query Failed" . mysqli_error($connection));
                    }
                    
                    $q_iTelefono = "SELECT iTelefono FROM Sucursales WHERE id_Sucursal = 'id_Sucursal'";
                    $iTelefono = mysqli_query($connection, $q_iTelefono);
                    if(!$iTelefono){
                        die("Query Failed" . mysqli_error($connection));
                    }*/
            
            
                    $result = mysqli_query($connection, $query);
                    if(!$result){
                        die("Query Failed" . mysqli_error($connection));
                    }   
            
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