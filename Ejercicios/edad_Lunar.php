<?php

    if(isset($_POST['submit'])){
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        
        $A = $year/100;
        $B = $A/4;
        $C = 2-$A+$B;
        $E = 365.25*($year + 4716);
        $F = 30.6001*($month + 1);
        $JD = $C + $day + $E + $F - 1524.5;
        
        $Day_Since_New = $JD - 2451549.5;
        $New_Moons = $Day_Since_New/29.53;
        $floatingRes = $Day_Since_New/29.53 - floor($Day_Since_New/29.53);

        $Days_Into_Cycle = $floatingRes*29.53;

        
        echo "La Edad Lunar es: " . $Days_Into_Cycle . "<br>";

        if(3.5 > $Days_Into_Cycle){
            echo "Luna Nueva <br>";
        } elseif(3.5 <= $Days_Into_Cycle && 10.5 > $Days_Into_Cycle){
            echo "Cuarto Creciente <br>";
        } elseif(10.5 <= $Days_Into_Cycle && 17.5 > $Days_Into_Cycle){
            echo "Luna Llena <br>";
        } elseif(17.5 <= $Days_Into_Cycle && 24.5 > $Days_Into_Cycle){
            echo "Cuarto Menguante <br>";
        } else {
            echo "Luna Nueva <br>";
        }
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
        <h1 class="text-center">Calculo de la Edad Lunar</h1>
        <form action="edad_Lunar.php" method="post">
                <div class="form-group">
                    <label for="text">Día</label>
                    <input type="text" name="day" class ="form-control">
                    <br>
                    <label for="text">Mes</label>
                    <input type="text" name="month" class ="form-control">
                    <br>
                    <label for="text">Año</label>
                    <input type="text" name="year" class ="form-control">
                </div>
                <input class="btn btn-primary" type="submit" name="submit" value="SUBMIT">
            </form>
        </div>

    </div>
</body>
</html>