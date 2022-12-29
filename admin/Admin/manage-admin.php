<?php include('partials/menu.php') ?>
       <!-- main content ends  -->
    <div class ="main">
       <div class="wrapper">
           <h1>MANAGE ADMIN</h1>
            <br />
            <?php
               if(isset($_SESSION['add'])){
                  echo $_SESSION['add'];
                  unset($_SESSION['add']);//removing session message
               }
               if(isset($_SESSION['delete'])){
                  echo $_SESSION['delete'];
                  unset($_SESSION['delete']);//removing session message
               }
               if(isset($_SESSION['update'])){
                 echo $_SESSION['update'];
                 unset($_SESSION['update']);//removing session message
               }
            ?>
            <br /><br /><br />

            <!--button to add admin -->
            <a href="add-admin.php" class ="btn-primary">add admin</a>
            <br /><br />
           <table class="tbl-full">
              <tr>
                 <th >S.no</th>
                 <th>first_name</th>
                 <th>last_name</th>
                 <th>user_name</th>
                 <th>pictures</th>
                 <!--<th>Picture</th>-->
                 <th>actions</th>
              </tr>

              <?php
              $sql = "SELECT * FROM t_admin";

              $res = mysqli_query($connect , $sql);
              if($res==TRUE){
                 //count rows to check f have any data
                 $count = mysqli_num_rows($res);
                  $sn=1;//for restarting the count
                 //checking number of rows
                 if($count>0){
                    //we have data
                    while($rows=mysqli_fetch_assoc($res))
                    {
                       //for getting data into rows
                       $id=$rows['id'];
                       $first_name=$rows['f_name'];
                       $last_name=$rows['l_name'];
                       $username=$rows['u_name'];

                       // displaying
                       ?>


                       <tr>
                              <td> <?php echo $sn++; ?></td>
                              <td><?php echo $first_name; ?></td>
                              <td><?php echo $last_name; ?></td>
                              <td><?php echo $username ;?></td>
                              <td><img src="Admin-images/1.jpg" alt="BOSS" class ="resize"></td>
                              <td>
                                 <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id;?>" class ="btn-primary">change password</a>
                                 <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id;?>"class = "btn-secondary">update</a>
                                 <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id;?>"class = "btn-danger">delete</a>
                              </td>
                        </tr>



                       <?php
                    }
                 }
                 else{
                    //we dont have data
                 }

              }

              ?>


           </table>
        </div>
    </div>
       <!-- main content ends  -->
<?php include('partials/footer.php') ?>