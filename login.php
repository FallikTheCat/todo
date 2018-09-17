<?php

include "includes/db.php";
session_start();

?>

<?php 

if(isset($_POST['submit']))
{
   
$email = $_POST['email'];
$password = $_POST['password'];
    
$hash = "$1$1055moya$";
$password_hashed = crypt($password, $hash);
    
$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password_hashed' ";
$users_login = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($users_login);
    
    if($row['email'] == $email && $row['password'] == $password_hashed)
    {
        $user_id = $row['id'];
        
        $query = "SELECT * FROM users WHERE id = $user_id ";
        $user_login_id = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($user_login_id);
        $_SESSION['id'] = $user_id;
        
        if(!$user_login_id)
            {
                die("QUARY FAILED" . mysqli_error($connection));
            }
        
         header("Location: http://localhost/d1/todo_index.php");
    
    }else 
    {
        echo "Can't Login! Check your Email or Password.";
    }
    
}



?>

<html>
<head>
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
<body>
    <div class="loginbox">
    <img src="avatar1.png" class="avatar">
        <h1>Login</h1>        
        <form action="" method= "post">
            
            <p>Email</p>
            <div class="textbox">
            <i class="fa fa-envelope"></i>
            <input type="text" name="email" placeholder="Enter Email">
            </div>
            
            <p>Password</p>
            <div class="textbox">
                <i class="fa fa-unlock-alt"></i>
                <input type="password" name="password" placeholder="Enter Password"><br>
            </div>
            <br>
            <input type="submit" name="submit" value="Log In">
            
    
        </form>        
    </div>

</body>
</head>
</html>