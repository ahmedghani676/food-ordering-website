<?php
include("../config/constants.php");

    //getting the id
    $id = $_GET['id'];
    
    //creating sql query
    $sql = "DELETE FROM t_admin WHERE id=$id";

    //executing
    $res = mysqli_query($connect,$sql);
    //checking
    if($res==TRUE){
        //echo"admin deleted";

        //session variable 

        $_SESSION['delete'] = "<div class ='success'> admin deleted successfully</div>";
        //redirect to mange page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else{
        //echo"fail to delete";
        $_SESSION['delete'] = "<div class ='error'>failed to delete the admin</div>";
        //redirect to mange page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

    //redirecting to manage admin page
?>