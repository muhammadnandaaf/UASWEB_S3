<?php 
    require 'config.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $result = mysqli_query($db,"DELETE FROM admin_crud WHERE id='$id'");
        
        if($result){
            echo "
            <script>
                alert('Data Berhasil DiHapus')
                document.location.href='adminPage.php';
            </script>";
        }
    }
?>