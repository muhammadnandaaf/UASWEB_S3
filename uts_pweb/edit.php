<?php 

    require 'config.php';
    // Menangkap ID dari url yang dikirimkan
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        // Tampilkan Value Inputan dari ID 
        $result = mysqli_query($db,
        "SELECT * FROM admin_crud WHERE id='$id'");
        $row = mysqli_fetch_array($result);


        if(isset($_POST['submit'])){
            $disease = htmlspecialchars($_POST['disease']);
            $descript = htmlspecialchars($_POST['descr']);
            //gambar
            $file = $_FILES["pict"]["name"];
            $temp = $_FILES["pict"]["tmp_name"];
            $ex = explode('.',$file);
            $filter = urlencode($ex[0]);
            $folder = "./img/" . $filter;

            $result = mysqli_query($db, 
            "UPDATE admin_crud SET 
                gambar = '$filter',
                disease = '$disease',
                descr = '$descript'
            WHERE id='$id'");

            if($result){
                echo "
                <script>
                    alert('Data Berhasil di Update')
                    document.location.href='adminPage.php';
                </script>;
                ";
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
    <title>EDIT DATA</title>

    <link rel="stylesheet" href="edit.css">
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
        <div class="title">EDIT YOUR DATA</div>
            <div class="content">
                <form action="" method="POST" enctype="multipart/form-data" alt="">
                    <div class="user-details">

                        <div class="input-box">
                            <span class="details">Upload Picture : </span>
                            <input type="file" name="pict" id="pict" value=<?=$row['gambar']?>required>
                        </div>

                        <div class="input-box">
                            <span class="details">Body Part : </span>
                            <input type="text" placeholder="Disease" name="disease" id="about" value=<?=$row['disease']?> required>
                        </div>

                        <div class="input-box">
                            <span class="details">Description : </span>
                            <input type="text" placeholder="Your Description" name="descr" id="education" value=<?=$row['descr']?> required>
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