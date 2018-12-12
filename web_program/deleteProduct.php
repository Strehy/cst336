<?php
session_start();

include "functions.php";
$dbConn = getDatabaseConnection("webAssets");

$sql = "DELETE FROM assets WHERE assetNum =" .$_GET['assetNum'];

$stmt=$dbConn->prepare($sql);
$stmt->execute();

header("Location: admin.php");

?>

<html>
    
    <body>
        <?php
            echo "ASSETNUM: " .$_GET['assetNum'];
        ?>
        
    </body>
</html>