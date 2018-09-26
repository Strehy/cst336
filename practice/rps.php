<!DOCTYPE html>
<?php
//Functions
function winner($winner1, $winner2, $winner3){

    if($winner1 == "player1")
    {
        $match1player1 = "matchWinner";
        $match1player2 = "";
    }
    else{
        $match1player1 = "";
        $match1player2 = "matchWinner";
    }
    
    if($winner2 == "player1")
    {
         $match2player1 = "matchWinner";
        $match2player2 = "";
    }
    else{
        $match2player1 = "";
        $match2player2 = "matchWinner";
    }
    
    if($winner3 == "player1")
    {
         $match3player1 = "matchWinner";
        $match3player2 = "";
    }
    else{
        $match3player1 = "";
        $match3player2 = "matchWinner";
    }
}

?>
<html>
<head>
    <title> RPS </title>
    <style type="text/css">
        body {
            background-color: black;
            color: white;
            text-align: center;
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .col {
            text-align: center;
            margin: 0 70px;
        }

        .matchWinner {
            background-color: yellow;
            margin: 0 70px;
        }

        #finalWinner {
            margin: 0 auto;
            width: 500px;
            text-align: center;
        }
        
        hr {
            width:33%;
        }        
    </style>
</head>

<body>
    <?php
    //Select Random RPS values
    for($i = 1; $i < 4; $i++){
        ${player1Row.$i} = rand(0,2);
        ${player2Row.$i} = rand(0,2);
        while(${player1Row.$i} == ${player2Row.$i}){
            ${player1Row.$i} = rand(0,2);
            ${player2Row.$i} = rand(0,2);
        }   
    }
    
    switch(${player1Row.$i}):
    case 0: ${player1Symbol.$i} = "rock";
        break;
    case 1: ${player1Symbol.$i} = "paper";
        break;
    case 2: ${player1Symbol.$i} = "scissors";
        break;
        
    switch(${player2Row.$i}):
    case 0: ${player2Symbol.$i} = "rock";
        break;
    case 1: ${player2Symbol.$i} = "paper";
        break;
    case 2: ${player2Symbol.$i} = "scissors";
        break;
        
    
    if(${player1Symbol.$i} == "rock" and ${player2Symbol.$i} == "paper"){
        ${winner.$i} = "player2";
    }
    else if(${player1Symbol.$i} == "rock" and ${player2Symbol.$i} == "scissors"){
        ${winner.$i} = "player1";
    }
    else if ( ${player1Symbol.$i} == "paper" and ${player2Symbol.$i} == "rock") {
        ${winner.$i} = "player1";
    }
    
    else if ( ${player1Symbol.$i} == "paper" and ${player2Symbol.$i} == "scissors") {
        ${winner.$i} = "player2";
    }
    
    else if ( ${player1Symbol.$i} == "scissors" and ${player2Symbol.$i} == "rock") {
        ${winner.$i} = "player2";
    }
    
    else if ( ${player1Symbol.$i} == "scissors" and ${player2Symbol.$i} == "paper") {
        ${winner.$i} = "player1";
    }
    
    winner($winner1, $winner2, $winner3);
    
    ?>

    <h1> Rock, Paper, Scissors </h1>

    <div class="row">
        <div class="col">
            <h2>Player 1</h2>
        </div>
        <div class="col">
            <h2>Player 2</h2>
        </div>
    </div>
    
    <div class="row">
        <div class='col, <?php echo $match1player1 ?>'> '><img src='img/rps/scissors.png' alt='scissors' width='150'></div>
        <div class='col,<?php echo $match1player2 ?>'><img src='img/rps/rock.png' alt='rock' width='150'></div>
    </div>
    <hr>

    <div class="row">
        <div class='col, <?php echo $match2player1 ?>'><img src='img/rps/rock.png' alt='rock' width='150'></div>
        <div class='col, <?php echo $match2player2 ?>'><img src='img/rps/paper.png' alt='paper' width='150'></div>
    </div>
    <hr>
    
    <div class="row">
        <div class='col, <?php echo $match3player1 ?>'><img src='img/rps/paper.png' alt='paper' width='150'></div>
        <div class='col,<?php echo $match3player2 ?>'> <img src='img/rps/rock.png' alt='rock' width='150'></div>
    </div>
    <hr>

    <div id="finalWinner">

        <h1>The winner is Player 2</h1>

    </div>
    Images source: https://www.kisspng.com/png-rockpaperscissors-game-money-4410819/
</body>

</html>
