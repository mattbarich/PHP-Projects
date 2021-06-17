<?php
include "header.php";
require "functions.php";
$dsn = 'mysql:host=localhost;dbname=cs_350';
$username = 'student';
$password = 'CS350';
$login = $_SESSION['user_loggin_in'] ?? NULL;
?>

<form action="login.php" method="post">
    <label>Username: </label><input type="text" name="username" id="username" required placeholder="Enter Username"><br>
    <label>Password: </label><input type="password" name="password" id="password" required placeholder="Enter Password"><br>
    <input type="submit" value="Login USER"><br>
    <input type="hidden" name="login" value="<?php $login ?>'">
</form>
<?php
    $user_name = $_POST['username'] ?? NULL;
    $pass_word = $_POST['password'] ?? NULL;
    try{
        $db = new PDO($dsn,$username,$password);
        if(isset($user_name)&& isset($pass_word)){
            check_user($db,$user_name,$pass_word);
        }
    }catch (PDOException $e){
        $msg = $e->getMessage();
        echo "<h1>ERROR: $msg</h1>";
    }

