<?php

    function validPassSize(){
        
        $valid = false;
        
        if($_GET['numPasswords'] > 8){
            
            echo "<h2 style='color:red'>Error! The number of passwords to generate should not exceed 8</h2>";
        }
        else{
            $valid = true;
        }
        
        return $valid;
        
    }
    
    function main(){
         validPassSize();
    }
    
?>