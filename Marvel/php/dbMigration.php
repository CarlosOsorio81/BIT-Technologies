<?php

    $connection = new mysqli('localhost', 'root', '');
  
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


     } else {
        if($connection->error != "Can't create database 'tiendas_comics'; database exists")
            echo "Error creating database: " . $connection->error;
    }

    $connection->close();
?>