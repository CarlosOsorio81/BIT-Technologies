<?php

    $connection = new mysqli('localhost', 'root', '');

    $sucursalesNombre = ['Toluca','Metepec','Zinacantepec','Lerma','San Mateo Atenco'];
    $sucursalesDireccion = ['Independencia 200','Leona Vicario 100','San Luis 200','Av. Industria 300','Albert Einstein 100'];
    $sucursalesTelefono = ['722 2345678','721 9078654','722 6543214','721 6432178','726 0459812'];
    $sucursalesid_Usuario = ['1','2','3','4','5'];

    $inventarioid_Comic = ['1','1','2','2','3'];
    $inventarioCantidad = ['5','10','2','1','30'];
    $inventarioSucursal = ['1','2','3','4','5'];

    $empleadoUsuario = ['1','2','3','4','5'];
    $empleadoSucursal = ['1','2','3','4','5'];

    $usuariosNombre = ['Jose Armando','Javier','Carlos','Edgar','Fito'];
    $usuariosEmail = ['josearmando@comics.com','javier@comics.com','carlos@comics.com','edgar@comics.com','fito@comics.com'];
    $usuariosPassword = ['hello','hola','bonjour','hallo','ciao'];
    $usuariosTipo = ['1','1','0','1','0'];
    
    // Database creation
    $query = "CREATE DATABASE Tiendas_Comics";    
    if ($connection->query($query)) {
        echo "Database created successfully " . "<br>";

        
        // Use Database
        $query = "USE Tiendas_Comics";
        if ($connection->query($query) === TRUE) { echo "Using Database "; } else { echo "Error, not using database " . $connection->error; }

        //Tables creation
        $query = "CREATE TABLE Sucursales (id_Sucursal BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, sNombre VARCHAR(40), sDireccion VARCHAR(100), iTelefono BIGINT, id_Usuario BIGINT);";
        if ($connection->query($query) === TRUE) { echo "Table created successfully"; } else { echo "Error creating table: " . $connection->error; }

        $query = "CREATE TABLE Usuarios (id_Usuarios BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, sNombre VARCHAR(40), sEmail VARCHAR(25), sPassword VARCHAR(16), iType INT);";
        if ($connection->query($query) === TRUE) { echo "Table created successfully"; } else { echo "Error creating table: " . $connection->error; }

        $query = "CREATE TABLE Inventario (id_Comic BIGINT ,iCantidad INT, id_Sucursal BIGINT);";
        if ($connection->query($query) === TRUE) { echo "Table created successfully"; } else { echo "Error creating table: " . $connection->error; }

        $query = "CREATE TABLE Empleado (id_Usuario BIGINT ,id_Sucursal BIGINT);";
        if ($connection->query($query) === TRUE) { echo "Table created successfully"; } else { echo "Error creating table: " . $connection->error; }


        

        for($i = 0; $i < 5; $i++){
            $query = "INSERT INTO Sucursales(sNombre, sDireccion, iTelefono, id_Usuario) VALUE ('$sucursalesNombre[$i]','$sucursalesDireccion[$i]','$sucursalesTelefono[$i]','$sucursalesid_Usuario[$i]')";
            $result = mysqli_query($connection, $query);
            if(!$result){ die("Query Failed" . mysqli_error($connection)); } else{ echo "Record Created"; }
        };
        
        for($i = 0; $i < 5; $i++){
            $query = "INSERT INTO Inventario(id_Comic, iCantidad, id_Sucursal) VALUE ('$inventarioid_Comic[$i]','$inventarioCantidad[$i]','$inventarioSucursal[$i]')";
            $result = mysqli_query($connection, $query);
            if(!$result){ die("Query Failed" . mysqli_error($connection)); } else{ echo "Record Created"; }
        };

        for($i = 0; $i < 5; $i++){
            $query = "INSERT INTO Empleado(id_Usuario, id_Sucursal) VALUE ('$empleadoUsuario[$i]','$empleadoSucursal[$i]')";
            $result = mysqli_query($connection, $query);
            if(!$result){ die("Query Failed" . mysqli_error($connection)); } else{ echo "Record Created"; } echo "Record Created"; 
        };

        for($i = 0; $i < 5; $i++){
            $query = "INSERT INTO Usuarios(sNombre, sEmail, sPassword, iTipo) VALUE ('$usuariosNombre[$i]','$usuariosEmail[$i]','$usuariosPassword[$i]','$usuariosTipo[$i]')";
            $result = mysqli_query($connection, $query);
            if(!$result){ die("Query Failed" . mysqli_error($connection)); } else{ echo "Record Created"; }
        };

        


    } else {
        if($connection->error != "Can't create database 'tiendas_comics'; database exists")
            echo "Error creating database: " . $connection->error;
    }

    $connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>