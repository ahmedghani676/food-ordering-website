<?php include('partials/menu.php') ?>
       <!-- main content ends  -->
    <div class ="main">
       <div class="wrapper">
           <h1>MANAGE DISHES</h1>
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
            <a href="add-dishes.php" class ="btn-primary">add dish</a>
            <br /><br />
           <table class="tbl-full">
              <tr>
                 <th >S.no</th>
                 <th> dish name</th>
                 <th> dish description</th>
                 <th>dish price</th>
                 <th>dish STOCK</th>
                 <!--<th>Picture</th>-->
                 <th>actions</th>
              </tr>

              <?php
              $sql = "SELECT * FROM dish";

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
                       $D_ID=$rows['D_ID'];
                       $D_Name=$rows['D_Name'];
                       $D_Description=$rows['D_Description'];
                       $D_Price=$rows['D_Price'];
                       $D_Stock=$rows['D_Stock'];
                       
                       // displaying
                       ?>


                       <tr>
                              <td> <?php echo $sn++; ?></td>
                              <td><?php echo $D_Name; ?></td>
                              <td><?php echo $D_Description; ?></td>
                              <td><?php echo $D_Price ;?></td>
                              <td><?php echo $D_Stock ;?></td>
                            <!-- <td><img src="Admin-images/huzaifa.jpeg" alt="BOSS" class ="resize"></td> -->
                              <td>
                                 <a href="<?php echo SITEURL; ?>admin/update-dishes.php?D_ID=<?php echo $D_ID;?>"class = "btn-secondary">update</a>
                                 <a href="<?php echo SITEURL; ?>admin/delete-dishes.php?D_ID=<?php echo $D_ID;?>"class = "btn-danger">delete</a>
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