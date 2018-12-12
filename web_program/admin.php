<?php
session_start();

include "functions.php";
$dbConn = getDatabaseConnection("webAssets");

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
        <style>
            form {
                display: inline-block;
            }
        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <script>
        
            function confirmDelete() {
                
                return confirm("Really??");
                
            }
          
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
    <body>
        <nav>
            <h3 id='title'>Asset Handler - Admin Controls</h3>
            <hr width="75%"/>
        </nav>
      <div id='admin'>
          <form action="addProduct.php">
              <input type="submit" value="Add New Product">
          </form>
         <form action="logout.php">
              <input type="submit" value="Logout">
        </form>
    
        <br><br>
        
        <?= displayAgg() ?>
        <br><br>
        <h3>All Current Assets</h3>
        </div>
        <?= displayAllProducts() ?>
        

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
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
    </body>
</html>