<?php
require('functions.php');
include "header.php";
$dsn = 'mysql:host=localhost;dbname=cs_350';
$username = 'student';
$password = 'CS350';

try {
$db = new PDO($dsn,$username,$password);
$database = read($db);
?>
<table class="table">
    <tr>
        <td>ID</td>
        <td>Username</td>
        <td>Password</td>
    </tr>
    <?php foreach ($database as $data){
        echo "<tr>"."<td>$data[id]</td>"."<td>$data[username]</td>"."<td>$data[password]</td>"."</tr>";
    }?>
</table><?php
}catch (PDOException $e) {
$msg = $e->getMessage();
echo "<p>Error: $msg</p>";
}
