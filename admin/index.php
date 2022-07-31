<?php include('partials/menu-admin.php')?>



     <!-- main content starts here  -->
     <div class = "Main-content">
     
         <div class = "wrapper">
         <h1> Dashboard </h1>
         <?php
         if(isset($_SESSION['login']))
             {
                echo $_SESSION['login'];  // Adding message 
                unset($_SESSION['login']); // Removing message 
             }
          ?>
            
             <div class="col-4">
                 <?php
                 $sql = "SELECT * FROM tbl_hotel";
                 $res = mysqli_query($conn , $sql);
                 $count = mysqli_num_rows($res);
                 ?>
                 <h1><?php echo $count;?></h1>
                 Huts
             </div>
             <div class="col-4">
             <?php
                 $sql2 = "SELECT * FROM tbl_food";
                 $res2 = mysqli_query($conn , $sql2);
                 $count2 = mysqli_num_rows($res2);
                 ?>
                 <h1><?php echo $count2;?></h1>
                 Foods
             </div>
             <div class="col-4">
             <?php
                 $sql3 = "SELECT * FROM tbl_orders";
                 $res3 = mysqli_query($conn , $sql3);
                 $count3 = mysqli_num_rows($res3);
                 ?>
                 <h1><?php echo $count3;?></h1>
                 Total Orders
             </div>
             <div class="col-4">
                <?php

                $sql4 = "SELECT sum(total) AS TOTAL FROM tbl_orders where status = 'Delivered'";
                $res4 = mysqli_query($conn , $sql4);
                $row4 = mysqli_fetch_assoc($res4);
                $total_revenue = $row4['TOTAL']
                ?>
                 <h1>RS <?php echo $total_revenue;?></h1>
                 Revenue Generated
             </div>
             <div class="clearfix">

             </div>
        

          </div>
         </div>
     <!-- main content ends here  -->

     <?php include('partials/footer.php')?>