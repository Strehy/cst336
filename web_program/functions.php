<?php
//*************************************************************************************
function getDatabaseConnection($dbName) {

    $host = "localhost";
    $dbname = $dbName;
    $username = "root";
    $password = "";
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
    return $dbConn;

}
//*************************************************************************************
function getAssetInfo($assetNum) {
    global $dbConn;
    
    $sql = "SELECT * FROM assets WHERE assetNum = $assetNum";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);  
    
    return $record;
     
}
//*************************************************************************************
function displayAllProducts(){
    global $dbConn;
    
    $sql = "SELECT * FROM assets ORDER BY assetNum";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple recordsx


    //Output results
        echo "<table class='table' align='center'>";
        echo "<tr>";
        echo "<th> Model </th>";
        echo "<th> Manufacturer </th>";
        echo "<th> Purchase Price </th>";
        echo "<th> Information </th>";
        echo "<th> Controls </th>";
        echo "</tr>";
        foreach($records as $record){
        
            //Display Items in rows
            echo "<tr>";
            echo "<td><h4>" .$record['model']. "</h4></td>";
            echo "<td><h4>" .$record['manName']. "</h4></td>";
            echo "<td><h4>$" .$record['purchasePrice']. "</h4></td>";
            echo "<td><a href='#' class = 'assetLink' id = '". $record['assetNum']. "'> More Info </a></td>";
            echo "<td>";
            echo "<a class='btn btn-primary' role='button' href='updateProduct.php?assetNum=".$record['assetNum']."'>Update</a>";
            echo "<form action='deleteProduct.php' onsubmit='return confirmDelete()'>";
            echo "   <input type='hidden' name='assetNum' value='".$record['assetNum']."'>";
            echo "   <button class='btn btn-outline-danger' type='submit'>Delete</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
}

//*************************************************************************************
function validateSession(){
    if (!isset($_SESSION['adminFullName'])) {
        header("Location: index.php");  //redirects users who haven't logged in 
        exit;
    }
}

//*************************************************************************************
function checkInputs(){
    
    $flag = true;
    
    //Ensure that at least one field is filled
    if(($_GET['assetNum'] == "") &&
       (!isset($_GET['man'])) &&
       ($_GET['priceFrom'] == "" && $_GET['priceTo'] == "" ) &&
       ($_GET['model'] == "")){
           
           echo "<h2> ERROR: Please select search criteria </h2>";
           $flag = false;
       }
      
     //Ensure that price values are correct  
    if(($_GET['priceFrom'] > $_GET['priceTo']) || ($_GET['priceTo'] < $_GET['priceFrom'])){
        
        echo "<h2> ERROR: Invalid price range </h2>";
        $flag = false;
    } 
    
    return $flag;
}
//*************************************************************************************

function displaySeachResults(){
        
        global $dbConn;

        if(isset($_GET['searchForm'])){
            
            echo "<h3>Results Found: </h3>";
            
            $namedParameters = array();
            
            $sql = "SELECT * FROM assets WHERE 1"; 
            
            //Check input fields
            if(!empty($_GET['model'])){
                $sql .= " AND model like :model";
                $namedParameters[':model'] = "%" .$_GET['model']. "%";
            }
            
            if(!empty($_GET['man'])){
                $sql .= " AND manName = :man"; 
                $namedParameters[':man'] = $_GET['man'];
            }
            
            if(!empty($_GET['priceFrom']) && !empty($_GET['priceTo'])){
                $sql .= " AND purchasePrice >= :priceFrom"; 
                $sql .= " AND purchasePrice <= :priceTo"; 
                $namedParameters[':priceFrom'] = $_GET['priceFrom'];
                $namedParameters[':priceTo'] = $_GET['priceTo'];
            }
            
            if(isset($_GET['orderBy'])){
                if($_GET['orderBy'] == 'dateOrd'){
                    $sql .= " ORDER BY datePurchase"; 
                }
                elseif($_GET['orderBy'] == 'priceOrd') {
                    $sql .= " ORDER BY purchasePrice ASC"; 
                }
                elseif($_GET['orderBy'] == 'warrantyOrd'){
                    $sql .= " ORDER BY warrantyDate";
                }
            }
            
            $stmt = $dbConn->prepare($sql);
            $stmt->execute($namedParameters);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            //Output results
            echo "<table class='table' align='center'>";
            echo "<tr>";
            echo "<th> Model </th>";
            echo "<th> Manufacturer </th>";
            echo "<th> Purchase Price </th>";
            echo "<th> Information </th>";
            echo "</tr>";
            foreach($records as $record){

                //Display Items in rows
                echo "<tr>";
                echo "<td><h4>" .$record['model']. "</h4></td>";
                echo "<td><h4>" .$record['manName']. "</h4></td>";
                echo "<td><h4>$" .$record['purchasePrice']. "</h4></td>";
                echo "<td><a href='#' class = 'assetLink' id = '". $record['assetNum']. "'> More Info </a></td>";
                echo "</tr>";
            }
        echo "</table>";
        }
    }
//************************************************************************************************************************** 

function displayAgg(){
    
    global $dbConn;
    
    $sql = "SELECT * FROM assets WHERE 1 ORDER BY datePurchase";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //Calc Total Assets
    $totalAssets = count($records);
    
    //Average Price
    $avgPrice = 0;
    foreach($records as $record){
          $avgPrice += $record['purchasePrice']; 
    }
    
    $avgPrice = $avgPrice/$totalAssets;
    
    
    echo "Admin Info: <br />";
    echo "Total Assets: " .$totalAssets. "<br />";
    echo "Average Price: " .$avgPrice. "<br />";
    echo "Most recent purchase: " .$records[$totalAssets-1]['datePurchase']. "<br />";
    
    
}

//************************************************************************************************************************** 
?>