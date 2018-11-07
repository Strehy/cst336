<?php
    
    include '../../inc/dbConnection.php';
    $db = getDatabaseConnection("ottermart");
    include 'inc/functions.php';
    validateSession();
    
    if(isset($_GET['updateProduct'])){
       
        $productName = $_GET['productName'];
        $description =  $_GET['description'];
        $price =  $_GET['price'];
        $catId =  $_GET['catId'];
        
        $sql = "UPDATE om_product SET productName = :productName, productDescription = :productDescription, productImage = :productImage, price = :price, catId = :catId";
        
        $np = array();
        $np[":productName"] = $productName;
        $np[":productDescription"] = $description;
        $np[":productImage"] = $image;
        $np[":price"] = $price;
        $np[":catId"] = $catId;
        
        $stmt = $db->prepare($sql);
        $stmt->execute($np);
        echo "New Product was added!";
    }
    
    if(isset($_GET['productId'])){
        $productInfo = getProductInfo($_GET['productId']);
    }
    
    

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Products </title>
    </head>
    <body>
        
        <h1> Update Product </h1>
        
        <form>
           Product name: <input type="text" name="productName" value="<? $productInfo['productName'] ?>"><br>
           Description: <textarea name="description" cols="50" rows="4" value="<? $productInfo['productDescription'] ?>"></textarea><br>
           Price: <input type="text" name="price" value="<? $productInfo['price'] ?>"><br>
           Category: 
           <select name="catId">
              <option value="">Select One</option>
              <?php
              
              $categories = getCategories();
              
              foreach ($categories as $category) {
                  
                echo "<option  "; 
                echo ($category['catId']==$productInfo['catId'])?"selected":"";
                echo " value='".$category['catId']."'>" . $category['catName'] . "</option>";
                  
              }
              
              ?>
           </select> <br />
           Set Image Url: <input type="text" name="productImage" value="<? $productInfo['productImage'] ?>"><br>
           <input type="submit" name="addProduct" value="Add Product">
        </form>

    </body>
</html>