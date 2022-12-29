<?php include('partials/menu.php') ?>
       <!-- main content ends  -->
    <div class ="main">
       <div class="wrapper">
           <h1>MANAGE restaurant</h1>
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

            <!--button to add res -->
            <a href="add-restaurant.php" class ="btn-primary">add restaurant</a>
            <br /><br />
           <table class="tbl-full">
              <tr>
                 <th >S.no</th>
                 <th>Restaurant name</th>
                 <th>restaurant address</th>
                 <th>restuarant number</th>
                 <!--<th>Picture</th>-->
                 <th>actions</th>
              </tr>

              <?php
              $sql = "SELECT * FROM restaurant";

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
                       $R_ID=$rows['R_ID'];
                       $R_Name=$rows['R_Name'];
                       $R_Address=$rows['R_Address'];
                       $R_Number=$rows['R_Number'];

                       // displaying
                       ?>


                       <tr>
                              <td> <?php echo $sn++; ?></td>
                              <td><?php echo $R_Name; ?></td>
                              <td><?php echo $R_Address; ?></td>
                              <td><?php echo $R_Number ;?></td>
                            <!-- <td><img src="Admin-images/huzaifa.jpeg" alt="BOSS" class ="resize"></td> -->
                              <td>
                                 <a href="<?php echo SITEURL; ?>admin/update-restaurant.php?R_ID=<?php echo $R_ID;?>"class = "btn-secondary">update</a>
                                 <a href="<?php echo SITEURL; ?>admin/delete-restaurant.php?R_ID=<?php echo $R_ID;?>"class = "btn-danger">delete</a>
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