<?php
session_start();

include "functions.php";
$dbConn = getDatabaseConnection("webAssets");

function displayMan(){
    global $dbConn;
        
    
    $sql = "SELECT * FROM manufacturer WHERE 1";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    
    //Output results
    echo "<table class='table' align='center'>";
    echo "<tr>";
    echo "<th> Name</th>";
    echo "<th> Address </th>";
    echo "<th> Phone Number </th>";
    echo "<th> Website </th>";
    echo "</tr>";
    foreach($records as $record){
        
        echo "<tr>";
        echo "<td><h4>" .$record['manName']. "</h4></td>";
        echo "<td><h4>" .$record['manAddress']. "</h4></td>";
        echo "<td><h4>" .$record['manPhone']. "</h4></td>";
        echo "<td><h4><a href='" .$record['manURL']. "'>" .$record['manURL']. "</a></h4></td>";
        echo "</tr>";
    }
    
    echo "</table>";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Manufacturers </title>
        
        <!--Includes-->
        
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script> 
        

        
    </head>
        <h3 id='title'>Manufacturers</h3>
        <nav>
            <a href='index.php'>Search</a>
            <a href='login.php'>Login</a>
            <hr width="75%"/>
        </nav>
    <body>
        
        <?= displayMan(); ?>
    </body>
</html>