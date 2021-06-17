<?php
    $name = $_POST['name'];
    if ($name == null){
        echo '<script>alert("Name field left blank")</script>';
        $name = "matt";
        echo "Default name inserted <br><br>";
    }
    $adjective = $_POST['adjective'];
    if ($adjective == null){
        echo '<script>alert("Adjective field left blank")</script>';
        $adjective = "dumb";
        echo "Default adjective inserted <br><br>";
    }
    $food = $_POST['food'];
    if ($food == null){
        echo '<script>alert("Favorite Food field left blank")</script>';
        $food = "matt";
        echo "Default food inserted <br><br>";
    }
    $pet_name = $_POST['pet'];
    if ($pet_name == null){
        echo '<script>alert("Pet Name field left blank")</script>';
        $pet_name = "jojo";
        echo "Default pet name inserted <br><br>";
    }
    echo nl2br("Let me tell you a story... Long time ago in a galaxy far far away\n
    there was a ".$adjective." kid named ".$name." and he liked to play tricks on people.\n
    One day when ".$name."s mom was making his favorite food, ".$food.", he decided to \n
    play a trick on her. Thinking it would be funny he lit little, poor ".$pet_name."s hair\n
    on fire. His mom was so mad that they sent him to military school where he became a\n
    functioning member of society.");