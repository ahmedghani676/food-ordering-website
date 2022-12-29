<?php
include("../config/constants.php");

    //getting the id
    $DD_ID = $_GET['DD_ID'];
    
    //creating sql query
    $sql = "DELETE FROM deal WHERE DD_ID=$DD_ID";

    //executing
    $res = mysqli_query($connect,$sql);
    //checking
    if($res==TRUE){
        //echo"admin deleted";

        //session variable 

        $_SESSION['delete'] = "<div class ='success'> DEAL deleted successfully</div>";
        //redirect to mange page
        header('location:'.SITEURL.'admin/manage-deal.php');
    }
    else{
        //echo"fail to delete";
        $_SESSION['delete'] = "<div class ='error'>failed to delete the DEAL</div>";
        //redirect to mange page
        header('location:'.SITEURL.'admin/manage-deal.php');
    }

    //redirecting to manage admin page
?>