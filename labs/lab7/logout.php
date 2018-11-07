<?php
    session_start();
    
    session_destroy();
    
    header("Location: index.php"); //rederict to login
    
    
?>