<?php include("partials/menu.php") ?>

<div class="main-content">
    <div class ="wrapper">
        <h1>update dishes</h1>
        <br><br>
        <?php
            //getting the id
            $D_ID = $_GET['D_ID'];
            //sql query to display
            $sql="SELECT * FROM dish WHERE D_ID=$D_ID";
            //executing
            $res = mysqli_query($connect,$sql);
            //checking
            if($res==TRUE){
                $count = mysqli_num_rows($res);
                //checking
                if($count==1){
                    //echo "admin is here ";
                    $row=mysqli_fetch_assoc($res);
                    $D_Name = $row['D_Name'];
                    $D_Description = $row['D_Description'];
                    $D_Price = $row['D_Price'];
                    $D_Stock = $row['D_Stock'];

                }
                else{
                    //redirect to mange
                    header('location:'.SITEURL.'admin/manage-dishes.php');
                }
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                    <tr>
                        <td>NAME : </td>
                        <td><input type="text" name="D_Name"  value="<?php echo $D_Name ?>" ></td>
                    </tr>
                    <tr>
                        <td>DESCRIPTION: </td>
                        <td><textarea name="D_Description" value="<?php echo $D_Name ?>"  cols="30" rows="5" placeholder="Enter Your dish description"></textarea></td>
                    </tr>
                    <tr>
                        <td>PRICE : </td>
                        <td><input type="number" name="D_Price" value="<?php echo $D_Price ?>" ></td>
                    </tr>
                    <tr>
                        <td>STOCK : </td>
                        <td><input type="number" name="D_Stock" value="<?php echo $D_Stock ?>" ></td>
                    </tr>

                    <tr>
                        <td colspan="3">
                            <!-- <input type="hidden" name="Restaurant_R_ID" value= "<?php echo $Restaurant_R_ID; ?>"> -->
                            <input type="hidden" name="D_ID" value= "<?php echo $D_ID; ?>">
                            <input type="submit" name="submit" value="update DISH" class="btn-secondary">
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
    echo $D_ID = $_POST['D_ID'];
    echo$D_Name = $_POST['D_Name'];
    echo$D_Description = $_POST['D_Description'];
    echo$D_Price = $_POST['D_Price'];
    echo $D_Stock = $_POST['D_Stock'];
     //query
     $sql = "UPDATE dish SET
     D_Name='$D_Name',
     D_Description='$D_Description',
     D_Price='$D_Price',
     D_Stock='$D_Stock'
     WHERE D_ID='$D_ID' 
     ";
     //executing
     $res=mysqli_query($connect,$sql);
     //checking
     if($res==TRUE){
         //admin updated
         $_SESSION['update'] = "<div class = 'success'>dish updated successfully.</div>";
         //redirect
        header('location:'.SITEURL.'admin/manage-dishes.php');
     }
     else{
         //failed
            //admin updated
             $_SESSION['update'] = "<div class = 'error'>failed to update dish.</div>";
             //redirect
           header('location:'.SITEURL.'admin/manage-dishes.php');
        }

}
?>


<?php include("partials/footer.php") ?>