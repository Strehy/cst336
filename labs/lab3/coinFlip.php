<?php
    session_start(); //start or resume an existing session
    
    if(!isset($_SESSION["heads"])){
        $_SESSION["heads"] = 0;
        $_SESSION["tails"] = 0;
        $_SESSION["history"] = array();
    }
    
    function flip(){
        $coin = rand(0,1);
        
        if($coin == 0)
        {
            $_SESSION["heads"]++;
            $_SESSION["history"][] = "H";
        }
        else{
            $_SESSION["tails"]++;
            $_SESSION["history"][] = "T";
        }
    }


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Coin Flip </title>
    </head>
    <body>
        <h1>Welcome to Coin Flip</h1>
        <br>
        <br>
        <?php flip(); ?>
        <h3>Heads:<?= $_SESSION["heads"] ?></h3>
        <br>
        <h3>Tails:<?= $_SESSION["tails"] ?></h3>
        
        <?php print_r($_SESSION["history"]) ?>
    </body>
</html>
