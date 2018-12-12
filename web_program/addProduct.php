<?php
session_start();

include 'functions.php';
$dbConn = getDatabaseConnection("webAssets");


if (isset($_GET['addAsset'])) { 
  
    #Get variables from form submition 
    $assetNum = $_GET['assetNum'];
    $manName = $_GET['manName'];
    $manAddress = $_GET['manAddress'];
    $manPhone = $_GET['manPhone'];
    $manURL = $_GET['manURL'];
    $model = $_GET['model'];
    $datePurchase = $_GET['datePurchase'];
    $purchasePrice = $_GET['purchasePrice'];
    $warrantyDate = $_GET['warrantyDate'];
    $retireDate = $_GET['retireDate'];
    $description = $_GET['description'];
    $comments = $_GET['comments'];
    
    
    $sql = "INSERT INTO assets (assetNum, manName, manAddress, manPhone, manURL, model, 
            datePurchase, purchasePrice, warrantyDate, retireDate, description, comments) 
            VALUES (:assetNum, :manName, :manAddress, :manPhone, :manURL, :model,
            :datePurchase, :purchasePrice, :warrantyDate, :retireDate, :description, :comments);";
    
    #Protect against SQL injection
    $np = array();
    $np[":assetNum"] = $assetNum;
    $np[":manName"] = $manName;
    $np[":manAddress"] = $manAddress;
    $np[":manPhone"] = $manPhone;
    $np[":manURL"] = $manURL;
    $np[":model"] = $model;
    $np[":datePurchase"] = $datePurchase;
    $np[":purchasePrice"] = $purchasePrice;
    $np[":warrantyDate"] = $warrantyDate;
    $np[":retireDate"] = $retireDate;
    $np[":description"] = $description;
    $np[":comments"] = $comments;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "New Asset was added!";
    
    header("Location: admin.php");
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Add New Asset </title>
    </head>
    <body>
        
        <h1> Adding New Asset </h1>
        
        <form >
            <!--Equiment Assest Number: <input type="text" name="assetNum"/><br />-->
            Manufacturer Name: <input type="text" name="manName"/><br />
            Manufacturer Address: <input type="text" name="manAddress"/><br />
            Manufacturer Phone: <input type="text" name="manPhone"/><br />
            Manufacturer Web Page: <input type="text" name="manURL"/><br />
            Model: <input type="text" name="model"/><br />
            Date Purchased: <input type="date" name="datePurchase"/><br />
            Purchased Price: <input type="text" name="purchasePrice"/><br />
            Warranty Expiration Date: <input type="date" name="warrantyDate"/><br />
            Retire Date: <input type="date" name="retireDate"/><br />
            Description: <input type="text" name="description" size="50"/><br />
            Comments: <input type="text" name="comment" size="50"/><br /><br />
            <input type="submit" name="addAsset" value="Add New Asset">
        </form>

    </body>
</html>