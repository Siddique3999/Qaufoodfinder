<?php include('partials/menu-admin.php')?>
<div class = "Main-content">

         <div class = "wrapper">
            <h1> Update Manager </h1>
            <br></br>
 <?php
// GET ID
$id = $_GET['id'];

//SQL QUERY
$sql = "SELECT * FROM tbl_manager WHERE id = $id";

//EXUCUTE QUERY
$res = mysqli_query($conn , $sql);

//Check whether query is executed or not
if($res==true)
{
    
    $count = mysqli_num_rows($res);

    //Check wheter data is avaliable  or not
    if($count==1)
    {
        $row = mysqli_fetch_assoc($res);
        $full_name = $row['full_name'];
        $username = $row['username']; 
    }
    else
    {
        //Redirect to manage admin page 
        header('location:'.SETURL.'admin/manage-admin.php') ;
    }

}

?>
            <form action="" method = "POST">
            <table class = "tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td>
                        <input type="text"  name="full_name" value = "<?php echo $full_name?>">
                    </td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td>
                        <input type="text"  name="username" value = "<?php echo $username?>" >
                    </td>
                </tr>

                <tr>
                    
                    <td colspan = "2">
                        <input type="hidden" name="id" value = "<?php echo $id ?>">
                        <input type="Submit" name="submit" value = "Update Manager" class="btn-secondry">
                    </td>
                </tr>

            </table>
        </form>
         </div>


</div>
<?php
if(isset($_POST['submit'])){
    
    //GET ALL VALUES FROM FORM TO UPDATE
    echo $id = $_POST['id'];
    echo $full_name = $_POST['full_name'];
    echo $username = $_POST['username'];
   
    //Create SQL Query
    $sql = "UPDATE tbl_manager SET full_name ='".$full_name."', username ='".$username."'
      WHERE id='".$id."' ";

    //EXECUTE QUERY
    $res = mysqli_query($conn ,$sql);

    if($res == true )
    {
      $_SESSION['update'] = "<div class = 'success'> Admin is Updated Successfully </div>";
      header("location:".SETURL."admin/manage-manager.php");
    }
    else
    {
        $_SESSION['update'] = "<div class = 'error'> Admin is not Updated  </div>";
        header("location:".SETURL."admin/manage-manager.php");
    }

}
?>
<?php include('partials/footer.php')?>