<?php include("partials/menu.php") ?>
<!-- main content starts  -->
<!-- image add karni ha -->
<div>
    <div class="main-content">
        <div class ="wrapper">
            <h1>Add dishes</h1>
            <br><br>


            <?php
                if(isset($_SESSION['upload']))// check session isset or not
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
            ?>

            <form action="" method="POST" enctype="multipart/form-data">


                <table class="tbl-30">
                    <tr>
                        <td>dish name: </td>
                        <td><input type="text" name="D_Name" placeholder="Enter Your dish name"></td>
                    </tr>
                    <tr>
                        <td>dish description: </td>
                        <td><textarea name="D_Description" cols="30" rows="5" placeholder="Enter Your dish description"></textarea></td>
                    </tr>
                    <tr>
                        <td>dish price: </td>
                        <td><input type="number" name="D_Price" placeholder="Enter Your dish price"></td>
                    </tr>
                    
                    <tr>
                        <td>dish stock: </td>
                        <td><input type="number" name="D_Stock" placeholder="Enter Your stock"></td>
                    </tr>

                    <tr>
                        <td>Select Image: </td>
                        <td><input type="file" name="D_Image"></td>
                    </tr>

                    <tr>
                        <td>RESTAURANT: </td>
                        <td><select name="Restaurant_R_ID" >

                                <?php
                                //display restaurants
                                //sql query to get data
                                $sql ="SELECT * FROM restaurant";

                                $res=mysqli_query($connect,$sql);

                                //counting rows
                                $count = mysqli_num_rows($res);

                                //zer than no categories
                                if($count>0){
                                    //have categories
                                    while($row=mysqli_fetch_assoc($res)){
                                        //get the details
                                        $Restaurant_R_ID = $row['Restaurant_R_ID'];
                                        $R_Name = $row['R_Name'];
                                        ?>
                                            <option value="<?php echo $Restaurant_R_ID ;?>"><?php echo $R_Name ?></option>
                                        <?php
                                    }

                                }
                                else{

                                    ?>
                                        <option value="0"> no category </option>
                                    <?php

                                    //no categories
                                }

                                //display dro
                            ?>

                        </select>
                        </td>
                    </tr>


                    <tr>
                        <td colspan="2">
                            <input type="submit"name ="submit" value="Add dish" class ="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>  


            <?php

                //checking button is clicked or not
                if(isset($_POST['submit'])){
                    //echo "clicked";
                    //get data
                     $D_Name = $_POST['D_Name'];
                     $D_Description = $_POST['D_Description'];
                     $D_Price = $_POST['D_Price'];
                      $D_Stock = $_POST['D_Stock'];
                     $Restaurant_R_ID = $_POST['Restaurant_R_ID'];

                    //upload image

                    if(isset($_FILES['D_Image']['name'])){
                        //get details of selected
                        $D_Image=$_FILES['image']['name'];

                        //checker if selected or not
                        if($D_Image!="")
                        {
                            //selected
                            //renaming//
                            $ext = end(explode('.',$D_Image));

                            //creating new name
                            $D_Image="Food-Name-".rand(0000,9999).".".$ext;//new image name


                            //upload
                            //getting sorce and destination

                            $src=$_FILES['image']['tmp_name'];

                            //destination

                            $dst="../admin_img/".$D_Image;

                            //upload
                            $upload = move_uploaded_file($src,$dst);

                            //check if

                            if($upload==false)
                            {
                                //failed
                                //redirect to add food with error
                                $_SESSION['upload'] = "<div class = 'error'> failed to upload image </div>";
                                header('location:'.SITEURL.'admin/manage-dishes.php');
                                die();
                            }
                            

                        }

                    }
                    else{
                        $D_Image="";
                    }

                    //insert in database

                    //query to save dishes

                    $sql2 = "INSERT INTO dish SET
                        D_Name = '$D_Name',
                        D_Description = '$D_Description',
                        D_Price = $D_Price,
                        D_Stock = $D_Stock,
                        D_Image = '$D_Image',
                        Restaurant_R_ID =$Restaurant_R_ID
                    ";


                    $res2 = mysqli_query($connect,$sql2);

                    if($res2==true)
                    {
                       // $_SESSION['add'] = "<div class = 'success'> food added.</div>";
                        //header('location:'.SITEURL.'admin/manage-dishes.php');

                    }
                    else{

                      //  $_SESSION['add'] = "<div class = 'error'>failed to add food..</div>";
                      //  header('location:'.SITEURL.'admin/manage-dishes.php');


                    }


                    //redirect with message

                }


            ?>
            
            

        </div>
    </div>
</div>
<!-- main content ends-->
<?php include('partials/footer.php') ?>

<?php 
    // //processing form

    // //checking wether button is clicked or not

    // if(isset($_POST['submit']))
    // {
    //     //button clicked
    //    // echo"Form Submitted Successfuly";

    //    //getting the data from form
    //    $D_NAME = $_POST["D_NAME"];
    //    $D_DESCRIPTION = $_POST["D_DESCRIPTION"];
    //    $D_PRICE = $_POST["D_PRICE"];
    //    $D_STOCK = $_POST["D_STOCK"];

    //    //sql queries to add data
    //    $sql = "INSERT INTO dish SET
    //         D_NAME='$D_NAME',
    //         D_DESCRIPTION='$D_DESCRIPTION',
    //         D_PRICE='$D_PRICE',
    //         D_STOCK='$D_STOCK'
    //          ";
    //     //executing
    //     $res = mysqli_query($connect,$sql) or die(mysqli_error());

    //     if($res==TRUE){
    //         //echo"data inserted";
    //         $_SESSION['add'] = "dish added";
    //         //redirecting to manage admin
    //         header("location:".SITEURL.'/manage-dish.php');
    //     } 
    //     else{
    //         //echo"data not inserted";
    //         $_SESSION['add'] = "failed adding admin";
    //         //redirecting to manage admin
    //         header("location:".SITEURL.'admin/add-dish.php');
    //     }

    // }
      
?>

