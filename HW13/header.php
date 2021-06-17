<head>
    <style>
        body{
            background: aqua;
        }
        .user-nav-bar{
            padding: 25px;
        }
        .nav-bar{
            text-align: left;
            margin: auto;
            padding: 15px;
            text-decoration: none;
        }
        .table{
            border: 1px solid navy;
            width: 50%;
            text-align: center;
            padding: 15px;
            text-decoration: none;
            font-family: Arial;
        }
    </style>
</head>

<?php
session_start();
if(isset($_SESSION['user_loggin_in']) === true){
    ?><div class="user-nav-bar">
        <a href="home.php">HOME</a>
        <a href="secret.php">SECRET</a>
        <a href="logout.php">LOGOUT</a>
    </div><?php
}else{
    ?><div class="nav-bar">
        <a href="home.php">HOME</a>
        <a href="create.php">CREATE USER</a>
        <a href="login.php">LOGIN</a>
    </div><?php
}

