<?php
$startTime = microtime(true); // Code on how to do time inspired by https://stackoverflow.com/questions/25231153/show-load-time-on-page 
session_set_cookie_params(0);
session_start();//starting with session for time
$_SESSION['loaded'];
$_SESSION['sum'];


if ( !isset($_SESSION['loaded']) ) {  //do this when session doesn't exist ONLY
   $_SESSION['loaded']  = 1;
   $_SESSION['time'] = 0;
    $_SESSION['sum'] = 0;
    }
else{
    $_SESSION['loaded'] = ($_SESSION['loaded'] + 1);

}
if($_SESSION['loaded'] == 51) {
    unset($_SESSION['loaded']);
    unset($_SESSION['time']);
    unset($_SESSION['sum']);
    $_SESSION['loaded'] = 1;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>SilverJack</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
         <h1>Silverjack</h1>
        <?php
        

         
         //creating 3 variables for calculate time
        // $startTime = microtime(true);
         //$endtime = microtime(true);
         $avgTime; 
         $totalTime; 
         
        ?>
        <div>
          <?php
          include 'functions.php';
          play();
          
          ?>

        </div>
         </body>
        <footer>
        <div id = "time">
            <?php
            
              //echo "Time elapsed: " . $startTime . " secs";
              $endTime = microtime(true);
              $_SESSION['time'] = $endTime - $startTime;
              
               
              echo "Time elapsed: " . $_SESSION['time'] . " seconds. ";
              $_SESSION['sum'] += $_SESSION['time'];
              $avgTime = ($_SESSION['sum']/ $_SESSION['loaded']);
              echo "<br/>";
              echo "Average Elapsed time: " . $avgTime . " seconds. ";
              echo "<br/>";
              echo "Number of games played: " . $_SESSION['loaded'];
              echo "<br/>";
              //session_destroy();
            ?>
            
        </div>
        
        <br/>
          
         
             
             
             
             
             
        <details>
            <summary>Source Image Sites</summary>
            <a href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQj1uqZhUWc-K1y3Jst2E6vMyteqzMez0H0QmphW3owMMTSjwyJ">Haunted Woods</a>
            <br>
            <a href="https://upload.wikimedia.org/wikipedia/en/b/bb/The_shining_heres_johnny.jpg">Jack Torrance</a>
            <br>
            <a href="https://upload.wikimedia.org/wikipedia/en/thumb/4/44/Freddy_Krueger.JPG/250px-Freddy_Krueger.JPG">Freddy Krueger</a>
            <br>
            <a href="https://vignette.wikia.nocookie.net/hohrpgseries/images/4/4b/Michael_Myers_%28S5%29.jpg/revision/latest?cb=20140122084511">Michael Myers</a>
            <br>
            <a href="https://vignette.wikia.nocookie.net/fridaythe13th/images/e/e5/Freddy_vs_Jason_%282%29.jpg/revision/latest?cb=20171001043508">Jason Voorhees</a>
            <br>
        </details>
        </footer>
 
</html>

