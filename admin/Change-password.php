<?php include('partials/menu-admin.php')?>
<div class = "Main-content">
    

         <div class = "wrapper">
            <h1> Change Password </h1>
            <br>
            <?php 
            if(isset($_GET['id'])){
                $id = $_GET['id']; 
            }
            
            ?>
            <form action="" method = "POST">
                <table class = "tbl-30">
                    <tr>
                        <td>Current Password</td>
                        <td>
                            <input type = "password" name = "current_password" placeholder = "Current password">
                        </td>
                    </tr>

                     <tr>
                        <td>New Password</td>
                        <td>
                            <input type = "password" name = "new_password" placeholder = "New password">
                        </td>
                     </tr>
                     
                     <tr>
                        <td>Confirm Password</td>
                        <td>
                            <input type = "password" name = "confirm_password" placeholder = "Confirm password">
                        </td>
                        </tr>

                     <tr>
                     <td colspan = "2">
                        <input type="hidden" name="id" value = "<?php echo $id ?>">
                        <input type="Submit" name="submit" value = "Change Password" class = "btn-secondry">
                      </td>
                     </tr>

                </table>
            </form>
        </div>
    
</div>

<?php
if(isset($_POST['submit'])){

    // Get data from form
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    //Check wheter user exits or not 
    $sql = "SELECT * FROM tbl_manager WHERE id = $id AND password = '$current_password'";

    //Execute the query
    $res = mysqli_query($conn , $sql);

    if($res == true)
    {
         //Check wheter data is avaliable or not
         $row = mysqli_num_rows($res);

         if($row == 1)
         {
             //user is avaliable and can be updated
             if($new_password == $confirm_password)
             {
                $sql2 = "UPDATE tbl_admin SET password = '$new_password' WHERE id = $id";
                $res = mysqli_query($conn , $sql2);
                if($res == true)
                {
                    $_SESSION['pw-changed'] = "<div class ='success'>Password changed</div>";
                    header("location:".SETURL."admin/manage-manager.php");  
                }
                else
                {
                    $_SESSION['pw-changed'] = "<div class ='error'>Password not changed</div>";
                    header("location:".SETURL."admin/manage-manager.php");
                }

             }
             else
             {
                $_SESSION['pw-not-matched'] = "<div class = 'error'>New and Current password doesn't matched</div>";
                header("location:".SETURL."admin/manage-manager.php");  
             }

         }
         else
         {
             $_SESSION['user-not-found'] = "<div class = 'error'>User not found</div>";
             header("location:".SETURL."admin/manage-manager.php");
         }
    }

}

?>

<?php include('partials/footer.php')?>