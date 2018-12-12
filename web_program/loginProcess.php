<?php
session_start();

include "functions.php";
$dbConn = getDatabaseConnection("webAssets");

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM login
                 WHERE username = :username 
                 AND  password = :password ";                 
$np = array();
$np[':username'] = $username;
$np[':password'] = $password;

$stmt = $dbConn->prepare($sql);
$stmt->execute($np);
$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record

//print_r($record);

if (empty($record)) {
    
    echo "Wrong username or password!!";
} else {
   
   header('Location: admin.php'); //redirects to another program
    
}


?>