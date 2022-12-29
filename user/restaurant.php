<?php
$connect = mysqli_connect("localhost", "root", "", "db_sda");
session_start();
$_SESSION['searched'] = true;

?>
<?php require '_nav.php' ?>
<h1 class="text-center m-4">VIEW OF RESTAURANT </h1>

  
<div class = "container m-7" >
<form method = "POST">
<div class="form-group d-flex">
<input type="text" class="form-control" id="name" name="name"  placeholder = "enter search" Required>
<input type = "submit" name = "search" value = "Search">      
        </div>

</form>
</div>
<div class="container">
      <main class="p-4 container">
        <div class ="row p-6">
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $names = $_POST["name"];
    
    $sqls = "select * from restaurant where R_Name = '$names' ";
    
    $result = mysqli_query($connect, $sqls);
  while($row = $result->fetch_assoc()) { ?>
               <tr>
               <div class="col-md-4 p-9">
                <div class="card">
                    <h4 class="card-header">
                      
                      <img alt = "img1" src="data:unnamed.jpg;charset=utf8;base64,<?php echo base64_encode($row['R_Image']); ?>"/> 
                    </h4>
                    <div class="card-body">
                      <?php echo $row['R_Name']?>
                    </div>
                    <a  style="background-color:cyan; font-size:20px; padding:20px" href ="NewDish.php?R_ID=<?php echo $row['R_ID'];?>">ORDER</a></div>   
                </div>
            </div>
     
     
</div>
</tr>


<?php 
}?>

  
<?php unset($_SESSION['searched']); }?>

  </div>
  </main>
  </div>
<div class="container">
      <main class="m-8 container">
        <div class ="row m-7">
<?php


if(isset($_SESSION['searched']))
{
$sql = "SELECT * from restaurant";

$result = mysqli_query($connect, $sql);



  while($row = $result->fetch_assoc()) :  ?>
  
      
             <div class="col-md-4 p-9">
                <div class="card">
                    <h4 class="card-header">
                      
                     <img alt = "img1" src="data:unnamed.jpg;charset=utf8;base64,<?php echo base64_encode($row['R_Image']); ?>"/> 
                    </h4>
                    <div class="card-body">
                      <?php echo $row['R_Name']?>
                    </div>
                    <a  href ="NewDish.php?R_ID=<?php echo $row['R_ID'];?>" ><button>ORDER</button></a></div>      
                </div>
            </div>
         
    

<?php
endwhile;
}
?>
</div>
    </main>
</div>

  <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
  />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/cef404ae28.js" crossorigin="anonymous"></script>
<script defer src = "index.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>