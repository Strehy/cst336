<?php
    $backgroundImage = "img/sea.jpg";
    
    if(isset($_GET['keyword'])){
        include 'api/pixabayAPI.php';
        $imageURLs = getImageURLs($_GET['keyword']);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
    
    // function formIsValid(){
    //     if(empty($_GET['keyword'] && empty($_GET['category']))){
    //         echo "<h1> ERROR: Enter a keyword or select a category </h1>";
    //     }
    //     else{
    //         return false;
    //     }
    // }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Image Carousel </title>
        <link href="https://maxcdn.biitstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <style>
            @import url("css/styles.css");
            
            body{
                background-image: url('<?= $backgroundImage ?>');
            }
        </style>
    </head>
    <body>
        <?php
            if(!isset($imgageURLs)){ //&& formIsValid()){
                echo "<h2> Type a keyword to display a slideshow <br/> with random images from Pixabay.com </h2>";
            }
            else{
        ?>
        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            
            <ol class="carousel-indicators">
                <?php
                    for($i = 0; $i <5; $i++){
                        echo "<li data-target= '#carousel-example-generic' data-slide-to='$i'";
                        echo ($i == 0)?" class='active'": "";
                        echo "></li>";
                    }
                ?>
            </ol>
            
            <div class="carousel-inner" role="lisbox">
                <?php
                    for($i = 0; $i <5; $i++){
                        do{
                            $randomIndex = rand(0, count($imageURLs));
                        }
                        while(!isset($imageURLs[$randomIndex]));
                        
                        echo "<div class='item'";
                        echo ($i == 0)?"active": "";
                        echo "'>";
                        echo "<img src='" .$imageURLs[$randomIndex]. "'>";
                        echo "</div";
                        unset($imageURLs[$randomIndex]);
                    }
                ?>
            </div>
            
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <?php
            }
        ?>
        <br />
        <form>
            <input type="text" name="keyword" placeholder="Keyword" value="<?php $_GET['keyword'] ?>" />
            <input type="radio" id="lhorizontal" name="layout" value="horizontal" checked>
            <?php
                if($_GET['layout'] == 'horizontal'){
                    echo "checked";
                }
            ?>
            <label for="Horizontal"></label><label for="lhorizontal"> Horizontal</label>
            <input type="radio" id="lvertical" name="layout" value="vertical">
            <label for="Vertical"></label><label for="lvertical"> Vertical </label>
            <select name="category">
                <option value="">Select One</option>
                <option value="ocean">Ocean</option>
                <option value="forest">Forest</option>
                <option value="mountain">Mountain</option>
                <option value="snow">Snowm</option>
            </select>
            <input type="submit" value="Submit" />
        </form>
        
        <script scr="https://maxcdn.biitstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"></script>
        <script scr="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </body>
</html>