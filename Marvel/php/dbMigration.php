<?php

$connection = new mysqli('localhost', 'root', '');
  
    // Database creation
    $query = "CREATE DATABASE IF NOT EXISTS Tiendas_Comics";
    
    if ($connection->query($query) === TRUE) {
        echo "Database created successfully " . "<br>";
     } else {
        echo "Error creating database: " . $connection->error;
    }

    // Use Database
    $query = "USE Tiendas_Comics";

    if ($connection->query($query) === TRUE) {
        echo "Using Database";
      } else {
        echo "Error, not using database" . $connection->error;
      }

    //Tables creation
    $query = "CREATE TABLE Sucursales (id_Sucursal BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, sNombre VARCHAR(40), sDireccion VARCHAR(100), iTelefono BIGINT, id_Usuario BIGINT);";
    
    if ($connection->query($query) === TRUE) {
        echo "Table created successfully";
      } else {
        echo "Error creating table: " . $connection->error;
      }

    $query = "CREATE TABLE Usuarios (id_Usuarios BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, sNombre VARCHAR(40), sEmail VARCHAR(25), sPassword VARCHAR(16), iType INT);";
  
      if ($connection->query($query) === TRUE) {
          echo "Table created successfully";
        } else {
          echo "Error creating table: " . $connection->error;
        }

    $query = "CREATE TABLE Inventario (id_Comic BIGINT ,iCantidad INT, id_Sucursal BIGINT);";

    if ($connection->query($query) === TRUE) {
        echo "Table created successfully";
      } else {
        echo "Error creating table: " . $connection->error;
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