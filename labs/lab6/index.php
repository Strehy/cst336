<?php
    
    include "../../inc/dbConnection.php";
    
    $db = getDatabaseConnection('ottermart');
    
    function displayCategories(){
        
        global $db;
        
        $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record){
            echo "<option value='" .$record['catId']. "'>" .$record['catName']."</option><br />";
        }
    }
    
    function displaySeachResults(){
        
        global $db;
        
        if(isset($_GET['searchForm'])){
            
            echo "<h3>Products Found: </h3>";
            
            $namedParameters = array();
            
            $sql = "SELECT * FROM om_product WHERE 1";
            
            //Check input fields
            if(!empty($_GET['product'])){
                $sql .= " AND productName OR productDescription LIKE :productName";
                $namedParameters[':productName'] = "%" .$_GET['product']. "%";
            }
            
            if(!empty($_GET['category'])){
                $sql .= " AND catId = :category";
                $namedParameters[':category'] = $_GET['category'];
            }
            
            if(!empty($_GET['priceFrom'])){
                $sql .= " AND price >= :priceFrom";
                $namedParameters[':priceFrom'] = $_GET['priceFrom'];
            }
            
            if(!empty($_GET['priceTo'])){
                $sql .= " AND price <= :priceTo";
                $namedParameters[':priceTo'] = $_GET['priceTo'];
            }
            
            if(isset($_GET['orderBy'])){
                if($_GET['orderBy'] == 'price'){
                    $sql .= " ORDER BY price";
                }
                else{
                    $sql .= " ORDER BY productName";
                }
            }
            
            $stmt = $db->prepare($sql);
            $stmt->execute($namedParameters);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            //Output results
            echo "<ul>";
            foreach($records as $record){
                
                echo "<li>";
                echo "<a href=\"productHistory.php?productId=" .$record['productId']. "\"> History </a>";
                
                echo $record["productName"] . " " . $record["productDescription"] . " $" . 
                     $record["price"];
                echo "</li>";
            }
            echo "</ul>";
        }
    }
?>



<!DOCTYPE html>
<html>
    <head>
        <title> Otter Mart </title>
        <style>
            
            form, header {
                text-align: center;
            }
            header {
                background-color: lightgrey;
                height: 45px;
                margin: auto;
            }
            
        </style>
    </head>
    <body>
        <div>
            <header><h1> OtterMart Product Search </h1></header>
            <br /> <br / >
            
            <div id='form'>
            <form>
                <strong>Product: </strong><input type="text" name="product"/> 
                <br /><br />
                
                <strong>Category: </strong>
                    <select name='category'>
                        <option value="">Select One</option>
                        <?= displayCategories(); ?>
                    </select>
                <br /><br />
                
                <strong>Price:  From </strong>
                    <input type="text" name="priceFrom" size='7'/>
                <strong> To: </strong>
                    <input type="text" name="priceTo" size='7'/>
                <br /><br />
                
                <strong>Order Results By: </strong><br />
                    <input type="radio" name='orderBy' value='name'>Product Name <br />
                    <input type="radio" name='orderBy' value='price'>Price <br />
                <br />
    
                <input type="submit" value="Search" name="searchForm"/>
            </form>
            </div>
            <br />
        </div>
        <hr>
        <?= displaySeachResults(); ?>

    </body>
</html>