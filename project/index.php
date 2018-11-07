<?php
session_start();
//session_destroy();
include 'functions.php';


if(isset($_POST['itemName'])){
     $newItem= array();
        $newItem['name']= $_POST['itemName'];
        $newItem['price']= $_POST['itemPrice'];
        $newItem['img']= $_POST['itemImg'];        
        $newItem['id']= $_POST['itemId'];
        $newItem['genre']= $_POST['itemGenre'];
        $newItem['description'] = $_POST['itemDescription'];
        
}

if (!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
}

if (isset($_POST['itemName'])) {
    
    $newItem = array();
    $newItem['name'] = $_POST['itemName'];
    $newItem['genre'] = $_POST['genre'];
    $newItem['price'] = $_POST['itemPrice'];
    $newItem['image'] = $_POST['itemImage'];
    $newItem['id'] = $_POST['itemId'];
    $newItem['description'] = $_POST['itemDescription'];

    $found = false;
    //echo $_POST['itemName'];

    
 //   array_push($_SESSION['cart'], $newItem);


foreach($_SESSION['cart'] as &$item) {
    if($newItem['id'] == $item['id']) {
        $item['quantity'] += 1;
       // echo "MATCH FOUND";
        $found = true;
    }
}

if($found != true) {
   // echo "PUSHING";
    $newItem['quantity'] = 1;
    array_push($_SESSION['cart'], $newItem);
}

}
?>


<!DOCTYPE html>
<html>
    <head>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Products Page</title>
         
    </head>
    <body id="background1">
            <ul>
                <li><a class="active" href="index.php">Home</a></li>
                
                <!--<span class='glyphicon glyphicon-shooping-cart' aria-hidden='true'>-->
                <li><a href="cart.php">Cart</a></li>
                <li><a href = "explanation.php">Explanation</a></li>
            </ul>
            <br> <br>
            <form method = "GET" id="forms">
            <b> Movie Or Video Game: </b><input type="text" name="MovieName" placeholder="name" value = '<?php echo ($_GET['MovieName']) ?  $_GET['MovieName']  : ''; ?>'/> <br />
            <br>
            <b>Movies</b> <input type="radio" name="searchFor" value="movies" <?php echo ($_GET['searchFor'] == 'movies') ? 'checked="checked"' : ''; ?>>
            <b>Video Games</b><input type="radio" name="searchFor" value="video_games" <?php echo ($_GET['searchFor'] == 'video_games') ? 'checked="checked"' : ''; ?>><br>
            <br>
            <b> Genre:</b> 
            <select name="genre">
               <option value=""> Select one </option> 
               <?= displayGenre(); ?>
            </select>
            <br><br>
            <b>Price:  From: </b> <input type="number" name="priceFrom" size="6" value = '<?php echo ($_GET['priceFrom']) ?  $_GET['priceFrom']  : ''; ?>'/> 
            <b> To: </b> <input type="number" name="priceTo" size="6" value = '<?php echo ($_GET['priceTo']) ?  $_GET['priceTo']  : ''; ?>'/>
            <br>
            <b>Low to High Price</b> <input  type="radio"  name="orderBy" value="LToH" <?php echo ($_GET['orderBy'] == 'LToH') ? 'checked="checked"' : ''; ?>>
            <b>High to Low Price</b><input   type="radio"   name="orderBy" value="HToL" <?php echo ($_GET['orderBy'] == 'HToL') ? 'checked="checked"' : ''; ?>><br>
            <b>Alphabetical Order </b><input type="radio" name="orderBy" value="alphabetic" <?php echo ($_GET['orderBy'] == 'alphabetic') ? 'checked="checked"' : ''; ?>>
            <br><br>
            <input type="submit" name="searchForm" value="SEARCH" id="b1" />
        </form>
        <?php
            if(isset($_GET['searchForm'])){
                if(checkInputs()){
                    echo "<div id='output'>";
                    displaySeachResults();
                    echo "</div>";
                }
            }
        ?>

    </body>
</html>

