<?php
session_start();

include "functions.php";
$dbConn = getDatabaseConnection("webAssets");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Assest Handler </title>
        
        <!--Includes-->
        
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script> 
        
        <script>
            $('document').ready(function() {
	          $('.assetLink').click(function() {

	              $('#assetModal').modal("show");
	              $.ajax({

                    type: "GET",
                    url: "getAssetInfo.php",
                    dataType: "json",
                    data: { "assetNum": $(this).attr('id') },
                    success: function(data, status) {
                        $("#assetNumModal").html(data.assetNum);
                        $("#manNameModal").html(data.manName);
                        $("#manAddressModal").html(data.manAddress);
                        $("#manPhoneModal").html(data.manPhone);
                        $("#manURLModal").html(data.manURL);
                        $("#modelModal").html(data.model);
                        $("#datePurchaseModal").html(data.datePurchase);
                        $("#purchasePriceModal").html(data.purchasePrice);
                        $("#warrantyDateModal").html(data.warrantyDate);
                        $("#retireDateModal").html(data.retireDate);
                        $("#descriptionModal").html(description);
                        $("#commentsModal").html(data.comments);
                        
                        //alert(data); 
                    
                    },
	          }); // ajax closing
	          }); 
	          
	      }); // doc end
            
        </script>
        
    </head>
        <h3 id='title'>Welcome to the Assest Handler</h3>
        <nav>
            <a href='manufacturers.php'>Manufacturers</a>
            <a href='login.php'>Login</a>
            <hr width="75%"/>
        </nav>
    <body>
        
        <!--Form to search Assets DB-->
        <div id='search'>
            <div id='form'>
            <form >
                <fieldset>
                        <legend><b>Search:</b></legend>
                        <!--<b>Equiment Assest Number:</b> <input type="text" name="assetNum" value = '<?php echo ($_GET['assetNum']) ?  $_GET['assetNum']  : ''; ?>'/><br />-->
                        <b>Manufacturer:</b> <input type="text" name="man" value = '<?php echo ($_GET['man']) ?  $_GET['man']  : ''; ?>'/><br />
                        <b>Model:</b> <input type="text" name="model" value = '<?php echo ($_GET['model']) ?  $_GET['model']  : ''; ?>'/><br />
                        
                        <b>Price:  From: </b> <input type="number" name="priceFrom" size="6" value = '<?php echo ($_GET['priceFrom']) ?  $_GET['priceFrom']  : ''; ?>'/> 
                        <b> To: </b> <input type="number" name="priceTo" size="6" value = '<?php echo ($_GET['priceTo']) ?  $_GET['priceTo']  : ''; ?>'/>
                        <br />
                        
                        <b>Order By:</b><br />
                        Date Purchased: <input  type="radio"  name="orderBy" value="dateOrd" <?php echo ($_GET['orderBy'] == 'dateOrd') ? 'checked="checked"' : ''; ?>><br />
                        Purchased Price: <input  type="radio"  name="orderBy" value="priceOrd" <?php echo ($_GET['orderBy'] == 'priceOrd') ? 'checked="checked"' : ''; ?>><br />
                        Warranty Expiration Date: <input  type="radio"  name="orderBy" value="warrantyOrd" <?php echo ($_GET['orderBy'] == 'orderBy') ? 'checked="checked"' : ''; ?>><br />
                    
                        <input type="submit" name="searchForm" value="Search">
                </fieldset>
            </form>
            <br />
            </div>
        </div>
    
        <!-- Modal -->
        <div class="modal fade" id="assetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <!--<div class="modal-header">-->
              <!--  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
              <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
              <!--    <span aria-hidden="true">&times;</span>-->
              <!--  </button>-->
              <!--</div>-->
              <div class="modal-body">
                    Equiment Assest Number: <span id='assetNumModal'></span><br />
                    Manufacturer Name: <span id='manNameModal'></span><br />
                    Manufacturer Address:  <span id='manAddressModal'></span><br />
                    Manufacturer Phone: <span id='manPhoneModal'></span><br />
                    Manufacturer Web Page: <span id='manURLModal'></span><br />
                    Model: <span id='modelModal'></span><br />
                    Date Purchased: <span id='datePurchaseModal'></span><br />
                    Purchased Price: <span id='purchasePriceModal'></span><br />
                    Warranty Expiration Date: <span id='warrantyDateModal'></span><br />
                    Retire Date: <span id='retireDateModal'></span><br />
                    Description: <span id='descriptionModal'></span><br />
                    Comments: <span id='commentsModal'></span><br />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
          
        <?php //Output search Results
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