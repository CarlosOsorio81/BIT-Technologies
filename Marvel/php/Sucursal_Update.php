<?php include "db.php"; ?>
<?php include "functions_CRUD_sucursales.php";?>

<?php

    if(isset($_POST['submit'])){
        updateTable();
    }

?>

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
        <h1 class="text-center">ACTUALIZA SUCURSAL</h1>
        <form action="Sucursal_Update.php" method="post">
                
                <div class="form-group">
                <label for="id_Sucursal">Clave de Sucursal</label>
                <select name="id_Sucursal" id_Sucursal="">
                    <?php
                        showAllData();
                        while($row = mysqli_fetch_assoc($result)) {
                            $id_Sucursal = $row['id_Sucursal'];
                            echo "<option value='$id_Sucursal'>$id_Sucursal</option>";
                        }
                        ?>
                            <div class="form-group">
                                <label for="sNombre">Localización Sucursal</label>
                                <input type="text" name="sNombre" class ="form-control" id="id_sNombre">
                            </div>

                            <div class="form-group">
                                <label for="sDireccion">Dirección</label>
                                <input type="text" name="sDireccion" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="iTelefono">Teléfono</label>
                                <input type="text" name="iTelefono" class="form-control">
                            </div>
                </select>
                </div>
                
                <?php
                $datosActualizados = [$sNombre,$sDireccion,$iTelefono];
                ?>

                <script>
                    function actualizaForma(e){document.querySelector('#id_sNombre').innerHTML=e; console.log(e);}
                    var java_datosActualizados = <?php json_encode($datosActualizados)?>

                </script>


                <input class="btn btn-primary" type="submit" name="submit" value="ACTUALIZAR">
            </form>
        </div>

    </div>
</body>
</html>