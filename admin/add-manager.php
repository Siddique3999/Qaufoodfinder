<?php include('partials/menu-admin.php')?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Manager</h1>
        <br></br>
        <?php
             if(isset($_SESSION['add'])){
                 echo $_SESSION['add'];  // Adding message 
                 unset($_SESSION['add']); // Removing message 
             }
             ?>
        <form action="" method = "POST">
            <table class = "tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td>
                        <input type="text" placeholder="Enter Full name" name="full_name">
                    </td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td>
                        <input type="text" placeholder="Enter User name" name="username">
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" placeholder="Enter Password" name="password">
                    </td>
                </tr>
            
                <tr>
                    
                    <td colspan = "2">
                        <input type="Submit" name="submit" value = "Add Manager" class="btn-secondry">
                    </td>
                </tr>

            </table>
        </form>

    </div>
</div>

<?php include('partials/footer.php')?>

<?php
if(isset($_POST["submit"])){
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

     $sql = "INSERT INTO tbl_manager SET  full_name = '$full_name', username =  '$username', password =  '$password'";



    $res = mysqli_query($conn ,$sql) or die(mysqli_error());
    if($res == TRUE){
        // Creating session variable
        $_SESSION['add'] = "<div class = 'success'>Manager added succesfully </div>";
        // Redirect to manange admin page
        header("location:".SETURL.'admin/manage-manager.php');
    }
    else
    {
        // Creating session variable
        $_SESSION['add'] = "<div class = 'error'>Manager not added </div>";
        // Redirect to manange admin page
        header("location:".SETURL.'admin/add-manager.php');
    }

}

?>