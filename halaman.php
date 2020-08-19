<?php
    session_start();
    include "koneksi.php";
    if($_SESSION['id_user'] != NULL)
    {
        $user = $_SESSION['id_user'];
    }else{
        $user = 0;
    }

    if($user == 0)
    {
        header('location:login.php');
    }
    include "template/header.php";
    include "template/menu.php";
        if(!empty($_GET['page']))
        {
            include_once($_GET['page'].".php");
        }else{
            include "home.php";
        }
    include "template/footer.php";
?>