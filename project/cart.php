<?php
    include 'functions.php';
    session_start();
    
//If 'removeId' has been sent, search the cart for that itemId and unset if
    /*if(isset($_POST['removeId'])){
        foreach($_SESSION['cart'] as $itemKey => $item){
            if($item['id'] == $_POST['removeId']){
                unset($_SESSION['cart'][$itemKey]);
            }
        }
    }
    
    //if 'itemId' quantity has been sent, search for the item with that ID and update quantity
    if(isset($_POST['itemId'])){
        foreach($_SESSION['cart'] as &$item){
            if ($item['id'] == $_POST['itemId']){
                $item['quantity']= $_POST['update'];
            }
        }
    }
  */
  
  if (isset($_POST['removeId'])) {
    foreach($_SESSION['cart'] as $itemKey => $item) {
        if($item['id'] == $_POST['removeId']){
            unset($_SESSION['cart'][$itemKey]);
        }
    }
}

  if (isset($_POST['removeAll'])) {
    foreach($_SESSION['cart'] as $itemKey => $item) {
        
            unset($_SESSION['cart'][$itemKey]);
        }
    }


if(isset($_POST['itemId'])){
    foreach($_SESSION['cart'] as &$item) {
        if($item['id'] == $_POST['itemId']) {
        $item['quantity'] = $_POST['update'];
    }
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
       <title>Shopping Cart</title>
         <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body id="body2">
       <div>
            <ul>
                        <li><a href='index.php'>Home</a></li>
                        <li><a class="active" href='cart.php'> Cart </a></li>
                        <li><a href = "explanation.php">Explanation</a></li>
            </ul>
        </div>    
             <h1>Shopping Cart</h1><br>
             <?php  
             displayOurCart();
             ?>
    </body>
</html>