<?php
    require 'config.php';

    if(isset($_POST['regis'])){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['pass'];

        $sql = "SELECT * FROM reglog WHERE username ='$username'";
        $user = $db;
        $result = $db->query($sql);

        if (mysqli_num_rows($result) > 0){
            echo "
            <script>
                alert('Telah digunakan silahkan ganti username dan password anda')
            </script>";
        }else{
            $password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO reglog (email,username,pass)
                            VALUES ('$email','$username','$password')";
            $result = $db->query($query);
            

            if($result){
                echo"<script>
                    alert('Registrasi Berhasil');
                    document.location.href = 'index.php';
                </script>";
            }else{
                echo"
                <script>
                    alert('Registrasi Gagal');
                </script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Your Account</title>
    <link rel="stylesheet" type="" href="regis.css">
    
    <!-- ICON -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">


</head>
<body>
    <div class="container"> 
        <div class="screen">
            <div class="screen__content"> 
                <form action=""  method="POST" class="regis">

                    <h2>Registration</h2>
                    <div class="regis_field>
                        <i class="regis__icon fas fa-user"></i>
                        <label for="email">Email : </label>
                        <input type="text" class="regis__input" name="email" id="email" required placeholder="Email"> <br>
                    </div>

                    <div class="regis_field>
                        <i class="regis__icon fas fa-user"></i>
                        <label for="username">Username : </label>
                        <input type="text" class="regis__input" name="username" required placeholder="Username"> <br>
                    </div>

                    <div class="regis_field>
                        <i class="regis__icon fas fa-user"></i>
                        <label for="password">Password: </label>
                        <input type="password" class="regis__input" name="pass" required placeholder="Your Password"> <br>
                    </div>

                    <button type="submit" class="button regis__submit" name="regis">
                        <span class="button__text">Sign Up</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>

                </form>

                <br>
                <h5>Have an Account? <a href="index.php"> <span class="h5">Sign In</span></a></h5>

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