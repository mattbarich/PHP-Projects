<html>
<head>
    <title>HW5</title>
    <style>
        body{
            background-color: crimson;
        }
        input[type="submit"]{
            padding: 10px;
        }
        input:hover[type="submit"]{
            background-color: aqua;
        }
        input[type="number"]{
            font-size: 20px;
            width: 30%;
            padding: 20px;
            box-sizing: border-box;
            background-color: mediumturquoise;
        }
        hr{
            padding: 10px;
            background-color: black;
        }
        li {
            font-size: 30px;
            font-family: "Baskerville Old Face";
        }
        h1 {
            font-size: 45px;
            font-family: "Baskerville Old Face";
        }
        label{
            font-size: 20px;
            font-family: "Baskerville Old Face";
        }

    </style>
</head>
<form action="HW5.php" method="POST">
    <label><b>Enter a Number: </b></label>
    <input type="number" name="number" min="1" required><br>
    <input type="submit" value="submit"><br>
    <hr>
</form>
</html>

<?php
    $number = $_POST['number'] ?? NULL;
    $prime = true;
    if($number == 1){
        echo "<h1>".$number." cannot compute. Please enter new number </h1>";
    }else if($number>=2) {
        for($i = 2; $i < $number; $i++){
            if($number % $i == 0){
                $prime = false;
                break;
            }
        }
        if (!$prime){
            echo "<h1> Factors of ".$number.": </h1>";
            for($i = 1; $i <=$number; $i++){
                if($number % $i == 0){
                    echo "<li>".$i."</li>";
                }
            }
            echo "<h1>".$number." is not a prime number</h1>";
        }else {
            echo "<h1> Factors of ".$number.": </h1>";
            for($i = 1; $i <=$number; $i++){
                if($number % $i == 0){
                    echo "<li>".$i."</li>";
                }
            }
            echo "<h1>".$number." is a prime!</h1>";
        }
    }


?>

