<?php
$dsn = 'mysql:host=localhost;dbname=cs_350';
$username = 'student';
$password = 'CS350';

function read($db){
    $select = "SELECT * FROM hw13";
    $selectStatement = $db->prepare($select);
    $selectStatement->execute();
    return $selectStatement->fetchAll();
}

function insert($db, $user_username, $user_password){
    $insert = "INSERT INTO hw13(username,password) VALUES (:username, :password)";
    $insertStatement = $db->prepare($insert);
    $insertStatement->bindValue(':username', $user_username);
    $insertStatement->bindValue(':password', $user_password);
    $insertStatement->execute();
    $insertStatement->closeCursor();
}

function check_user($db, $user_name, $pass_word){
    $query = "SELECT * FROM hw13";
    $queryStatement = $db->prepare($query);
    $queryStatement->execute();
    $users = $queryStatement->fetchAll();
    foreach ($users as $user){
        if($user[1] === $user_name){
            if(password_verify($pass_word, $user[2]) === true) {
                $_SESSION['user_loggin_in'] = true;
                header("Location: home.php");
            }else{
                echo "Error Validating Username and password :( Please try again";
            }
        }
    }
}
