<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "db_sda");


$email = $_SESSION['email'];  

$sql = "select * from customer where C_Email = '$email' ";
$result = mysqli_query($connect, $sql);
  
  while($row = $result->fetch_assoc()) {  ?>
<tr>
    <div class = "container-fluid">
      <h4 class="text-center mt-5">USER DETAIL</h4>
      <hr style="border-bottom:2px solid lightgray">
      <div class="container mt-5" style="border:2px solid black; padding:120px">
    
      <div class="row d-flex justify-content-around align-items-center align-self-center" style="background-color:cyan" >
        <p style="font-size:20px; font-weight:'bold'; ">Email:</p>
        <i class="fas fa-mail-bulk fa-2x" style="width:40px; height:60px"></i>
        <p style="font-size:20px"> <?php echo $row['C_Email']; ?></p>
      </div>
      <div class="row d-flex justify-content-around align-items-center align-self-center" >
        <p style="font-size:20px; font-weight:'bold'; ">User Name:</p>
      <i class="fas fa-user-friends fa-2x" style="width:40px; height:60px"></i>
        <p style="font-size:20px"> <?php echo $row['C_Name']; ?></p>
      </div>
      <div class="row d-flex justify-content-around align-items-center align-self-center" style="background-color:cyan" >
        <p style="font-size:20px; font-weight:'bold'; ">PASSWORD:</p>
        <i class="fas fa-unlock fa-2x" style="width:40px; height:60px"></i>
        <p style="font-size:20px"> <?php echo $row['C_Password']; ?></p>
      </div>
      <div class="row d-flex justify-content-around align-items-center align-self-center" style="background-color:cyan" >
        <p style="font-size:20px; font-weight:'bold'; ">ADDRESS:</p>
        <i class="fas fa-unlock fa-2x" style="width:40px; height:60px"></i>
        <p style="font-size:20px"> <?php echo $row['C_Address']; ?></p>
      </div>
      <div class="row d-flex justify-content-around align-items-center align-self-center" style="background-color:cyan" >
        <p style="font-size:20px; font-weight:'bold'; ">MOBILE:</p>
        <i class="fas fa-unlock fa-2x" style="width:40px; height:60px"></i>
        <p style="font-size:20px"> <?php echo $row['C_Mobile']; ?></p>
      </div>
    <div class ="mt-5 d-flex justify-content-center" >
    <a  style="background-color:cyan; font-size:20px; padding:20px" href ="edit.php?email=<?php echo $row['C_Email'];?>">EDIT</a></div>
      </div> 
     
    
</div>
</tr>


<?php }?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  </head>
   <body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://kit.fontawesome.com/3a09b34311.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>


