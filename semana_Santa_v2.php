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

        if($Days_Into_Cycle < 15){
            $fool_moon = 15-$Days_Into_Cycle; 
            //echo 15-$Days_Into_Cycle;

        }   else {
            $fool_mooon= $Days_Into_Cycle-15;
            //echo $Days_Into_Cycle-15;
        }    

        $convertDate = strval($month . "/" . $day . "/" . $year);
        $date = date('l', strtotime($convertDate));
        //echo "<br>" . $date;

        $daysWeek =["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

        $datenumber = 0;

        Switch($date){
            case "Monday":
                $datenumber = 1;
            break;
            case "Tuesday":
                $datenumber = 2;
            break;
            case "Wednesday":
                $datenumber = 3;
            break;
            case "Thursday":
                $datenumber = 4;
            break;
            case "Friday":
                $datenumber = 5;
            break;
            case "Saturday":
                $datenumber = 6;
            break;
            case "Sunday":
                $datenumber = 7;
            break;
        }

        $semanaSantaDay = (int) $fool_moon + $datenumber;

        if($semanaSantaDay > 7){
            $semanaSantaDay = (int) $semanaSantaDay - 7;
        }
        
        //echo "<br>" . $semanaSantaDay;

        
        $date_future = strtotime('+'.$semanaSantaDay.' days', strtotime($convertDate));
        $date_future = date ('Y-m-d', $date_future);
        $otherDate = date('l', strtotime($date_future));
        echo "<br>Luna llena: " . $date_future;

        if($otherDate != "Sunday"){
            $date_future = strtotime('next Sunday', strtotime($date_future));
            $date_future = date ('Y-m-d', $date_future);
        }
        echo "<br>Inicia semana santa: " . $date_future;


        
        $date_future2 = strtotime('next Sunday', strtotime($date_future));
        $date_future2 = date ('Y-m-d', $date_future2);
        echo "<br>Termina semana santa: " . $date_future2;

        
        $date_future2 = strtotime('-40 days', strtotime($date_future));
        $date_future2 = date ('Y-m-d', $date_future2);
        echo "<br>Miercoles de ceniza: " . $date_future2;

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
        <h1 class="text-center">Calculo de Semana Santa</h1>
        <form action="semana_Santa.php" method="post">
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