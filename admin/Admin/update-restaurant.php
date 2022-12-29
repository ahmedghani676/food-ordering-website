<?php include("partials/menu.php") ?>

<div class="main-content">
    <div class ="wrapper">
        <h1>update restaurant</h1>
        <br><br>
        <?php
            //getting the id
            $R_ID = $_GET['R_ID'];
            //sql query to display
            $sql="SELECT * FROM restaurant WHERE R_ID=$R_ID";
            //executing
            $res = mysqli_query($connect,$sql);
            //checking
            if($res==TRUE){
                $count = mysqli_num_rows($res);
                //checking
                if($count==1){
                    //echo "admin is here ";
                    $row=mysqli_fetch_assoc($res);
                    $R_Name = $row['R_Name'];
                    $R_Address = $row['R_Address'];
                    $R_Number = $row['R_Number'];

                }
                else{
                    //redirect to mange
                    header('location:'.SITEURL.'admin/manage-restaurant.php');
                }
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                    <tr>
                        <td>RESTAURANT NAME: </td>
                        <td><input type="text" name="R_Name" value="<?php echo $R_Name ?>" ></td>
                    </tr>
                    <tr>
                        <td>RESATAURANT ADDRESS </td>
                        <td><input type="text" name="R_Address" value="<?php echo $R_Address ?>" ></td>
                    </tr>
                    <tr>
                        <td>RESTAURANRT PHONE </td>
                        <td><input type="text" name="R_Number" value="<?php echo $R_Number ?>" ></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                        <input type="hidden" name="R_ID" value= "<?php echo $R_ID; ?>">
                        <input type="submit" name="submit" value="update restaurant" class="btn-secondary">
                        </td>
                    </tr>
            </table>

        </form>
    </div>
</div>

<?php
//checking submitt is clicked or not
if(isset ($_POST['submit']))
{
    //echo " button clicked";
    //getting values
     echo  $R_ID = $_POST['R_ID'];
     echo  $R_Name = $_POST['R_Name'];
     echo  $R_Address = $_POST['R_Address'];
     echo  $R_Number = $_POST['R_Number'];
     //query
     $sql = "UPDATE restaurant SET
     R_Name='$R_Name',
     R_Address='$R_Address',
     R_Number='$R_Number'
     WHERE R_ID='$R_ID'
     ";
     //executing
     $res=mysqli_query($connect,$sql);
     //checking
     if($res==TRUE){
         //admin updated
         $_SESSION['update'] = "<div class = 'success'>restaurant updated successfully.</div>";
         //redirect
        header('location:'.SITEURL.'admin/manage-restaurants.php');
     }
     else{
         //failed
            //admin updated
             $_SESSION['update'] = "<div class = 'error'>failed to update restaurant.</div>";
             //redirect
            header('location:'.SITEURL.'admin/manage-restaurants.php');
     }

}
?>


<?php include("partials/footer.php") ?>