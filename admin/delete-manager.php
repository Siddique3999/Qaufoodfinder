<?php

include("../constrains/constrain.php");

//ID to be deleted
$id = $_GET['id'];

//SQL command 
$sql = "DELETE FROM tbl_manager WHERE id = $id";

//Excute querry
$res = mysqli_query($conn ,$sql);

//Check wheter deleted or not 
if($res == true){
$_SESSION['delete'] = "<div class = 'success'>Manager deleted successfully</div>";
//Redirect to manage admin page 
header('location:'.SETURL.'admin/manage-manager.php');
}
else
{
    $_SESSION['delete'] = "<div class = 'error'>Failed to delete Manager. Try Again later</div>";
    //Redirect to manage admin page 
    header('location:'.SETURL.'admin/manage-manager.php');
}


?>