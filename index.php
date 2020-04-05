<?php
    session_start();
    var_dump($_SESSION);
    if($_SESSION['user']){
        header('Location: homepage.php');
    }else{
        header('Location: login.php');
    }



?>