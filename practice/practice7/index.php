<?php
    
    include "../../inc/dbConnection.php";
    
    $db = getDatabaseConnection('c9');
    
    session_start();
    
    function displayCategories(){
        
        global $db;
        
        $sql = "SELECT DISTINCT category FROM `p1_quotes` WHERE 1";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record){
            echo "<option value='" .$record['category']. "'";
            echo "(" .$_GET['category'].  "== '" .$record['category']. "') ? selected='selected' : ''>" .$record['category']. "</option><br />";
        }
    }
    
    function checked(){
        if(isset($_GET['orderBy'])){
            echo "checked";
        }
    }
    
    function displaySeachResults(){
        
        global $db;
        
        if(isset($_GET['searchForm'])){
            
            echo "<h3>Products Found: </h3>";
            
            $namedParameters = array();
            
            $sql = "SELECT * FROM p1_quotes WHERE 1";
            
            //Check input fields
            if(!empty($_GET['keyword'])){
                $sql .= " AND quote LIKE :keyword
                          OR category LIKE :keyword";
                $namedParameters[':keyword'] = "%" .$_GET['keyword']. "%";
            }
            
            if(!empty($_GET['category'])){
                $sql .= " AND category = :category";
                $namedParameters[':category'] = $_GET['category'];
            }
            
            if(isset($_GET['orderBy'])){
                if($_GET['orderBy'] == 'a-z'){
                    $sql .= " ORDER BY author ASC";
                }
                else{
                    $sql .= " ORDER BY author DESC";
                }
            }
            
            $stmt = $db->prepare($sql);
            $stmt->execute($namedParameters);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            //Output results
            echo "<ul>";
            foreach($records as $record){
                
                echo "<li>";
                echo "Author: " .$record['author']. ": " .$record["quote"]. "<br />";
                echo "</li>";
            }
            echo "</ul>";
        }
    }
?>



<!DOCTYPE html>
<html>
    <head>
        <title> Famous Quotes </title>
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
            <header><h1> Famous Quote Search </h1></header>
            <br /> <br / >
            
            <div id='form'>
            <form>
                <strong>Enter Quote Keyword: </strong><input type="text" name="keyword" value = '<?php echo ($_GET['keyword']) ?  $_GET['keyword']  : ''; ?>'/> 
                <br /><br />
                
                <strong>Category: </strong>
                    <select name='category'>
                        <option value="">Select One</option>
                        <?= displayCategories(); ?>
                    </select>
                <br /><br />

                <strong>Order Results By: </strong><br />
                    <input type="radio" name='orderBy' value='a-z' <?php echo ($_GET['orderBy'] == 'a-z') ? 'checked="checked"' : ''; ?>>A-Z <br />
                    <input type="radio" name='orderBy' value='z-a' <?php echo ($_GET['orderBy'] == 'z-a') ? 'checked="checked"' : ''; ?>>Z-A <br />
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