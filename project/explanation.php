<?php
include "functions.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <title>Explanation</title>
    </head>
    
    <ul>
            <li><a href="index.php">Home</a></li>
            
            <!--<span class='glyphicon glyphicon-shooping-cart' aria-hidden='true'>-->
            <li><a href="cart.php">Cart</a></li>
            <li><a class="active" href = "explanation.php">Explanation</a></li>
    </ul> 
    <body id = "explain_body">
        <h1 id = 'genre_explain'>Genre Explanation</h1>
        <?php
        explain();
        ?>
    </body>
</html>