<?php
    session_set_cookie_params(300, '/');
    session_start();
    $user_color = $_SESSION['user_color'] ?? "none";
    $cart = array();
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = $cart;
    }
?>
<html>
    <head>
        <title>HW08</title>
    </head>
    <body>
        <a href="HW08.php">Add to Cart</a>
        <a href="Cart.php">View Cart</a>
        <form action="Cart.php" method="POST">
            <input type="color" name="user_color">
            <input type="submit" value="Add to cart">
        </form>
    </body>
</html>
