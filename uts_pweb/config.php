<?php
    $server = "sql304.epizy.com";
    $username = "epiz_33002115";
    $password = "UqY7RiN5e1SEqJH";
    $db_name = "epiz_33002115_pweb_matkul";

    $db = new mysqli($server,$username,$password,$db_name);

    if (!$db){
        die("Failed To Connect".$db->connect_error);
    }
?>