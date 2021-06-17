<?php
    session_start();
    echo'
    <a href="hw08.php">Add to Cart</a>
    <a href="Cart.php">View Cart</a>';
    $method = $_SERVER['REQUEST_METHOD'];
    $user_color = $_POST['user_color'] ?? '';
    if(!in_array($user_color, $_SESSION['cart']) && $user_color != ''){
        $_SESSION['cart'][$user_color] = $user_color;
    }
    if($method = 'POST'){
        $user_manage = $_POST['user_manage'] ?? '';
        if($user_manage != ''){
            foreach ($user_manage as $remove){
                unset($_SESSION['cart'][$remove]);
            }
        }
        elseif ($user_manage = ''){
            echo '<h1>Nothing In Cart</h1>';
        }
    }
    ?>
    <form action="Cart.php" method="post">
    <?php
    foreach ($_SESSION['cart'] as $item){
        echo '<p style="background-color: '.$item. '; height: 75px; width: 75px;"></p>';
        echo '<input type="checkbox" name="user_manage[]" value="'.$item.'"><br>';
    }
    echo '<input type="submit" value="Update Cart">';?>
    </form>