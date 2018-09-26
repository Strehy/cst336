<?php

    //Selects two food options for you to choose between
   function selectFood(){
    
        do{
            $food1 = rand(0,5);
            $food2 = rand(0,5);
        }while($food1 == $food2);
            
        displayFood($food1, 1);
        displayFood($food2, 2);
        
        showFoodSugestions($food1, $food2);
   }
   
   //Randomly selects food
    function displayFood($food, $pos){
        switch($food){
            case 0: $picture = "burger";
                    break;
            case 1: $picture = "burrito";
                    break;
            case 2: $picture = "pasta";
                    break;
            case 3: $picture = "pizza";
                    break;
            case 4: $picture = "ramen";
                    break;
            case 5: $picture = "salad";
                    break;
                    
    }
    echo "<img id='item$pos' src='img/$picture.jpg' alt='$picture' title='".ucwords($picturel)."' width='70px' />";
    }
    
    function showFoodSugestions($food1, $food2){
        
        //Arrays holding food suggestions
        $burgerShops = array("McDonalds", "Smash Burger");
        $burritoShops = array("Dell Taco", "Papa Chevo's");
        $pastaShops = array("Gusto Handcrafted Pasta & Pizza", "Joe Rombi's La Piccola Casa");
        $pizzaShops = array("Domino", "Pizza Hut");
        $ramenShops = array("Noodle Hut", "Sakura" );
        $saladShops = array("Olive Garden", "Green Eats");
        
        $value = rand(0,1);
        
        //Array functions
        shuffle($burgerShops);
        sort($saladShops);
        
        echo "<div id='suggestion' >";
        switch($food1){
            case 0: $suggest1 = $burgerShops[$value];
                            $print1 = "burger";
                            break;
            case 1: $suggest1 = $burritoShops[$value];
                            $print1 = "burrito";
                            break;
            case 2: $suggest1 = $pastaShops[$value];
                            $print1 = "pasta";
                            break;
            case 3: $suggest1 = $pizzaShops[$value];
                            $print1 = "pizza";
                            break;
            case 4: $suggest1 = $ramenShops[$value];
                            $print1 = "ramen";
                             break;
            case 5: $suggest1 = $saladShops[$value];
                            $print1 = "salad";
                            break;
        }
        
        switch($food2){
            case 0: $suggest2 = $burgerShops[$value];
                            $print2 = "burger";
                            break;
            case 1: $suggest2 = $burritoShops[$value];
                            $print2 = "burrito";
                            break;
            case 2: $suggest2 = $pastaShops[$value];
                            $print2 = "pasta";
                             break;
            case 3: $suggest2 = $pizzaShops[$value];
                            $print2 = "pizza";
                            break;
            case 4: $suggest2 = $ramenShops[$value];
                            $print2 = "ramen";
                            break;
            case 5: $suggest2 = $saladShops[$value];
                            $print2 = "salad";
                             break;
        }
        
        echo "<div id=foods>";
        echo "We suggest you eat either " .$print1. " or " .$print2 . " <br>";
        for($i = 1; $i <= sizeof($saladShops); $i++){
            echo "For a " .${"print".$i}. " you can go to " .${"suggest".$i}. "<br>";
        }

        echo "</div>";
    }
?>