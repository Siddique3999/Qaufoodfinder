<?php include('../constrains/constrain.php')?>
<html>
    <head>
        <title>Login-Qau Food Finder</title>
        <link rel = "stylesheet" href ="..\css\admin.css" >
    </head>
    <body>
        <div class="login">
            <h1 class = "text-align">Login</h1>
            <?php
            if(isset($_SESSION['login']))
             {
                echo $_SESSION['login'];  // Adding message 
                unset($_SESSION['login']); // Removing message 
             }
             if(isset($_SESSION['No-login']))
             {
                echo $_SESSION['No-login'];  // Adding message 
                unset($_SESSION['No-login']); // Removing message 
             }
                ?>
                </br>
           <form action="" method = "POST" class = "text-align" >
               Username:<br></br>
               <input type="text" name = "username" placeholder = "Enter Username"><br></br>
               Password:<br></br> 
               <input type="password" name = "password" placeholder = "Enter password"><br></br>

               <input type="submit" name = "submit" value = " Login " class =  "btn-primary">
           </form>
        </div>
    </body>
</html>
<?php
if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //Check whether user exists or not
    $sql =  "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";

    //Execute query
    $res = mysqli_query($conn , $sql);

    //Check for the user
    $count = mysqli_num_rows($res);
    if($count == 1)
    {
        $_SESSION['login'] = "<div class ='success'>Login successfully</div>";
        $_SESSION['user'] = "$username";
        header("location:".SETURL."admin/");
        
    }
    else
    {
        $_SESSION['login'] = "<div class ='error'>Login Failed</div>";
        header("location:".SETURL."admin/login.php");
    }
}
    

?>