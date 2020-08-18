<?php
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