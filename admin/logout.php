<?php
include('../constrains/constrain.php');

session_destroy();

header("location:".SETURL."admin/login.php");

?>