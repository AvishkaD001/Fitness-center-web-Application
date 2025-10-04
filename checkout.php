<?php
// Include the database connection
include 'connect.php';

// Create a connection to the database
$conn = mysqli_connect('localhost', 'root', '', 'fitzone');

// Start the session to access cart data
session_start();

// Initialize total price
$totalPrice = 0;

// Check if the cart is set and not empty
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $index => $item) {
        $quantity = isset($item['quantity']) ? (int)$item['quantity'] : 1;
        $productPrice = (float)$item['product_price'];
        $itemTotal = $productPrice * $quantity;
        $totalPrice += $itemTotal;
    }
} else {
    $cartEmpty = true;  // Handle empty cart case
    echo "<script>alert('Your cart is empty!');</script>"; // Optional: notify user if the cart is empty
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect customer form data
    $name = $_POST['name']; 
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $contact_number = $_POST['number']; // Update this to match the database column
    $zipcode = $_POST['zipcode'];
    $method = $_POST['method'];

    // Loop through cart items and insert into the database
    if (isset($_POST['product']) && isset($_POST['quantity']) && isset($_POST['totalprice'])) {
        $products = $_POST['product'];
        $quantities = $_POST['quantity'];
        $totalprices = $_POST['totalprice'];

        // Prepare SQL statement
        $sql = "INSERT INTO `orders` (`name`, `address`, `city`, `state`, `contactNumber`, `zipCode`, `method`, `product`, `quantity`, `totalprice`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Loop through each cart item and insert into the database
        foreach ($products as $index => $product) {
            $quantity = $quantities[$index];
            $totalprice = $totalprices[$index];

            // Bind the parameters to the statement
            $stmt->bind_param("ssssssssss", $name, $address, $city, $state, $contact_number, $zipcode, $method, $product, $quantity, $totalprice);

            // Execute the statement
            if ($stmt->execute()) {
                // Successful insert for this item
                echo "<script type='text/javascript'>alert('Order Confiremed');</script>";
                           header('location:product.php');
            } else {
                // Error during insertion
                echo "Error: " . $stmt->error;
            }
        }

        // Close the statement
        $stmt->close();
    }

    // Clear the cart after order submission
    unset($_SESSION['cart']);

    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout</title>
  <link rel="stylesheet" href="checkout.css">
</head>

<body>

  <div class="container">
    <h1>CheckOut</h1>

    <form action="" method="POST">
    <div class="checkout-content">
      <!-- Left Side: Checkout Form -->
      <div class="checkout-form">
        <h2>Billing & Shipping Information</h2>
        
          <label for="name">Full Name</label>
          <input type="text" id="name" name="name" required>

          <label for="address">Street Address</label>
          <input type="text" id="address" name="address" required>

          <label for="city">City</label>
          <input type="text" id="city" name="city" required>

          <label for="state">State</label>
          <input type="text" id="state" name="state" required>

          <label for="number">Contact Number</label>
          <input type="text" id="number" name="number" required>

          <label for="zip">ZIP Code</label>
          <input type="text" id="zip" name="zipcode" required>

          <label for="method">Shipping Method</label>
          <select id="method" name="method" required>
            <option value="cod">Cash on Delivery</option>
          </select>

          <button type="submit" class="submit-btn">Order</button>
      </div>

      <!-- Right Side: Order Summary -->
      <div class="order-summary">
        <h2>Order Summary</h2>
        
        <?php
        // Only display order summary if the cart is not empty
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $index => $item) {
                $quantity = isset($item['quantity']) ? (int)$item['quantity'] : 1;
                $productPrice = (float)$item['product_price'];
                $itemTotal = $productPrice * $quantity;

                // Product name with a span
                echo "<h4><div class='product-name' id='product-" . $index . "'>" . htmlspecialchars($item['product_name']) . "</div></h4>";

                // Quantity with id and name
                echo "<p><div class='product-quantity' id='quantity-" . $index . "'>Quantity: " . $quantity . "</div></p>";

                // Price with id and name
                echo "<p><div class='product-price' id='price-" . $index . "'>Price: RS. " . number_format($productPrice, 2) . "</div></p>";

                // Total price for this item with id and name
                echo "<p><div class='item-total' id='total-" . $index . "'>Total: RS. " . number_format($itemTotal, 2) . "</div></p>";

                // Hidden inputs to send cart data in the form submission
                echo "<input type='hidden' name='product[]' value='" . htmlspecialchars($item['product_name']) . "'>";
                echo "<input type='hidden' name='quantity[]' value='" . $quantity . "'>";
                echo "<input type='hidden' name='totalprice[]' value='" . $itemTotal . "'>";
            }
        } else {
            echo "<p>Your cart is empty!</p>";
        }
        ?>
      
        <div class="summary-item total">
          <span><p><strong>Total Price: RS. <?php echo number_format($totalPrice, 2); ?></strong></p></span>
        </div>
      </div>
    </div>

    </form>
  </div>

</body>
</html>
