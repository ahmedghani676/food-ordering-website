<?php
$connect = mysqli_connect("localhost", "root", "", "db_sda");
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $username = $_POST["name"];
  
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $mobile = $_POST["mobile"];

    $exists=false;

       $sqls = "Select * from customer where C_Email = '$email'";
       $results = mysqli_query($connect, $sqls);
       $num = mysqli_num_rows($results);
         if ($num != 1){
             
        $sql = "INSERT INTO customer (C_ID,C_Name, C_Email, C_Password, C_Address, C_Mobile) VALUES ('','$username', '$email', '$password', '$address', '$mobile')";
        $result = mysqli_query($connect, $sql);
        if ($result){ 
            $showAlert = true;
        }
        else{
            $showError = $result;  
        }
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

    <title>SignUp</title>
  </head>
  <body>
    <?php require '_nav.php' ?>
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Your account is created already 
        
        
        
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>

    <div class="container my-4">
     <h1 class="text-center">Signup to our website</h1>
     <form  method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="name" name="name" Required>
            
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" id="email" name="email" Required>
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" pattern=".{8,}" class="form-control" id="password" name="password" Required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="address"   class="form-control" id="address" name="address" Required>
        </div>
        <div class="form-group">
            <label for="mobile">Mobile Number</label>
            <input type="mobile" pattern=".{11,}" class="form-control" id="mobile" name="mobile" Required>
        </div>

      
        <button type="submit" class="btn btn-primary">SignUp</button>
     </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
