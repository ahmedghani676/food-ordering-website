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

            <form action="" method="POST" enctype="multipart/form-data">


                <table class="tbl-30">
                    <tr>
                        <td>First name: </td>
                        <td><input type="text" name="first_name" placeholder="Enter Your First Name"></td>
                    </tr>
                    <tr>
                        <td>Last name: </td>
                        <td><input type="text" name="last_name" placeholder="Enter Your Last Name"></td>
                    </tr>
                    <tr>
                        <td>Username: </td>
                        <td><input type="text" name="username" placeholder="Enter Your Username"></td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td><input type="password" name="password" placeholder="Enter Your Password"></td>
                    </tr>
                    <tr>
                        <td>picture: </td>
                        <td><input type="file" name="image" id="image"></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2">
                            <input type="submit"name ="submit" value="Add Admin" class ="btn-secondary">
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
       $first_name = $_POST["first_name"];
       $last_name = $_POST["last_name"];
       $username = $_POST["username"];
       $pass = md5($_POST["password"]);//password encrypted`
       $file=addslashes(file_get_contents($_FILES["image"]["name"]));


       //sql queries to add data
       $sql = "INSERT INTO t_admin SET
            f_name='$first_name',
            l_name='$last_name',
            u_name='$username',
            password='$pass',
            `image`='$file'
             ";
        //executing
        $res = mysqli_query($connect,$sql) or die(mysqli_error());

        if($res==TRUE){
            //echo"data inserted";
            $_SESSION['add'] = "Admin added";
            //redirecting to manage admin
            header("location:".SITEURL.'admin/manage-admin.php');
        } 
        else{
            //echo"data not inserted";
            $_SESSION['add'] = "failed adding admin";
            //redirecting to manage admin
            header("location:".SITEURL.'admin/add-admin.php');
        }

    }
      
?>

