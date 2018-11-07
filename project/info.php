<?php
session_start();
//include 'inc/dbConnection.php';
//$dbConn = startConnection("project2");
include 'functions.php';

echo $_POST['itemId'];
if (isset($_GET['itemId'])) {

  $itemInfo = showInfo($_GET['itemId']);    
  //print_r($productInfo);
    
}


?>

<!DOCTYPE html>
<html>
    <head>
                <link href="css/style.css" rel="stylesheet" type="text/css"/>
                 <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <title> Product Info </title>
    </head>
    
    <body id = 'info_body'>
        <ul>
                <li><a href="index.php">Home</a></li>
                
                <!--<span class='glyphicon glyphicon-shooping-cart' aria-hidden='true'>-->
                <li><a href="cart.php">Cart</a></li>
                <li><a href = "explanation.php">Explanation</a></li>
            </ul>
    
    <h3><?=$itemInfo['name']?></h3>
     <?=$itemInfo['description']?><br>
     <img src='<?=$itemInfo['image']?>' height='200'/>
 
    </body>
</html>