<?php

session_start(); //start or resume an existing session

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        My name is <?= $_SESSION["my_name"] ?>

    </body>
</html>