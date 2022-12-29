     <?php
          //starting session 
          session_start();



          //constant for non repeating values
          define('SITEURL','http://localhost/food/');
          define('LOCALHOST','localhost');
          define('DB_USERNAME','root');
          define('DB_PASSWORD','');
          define('DB_NAME','db_sda');


          $connect = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());//username and password
          $db_select = mysqli_select_db($connect,DB_NAME) or die(mysqli_error());

     ?>


