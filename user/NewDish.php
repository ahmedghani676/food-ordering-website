<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "db_sda");
$rid = $_GET["R_ID"];
if(isset($_POST["add_to_cart"]))
{
     if(isset($_SESSION["shopping_cart"]))
     {
          $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
          if(!in_array($_GET["id"], $item_array_id))
          {
               $count = count($_SESSION["shopping_cart"]);
               $item_array = array(
                    'item_id'               =>     $_GET["id"],
                    'item_name'               =>     $_POST["hidden_name"],
                    'item_price'          =>     $_POST["hidden_price"],
                    'item_quantity'          =>     $_POST["quantity"]
               );
               $_SESSION["shopping_cart"][$count] = $item_array;
          }
          else
          {
               echo '<script>alert("Item Already Added")</script>';
               header("location:NewDish.php?R_ID=".$rid);
               //echo '<script>window.location="NewDish.php"</script>';
          }
     }
     else
     {
          $item_array = array(
               'item_id'               =>     $_GET["id"],
               'item_name'               =>     $_POST["hidden_name"],
               'item_price'          =>     $_POST["hidden_price"],
               'item_quantity'          =>     $_POST["quantity"]
          );
          $_SESSION["shopping_cart"][0] = $item_array;
     }
}
if(isset($_GET["action"]))
{
     if($_GET["action"] == "delete")
     {
          foreach($_SESSION["shopping_cart"] as $keys => $values)
          {
               if($values["item_id"] == $_GET["id"])
               {
                    unset($_SESSION["shopping_cart"][$keys]);
                    //echo '<script>alert("Item Removed")</script>';
                    header("location:NewDish.php?R_ID=".$rid);
                    //echo '<script>window.location="NewDish.php"</script>';
               }
          }
     }
}
?>

<?php
if(isset($_POST["add_to_cartt"]))
{
     if(isset($_SESSION["shopping_cartt"]))
     {
          $item_array_id = array_column($_SESSION["shopping_cartt"], "item_idd");
          if(!in_array($_GET["idd"], $item_array_id))
          {
               $count = count($_SESSION["shopping_cartt"]);
               $item_array = array(
                    'item_idd'               =>     $_GET["idd"],
                    'item_namee'               =>     $_POST["hiddden_name"],
                    'item_pricee'          =>     $_POST["hiddden_price"],
                    'item_quantityy'          =>     $_POST["quantityy"]
               );
               $_SESSION["shopping_cartt"][$count] = $item_array;
          }
          else
          {
               echo '<script>alert("Item Already Added")</script>';
               header("location:NewDish.php?R_ID=".$rid);
               //echo '<script>window.location="NewDish.php"</script>';
          }
     }
     else
     {
          $item_array = array(
               'item_idd'               =>     $_GET["idd"],
               'item_namee'               =>     $_POST["hiddden_name"],
               'item_pricee'          =>     $_POST["hiddden_price"],
               'item_quantityy'          =>     $_POST["quantityy"]
          );
          $_SESSION["shopping_cartt"][0] = $item_array;
     }
}
if(isset($_GET["action"]))
{
     if($_GET["action"] == "delete")
     {
          foreach($_SESSION["shopping_cartt"] as $keys => $values)
          {
               if($values["item_idd"] == $_GET["idd"])
               {
                    unset($_SESSION["shopping_cartt"][$keys]);
                    //echo '<script>alert("Item Removed")</script>';
                    header("location:NewDish.php?R_ID=".$rid);
                    //echo '<script>window.location="NewDish.php"</script>';
               }
          }
     }
}
?>

<!DOCTYPE html>
<html>
     <head>
          <title>Dishes</title>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
         
          
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     </head>
     <body>
     <?php require '_nav.php' ?>

          <div>
            <br><br><br><br>
          <h1 style="font-family: Sofia, sans-serif; font-size:80px;"><center>Our Dishes and Deals</center></h1>
            <br><br><br>
          </div>

          <div class="container" style="width:700px;">
            <?php
               $query = "SELECT * FROM dish where Restaurant_R_ID = '$rid' ORDER BY D_ID ASC";
               $result = mysqli_query($connect, $query);
               $query = "SELECT * FROM deal where Restaurant_R_ID = '$rid' ORDER BY DD_ID ASC";
               $rresult = mysqli_query($connect, $query);
               if(mysqli_num_rows($result) > 0)
               {
                    while($row = mysqli_fetch_array($result))
                    {
                     if($row["D_Stock"] > 0)
                     {    
               ?>
               <div class="col-md-4" >
                    <form method="post" action="NewDish.php?action=add&id=<?php echo $row["D_ID"]; ?>&R_ID=<?php echo $rid; ?>" >
                         <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                         <img alt = "img1" src="data:unnamed.jpg;charset=utf8;base64,<?php echo base64_encode($row['D_Image']); ?>"/> 
                              <h4 class="text-info"><?php echo $row["D_Name"]; ?></h4>
                              <h4 class="text-info"><?php echo $row["D_Description"]; ?></h4>
                              <h4 class="text-danger">Rs. <?php echo $row["D_Price"]; ?></h4>
                              <input type="text" name="quantity" class="form-control" value="1" />
                              <input type="hidden" name="hidden_name" value="<?php echo $row["D_Name"]; ?>" />
                              <input type="hidden" name="hidden_price" value="<?php echo $row["D_Price"]; ?>" />
                              <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
                         </div>
                    </form>
               </div>
               <?php
                    }
                    }
               }

               if(mysqli_num_rows($rresult) > 0)
               {
                    while($row = mysqli_fetch_array($rresult))
                    {
                     if($row["DD_Stock"] > 0)
                     { 
               ?>
               <div class="col-md-4">
                    <form method="post" action="NewDish.php?action=add&idd=<?php echo $row["DD_ID"]; ?>&R_ID=<?php echo $rid; ?>">
                         <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                         <img alt = "img1" src="data:unnamed.jpg;charset=utf8;base64,<?php echo base64_encode($row['DD_Image']); ?>" /> 
                              <h4 class="text-info"><?php echo $row["DD_Name"]; ?></h4>
                              <h4 class="text-info"><?php echo $row["DD_Description"]; ?></h4>
                              <h4 class="text-danger">Rs. <?php echo $row["DD_Price"]; ?></h4>
                              <input type="text" name="quantityy" class="form-control" value="1" />
                              <input type="hidden" name="hiddden_name" value="<?php echo $row["DD_Name"]; ?>" />
                              <input type="hidden" name="hiddden_price" value="<?php echo $row["DD_Price"]; ?>" />
                              <input type="submit" name="add_to_cartt" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
                         </div>
                    </form>
               </div>
               <?php
                    }
                    }
               }
               ?>


               <div style="clear:both"></div>
               <br />
               <h3>Order Details</h3>
               <div class="table-responsive">
                    <table class="table table-bordered">
                         <tr>
                              <th width="40%">Item Name</th>
                              <th width="10%">Quantity</th>
                              <th width="20%">Price</th>
                              <th width="15%">Total</th>
                              <th width="5%">Action</th>
                         </tr>
                         <?php
                         $total = 0;
                         if(!empty($_SESSION["shopping_cart"]))
                         {
                              
                              foreach($_SESSION["shopping_cart"] as $keys => $values)
                              {
                         ?>
                         <tr>
                              <td><?php echo $values["item_name"]; ?></td>
                              <td><?php echo $values["item_quantity"]; ?></td>
                              <td>Rs. <?php echo $values["item_price"]; ?></td>
                              <td>Rs. <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                              <td><a href="NewDish.php?action=delete&R_ID=<?php echo $rid; ?>&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                         </tr> 
                         <?php
                                   $total = $total + ($values["item_quantity"] * $values["item_price"]);
                              }
                         ?>
                         
                         <?php
                         }
                         ?>
                         <?php
                         if(!empty($_SESSION["shopping_cartt"]))
                         {
                              foreach($_SESSION["shopping_cartt"] as $keys => $values)
                              {
                         ?>
                         <tr>
                              <td><?php echo $values["item_namee"]; ?></td>
                              <td><?php echo $values["item_quantityy"]; ?></td>
                              <td>Rs. <?php echo $values["item_pricee"]; ?></td>
                              <td>Rs. <?php echo number_format($values["item_quantityy"] * $values["item_pricee"], 2); ?></td>
                              <td><a href="NewDish.php?action=delete&idd=<?php echo $values["item_idd"]; ?>&R_ID=<?php echo $rid; ?>"><span class="text-danger">Remove</span></a></td>
                         </tr> 
                         <?php
                                   $total = $total + ($values["item_quantityy"] * $values["item_pricee"]);
                              }
                         ?>
                         
                         <?php
                         }
                         ?>

                         <?php
                         if(!empty($_SESSION["shopping_cartt"]) or !empty($_SESSION["shopping_cart"]))
                         { ?>
                              <tr>
                                   <td colspan="3" align="right">Total</td>
                                   <td align="right">Rs. <?php echo number_format($total, 2); ?></td>
                                   <td></td>
                              </tr>
                         <?php
                         }
                         ?>

                  </table>
                  <a href ="payment.php?total=<?php echo $total ?>&R_ID=<?php echo $rid ?>" ><input type="submit" style="margin-top:5px;" class="btn btn-success" value="CheckOut !" /></a>
               </div>
          </div>
          <br />
          <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
     </body>
</html>
