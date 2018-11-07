<?php


    function validateSession(){
        if(!isset($_SESSION['adminFullName'])){
        header("Location: index.php"); //rederict to login
        exit;
    }
    
    }
    
    function displayAllProducts(){
        global $db;
        
        $sql = "SELECT * FROM om_product ORDER BY productName";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records
    
        foreach ($records as $record) {
            
            echo "[<a href='updateProduct.php?productId=" .$record['productId']. "'>Update</a>]";
            //echo "[<a href='deleteProduct.php'>Delete</a>]";
            echo "<form action='deleteProduct.php' onsubmit= 'return confirmSubmit()'>";
            echo "   <input type='hidden' name='productId' value='" .$record['productId']. "'>";
            echo "   <button type='submit'>Delete</button>";
            echo "</form>";
            echo $record['productName'] . "  " . $record[price]   . "<br>";
            
            echo "[<a href='productInfo.php?productId=".$record['productId']."'>".$record['productName']."</a>]  ";
            echo " $" . $record[price]   . "<br><br>";
            
        }
    }
    
    function getCategories() {
        global $db;
        
        $sql = "SELECT * FROM om_category ORDER BY catName";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records   
        
        //print_r($records);
        
        return $records;
        
    }
    
    function getProductInfo($productId){
        global $db;
        
        $sql = "SELECT * FROM om_product WHERE productId =" .$productId;
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records 
        
        return $record;
    }
?>