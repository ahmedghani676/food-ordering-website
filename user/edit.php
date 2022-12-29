<?php
$connect = mysqli_connect("localhost", "root", "", "db_sda");
$email = $_GET['email'];
$qry = mysqli_query($connect,"select * from customer where C_Email = '$email' ");
$data = mysqli_fetch_array($qry);

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $passowrd = $_POST['password'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $edit = mysqli_query($connect,"update customer set C_Name = '$name',C_Email = '$email',C_Password = '$passowrd',C_Address = '$address',C_Mobile = '$mobile' where C_Email = '$email' ");
    if($edit)
    {
        mysqli_close($connect);
        header("location:personaldetail.php");    
    }
   
    else{
        echo mysqli_error();
    }
    
}

?>
\
<div class= "container m-5 ">
    <h1>UPDATE THE DATA</h1>
<form method = "POST" >
   
<div class="form-group">
            <label for="username">Enter Full Name</label><br>
            <input type = "text" name = "name" value = "<?php echo $data['C_Name']?>" placeholder = "enter full name" Required>
            
        
            </div>
        <div class="form-group">
            <label for="email">Enter Email</label><br>
            <input type = "email" name = "email" value = "<?php echo $data['C_Email']?>" placeholder = "enter your email" Required>
            
        </div>
        <div class="form-group">
            <label for="password">Enter Password</label><br>
            <input type = "password" name = "password" value = "<?php echo $data['C_Password']?>" placeholder = "enter password" Required>
            
        </div>
        <div class="form-group">
            <label for="password">Enter Address</label><br>
            <input type = "text" name = "address" value = "<?php echo $data['C_Address']?>" placeholder = "enter addresss" Required>
            
        </div>
        <div class="form-group">
            <label for="password">Enter Mobile</label><br>
            <input type = "text" name = "mobile" value = "<?php echo $data['C_Mobile']?>" placeholder = "enter mobile" Required>
            
        </div>
    <input type = "submit" name = "update" value = "Update"><br>
</form>
</div>