<?php
    $x = $_POST["x"] ?? null;
    $y = $_POST["y"] ?? null;
    $method = $_SERVER['REQUEST_METHOD'];
    $operation = $_POST['operation'] ?? null;
    $factorial = $_POST['factorial'] ?? null;
    $fib = $_POST['fib'] ?? null;

    if(isset($x)){
        calculate($x,$y,$operation);
    }
    if(isset($factorial)){
        if($factorial > 1){
            _factorial($factorial);
        }
    }
    if(isset($fib)){
        $result = fibonacci($fib);
         echo "<p1>The ".$fib."th fibonacci number is ".$result."</p1><br>";
    }
    function calculate($x, $y, $operation){
        foreach ($operation as $value){
            if($value == 'addition'){
                $result = $x+$y;
                echo "<p1>".$x." + ".$y." = ".$result."</p1><br>";
            }elseif($value == 'subtraction'){
                $result = $x-$y;
                echo "<p1>".$x." - ".$y." = ".$result."</p1><br>";
            }elseif($value == 'multiplication'){
                $result = $x * $y;
                echo "<p1>".$x." * ".$y." = ".$result."</p1><br>";
            }elseif($value == 'division'){
                if($x == 0 || $y == 0){
                    echo "<p1>Cannot divide by Zero</p1><br>";
                }else{
                    $result = $x / $y;
                    echo "<p1>".$x." / ".$y." = ".$result."</p1><br>";
                }
            }elseif($value == "power"){
                $result = pow($x,$y);
                echo "<p1>".$x." ^ ".$y." = ".$result."</p1><br>";
            }elseif($value == "modular"){
                if($x == 0 || $y == 0){
                    echo "<p1>Cannot Modular by Zero</p1><br>";
                }else{
                    $result = $x % $y;
                    echo "<p1>".$x." % ".$y." = ".$result."</p1><br>";
                }
            }
        }
    }
    function _factorial($factorial){
        $result = 1;
        for($i =$factorial; $i>=1; $i--){
            $result = $result * $i;
        }
        echo "<p1>".$factorial." factorial is ".$result."</p1><br>";
    }
    function fibonacci($fib): int {
        $fib_array = array();
        $fib_array[0] = 0;
        $fib_array[1] = 1;
        for($i= 2; $i <= $fib; $i++){
            $fib_array[$i] = $fib_array[$i-1] + $fib_array[$i-2];
        }
        return $fib_array[$fib];
    }
?>
<html>
    <head><title>HW09</title></head>
    <h1>Arithmetic Calculator</h1>
    <form action="HW09.php" method="post">
        <label for="x">X Value: </label><input type="number" name="x" id="x"><br><br>
        <label for="y">Y Value: </label><input type="number" name="y" id="y"><br><br>
        <label for="operation">Operations: </label><br>
            <select name="operation[]" id="operation" size="6" multiple>
                <option value="addition">+</option>
                <option value="subtraction">-</option>
                <option value="multiplication">*</option>
                <option value="division">/</option>
                <option value="power">^</option>
                <option value="modular">%</option>
            </select>
        <input type="submit" value="Calculate">
    </form><hr><br>

    <h1>Factorial</h1><br>
    <form action="HW09.php" method="post">
        <label for="Factorial">n: </label><input type="number" name="factorial" id="factorial" min="1">
        <input type="submit" value="Factorial">
    </form><hr><br>

    <h1>Fibonacci</h1><br>
    <form action="HW09.php" method="post">
        <label for="fib">n: </label><input type="number" name="fib" id="fib" min="1">
        <input type="submit" value="Fib!!">
    </form><br><br>
</html>