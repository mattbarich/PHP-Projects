<?php
require "functions.php";
include "header.php";
if(isset($_SESSION['user_loggin_in'])){
    echo "Hello the secret is MATT IS COOL";
}else{

    echo "Please Login to see Secret Message";?>
    <br><br><a href="home.php">Home</a> <?php
}
