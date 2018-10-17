<?php
/* List of answers:
        q1: John Adams
        q2: 50
        q3: Phoenix, Denver
        q4: 1st
        q5: 11/06/2018
*/

    //File containing website logic
    include "functions.php";

    session_start();
    
    //Populates the dropdown menu in Q4
    function selectQ4(){
        $amendments = array("1st", "2nd", "3rd", "4th", "5th", "6th", "7th", "8th");
        
        foreach($amendments as $amend){
        
            echo "<option value='" .$amend. "' ";
            //.setQ4($amend). 
            echo ">" .$amend. "</option>";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> USA Quiz </title>
        <style>
            @import url(css/styles.css);
        </style>
    </head>
    <body>
        <header><h1> USA Quiz</h1></header>
        
        <div id=quiz>
            <form method="get">
                <!-- Question 1 -->
                <strong>Q1: Who was the second president of the US?</strong><br />
                <input type="radio" name="q1" value="Thomas Jefferson" <?= setQ1("Thomas Jefferson"); ?>/>Thomas Jefferson<br />
                <input type="radio" name="q1" value="John Adams" <?= setQ1("John Adams"); ?>/>John Adams<br /> 
                <input type="radio" name="q1" value="Andrew Jackson" <?= setQ1("Andrew Jackson"); ?>/>Andrew Jackson<br />
                <input type="radio" name="q1" value="John Quincy Adams" <?= setQ1("John Quincy Adams"); ?>/>John Quincy Adams<br />
                <hr>
                <br /><br />
                
                <!-- Question 2 -->
                <strong>Q2: How many States are a part of the US?</strong>
                <input type="number" name="q2" <?= setQ2(); ?>/>
                <hr>
                <br /><br />
                
                <!-- Question 3 -->
                <strong>Q3: Which of the following cities are state capitals?</strong><br />
                <input type="checkbox" name="q3_1" value="Phoenix" <?php //setQ3("Phoenix"); ?>/>Phoenix<br />
                <input type="checkbox" name="q3_2" value="Detroit" <?php //setQ3("Detroit"); ?>/>Detroit<br />
                <input type="checkbox" name="q3_3" value="San Francisco" <?php //setQ3("San Francisco"); ?>/>San Francisco<br />
                <input type="checkbox" name="q3_4" value="Denver" <?php //setQ3("Denver"); ?>/>Denver<br />
                <hr>
                <br /><br />
                
                <!-- Question 4 -->
                <strong>Q4: The freedom of speech is protected by which amendment?</strong>
                    <select name="q4">
                        <option value="">Select One</option>
                        <?= selectQ4(); ?>
                    </select>
                 <hr>
                 <br /><br />
                
                <!-- Question 5 -->
                <strong>Q5: When is election day in 2018? </strong>
                <input type="date" name="q5" <?php //setQ5(); ?>>
                <hr>
                <br /><br />
                
                <!-- Buttons -->
                <div id="submit">
                    <input type="submit" value="Submit"/>
                    <input type="button" value="Reset" onclick="reset();"
                </div>
            </form>
        </div>
        
        <div id="output">
            <?php
            print_r($_SESSION);
            
                $check = checkInputs();
                if($check == true){
                    $score = checkResults();
                    displayResult($score);
                }
            ?>
        </div>
        
        <footer>
            <img src="/cst336/hw/hw_1/img/csumb_logo.png" alt="CSUMB logo" title="CSUMB logo"/>
            <br />
            <strong>Sources:</strong>
                <a href="https://www.google.com/url?sa=i&source=images&cd=&ved=2ahUKEwjbgpKrs4zeAhULITQIHQrkC2MQjRx6BAgBEAU&url=%2Furl%3Fsa%3Di%26source%3Dimages%26cd%3D%26ved%3D2ahUKEwjbgpKrs4zeAhULITQIHQrkC2MQjRx6BAgBEAU%26url%3D%252Furl%253Fsa%253Di%2526source%253Dimages%2526cd%253D%2526cad%253Drja%2526uact%253D8%2526ved%253D2ahUKEwjbgpKrs4zeAhULITQIHQrkC2MQjRx6BAgBEAU%2526url%253Dhttp%25253A%25252F%25252Fgetwallpapers.com%25252Fcollection%25252Fus-flag-background%2526psig%253DAOvVaw12TGYFy91vgAoy2fXulIHP%2526ust%253D1539828775743450%26psig%3DAOvVaw12TGYFy91vgAoy2fXulIHP%26ust%3D1539828775743450&psig=AOvVaw12TGYFy91vgAoy2fXulIHP&ust=1539828775743450">  
                background image </a>
                <a href="https://tenor.com/view/hi-america-gif-9114873">  
                america dog </a>
                <a href="https://tenor.com/view/murica-ronswanson-gif-3825441">  
                ron swanson</a>
            <br />
            <small> CST 336 Internet Programming. 2017&copy; Trehy </small>
        </footer>
        
    </body>
</html>