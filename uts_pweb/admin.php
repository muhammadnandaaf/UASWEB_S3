<!DOCTYPE html>
<html lang="en">
<head>
    <title>ADMIN LOGIN</title>
    <link rel="stylesheet" href="admin.css">

</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="POST">
        <h3>Login Here</h3>

        <label for="login">Login </label>
        <input type="text" id="admin" name="adminName">

        <label for="password">Password</label>
        <input type="password" id="password" name="adminPass">

        <button type="submit" name="login" value="Login">
            Log In as Admin
        </button>

        <div class="social">
          <div class="go"><a href="index.php">User Login</a></div>
        </div>
    </form>
</body>
</html>

<?php
    session_start();
    
    if(isset($_POST['login'])){
        $admin = array('admin'=>'admin');

        $username = isset($_POST['adminName']) ? $_POST['adminName'] : '';
        $password = isset($_POST['adminPass']) ? $_POST['adminPass'] : '';

        if(isset($admin[$username]) && $admin[$username]==$password){
            $_SESSION['UserData']['username']=$admin[$username];
            header("location: adminPage.php");
            exit;
        }else{
            echo "
            <script>
                alert('Gagal Masuk!!');
            </script>";
        }
    }


?>