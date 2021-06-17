<?php
require('functions.php');
include "header.php"
?>
<form action="create.php" method="post">
    <label>Username: </label><input type="text" name="username" id="username" required placeholder="Enter Username"><br>
    <label>Password: </label><input type="password" name="password" id="password" required placeholder="Enter Password"><br>
    <input type="submit" value="CREATE USER"><br>
</form>
<?php
$dsn = 'mysql:host=localhost;dbname=cs_350';
$username = 'student';
$password = 'CS350';

$user_username = $_POST['username'] ?? NULL;
$user_password = $_POST['password'] ?? NULL;

try{
    $db = new PDO($dsn, $username, $password);
    if(isset($user_username) && isset($user_password)){
        $user_password = password_hash($user_password,PASSWORD_DEFAULT);
        insert($db, $user_username, $user_password);
        header("Location: home.php");
    }
}catch (PDOException $e) {
    $msg = $e->getMessage();
    echo "<p>Error: $msg</p>";
}

