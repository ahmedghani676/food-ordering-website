<?php include('partials/menu.php') ?>
       <!-- main content ends  -->
    <div class ="main">
       <div class="wrapper">
           <h1>MANAGE DEALS</h1>
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
            <a href="add-deal.php" class ="btn-primary">add deal</a>
            <br /><br />
           <table class="tbl-full">
              <tr>
                 <th >S.no</th>
                 <th> deal name</th>
                 <!-- <th>deal restaurant</th> -->
                 <th> deal description</th>
                 <th>deal price</th>
                 <th>deal STOCK</th>
                 
                 <!--<th>Picture</th>-->
                 <th>actions</th>
              </tr>

              <?php
              $sql = "SELECT * FROM deal";

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
                       $DD_ID=$rows['DD_ID'];
                       $DD_Name=$rows['DD_Name'];
                       $DD_Description=$rows['DD_Description'];
                       $DD_Price=$rows['DD_Price'];
                       $DD_Stock=$rows['DD_Stock'];
                       
                       // displaying
                       ?>


                       <tr>
                              <td> <?php echo $sn++; ?></td>
                              <td><?php echo $DD_Name; ?></td>
                              <td><?php echo $DD_Description; ?></td>
                              <td><?php echo $DD_Price ;?></td>
                              <td><?php echo $DD_Stock ;?></td>
                            <!-- <td><img src="Admin-images/huzaifa.jpeg" alt="BOSS" class ="resize"></td> -->
                              <td>
                                 <a href="<?php echo SITEURL; ?>admin/update-deal.php?DD_ID=<?php echo $DD_ID;?>"class = "btn-secondary">update</a>
                                 <a href="<?php echo SITEURL; ?>admin/delete-deal.php?DD_ID=<?php echo $DD_ID;?>"class = "btn-danger">delete</a>
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