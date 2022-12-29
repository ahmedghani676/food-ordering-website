<?php
include("../config/constants.php");

    //getting the id
    $D_ID = $_GET['D_ID'];
    
    //creating sql query
    $sql = "DELETE FROM dish WHERE D_ID=$D_ID";

    //executing
    $res = mysqli_query($connect,$sql);
    //checking
    if($res==TRUE){
        //echo"admin deleted";

        //session variable 

        $_SESSION['delete'] = "<div class ='success'> dish deleted successfully</div>";
        //redirect to mange page
        header('location:'.SITEURL.'admin/manage-dishes.php');
    }
    else{
        //echo"fail to delete";
        $_SESSION['delete'] = "<div class ='error'>failed to delete the dish</div>";
        //redirect to mange page
        header('location:'.SITEURL.'admin/manage-dishes.php');
    }

    //redirecting to manage admin page
?>