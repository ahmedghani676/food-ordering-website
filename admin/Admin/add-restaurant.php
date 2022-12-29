<?php include("partials/menu.php") ?>
<!-- main content starts  -->
<!-- image add karni ha -->
<div>
    <div class="main-content">
        <div class ="wrapper">
            <h1>Add RESTAURANT</h1>
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
                        <td>RESTAURANT NAME : </td>
                        <td><input type="text" name="R_Name" placeholder="Enter Your RESTAURANT NAME "></td>
                    </tr>
                    <tr>
                        <td>RESTAURANT ADDRESS :</td>
                        <td><input type="text" name="R_Address" placeholder="Enter Your RESTAURANT ADDRESS"></td>
                    </tr>
                    <tr>
                        <td>RESTAURANT MOBILE NUMBER: </td>
                        <td><input type="text" name="R_Number" placeholder="Enter Your RESTAURANT PHONE"></td>
                    </tr>
                    <tr>
                        <td>Select Image: </td>
                        <td><input type="file" name="R_Image"></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit"name ="submit" value="ADD RESTAURANT" class ="btn-secondary">
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
       $R_Name = $_POST["R_Name"];
       $R_Address = $_POST["R_Address"];
       $R_Number = $_POST["R_Number"];
       $file=addslashes(file_get_contents($_FILES["R_Image"]["name"]));


       //sql queries to add data
       $sql = "INSERT INTO restaurant SET
            R_Name='$R_Name',
            R_Address='$R_Address',
            R_Number='$R_Number',
            `R_Image`='$file'
            ";
        //executing
        $res = mysqli_query($connect,$sql) or die(mysqli_error());

        if($res==TRUE){
            //echo"data inserted";
            $_SESSION['add'] = "RESTAURANT ADDED";
            //redirecting to manage admin
            header("location:".SITEURL.'admin/manage-restaurants.php');
        } 
        else{
            //echo"data not inserted";
            $_SESSION['add'] = "failed adding restaurant";
            //redirecting to manage admin
            header("location:".SITEURL.'admin/manage-restaurants.php');
        }

    } 
      
?>

