
<?php
    
    include "../../inc/dbConnection.php";
    
    $db = getDatabaseConnection('midterm');
    
    function p1(){
        
        global $db;
        
        $sql = "SELECT * FROM `mp_town` 
                WHERE population > 50000 && population < 80000";
                
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach($records as $record){
            echo $record['town_name'].", " .$record['population'] ;
        }
    }
    
    function p2(){
        
        global $db;
        
        $sql = "SELECT town_name, population FROM `mp_town` 
                ORDER BY population DESC";
                
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record){
            echo $record['town_name']. ", " .$record['population']. "<br />";
        }
    }
    
    function p3(){
        
        global $db;
        
        $sql = "SELECT town_name, population FROM `mp_town` 
                ORDER BY population LIMIT 3";
                
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record){
            
            echo $record['town_name']. ", " .$record['population']. "<br />";
        }
        
    }
    
    function p4(){
        
        global $db;
        
        $sql = "SELECT * FROM `mp_county` WHERE county_name LIKE 's%'";
                
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record){
            echo $record['county_name']. "<br />";
        }
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>midterm</title>
    </head>    
    <body>
        <?php
            
            echo "P1: ";
            p1();
            echo "<br /><br />";
            
            echo "P2: ";
            p2();
            echo "<br /><br />";
            
            echo "P3: ";
            p3();
            echo "<br /><br />";
            
            echo "P4: ";
            p4();
            echo "<br /><br />";
        ?>
    </body>
</html>