<?php

    include "../../inc/dbConnection.php";
    
    $db = getDatabaseConnection('ottermart');
    
    function displayProductInfo(){
        global $db;
        
        $productId = $_GET['productId'];
        
        $sql = "SELECT * FROM `om_product` 
        NATURAL LEFT JOIN om_purchase
        WHERE productId = $productId";
        
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<img src='" .$records[0]['productImage']. "' witdh=150 />";
        
        echo "<table>";
        foreach($reocds as $record){
            echo "<tr>";
            echo "<td>" .$record['quantity']. "</td>";
            echo "<td>" .$record['unitPrice']. "</td>";
            echo "<td>" .$record['purchaseDate']. "</td>";
            echo "</tr>";
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