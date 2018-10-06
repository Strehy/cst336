 
<?php

function play(){
        // generate deck
        $sortedDeck = genDeck();
        $used1 = false;
        $used2 = false;
        $used3 = false;
        $used4 = false;
        
        // shuffle deck
        $deck = deckShuffle($sortedDeck);
        //echo "<div class='cardsTitle'>";
        //echo "<p>Player 1:</p>";
        //echo "<p>Player 2:</p>";
        //echo "<p>Player 3:</p>";
        //echo "<p>Player 4:</p>";
        //echo "</div>";
       while(!$used1 || !$used2 || !$used3 || !$used4 ){
        // deal player 1
        $random = rand(1, 4);
        if(($random ==1) && (!$used1)){
        echo "Player 1: ";
        echo "<img src=\"img/FreddyKrueger.JPG\" alt = 'Freddy Kreuger' title =' Freddy Kreuger' width = '70'>";
        $dealp1= getHand($deck);
        $deck = $dealp1["deck"];
        $p1 = $dealp1["hand"];
        $p1Sum = $dealp1["sum"];
        echo "<div class = 'cards1'>";
        displayHand("1",$p1);
        echo "Points: $p1Sum";
        echo "</div>";
        $used1 = true;
        }
        
        // deal player 2
        if(($random == 2) && (!$used2)){
        echo "Player 2: ";
        echo "<img src=\"img/JasonVoorhees.jpg\" alt = 'Jason Voorhees' title =' Jason Voorhees' width = '100'>";

        $dealp2= getHand($deck);
        $deck = $dealp2["deck"];
        $p2 = $dealp2["hand"];
        $p2Sum = $dealp2["sum"];
        echo "<div class = 'cards2'>";
        displayHand("2",$p2);
        echo "Points: $p2Sum";
        echo "</div>";
        $used2 = true;
        }
        // deal player 3
        if(($random == 3) && (!$used3)){
        echo "Player 3: ";
        
                echo "<img src=\"img/Michael_Myers.jpg\" alt = 'Michael Myers' title ='Michael Myers' width = '70'>";

        $dealp3= getHand($deck);
        $deck = $dealp3["deck"];
        $p3 = $dealp3["hand"];
        $p3Sum = $dealp3["sum"];
        echo "<div class = 'cards3'>";
        displayHand("3",$p3);
        echo "Points: $p3Sum";
        echo "</div>";
        $used3 = true;
        }
        
        // deal player 4
        if(($random == 4) && (!$used4)){
        $dealp4 = getHand($deck);
        echo "Player 4: ";
                echo "<img src=\"img/The_shining_heres_johnny.jpg\" alt = 'Jack Torrance' title ='Jack Torrance' width = '70'>";

        $deck = $dealp4["deck"];
        $p4 = $dealp4["hand"];
        $p4Sum = $dealp4["sum"];
        echo "<div class = 'cards4'>";
        displayHand("4",$p4);
        echo "Points: $p4Sum"; 
        echo "</div>";
        $used4 = true;
        }
       }
        
        // call getWinner with an array of each players hand sum
        $players = array($p1Sum,$p2Sum,$p3Sum,$p4Sum);
        $results = getWinner($players);
        $winner = $results["winner"];
        $winnerPoints = $results["total"];
        displayWinner($winner,$winnerPoints);
        
        // display points 
        //echo "<div class='cardPoints'>";
        //echo "<p>$p1Sum</p>";
        //echo "<p>$p2Sum</p>";
        //echo "<p>$p3Sum</p>";
        //echo "<p>$p4Sum</p>";
       // echo "</div>";
        echo "<br>";
    }
    function displayWinner($winner,$points){
        echo "<div class = 'winner'> <h2> $winner WINS $points!!!<h2/></div>";
    }
    function displayHand($player, $hand){
        $i = 1;
        foreach ($hand as $card) {
            $suit = $card["suit"];
            $num = $card["num"];
            echo "<img src='cards/$suit/$num.png' class= 'player$player card$i '></img>";
            $i++;
        }
    }
    function getWinner($players){
        $totalPoints = array_sum($players);
        $max = 0;
        for($i = 0; $i < 4; $i++){
            if ($players[$i]> 42){
                $replace = array($i=>0);
                $players = array_replace($players,$replace);
            }
        }
        $max = max($players);    
        switch(true){
            case $players[0] == $max:
                return array("total"=>$totalPoints, "winner"=>"Freddy Krueger");
            case $players[1] == $max:
                return array("total"=>$totalPoints, "winner"=>"Jason Voorhees");
            case $players[2] == $max:
                return array("total"=>$totalPoints, "winner"=>"Michael Myers");
            case $players[3]== $max:
                return array("total"=>$totalPoints, "winner"=>"Jack Torrance");
        }
    }    
    function deckShuffle($deck){
        $k = 51;
        for($i = 0; $i<52;$i++){
            $x = rand(0,$k);
            $tempCard =  array_splice($deck,$x,1);
            $tempSuit = $tempCard[0]["suit"];
            $tempNum = $tempCard[0]["num"];
            $shuffled[$i] = array("suit"=>$tempSuit, "num"=>$tempNum);
            $k--;
        }
        return $shuffled;
    }
    function genDeck(){
        $k = 1;
        for($i=0;$i<52;$i++){
            if($k == 14){
                $k = 1;
            }
            if($i<=12){
                $suit = "clubs";
            } elseif ($i<=25) {
                $suit = "diamonds";
            } elseif ($i<=38){
                $suit = "hearts";
            } else {
                $suit = "spades";
            }
            $deck[$i] = array("suit" => $suit, "num" => $k);
            $k++;
        }
        return $deck;
    }
    function getHand($deck){
        $i = 0;
        $sum = 0;
         do{ 
             $tempCard = array_splice($deck,0,1);
            $tempSuit = $tempCard[0]["suit"];
            $tempNum = $tempCard[0]["num"];
            $sum += $tempNum;
            $hand[$i] = array("suit"=>$tempSuit,"num"=>$tempNum);
               $i++;
        } while($sum<36);
        return array("hand"=>$hand, "sum"=>$sum, "deck"=>$deck);
    }        
?>