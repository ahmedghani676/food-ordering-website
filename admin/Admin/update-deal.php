<?php include("partials/menu.php") ?>

<div class="main-content">
    <div class ="wrapper">
        <h1>update deal</h1>
        <br><br>
        <?php
            //getting the id
            $DD_ID = $_GET['DD_ID'];
            //sql query to display
            $sql="SELECT * FROM deal WHERE DD_ID=$DD_ID";
            //executing
            $res = mysqli_query($connect,$sql);
            //checking
            if($res==TRUE){
                $count = mysqli_num_rows($res);
                //checking
                if($count==1){
                    //echo "admin is here ";
                    $row=mysqli_fetch_assoc($res);
                    $DD_Name = $row['DD_Name'];
                    $DD_Description = $row['DD_Description'];
                    $DD_Price = $row['DD_Price'];
                    $DD_Stock = $row['DD_Stock'];

                }
                else{
                    //redirect to mange
                    header('location:'.SITEURL.'admin/manage-deal.php');
                }
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                    <tr>
                        <td>NAME : </td>
                        <td><input type="text" name="DD_Name"  value="<?php echo $DD_Name ?>" ></td>
                    </tr>
                    <tr>
                        <td>DESCRIPTION: </td>
                        <td><textarea name="DD_Description" value="<?php echo $DD_Name ?>"  cols="30" rows="5" placeholder="Enter Your dish description"></textarea></td>
                    </tr>
                    <tr>
                        <td>PRICE : </td>
                        <td><input type="number" name="DD_Price" value="<?php echo $DD_Price ?>" ></td>
                    </tr>
                    <tr>
                        <td>STOCK : </td>
                        <td><input type="number" name="DD_Stock" value="<?php echo $DD_Stock ?>" ></td>
                    </tr>


                    <tr>
                        <td colspan="3">
                            <input type="hidden" name="Restaurant_R_ID" value= "<?php echo $Restaurant_R_ID; ?>">
                            <input type="hidden" name="DD_ID" value= "<?php echo $DD_ID; ?>">
                            <input type="submit" name="submit" value="update DEAL" class="btn-secondary">
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
    echo $DD_ID = $_POST['DD_ID'];
    echo$DD_Name = $_POST['DD_Name'];
    echo$DD_Description = $_POST['DD_Description'];
    echo$DD_Price = $_POST['DD_Price'];
    echo $DD_Stock = $_POST['DD_Stock'];
     //query
     $sql = "UPDATE deal SET
     DD_Name='$DD_Name',
     DD_Description='$DD_Description',
     DD_Price='$DD_Price',
     DD_Stock='$DD_Stock'
     WHERE DD_ID='$DD_ID' 
     ";
     //executing
     $res=mysqli_query($connect,$sql);
     //checking
     if($res==TRUE){
         //admin updated
         $_SESSION['update'] = "<div class = 'success'>dish updated successfully.</div>";
         //redirect
        header('location:'.SITEURL.'admin/manage-deal.php');
     }
     else{
         //failed
            //admin updated
            $_SESSION['update'] = "<div class = 'error'>failed to update dish.</div>";
             //redirect
            header('location:'.SITEURL.'admin/manage-deal.php');
        }

}
?>


<?php include("partials/footer.php") ?>