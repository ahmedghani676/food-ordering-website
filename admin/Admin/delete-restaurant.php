<?php
include("../config/constants.php");

    //getting the id
    $R_ID = $_GET['R_ID'];
    
    //creating sql query
    $sql = "DELETE FROM restaurant WHERE R_ID=$R_ID";

    //executing
    $res = mysqli_query($connect,$sql);
    //checking
    if($res==TRUE){
        //echo"admin deleted";

        //session variable 

        $_SESSION['delete'] = "<div class ='success'> restaurant deleted successfully</div>";
        //redirect to mange page
        header('location:'.SITEURL.'admin/manage-restaurants.php');
    }
    else{
        //echo"fail to delete";
        $_SESSION['delete'] = "<div class ='error'>failed to delete the admin</div>";
        //redirect to mange page
        header('location:'.SITEURL.'admin/manage-restaurants.php');
    }

    //redirecting to manage admin page
?>