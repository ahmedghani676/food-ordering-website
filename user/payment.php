<?php
$connect = mysqli_connect("localhost", "root", "", "db_sda");
include 'NewDish.php';
$showAlert = false;
$showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    

    
    $cost = $_GET["total"];
    $rid = $_GET["R_ID"];
    $id = $_SESSION["idx"];
    $opt = $_POST["opt"];
    $date = date('d-m-y');
  
    $time = date('h:i:s');
           
    $sql = "INSERT INTO `payment` (`Customer_C_ID`, `P_ID`, `P_Method`, `P_Cost`, `P_Date`, `P_Time`) VALUES ('$id', '', '$opt', '$cost', '$date', '$time')";
    $result = mysqli_query($connect, $sql);

    
    

    if ($result){
        $showAlert = true;
        if(!empty($_SESSION["shopping_cart"]))
        {
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
                $sub = $values["item_quantity"];
                $fro = $values["item_id"];
                $sqll = "Update Dish Set D_Stock = D_Stock - '$sub' where D_ID = '$fro'";
                $res = mysqli_query($connect, $sqll);
            }
        }
        if(!empty($_SESSION["shopping_cartt"]))
        {
            foreach($_SESSION["shopping_cartt"] as $keys => $values)
            {
                $sub = $values["item_quantityy"];
                $fro = $values["item_idd"];
                $sqll = "Update Deal Set DD_Stock = DD_Stock - '$sub' where DD_ID = '$fro'";
                $res = mysqli_query($connect, $sqll);
            }
        }

        $sql = "INSERT INTO `orders` (`O_ID`, `Customer_C_ID`, `Restaurant_R_ID`) VALUES ('','$id', '$rid')";
        $result = mysqli_query($connect, $sql);

        unset($_SESSION["shopping_cart"]);
        unset($_SESSION["shopping_cartt"]);
        
        echo '<script>window.location="Bye.php"</script>';
    }
        else{
            $showError = true;  
        }
        
    }                   
?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     
   <script>

       function myfunction() { 
        document.getElementById("disappears").style.display="none"; 
	
}
function myfunction1() { 
	document.getElementById("disap").style.display="none"; 
    document.querySelector(".disapperButton").innerHTML = `<i class="fas fa-check-circle"></i>`; 
       
}
       </script>
  </head>
  <body>
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> payment is added
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> payment is not aded => 
        
    
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>   
 
    <div class="container my-4">
    
     <form  method="POST">
     
     <div class="form-group">
            <label for="pay">Payment cost</label>
            <input type="text" class="form-control"  value=<?php echo $total ?> id="cost" name="cost" Disabled>
            
        </div>
        
    <div class="form-group">
        <label for="cars">Payment Option:</label>
              <select id="opt" name="opt">
                <option value="card">CARD</option>
              <option value="cash on delivery">CASH ON DELIVERY</option>
 
          </select>
            
        </div>
        <div class="form-group">
            <label for="dates">Payment date</label>
            <input type="text" class="form-control" value =<?php echo date('d-m-y') ?> id="date" name="date" disabled>
            
        </div>
        <div class="form-group">
            <label for="time">Payment time</label>
            <?php date_default_timezone_set('Asia/Karachi'); ?>
            <input type="text" class="form-control" value =<?php echo date('h:i:s') ?> id="time" name="time" disabled>
            
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
       
     </form>
     <div class = "d-flex p-7">
     <div class = "disappears" id = "disappears">
        <button  class="btn btn-primary disapperButton"  onclick = "myfunction1()"> PAY WITH CASH</button>
      </div>
      <div class = "disap" id = "disap" onclick = "myfunction()">
       
      <?php
require('config.php');

?>

        <form >

          <script
               src = "https://checkout.stripe.com/checkout.js" class = "stripe-button"
                   data-key = "<?php echo $PublishableKey?>"
                  data-amount = "5"
            data-name = "foodd panda delivery system "
             data-description = "payment-system"
                  data-currency = "inr"
                  >

    </script>


</form>
</div>
       
    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3a09b34311.js" crossorigin="anonymous"></script>
</body>
</html>