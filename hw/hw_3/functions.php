<?php

    session_start();
    
    //Ensure all questions have been answered, if not it displays an error message and returns false
    function checkInputs(){
        //All questions are assummed unset to begin
        $setQ1 = false;
        $setQ2 = false;
        $setQ3 = false;
        $setQ4 = false;
        $setQ5 = false;
        
        if(isset($_GET['submit'])){
        
            //Check Q1
            if(!isset($_GET['q1'])){
                
                echo "<h2>Error: Questions 1 not answered</h2>";
            }
            else{
                $setQ1 = true;
                $_SESSION['q1'] = $_GET['q1'];
            }
            
            //Check Q2
            if($_GET['q2'] == ""){
                echo "<h2>Error: Questions 2 not answered</h2>";
            }
            else{
                $setQ2 = true;
                $_SESSION['q2'] = $_GET['q2'];
            }
            
            //Check Q3
            if(!isset($_GET['q3_1']) && !isset($_GET['q3_2']) && !isset($_GET['q3_3']) && !isset($_GET['q3_4'])){
                echo "<h2>Error: Questions 3 not answered</h2>";
            }
            else{
                $setQ3 = true;
                $_SESSION['q3_1'] = $_GET['q3_1'];
                $_SESSION['q3_2'] = $_GET['q3_2'];
                $_SESSION['q3_3'] = $_GET['q3_3'];
                $_SESSION['q3_4'] = $_GET['q3_4'];
            }
            
            //Check Q4
            if($_GET['q4'] == ""){
                echo "<h2>Error: Questions 4 not answered</h2>";
            }
            else{
                $setQ4 = true;
                $_SESSION['q4'] = $_GET['q4'];
            }
            
            //Check Q5
            if(($_GET['q5']) == ""){
                echo "<h2>Error: Questions 5 not answered</h2>";
            }
            else{
                $setQ5 = true;
                $_SESSION['q5'] = $_GET['q5'];
            }
        }
        
        if(($setQ1 && $setQ2 && $setQ3 && $setQ4 && $setQ5) == true){
            
            return true;
        }
        else{
            return false;
        }
    }
    
    //checks results if all questions have been answered
    function checkResults(){
        
        //Count how many answers are correct
        $correct = 0;
        
        //Check Q1
        if($_GET['q1'] == "John Adams"){
            $correct++;
        }
        //Check Q2
        if($_GET['q2'] == "50"){
            $correct++;
        }
       
        //Check Q3
       if(isset($_GET['q3_1']) && isset($_GET['q3_4']) && !isset($_GET['q3_2']) && !isset($_GET['q3_3'])){
            $correct++;
        }
        //Check Q4
        if($_GET['q4'] == "1st"){
            $correct++;
        }
       
        //Check Q5
        if($_GET['q5'] == "2018-11-06"){
            $correct++;
        }
        
        return $correct;
       
    }
    
    //Display Result based on Score
    function displayResult($score){
        if($score == 5){
            
            echo '<h1><strong>Congrats!</strong></h1>';
            echo '<h3>You scored 100%</h3>';
            echo '<div class="tenor-gif-embed" data-postid="9114873" data-share-method="host" 
            data-width="100%" data-aspect-ratio="0.748995983935743">
            <a href="https://tenor.com/view/hi-america-gif-9114873">Hi GIF</a> 
            from <a href="https://tenor.com/search/hi-gifs">Hi GIFs</a>
            </div><script type="text/javascript" async src="https://tenor.com/embed.js"></script>';
        }
        else{
            echo '<h1><strong>Result</strong></h1>';
            echo '<h3>You scored ' .$score. '/5</h3>';
            echo '<div class="tenor-gif-embed" data-postid="3825441" data-share-method="host"
            data-width="100%" data-aspect-ratio="1.3315217391304348">
            <a href="https://tenor.com/view/murica-ronswanson-gif-3825441">Ron Swanson GIF</a> 
            from <a href="https://tenor.com/search/murica-gifs">Murica GIFs</a></div>
            <script type="text/javascript" async src="https://tenor.com/embed.js"></script>';
        }
        
    }
    
    //Called by button to reset seession
    function resest(){
        //session_destroy();
    }
    
    //Functions to prefill each question
    
    function setQ1($value){
        if(isset($_SESSION['q1'])){
            
            if($value == $_SESSION['q1']){
                echo "checked";
            }
        }
    }
    
    function setQ2(){
        if(isset($_SESSION['q2'])){
            echo "value= '" .$_SESSION['q2']. "'";
        }
        else{
            echo "value=''";
        }
    }
    
    function setQ3($value){
        if(($_SESSION['q3_1'] == $value)){
            echo "checked";
        }
        else{
            echo "";
        }
        if($_SESSION['q3_2'] == $value){
            echo "checked";
        }
        else{
            echo "";
        }
        if($_SESSION['q3_3'] == $value){
            echo "checked";
        }
        else{
            echo "";
        }
        if($_SESSION['q3_4'] == $value){
            echo "checked";
        }
        else{
            echo "";
        }
        
    }
    
    function setQ4($value){
        
        if(isset($_SESSION['q4'])){
            
            if($value == $_SESSION['q4']){
                echo "selected";
            }
        }
    }
    
    function setQ5(){
        if(isset($_SESSION['q5'])){
            echo "value= '" .$_SESSION['q5']. "'";
        }
        else{
            echo "value=''";
        }
        
    }

?>