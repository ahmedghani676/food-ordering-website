<?php include("partials/menu.php") ?>

<div class="main-content">
    <div class ="wrapper">
        <h1>update Admin</h1>
        <br><br>
        <?php
            //getting the id
            $id = $_GET['id'];
            //sql query to display
            $sql="SELECT * FROM t_admin WHERE id=$id";
            //executing
            $res = mysqli_query($connect,$sql);
            //checking
            if($res==TRUE){
                $count = mysqli_num_rows($res);
                //checking
                if($count==1){
                    //echo "admin is here ";
                    $row=mysqli_fetch_assoc($res);
                    $first_name = $row['f_name'];
                    $last_name = $row['l_name'];
                    $username = $row['u_name'];

                }
                else{
                    //redirect to mange
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                    <tr>
                        <td>First name: </td>
                        <td><input type="text" name="first_name" value="<?php echo $first_name ?>" ></td>
                    </tr>
                    <tr>
                        <td>Last name: </td>
                        <td><input type="text" name="last_name" value="<?php echo $last_name ?>" ></td>
                    </tr>
                    <tr>
                        <td>Username: </td>
                        <td><input type="text" name="username" value="<?php echo $username ?>" ></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                        <input type="hidden" name="id" value= "<?php echo $id; ?>">
                        <input type="submit" name="submit" value="update admin" class="btn-secondary">
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
     echo  $id = $_POST['id'];
     echo  $first_name = $_POST['first_name'];
     echo  $last_name = $_POST['last_name'];
     echo  $username = $_POST['username'];
     //query
     $sql = "UPDATE t_admin SET
     f_name='$first_name',
     l_name='$last_name',
     u_name='$username'
     WHERE id='$id'
     ";
     //executing
     $res=mysqli_query($connect,$sql);
     //checking
     if($res==TRUE){
         //admin updated
         $_SESSION['update'] = "<div class = 'success'>admin updated successfully.</div>";
         //redirect
        header('location:'.SITEURL.'admin/manage-admin.php');
     }
     else{
         //failed
            //admin updated
             $_SESSION['update'] = "<div class = 'error'>failed to update admin.</div>";
             //redirect
            header('location:'.SITEURL.'admin/manage-admin.php');
     }

}
?>


<?php include("partials/footer.php") ?>