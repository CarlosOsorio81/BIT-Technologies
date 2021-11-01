<?php include "db.php"; ?>
<?php

function createRow(){
    global $connection;

    $sNombre = $_POST['sNombre'];
    $sDireccion = $_POST['sDireccion'];
    $iTelefono = (INT) $_POST['iTelefono'];

    $query = "INSERT INTO Sucursales (sNombre,sDireccion,iTelefono) VALUE ('$sNombre', '$sDireccion', '$iTelefono');";

    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Query Failed" . mysqli_error($connection));
    } else{
        echo "Record Created";
    }
}


function showAllData(){
        global $connection;
        global $result;
        global $sNombre, $sDireccion, $iTelefono;
        $query = "SELECT * FROM Sucursales";

        $q_sNombre = "SELECT sNombre FROM Sucursales WHERE id_Sucursal = 'id_Sucursal'";
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
        }


        $result = mysqli_query($connection, $query);
        if(!$result){
            die("Query Failed" . mysqli_error($connection));
        }   
}

function updateTable(){
    global $connection;
        $sNombre = $_POST['sNombre'];
        $sDireccion = $_POST['sDireccion'];
        $iTelefono = $_POST['iTelefono'];
        $id_Sucursal = $_POST['id_Sucursal'];

        $query = "UPDATE Sucursales SET sNombre = '$sNombre', sDireccion = '$sDireccion', iTelefono = '$iTelefono' WHERE id_Sucursal = '$id_Sucursal'";
        
        $result = mysqli_query($connection, $query);
        if(!$result){
            die("Query Failed" . mysqli_error($connection));
        } else {
            echo "Record Updated";
        }
}

function deleteRow(){
    global $connection;
       
        $id_Sucursal = $_POST['id_Sucursal'];

        $query = "DELETE FROM Sucursales WHERE id_Sucursal = '$id_Sucursal'";
        
        $result = mysqli_query($connection, $query);
        if(!$result){
            die("Query Failed" . mysqli_error($connection));
        } else {
            echo "Record Deleted";
        }
}
?>