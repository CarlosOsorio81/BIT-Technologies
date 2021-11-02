<!DOCTYPE html>
<html lang="es-MX">

<head>
  <?php include "php/db.php"; ?>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Registrar</title>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link href="css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/crudStyle.css" rel="stylesheet">
</head>

<body>

  <script>
    class structSucursales {
      constructor(s_id, s_sNombre, s_sDireccion, s_iTelefono){
        this.s_id = s_id;
        this.s_sNombre = s_sNombre;
        this.s_sDireccion = s_sDireccion;
        this.s_iTelefono = s_iTelefono;
      }
    }
    var s_structSucursales = [];
  </script>

  <nav class="navbar navbar-dark bg-dark">
      <a href="index.php" class="navbar-brand">Tienda de comics</a>
  </nav>

  <main id="main">
    <section id="Nuevo_Registro">
      <div class="container-fluid">

        <div class="row">
          <div class="col-lg-1"></div>
          
          <div class="col-lg-5">
            <div class="form">
              <form method="POST" role="form" enctype="multipart/form-data">
                <br>
                <div class="text-center"><h2>Registrar Sucursal</h2></div>

                <div class="row">
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 mt-2">
                    <input type="text" name="nombreSucursal" class="form-control" id="nombreSucursal" placeholder="Nombre de la Sucursal" autocomplete="off" maxlength="20" required>
                  </div>                
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 mt-2">
                    <input type="tel" name="telefonoSucursal" class="form-control" id="telefonoSucursal" placeholder="Numero de Telefono" autocomplete="off" maxlength="12" required>
                  </div>
                </div>

                <div class="form-group mt-2">
                  <textarea class="form-control" name="direccionSucursal" id="direccionSucursal" rows="2" placeholder="Dirección de la sucursal" maxlength="250" required></textarea>
                </div>

                <div class="row">
                  <div class="form-group col-lg-12 col-sm-12">                    
                    <div class="form-group mt-3">
                      <select name = "setGerenteSucursal" id="setGerenteSucursal" class="form-control" required>
                        <option disabled selected>Selecciona un Gerente</option>
                        <?php
                          $query_Ger = "SELECT `id_Usuarios`,`sNombre` FROM `usuarios` WHERE `iTipo` < 2;";
                          $result = $connection->query($query_Ger);
                          if($result->num_rows > 0){ while($row = $result->fetch_assoc()){
                            $idP = $row['id_Usuarios'];
                            $noP = $row['sNombre'];
                            echo "<option value='$idP'>$noP</option>";
                          } }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="my-3">
                  <div class="loading">Cargando</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Tu mensaje ah sido enviado. Gracias!</div>
                </div>
                <div class="text-center"><button type="submit" name="nuevaSucursal">Guardar</button></div>
                <br>
                <?php if(isset($_POST['nuevaSucursal'])){ createRow(); } ?>
              </form>
            </div>
          </div>

          
          <div class="col-lg-5">
            <div class="form">
              <form  method="POST" role="form" enctype="multipart/form-data">
                <br>
                <div class="text-center"><h2>Read/Upload/Delete Sucursal</h2></div>

                <div class="row">
                  <div class="form-group col-lg-12 col-sm-12">                    
                    <div class="form-group mt-3">
                      <select name = "selectSucursal" id="selectSucursal" class="form-control" onchange="actualizarInputs()" required>
                        <option disabled selected>Selecciona Sucursal</option>
                        <?php
                          $query_Ger = "SELECT * FROM `sucursales`;";
                          $result = $connection->query($query_Ger);
                          if($result->num_rows > 0){ while($row = $result->fetch_assoc()){
                            $idP = $row['id_Sucursal'];
                            $noP = $row['sNombre'];
                            $diP = $row['sDireccion'];
                            $teP = $row['iTelefono'];
                            $usP = $row['id_Usuario'];
                            echo "<option value='$idP'>$noP</option>";

                            echo "<script> s_structSucursales.push(new structSucursales('$idP', '$noP', '$diP', '$teP')); </script>";
                          } }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
              </form>


              <script>
                function actualizarInputs(){                  
                  var x = document.getElementById("selectSucursal").value;

                  for(var i = 0; i < s_structSucursales.length; i++){
                    if(x == s_structSucursales[i].s_id){
                      document.getElementById("sucursalId").value = s_structSucursales[i].s_id;
                      document.getElementById("sDireccion").innerHTML = s_structSucursales[i].s_sDireccion;
                      document.getElementById("sNombre").value = s_structSucursales[i].s_sNombre;
                      document.getElementById("iTelefono").value = s_structSucursales[i].s_iTelefono;
                    }
                  }                  
                }
                console.log(s_structSucursales);
              </script>


              <form method="POST" role="form" enctype="multipart/form-data">
                <input type="text" name="sucursalId" class="form-control" id="sucursalId" placeholder="Id de la sucursal" autocomplete="off" maxlength="20" hidden>

                <div class="row">
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 mt-2">
                    <input type="text" name="sNombre" class="form-control" id="sNombre" placeholder="Nombre de la Sucursal" autocomplete="off" maxlength="20" required>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 mt-2">
                    <input type="tel" name="iTelefono" class="form-control" id="iTelefono" placeholder="Numero de Telefono" autocomplete="off" maxlength="12" required>
                  </div>
                </div>

                <div class="form-group mt-2">
                  <textarea class="form-control" name="sDireccion" id="sDireccion" rows="2" placeholder="Dirección de la sucursal" maxlength="250" required></textarea>
                </div>


                <div class="my-3">
                  <div class="loading">Cargando</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Tu mensaje ah sido enviado. Gracias!</div>
                </div>                
                <div class="row">
                  <div class="text-center col-lg-6 col-md-6 col-sm-6 mt-2"><button type="submit" name="actualizarSucursal">Upload</button></div>
                  <div class="text-center col-lg-6 col-md-6 col-sm-6 mt-2"><button type="submit" name="borrarSucursal">Delete</button></div>
                </div>
                <br>
              </form> 


              <form method="POST" role="form" enctype="multipart/form-data">
                <div class="text-center col-lg-12 col-md-12 col-sm-12 mt-2"><button type="submit" name="cargarSucursal">Mostrar Todo</button></div>
              </form>         
              <?php
                if(isset($_POST['cargarSucursal'])){ echo "<script> window.location.replace('php/Sucursal_Read.php'); </script>"; }
                if(isset($_POST['actualizarSucursal'])){ updateTable(); }
                if(isset($_POST['borrarSucursal'])){ deleteRow(); }
              ?>
            </div>
          </div>
          <div class="col-lg-1"></div>
        </div>

      </div>
    </section>    
  </main>
</body>
</html>

<?php

function createRow(){
    global $connection;
    $sNombre = $_POST['nombreSucursal'];
    $sDireccion = $_POST['direccionSucursal'];
    $iTelefono = $_POST['telefonoSucursal'];
    $id_Usuarios = $_POST['setGerenteSucursal'];

    $query = "INSERT INTO Sucursales (sNombre,sDireccion,iTelefono,id_Usuario) VALUE ('$sNombre', '$sDireccion', '$iTelefono', '$id_Usuarios');";
    
    $result = mysqli_query($connection, $query);

    if(!$result){
      echo "<script> alert('Query Failed: ". mysqli_error($connection)."'); </script>"; die("Query Failed" . mysqli_error($connection));
    } else{
      echo "<script> alert('Creado exitosamente'); </script>";
    }
    echo "<script> window.location.replace('CRUD_Sucursales.php'); </script>";
}

function updateTable(){
    global $connection;
    $id_Sucursal = $_POST['sucursalId'];
    $sNombre = $_POST['sNombre'];
    $sDireccion = $_POST['sDireccion'];
    $iTelefono = $_POST['iTelefono'];

    $query = "UPDATE Sucursales SET sNombre = '$sNombre', sDireccion = '$sDireccion', iTelefono = '$iTelefono' WHERE id_Sucursal = '$id_Sucursal'";
    
    $result = mysqli_query($connection, $query);
    if(!$result){
      echo "<script> alert('Query Failed: ". mysqli_error($connection)."'); </script>"; die("Query Failed" . mysqli_error($connection));
    } else{
      echo "<script> alert('Actualizado exitosamente'); </script>";
    }
    echo "<script> window.location.replace('CRUD_Sucursales.php'); </script>";
}

function deleteRow(){
    global $connection;       
    $id_Sucursal = $_POST['sucursalId'];

    $query = "DELETE FROM Sucursales WHERE id_Sucursal = '$id_Sucursal'";
    
    $result = mysqli_query($connection, $query);    
    if(!$result){
      echo "<script> alert('Query Failed: ". mysqli_error($connection)."'); </script>"; die("Query Failed" . mysqli_error($connection));
    } else{
      echo "<script> alert('Borrado exitosamente'); </script>";
    }
    echo "<script> window.location.replace('CRUD_Sucursales.php'); </script>";
}

?>