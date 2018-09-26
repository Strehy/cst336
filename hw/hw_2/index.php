<!DOCTYPE html>
<?php
    include "inc/functions.php";
?>

<html>
    <head>
        <title> What to eat  </title>
        <style> @import url("css/styles.css"); </style>
    </head>
    <body>
        <header>
            <h1>What to eat Tonight</h1>
            <hr>
        </header>
        
        <div id='intro'>
            <h3>Here are some suggestions on what to eat tonight!</h3>
        </div>
        
        <div id="main">
        
            <?php 
                selectFood();
                
            ?>
            
            <br/>
            <br/>
            <form action="">
                <input type="submit" name="Shuffle" value="Shuffle"> 
            </form>
        </div>
        
        <div id='leftSide'></div>
        <div id='rightSide'></div>
        
    </body>
    
    <footer>
        <hr>
        <img src="/cst336/hw/hw_1/img/csumb_logo.png" alt="CSUMB logo" title="CSUMB logo"/>
        
        <small> CST 336 Internet Programming. 2017&copy; Trehy <br />
            <strong>Disclaimer:</strong> The information in this webpage is fictious. <br />
            it is used for academic purpose only
        </small>
    </footer>
</html>