<?php
if(!isset($_SESSION['user']))
{
   $_SESSION['No-login'] = "<div class = 'error'>Login to access Admin panel</div>";
   header("location:".SETURL."admin/login.php");
}
?>