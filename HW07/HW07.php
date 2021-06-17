<?php
$words = array('sausage', 'blubber', 'pencil', 'computer','school');
$method = $_SERVER['REQUEST_METHOD'];
$secret = $_POST['secret'] ?? "";
$user_attempts = $_POST['user_attempts'] ?? 0;
$user_guess = $_POST['user_guess'] ?? "";
$word = $_POST['word'] ?? "";
$user_misses = $_POST['user_misses'] ?? "";

if($method == 'GET'){
    $key = array_rand($words, 1);
    $word = $words[$key];
    for($i=0; $i<strlen($word); $i++){
        $secret .= '*';
    }
}
else if($method == 'POST'){
    $check_guess = false;
    $user_guess = strtolower($user_guess);
    for($i=0; $i<strlen($word); $i++){
        if($user_guess == $word[$i]){
            $secret[$i] = $word[$i];
            $check_guess = true;
        }
    }
    if($check_guess == false){
        $user_attempts++;
        $user_misses .= $user_guess . ' ';
    }
    if(strpos($secret, '*') === false){
        ?><style>
            body{
                background-color: green;
            }
        </style><?php
        echo "<h1>You won!</h1><br>";
        echo "<p1>Gregory Survived!!!</p1><br>";
        echo "<p1>The word was: ".$word."</p1>";
        exit();
    }
}

if($user_attempts >= 3){
    ?><style>
        body{
            background-color: red;
        }
    </style><?php
    echo "<h1>You lost!</h1><br>";
    echo "<p1>Gregory died :(</p1><br>";
    echo "<p>The word was: " .$word. "</p>";
}
else{
    ?><head>
        <title>Hangman HW07</title>
    </head>
    <style>
        body{
            background-color: navy;
        }
        h1{
            font-family: "MingLiU-ExtB";
            color: aliceblue;
        }
        p1{
            font-family: "MingLiU-ExtB";
            color: aliceblue;
        }
        p2{
            font-family: "MingLiU-ExtB";
            color: aliceblue;
            font-size: 36px;
        }
    </style>
    <body>
        <h1>Lets Play Hangman!</h1>
        <p2><?php echo $secret;?></p2><br>
        <p1>Player Attempts: <?php print $user_attempts;?> of 3</p1><br>
        <p1>Player Misses: <?php print $user_misses;?></p1><br>
        <form action="HW07.php" method="post">
            <input type="text" name="user_guess" minlength="1" maxlength="1" required>
            <input type="hidden" value="guessed" name="hidden">
            <input type="hidden" name="secret"  value="<?php echo $secret;?>">
            <input type="hidden" name="user_attempts" value="<?php echo $user_attempts;?>">
            <input type="hidden" name="word" value="<?php echo $word;?>">
            <input type="hidden" name="user_misses" value="<?php echo $user_misses;?>">
            <input type="submit" value="Guess!">
        </form>
    </body>

    <?php
}
