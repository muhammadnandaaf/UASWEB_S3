<?php
    session_start();
    require 'config.php';

    if(isset($_GET['search'])){
        $keyword = $_GET['keyword'];
        $result = mysqli_query($db, "SELECT * FROM admin_crud
                                    WHERE disease LIKE '%$keyword%' 
                                    OR descr LIKE '%$keyword%'");
        while($row = mysqli_fetch_assoc($result)){
            $admin_crud[] = $row; 
        }
    }else{
        $result = mysqli_query($db, "SELECT * FROM admin_crud");
        while($row = mysqli_fetch_assoc($result)){
            $admin_crud[] = $row;
        }
    }
    
    if(!isset($_SESSION['login'])){
        echo"
        <script>
            alert('Akses Ditolak, Silahkan Login Dahulu!');
            document.location.href='index.php';
        </script>";
    }else{
        $username = $_SESSION['login'];     
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Me</title>

    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>
<body>
    <!-- header -->
    <header>
        <a href="https://apollohomecare.com/blog/disease-awareness-preventive-care-tips/#:~:text=Disease%20awareness%20is%20the%20understanding,the%20ways%20to%20prevent%20it." class="logo">Diseases <span>Awareness</span></a>
        <div class="bx bx-menu" id="menu-icon"></div>

        <ul class="navbar">
            <li><a href="#home">Home</a></li>
            <li><a href="#diseases">Diseases</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="logout.php">LogOut</a></li>
            <li><label id="dark"></label></li>
        </ul>
    </header>
    <!-- home -->
    <section class="home" id="home">
        <div class="home-text">
            <h1>Apa itu <span class="diseases">Diseases</span> Awareness? <br></h1>
            <p>Mekanisme dimana profesional kesehatan mengajar pasien dan anggota keluarga mereka tentang penyakit mereka,<br>
                untuk berkolaborasi sebagai tim menuju tindak lanjut yang lebih baik dari pasien dan manajemen diri
                dari faktor-faktor yang dapat dimodifikasi terkait terhadap penyakitnya.</p>
        </div>
    </section>



    <!-- container -->
    <section class="container" id="diseases">

        <div class="text">
            <h2>Penyakit yang ada pada tubuh manusia</h2>
        </div>        

        <form action="" method="GET">
            <div class="searchBox">
                <input class="searchInput"type="text" name="keyword" placeholder="Search">
                <button class="searchButton" name="search" href="#">
                    <i class="material-icons"></i>
                </button>
                <button href="main.php">reset</button>
            </div>  
        </form>

        <div class="row-items">


            <?php if(isset($admin_crud)){foreach($admin_crud as $admin_crud):?> 

                <div class="container-head">
                    <div class="head-img">
                        <image src=<?php echo "img/".$admin_crud['gambar']; ?> >
                    </div>
                    <h4><?php echo $admin_crud['disease'];?></h4>
                    <p><?php echo $admin_crud['descr'];?></p> 
                </div>           
            <?php endforeach; }?>
        </div>
    </section>


     <!-- footer -->
    <section id="contact">
        <div class="footer">
            <div class="main">
                <div class="list">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                </div>

                <div class="list">
                    <h4>Contact Info</h4>
                    <ul>
                        <li><a href="#">Jalan P.M Noor</a></li>
                        <li><a href="#">Perum Griya Mukti Sejahtera</a></li>
                        <li><a href="https://wa.me/083818561221">+62 838-1856-1221</a></li>
                        <li><a href="https://gmail.com">muhammadnandaaf@gmail.com</a></li>
                    </ul>
                </div>

                <div class="list">
                    <h4>Social Media</h4>
                    <div class="social">
                        <a href="https://github.com/muhammadnandaaf/nandaaf.github.io"><img src="img/githubicon.png" alt=""></a>
                        <a href="https://www.tiktok.com/@foody.fdy?_t=8WDmnXQgVTF&_r=1"><img src="img/tiktokicon.png" alt=""></a>
                        <a href="https://instagram.com/_lnanda_arjunal_?igshid=YmMyMTA2M2Y="><img src="img/igicon.png" alt=""></a>
                    </div>
                </div>


            </div>
        </div>

        <div class="end-text">
            <p>Copyrigth ©2022 All rights reserved | Made with by Muhammad Nanda</p>
        </div>
    </section>

    <!-- link to js -->
    <script type="text/javascript" src="main.js"></script>
    
</body>
</html>