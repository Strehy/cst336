<?php

    function makeList($startYear, $endYear, $rows, $columns){
        
        $sum = 0;
        
        $animal = 0;
        
        $zodiac[] = array("rat", "ox", "tiger", "rabbit", "dragon", "snake","horse", "goat", "monkey", "dog", "pig");
        
        for($i= $startYear; $i <= $endYear; $i+=4){
            
            echo "<li>Year " .$i;
            
            if($i == 1776){
                echo "<strong> USA INDEPENDENCE </strong>";
            }
            if(($i % 100) == 0){
                echo "<strong> HAPPY NEW CENTURY </strong>";
            }
            if($i >= 1900){
                
                echo "<img src= 'img/" .$zodiac[0]. ".png' alt= '" .$zodiac[$animal]. "' />";
                
                //reset Animals
                if($animal == 11){
                    $animal = 0;
                }
                else {
                    $animal++;
                }
            }
            
            $sum += $i;
            
            echo "</li> <br />";
        }
        
        echo "<h2>Year Sum: " .$sum. " </h2>";
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Zodiac </title>
    </head>
    <body>
        <h1> Chinese Zodiac Years</h1>
        
        <ul>
        <?= makelist($_GET['startYear'], $_GET['endYear'], $_GET['rows'], $_GET['columns']); ?>
        </ul>
        
        <form>
            <h3>Enter a Start Year</h3><input type="text" name="startYear"/><br />
            <h3>Enter an End Year</h3><input type="text" name="endYear"/><br />
            <h3>Enter Number of Rows</h3><input type="text" name="rows"/><br />
            <h3>Enter Number of Columns</h3><input type="text" name="columns"/><br />
            <input type="submit" name="submit"/>
        </form>
        
    </body>
</html>