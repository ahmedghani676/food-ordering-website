<?php include("partials/menu.php") ?>
<!-- main content starts  -->
<!-- image add karni ha -->
<div>
    <div class="main-content">
        <div class ="wrapper">
            <h1>Add Admin</h1>
            <br><br>
            <?php
                if(isset($_SESSION['add']))// check session isset or not
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?>

            <form action="" method="POST">


                <table class="tbl-30">
                    <tr>
                        <td>First name: </td>
                        <td><input type="text" name="C_Name" placeholder="Enter Your  Name"></td>
                    </tr>
                    <tr>
                        <td>email: </td>
                        <td><input type="text" name="C_Email" placeholder="Enter Your Email"></td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td><input type="password" name="C_Password" placeholder="Enter Your Password"></td>
                    </tr>
                    <tr>
                        <td>Address: </td>
                        <td><input type="text" name="C_Address" placeholder="Enter Your address"></td>
                    </tr>
                    <tr>
                        <td>mobile: </td>
                        <td><input type="number" name="C_Mobile" placeholder="Enter Your mobile"></td>
                    </tr>



                    <tr>
                        <td colspan="2">
                            <input type="submit"name ="submit" value="Add user" class ="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>            
        </div>
    </div>
</div>
<!-- main content ends-->
<?php include('partials/footer.php') ?>

<?php 
    //processing form

    //checking wether button is clicked or not

    if(isset($_POST['submit']))
    {
        //button clicked
       // echo"Form Submitted Successfuly";

       //getting the data from form
       $C_Name = $_POST["C_Name"];
       $C_Email = $_POST["C_Email"];
       $C_Password = md5($_POST["C_Password"]);//password encrypted`
       $C_Address = $_POST["C_Address"];
       $C_Mobile = $_POST["C_Mobile"];

       //sql queries to add data
       $sql = "INSERT INTO customer SET
            C_Name='$C_Name',
            C_Email='$C_Email',
            C_Password='$C_Password',
            C_Address='$C_Address',
            C_Mobile='$C_Mobile'
             ";
        //executing
        $res = mysqli_query($connect,$sql);

        if($res==TRUE){
            //echo"data inserted";
            $_SESSION['add'] = "user added";
            //redirecting to manage admin
            header("location:".SITEURL.'admin/manage-customer.php');
        } 
        else{
            //echo"data not inserted";
            $_SESSION['add'] = "failed adding user";
            //redirecting to manage admin
            header("location:".SITEURL.'admin/add-customer.php');
        }

    }
      
?>

