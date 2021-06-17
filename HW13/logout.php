<?php
session_start();
include("header.php");
if($_SESSION['user_loggin_in'] === true){
    echo 1;
}else{echo 2;}
session_unset();
session_destroy();
header("Location: home.php");

