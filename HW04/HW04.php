<head>
    <link href="style.css" rel="stylesheet">
</head>
<?php
    $name = $_POST['name'];
    $option = $_POST['option'];
    $time = $_POST['time'];
    $drinkType = $_POST['drinkType'];
    $size = $_POST['size'];

    if($option == 'Place Now'){
        echo "<h1>Thank you " . $name . " for placing your order you can head to the Coffee shop</h1>";
        if(isset($_POST['extras'])){
            $extras = $_POST['extras'];
            if(count($extras) > 0){
                echo "<p1>You ordered a ".$size.", ".$drinkType." with </p1>";
                for($i =0; $i<count($extras);$i++){
                    if($i == count($extras)-1){
                        echo $extras[$i].".";
                    }else{
                        echo $extras[$i].", ";
                    }
                }
            }
        }else{
            echo "<p1>You ordered a ".$size.", ".$drinkType." with no extras</p1>";
        }
    }
    else{
        echo "<h1>Thank you " . $name . " for placing your order we will start making it in ".$time." minutes</h1>";
        if(isset($_POST['extras'])){
            $extras = $_POST['extras'];
            if(count($extras) > 0){
                echo "<p1>You ordered a ".$size.", ".$drinkType." with </p1>";
                for($i =0; $i<count($extras);$i++){
                    if($i == count($extras)-1){
                        echo $extras[$i].".";
                    }else{
                        echo $extras[$i].", ";
                    }
                }
            }
        }else{
            echo "<p1>You ordered a ".$size.", ".$drinkType." with no extras</p1>";
        }
    }
