<?php include('partials/menu.php') ?>
       <!-- main content ends  -->
    <div class ="main">
       <div class="wrapper">
           <h1>MANAGE CUSTOMERS</h1>
            <br />
            <?php
               if(isset($_SESSION['add'])){
                  echo $_SESSION['add'];
                  unset($_SESSION['add']);//removing session message
               }
            ?>
            <br /><br /><br />

            <!--button to add admin -->
            <a href="add-customer.php" class ="btn-primary">add customer</a>
            <br /><br />
           <table class="tbl-full">
              <tr>
                 <th >S.no</th>
                 <th>FULL NAME</th>
                 <th>EMAIL</th>
                 <th>ADDRESS</th>
                 <th>MOBILE</th>
                 <!--<th>Picture</th>-->
              </tr>

              <?php
              $sql = "SELECT * FROM customer";

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
                       $C_ID=$rows['C_ID'];
                       $C_Name=$rows['C_Name'];
                       $C_Email=$rows['C_Email'];
                       $C_Address=$rows['C_Address'];
                       $C_Mobile=$rows['C_Mobile'];
                       // displaying
                       ?>

                       <tr>
                              <td> <?php echo $sn++; ?></td>
                              <td><?php echo $C_Name; ?></td>
                              <td><?php echo $C_Email; ?></td>
                              <td><?php echo $C_Address ;?></td>
                              <td><?php echo $C_Mobile ;?></td>
                            <!-- <td><img src="Admin-images/huzaifa.jpeg" alt="BOSS" class ="resize"></td> -->
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