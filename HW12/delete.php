<?php
$dsn = 'mysql:host=localhost;dbname=cs_350';
$username = 'student';
$password = 'CS350';

$id = $_GET['id'];
try{
    $db = new PDO($dsn, $username, $password);
    $delete = "DELETE FROM barich_hw13 WHERE id=".$id;
    $deleteStatement = $db->prepare($delete);
    $deleteStatement ->execute();
    header("Location: read.php");

}catch (PDOException $e){
    $msg = $e->getMessage();
    echo "<p>Error: $msg</p>";
}
