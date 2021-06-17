<?php
    function encrypt($plaintext, $encrypt_value):string{
        $cipherText = "";
        for($i = 0; $i < strlen($plaintext); $i++){
            $ch = ord($plaintext[$i]);
            if ($ch < 65 || $ch > 122){
                $ch = chr($ch);
                $cipherText = $cipherText.$ch;
            }
            else if($ch >= 97 && $ch <= 122){
                $ch -= 97;
                $ch += $encrypt_value;
                $ch %= 26;
                $ch += 97;
                $cipherText .= chr($ch);

            }
            else if($ch >= 65 && $ch <= 90){
                $ch -= 65;
                $ch += $encrypt_value;
                $ch %= 26;
                $ch += 65;
                $cipherText .= chr($ch);
            }
        }
        return $cipherText;
    }

    function decrypt($ciphertext, $decrypt_shift):string{
        $plaintext = "";
        for($i = 0; $i < strlen($ciphertext); $i++){
            $ch = ord($ciphertext[$i]);
            if($ch < 65 || $ch > 122){
                $plaintext = $plaintext.chr($ch);
            }
            elseif ($ch > 90 && $ch < 97){
                $plaintext = $plaintext.chr($ch);
            }
            elseif($ch >= 97 && $ch <= 122){
                $ch -= 97;
                $ch -= $decrypt_shift;
                $ch *= -1;
                $ch = 26 - $ch;
                $ch %= 26;
                $ch += 97;
                $plaintext .= chr($ch);
            }
            elseif($ch >=65 && $ch <=90){
                $ch -= 97;
                $ch -= $decrypt_shift;
                $ch *= -1;
                $ch = 26 - $ch;
                $ch %= 26;
                $ch += 97;
                $plaintext .= chr($ch);
            }
        }
        return $plaintext;
    }
    $plaintext = $_POST['Encrypt'] ?? NULL;
    $ciphertext = $_POST['Decrypt'] ?? NULL;
    $encrypt_shift = $_POST['slider'] ?? NULL;
    $decrypt_shift = $_POST['slider2'] ?? NULL;
    $shiftText = "";
    $decryptText = "";
    if($plaintext){
        $shiftText = encrypt($plaintext, $encrypt_shift);
    }
    if($ciphertext){
        $decryptText = decrypt($ciphertext, $decrypt_shift);
    }


    ?>
<html>
    <head>
        <title>HW6 Ceaser Cipher</title>
        <style>
            body{
                background-color: navy;
            }
            input[type="submit"]{
                padding: 10px;
            }
            input:hover[type="submit"]{
                background-color: fuchsia;
            }
            input[type="text"]{
                background-color: aqua;
            }
            h1{
                font-family: "Engravers MT";
                color: aliceblue;
            }
            label{
                font-family: "Engravers MT";
                color: aliceblue;
            }
            p{
                font-family: "Engravers MT";
                color: aliceblue;
            }
            .slider{
                height: 15px;

            }
        </style>
    </head>
    <form action="HW06.php" method="post">
        <h1>Encrypt</h1>
        <label>Message: </label>
        <input type="text" name="Encrypt" value="<?php echo $decryptText;?>" ><br>
        <input type="range" name="slider" id="slider" value="0" min="0" max="25"><br>
        <p>Value: <span id="value"></span></p>
        <input type="submit" value="Encrypt"><br>
        <hr>
    </form>
    <form action="HW06.php" method="post">
        <h1>Decrypt</h1>
        <label>Message: </label>
        <input type="text" name="Decrypt" value="<?php echo $shiftText;?>"><br>
        <input type="range" name="slider2" id="slider2" value="0" min="0" max="25"><br>
        <p>Value: <span id="value2"></span></p>
        <input type="submit" value="Decrypt"><br>
    </form>
    <hr>
    <script>
        const slider = document.getElementById("slider");
        const output = document.getElementById("value");
        output.innerHTML = slider.value;
        slider.oninput = function (){
            output.innerHTML = this.value;
        }
        const slider2 = document.getElementById("slider2");
        const output2 = document.getElementById("value2");
        output2.innerHTML = slider.value;
        slider2.oninput = function (){
            output2.innerHTML = this.value;
        }
    </script>
</html>
