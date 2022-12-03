<?php
    require 'config.php';
    $admin_crud = [];

    if(isset($_POST['submit'])){
        $data = "SELECT * FROM admin_crud";
        $result = mysqli_query($db, $data);
        $admin_crud = [];
        while($row = mysqli_fetch_assoc($result)){
            $admin_crud[] = $row;
        }

        $disease = htmlspecialchars($_POST['disease']);
        $descript = htmlspecialchars($_POST['descr']);

        //gambar
        $file = $_FILES["pict"]["name"];
        $temp = $_FILES["pict"]["tmp_name"];
        $ex = explode('.',$file);
        $filter = urlencode($ex[0]);
        $folder = "./img/" . $filter;

        $result = mysqli_query($db,
        "INSERT INTO admin_crud (gambar,disease,descr)
        VALUES ('$filter','$disease','$descript')");

        if($result){
            move_uploaded_file($temp, $folder);
            if($result){
                echo "
                <script>
                    alert('Add Data Success!!');   
                    document.location.href='adminPage.php'; 
                </script>";
            }else{
                echo "
                <script>
                    alert('Add Data Failed!!'); 
                    document.location.href='add.php';    
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
    <title>Add Data</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <!-- header -->
    <header>
        <a href="adminPage.php" class="logo">Welcome <span>Admin</span></a>
        <div class="bx bx-menu" id="menu-icon"></div>

        <ul class="navbar">
            <li><a href="adminPage.php">Profile</a></li>
            <li><a href="adminPage.php#contact">Contact</a></li>
            <li><a href="logout.php">LogOut</a></li>
        </ul>
    </header>

    <div class="container">
        <div class="title">Add Data </div>
            <div class="content">
                <form action="" method="POST" enctype="multipart/form-data" alt="">
                    <div class="user-details">

                        <div class="input-box">
                            <span class="details">Upload Picture : </span>
                            <input type="file" name="pict" id="pict" required>
                        </div>

                        <div class="input-box">
                            <span class="details">Body Part : </span>
                            <input type="text" placeholder="Disease" name="disease" id="about" required>
                        </div>

                        <div class="input-box">
                            <span class="details">Description : </span>
                            <input type="text" placeholder="Your Description" name="descr" id="education" required>
                        </div>
                    </div>

                    <button type="submit" class="button_submit" name="submit">
                            <span class="button_text">Submit</span>
                            <i class="button_icon fas fa-chevron-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>