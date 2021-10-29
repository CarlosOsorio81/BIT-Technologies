<?php

$connection = new mysqli('localhost', 'root');

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    } 
    
    $sql = "CREATE DATABASE Tiendas_Comics";
    if ($connection->query($sql) === TRUE) {
        echo "Database created successfully";
        
        $query = "CREATE TABLE Sucursales(
            id_Sucursal bigint auto_increment,
            sNombre VARCHAR(40),
            sDireccion VARCHAR(100),
            iTelefono BIGINT,
            id_Usuario BIGINT,
        
            PRIMARY KEY (id_Sucursal)
        );
        
        CREATE TABLE Usuarios(
            id_Usuarios BIGINT auto_increment,
            sNombre VARCHAR(40),
            sEmail VARCHAR(25),
            sPassword VARCHAR(16),
            iType INT,
        
            PRIMARY KEY(id_Usuarios)
        );
        
        CREATE TABLE Inventario(
            id_Comic BIGINT auto_increment,
            iCantidad INT,
            id_Sucursal BIGINT
        );";
    
    } else {
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