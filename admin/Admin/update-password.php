<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>change password</h1>
        <br><br>
        <?php
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>


        <form action="" method="post">
            <table class="tbl-30">
            <tr>
                    <td>old password</td>
                    <td>
                        <input type="password" name="current_password" placeholder="old password">
                    </td>
            </tr>

            <tr>
                <td>new password</td>
                <td>
                        <input type="password" name="new_password" placeholder="enter new password">
                </td>
            </tr>

            <tr>
                <td>confirm password</td>
                <td>
                        <input type="password" name="confirm_password" placeholder="confirm password">
                </td>
            </tr>

            <tr>
                <td colspan ="2">
                    <input type="hidden" name="id" value="<?php echo $id ;?>">
                    <input type="submit" name="submit" value ="change password" class = "btn-secondary">
                </td>
            </tr>




            </table>
        </form>
    </div>
</div>
<?php

                    if(isset($_POST['submit'])){
                        //echo "clicked";

                        $id=$_POST['id'];
                        $current_password = md5($_POST['current_password']);
                        $new_password = md5($_POST['new_password']);
                        $confirm_password = md5($_POST['confirm_password']);


                        $sql = "SELECT * FROM t_admin WHERE id=$id AND password='$current_password'";    
                        
                        if($res==true){
                            $count=mysqli_num_rows($res);


                            if($count==1){
                                //user exists
                            }
                            else{
                                $_SESSION['user-not-found'] = "<div class ='error' >user not found </div>";
                            }


                        }
                     }


?>


<?php include('partials/footer.php') ?>