<?php
session_start();


if (isset($_GET['remove'])) {
    $index = $_GET['remove'];
    unset($_SESSION['cart'][$index]);
    $_SESSION['cart'] = array_values($_SESSION['cart']); 
    header("Location: cart.php"); 
    exit;
}


if (isset($_POST['update_cart']) && isset($_POST['quantity'])) {
    foreach ($_POST['quantity'] as $index => $quantity) {
       
        if (is_numeric($quantity) && $quantity > 0) {
            $_SESSION['cart'][$index]['quantity'] = (int)$quantity; 
        }
    }
    header("Location: cart.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="cart.css">
</head>

<body>




<form action="cart.php" class="bar" method="POST">
    <div class="cart-items">
        <?php
        $totalPrice = 0;

        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $index => $item) {
              
                $quantity = isset($item['quantity']) ? (int)$item['quantity'] : 1;
                
                
                $productPrice = (float)$item['product_price']; 

                
                $itemTotal = $productPrice * $quantity; 
                $totalPrice += $itemTotal; 
                
                echo "<div class='cart-item'>";
                echo "<img src='" . htmlspecialchars($item['product_image']) . "' alt='" . $item['product_name'] . "'>";
                echo "<h4>" . $item['product_name'] . "</h4>";
                echo "<h4>" . "RS." . number_format($productPrice, 2) . "</h4>";
                echo "<label for='quantity'>Quantity:</label>";
                echo "<input type='number' name='quantity[$index]' class='quantity' value='" . $quantity . "' min='1'>";
                echo "<h4 class='total-price'>" . "RS." . number_format($itemTotal, 2) . "</h4>";
                echo "<a href='cart.php?remove=$index' class='remove-item'>Remove</a>";
                echo "</div>";
            }
        } else {
            echo "<p>Your cart is empty.</p>";
        }
        ?>
    </div>

    
   
    <div class="cart-summary">
        <p><strong>Total: RS.<?php echo number_format($totalPrice, 2); ?></strong></p>
        <button type="submit" name="update_cart" class="btn">Update Cart</button>
    </div>

 
    <div class="cart-actions">
        <a href="product.php" class="btn continue-shopping">Continue Shopping</a>
        <a href="checkout.php" class="btn checkout">Checkout</a>
    </div>
    
</form>

</body>
</html>
