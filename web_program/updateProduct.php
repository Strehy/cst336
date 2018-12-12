<?php
session_start();

include 'functions.php';
$dbConn = getDatabaseConnection("webAssets");

if (isset($_GET['updateAsset'])){  
    
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
    
    
    $sql = "UPDATE assets 
            SET manName = :manName, manAddress = :manAddress,
            manPhone = :manPhone, manURL = :manURL, model = :model, datePurchase = :datePurchase, purchasePrice = :purchasePrice, 
            warrantyDate = :warrantyDate, retireDate = :retireDate, description = :description, comments = :comments 
            WHERE assetNum = :assetNum";
            
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
    echo "Asset was updated!";
    
    header("Location: index.php");

}


if (isset($_GET['assetNum'])) {

  $assetInfo = getAssetInfo($_GET['assetNum']);    

}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Assets </title>
    </head>
    <body>

        <h1> Updating an Asset </h1>
        
        <form >
            Equiment Assest Number: <input type="text" name="assetNum" value="<?=$assetInfo['assetNum']?>"/><br />
            Manufacturer Name: <input type="text" name="manName" value="<?=$assetInfo['manName']?>"/><br />
            Manufacturer Address: <input type="text" name="manAddress" value="<?=$assetInfo['manAddress']?>"/><br />
            Manufacturer Phone: <input type="text" name="manPhone" value="<?=$assetInfo['manPhone']?>"/><br />
            Manufacturer Web Page: <input type="text" name="manURL" value="<?=$assetInfo['manURL']?>"/><br />
            Model: <input type="text" name="model" value="<?=$assetInfo['model']?>"/><br />
            Date Purchased: <input type="date" name="datePurchase" value="<?=$assetInfo['datePurchase']?>"/><br />
            Purchased Price: <input type="text" name="purchasePrice" value="<?=$assetInfo['purchasePrice']?>"/><br />
            Warranty Expiration Date: <input type="date" name="warrantyDate" value="<?=$assetInfo['warrantyDate']?>"/><br />
            Retire Date: <input type="date" name="retireDate" value="<?=$assetInfo['retireDate']?>"/><br />
            Description: <input type="text" name="description" size="50" value="<?=$assetInfo['description']?>"/><br />
            Comments: <input type="text" name="comment" size="50" value="<?=$assetInfo['comment']?>"/><br /><br />
            <input type="submit" name="updateAsset" value="Update Asset">
        </form>
        
        
    </body>
</html>