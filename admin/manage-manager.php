<?php include('partials/menu-admin.php')?>

     <!-- main content starts here  -->
     <div class = "Main-content">
     
         <div class = "wrapper">
          <h1>   Manage Manager </h1>
             <br></br>

             <?php
             if(isset($_SESSION['add']))
             {
                 echo $_SESSION['add'];  //Adding message 
                 unset($_SESSION['add']); //Removing message 
             }
             if(isset($_SESSION['delete']))
             {
                echo $_SESSION['delete'];  //Adding message 
                unset($_SESSION['delete']); //Removing message 
            }
            if(isset($_SESSION['update']))
             {
                echo $_SESSION['update'];  //Adding message 
                unset($_SESSION['update']); //Removing message 
            }
            if(isset($_SESSION['user-not-found']))
             {
                echo $_SESSION['user-not-found'];  //Adding message 
                unset($_SESSION['user-not-found']); //Removing message 
            }
            if(isset($_SESSION['pw-not-matched']))
             {
                echo $_SESSION['pw-not-matched'];  // Adding message 
                unset($_SESSION['pw-not-matched']); // Removing message 
            }
            if(isset($_SESSION['pw-changed']))
            {
               echo $_SESSION['pw-changed'];  // Adding message 
               unset($_SESSION['pw-changed']); // Removing message 
           }
             ?>

             <br></br>
             <!-- Add admin button -->
             <a class = "btn-primary" href="add-manager.php">Add Manager</a>
             <br></br>


             <table  class = "tbl-full">
                 <tr>
                     <th>S.N</th>
                     <th>Full Name</th>
                     <th>User Name</th>
                     <th>Actions</th>
                 </tr>

                <?php
                  $sn = 1;
                  //query to select all admin
                  $sql = "SELECT * FROM tbl_manager";
                  //Execute all the query
                  $res = mysqli_query($conn , $sql);
                  //Check wheter query is eecuted or not
                  if($res == TRUE){
                      //count rows to check data is in database or not 
                      $rows = mysqli_num_rows($res);
                      if($rows>0){
                          while($rows = mysqli_fetch_assoc($res)){
                              //fetch data
                              $id = $rows['id'];
                              $full_name = $rows['full_name'];
                              $username = $rows['username'];
                          
                          ?>
                            <tr>
                               <td><?php echo $sn++ ?></td>
                               <td><?php echo $full_name ?></td>
                               <td><?php echo $username ?></td>
                               <td>
                                  <a class = "btn-primary" href="<?php echo SETURL ?>admin/Change-password.php?id=<?php echo $id?>">Change password</a>
                                  <a class = "btn-secondry" href="<?php echo SETURL ?>admin/update-manager.php?id=<?php echo $id?>">Update Manager</a>
                                  <a class = "btn-danger" href="<?php echo SETURL ?>admin/delete-manager.php?id=<?php echo $id?> ">Delete Manager</a>
                             </td>
                         </tr>


                          <?php
                          }
                      }


                  }

                ?>
             </table>
        

          </div>
         </div>
     <!-- main content ends here  -->

    <?php include('partials/footer.php')?>
