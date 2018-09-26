<?php
    $symbols = array("seven");
    $indexes = array();
    
    $points = array("orange" =>250, "cherry" => 500);
    $points["seven"] = 1000;
    
    array_push($symbols, "orange", "grapes");
    displayArray($symbols);
    
    $symbols[2] = "cherry";
    //print_r($symbols);
    displayArray($symbols);
    echo "<br/><br />";
    
    displayElement($symbols, $indexes);
    echo "<br/><br />";
    totalPoints($indexes);
    
    
    function displayArray($symbols){
        echo "<hr>";
        
        for($i = 0; $i < count($symbols) - 1; $i++)
        {
            echo $symbols[$i].", ";
        }
        echo $symbols[count($symbols)-1];
    }
    
    function displayElement($symbols, $indexes){
        
        for($i = 0; $i < 3; $i++){
            $rand = rand(0, count($symbols) - 1);
            echo "<img src = \"../lab2/img/".$symbols[$rand].".png\" alt = ".$symbols[$rand]." />";
            $indexes[] = $rand;
        }
    }
    
    function totalPoints($indexes){
        if($indexes[0] == $indexes[1] && $indexes[1] == $indexes[2]){
        
        echo "You received a total of: ".$points[$symbols[$indexes[0]]]."!";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    </body>
</html>
