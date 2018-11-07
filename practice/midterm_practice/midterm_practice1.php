<?php

    //Used to populate the select elements 
    function selectMonth(){
        $months = array("November","December","January", "February");
        
        for($i = 0; $i < sizeof($months); $i++){
            echo "<option value='" .$months[$i]. "'>" .$months[$i]. "</option>";
        }
    }
    
    //Used to populate the select elements
    function selectCountry(){
        $countries = array("USA", "Mexico", "France");
        
        for($i = 0; $i < sizeof($countries); $i++){
            echo "<option value='" .$countries[$i]."'>" .$countries[$i]. "</option>";                
        }
    }
    
    function createCalander(){
        
        $days = 1;
        
        $france = array("bordeaux", "le_havre", "lyon", "montpellier", "paris", "strasbourg");
        $mexico = array("acapulco", "cabos", "cancun", "chichenitza", "huatulco", "mexico_city");
        $usa = array("chicago", "hollywood", "las_vegas", "ny", "washington_dc", "yosemite");
    
        //Changes the total number of days based on month
        switch($_GET['month']){
            case November:
                $maxDays = 30;
                break;
            case December:
                $maxDays = 31;
                break;
            case January:
                $maxDays = 31;
                break;
            case February:
                $maxDays = 28;
                break;
        }
        
        //Select random days for images
        for($i=0; $i < $_GET[locationNum]; $i++){
            if($_GET['month'] = "February"){
                ${day.$i} = rand(0, 28);
            }
            
            if($_GET['month'] = "November"){
                ${day.$i} = rand(0, 30);
                echo "TEST______";
            }
            
            if($_GET['month'] = "December" || $_GET['month'] = "January"){
                ${day.$i} = rand(0, 31);
            }
        }
        
        //TESTING !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        //echo "TEST______";
        echo $day0. "<br />";
        echo $day1. "<br />";
        echo $day2. "<br />";
        echo $day3. "<br />";
        echo $day4. "<br />";
        
        echo "<table id='calender'>";
        for($i=0; $i < 6; $i++){
            
            echo "<tr>";
            for($k = 0; $k < 7; $k++){
                
                if($days <= $maxDays){
                    
                    echo "<td>" .$days. "</td>";
                    
                    if($days == day1 || $days == day2 || $days == day3 
                    || $days == day4 || $days == day0){
                        
                        if($_GET['country'] == "USA"){
                            echo "<img src='img/USA/" .$usa[rand(0, sizeof($use))]. ">";
                        }
                        
                        if($_GET['country'] == "France"){
                            echo "<img src='img/France/" .$france[rand(0, sizeof($france))]. ">";
                        }
                        
                        if($_GET['country'] == "Mexico"){
                            echo "<img src='img/Mexico/" .$mexico[rand(0, sizeof($mexico))]. ">";
                        }
                    }
                
                    $days++;
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    
    function output(){
        
        if(isset($_GET['submit'])){
            if($_GET['month'] == ""){
                
                echo "<h2><strong> You must select a Month! </strong><h2>";
                
            }
            if(!isset($_GET['locationNum'])){
                echo "<h3> You must specify the number of locations </h3>";
            }
            
            else{
                
                echo "<h2> " .$_GET['month']. "'s Itinerary </h2>";
                echo "<h3> Visitng " .$_GET[locationNum]. " places in " .$_GET['country']. "</h3>";
                
                createCalander();
            }
        }
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <title> Winter Vacation Planner </title>
        <style>
            @import url("styles.css");
            
            table, td{
                border: 1px solid black;
                
                margin:auto;
            }
            
            td {
                padding: 30px;
            }
        </style>
        
    </head>
    <body>
        <header><h1> Winter Vaction Planner !</h1></header>
        <br /><br />
        <form>
            Select Month: <select name='month'>
                <option value='' >Select</option>
                <?= selectMonth() ?>
            </select>
            <br /><br />
            Number of locations: 
            <input type='radio' name='locationNum' value='three'><strong>Three</strong>
            <input type='radio' name='locationNum' value='four'><strong>Four</strong>
            <input type='radio' name='locationNum' value='five'><strong>Five</strong>
            <br /><br />
            Select Country: <select name = 'country'>
                <?= selectCountry(); ?>
            </select>
            <br /><br />
            Visit Locations in alphabetical order: 
            <input type='radio' name='a-z'><strong>A-Z</strong>
            <input type='radio' name='z-a'><strong>Z-A</strong>
            <br /><br />
            <input type="submit" name='submit'>
            
        </form>
        <hr>
        
        <div id='output'>
            
            <?= output(); ?>
            
        </div>

    </body>
</html>