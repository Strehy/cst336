<!DOCTYPE html>
<!-- PHP functions -->
<?php
    function getRandNum(){
        $randNum = rand(1,10);
        while ($randNum == 4){
            $randNum = rand(1,10);
        }
        echo $randNum;
    }
    
    function getRandColor() {
        $r = rand(0,255);
        $g = rand(0,255);
        $b = rand(0,255);
        $a = rand(0,10)/10;
        
        echo "rgba($r,$g,$b,$a)";
        
    }
?>

<html>
    <head>
        <title>Review </title>
        <Style>
        
            body{
                background-color:<?php getRandColor() ?>    
            }
            
            h3 {
                color:<?php getRandColor() ?> ;
            }
            
        </Style>
    </head>
        <h3>My Lucky number is: <?php getRandNum() ?></h3>
    </body>
</html>