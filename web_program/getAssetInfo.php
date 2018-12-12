<?php

include "functions.php";
$dbConn = getDatabaseConnection("webAssets");

$sql ="SELECT * FROM assets WHERE assetNum = ".$_GET['assetNum'];
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record

//print_r($record);
echo json_encode($record);

?>