<?php include "db.php"; ?>
<?php include "functions_CRUD_sucursales.php"; ?>

<?php
    if(isset($_POST['submit'])){
        createRow();   
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
            <h1 class="text-center">Crea Nueva Sucursal</h1>
            <form action="Sucursal_Create.php" method="post">
                <div class="form-group">
                    <label for="sNombre">Localidad de la Sucursal</label>
                    <input type="text" name="sNombre" class ="form-control">
                </div>

                <div class="form-group">
                    <label for="sDireccion">Dirección de la Sucursal</label>
                    <input type="text" name="sDireccion" class="form-control">
                </div>

                <div class="form-group">
                    <label for="iTelefono">Teléfono de la Sucursal</label>
                    <input type="text" name="iTelefono" class="form-control">
                </div>

                <input class="btn btn-primary" type="submit" name="submit" value="CREA SUCURSAL">
            </form>
        </div>

    </div>
</body>
</html>