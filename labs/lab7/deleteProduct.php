<?php
    
    
    include '../../inc/dbConnection.php';
    $db = getDatabaseConnection("ottermart");
    include 'inc/functions.php';
    validateSession();
    
    
    $sql = "DELETE FROM om_product
            WHERE productId = " .$_GET['productId'];
            
    $stmt = $db->prepare($sql);
    $stmt->execute();
        
    header("Location: admin.php");       
?>