<?php include("partials/menu.php") ?>
<!-- main content starts  -->
<!-- image add karni ha -->
<div>
    <div class="main-content">
        <div class ="wrapper">
            <h1>Add DEALS</h1>
            <br><br>

            <form action="" method="POST" >


                <table class="tbl-30">
                    <tr>
                        <td>DEAL NAME: </td>
                        <td><input type="text" name="DD_Name" placeholder="Enter Your deal name"></td>
                    </tr>
                    <tr>
                        <td>DEAL description: </td>
                        <td><textarea name="DD_Description" cols="30" rows="5" placeholder="Enter Your deal description"></textarea></td>
                    </tr>
                    <tr>
                        <td>DEAL price: </td>
                        <td><input type="number" name="DD_Price" placeholder="Enter Your deal price"></td>
                    </tr>
                    
                    <tr>
                        <td>DEAL stock: </td>
                        <td><input type="number" name="DD_Stock" placeholder="Enter Your stock"></td>
                    </tr>

                    <tr>
                        <td>Select Image: </td>
                        <td><input type="file" name="DD_Image"></td>
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
                                        $Restaurant_R_ID = $row['R_ID'];
                                        $R_Name = $row['R_Name'];
                                        ?>
                                            <option value="<?php echo $Restaurant_R_ID ;?>"><?php echo $R_Name ;?></option>
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
                            <input type="submit"name ="submit" value="ADD DEAL" class ="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>  


            <?php

                //checking button is clicked or not
                if(isset($_POST['submit'])){
                    //echo "clicked";
                    //get data
                     $DD_Name = $_POST['DD_Name'];
                     $DD_Description = $_POST['DD_Description'];
                     $DD_Price = $_POST['DD_Price'];
                     $DD_Stock = $_POST['DD_Stock'];
                     $Restaurant_R_ID = $_POST['Restaurant_R_ID'];
                     $file=addslashes(file_get_contents($_FILES["DD_Image"]["name"]));

                    //upload image

                    //insert in database

                    //query to save dishes

                    $sql2 = "INSERT INTO deal SET
                        DD_Name = '$DD_Name',
                        DD_Description = '$DD_Description',
                        DD_Price = '$DD_Price',
                        DD_Stock = '$DD_Stock',
                        Restaurant_R_ID ='$Restaurant_R_ID',
                        `DD_Image`='$file'
                    ";


                    $res2 = mysqli_query($connect,$sql2);

                    if($res2==true)
                    {
                       $_SESSION['add'] = "<div class = 'success'> DEAL ADDED.</div>";
                        header('location:'.SITEURL.'admin/manage-deal.php');

                    }
                    else{

                      $_SESSION['add'] = "<div class = 'error'>failed to add deal..</div>";
                      header('location:'.SITEURL.'admin/manage-deal.php');


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

