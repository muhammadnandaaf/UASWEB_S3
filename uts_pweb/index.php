<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Account</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container"> 
        <div class="screen"> 
            <div class="screen__content"> 
                <form action=""  method="POST" class="login">

                    <h2>Login</h2>
                    
                    <div class="login_field>
                        <i class="login__icon fas fa-user"></i>
                        <label for="username">Username : </label>
                        <input type="text" class="login__input" name="username" required placeholder="Your Username"> <br>
                    </div>

                    <div class="login_field>
                        <i class="login__icon fas fa-user"></i>
                        <label for="password">Password: </label>
                        <input type="password" class="login__input" name="password" required placeholder="Your Password"> <br>
                    </div>

                    <button type="submit" class="button login__submit" name="login" value="Login">
                        <span class="button__text">Log In</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>

                </form>

                <br>
                <h5>Don't Have an Account? 
                    <a href="regis.php">Registration</a>
                </h5>
                <h5>Login as Admin!
                    <a class="admin" href="admin.php">Admin</a>
                </h5>

            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    session_start();
    require 'config.php';

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM reglog WHERE username='$username'";
        // var_dump($sql);
        $result = $db->query($sql);
        // var_dump($result);

        if (mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_array($result);
            // var_dump($row);
            $username = $row['username'];

            if(password_verify($password, $row['pass'])){
                
                $_SESSION['login'] = $username;
                
                echo "
                <script> 
                    alert('Selamat Datang $username');
                    document.location.href = 'main.php';
                </script>";
            }else{
                echo "
                <script> 
                    alert('Username dan Password Salah!');
                </script>";
            }
        }else{
            echo"
            <script> 
                alert('Username tidak terdaftar, silahkan registrasi!!');
            </script>";
        }
    }
?>   