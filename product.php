<?php
session_start();  // Start the session to manage the cart

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Add product to cart when the form is submitted
if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    
    // Add the product to the session cart
    $_SESSION['cart'][] = array(
        'product_name' => $product_name,
        'product_price' => $product_price,
        'product_image' => $product_image,
    );
}

// Count the number of items in the cart
$cart_count = count($_SESSION['cart']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="product.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Product Cards</title>

    
</head>
<body>

<?php
// Start session to track login status


// Check if the user is logged in
$is_logged_in = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true;
?>

  <!-- **************************************navigationa bar******************* -->
  <header id="main">
      <nav class="navbar">
          <div class="logo">
              <a href="#main">FITZONE</a>
          </div>
          <ul class="nav-links">
          <li><a href="Home.php">Home</a></li>
            <li><a href="home.php#about">About</a></li>
            <li><a href="Membership.php">Membership</a></li>
            <li><a href="home.php#contact1">Contact US</a></li>
            <li><a href="home.php#service">Services</a></li>
            <li><a href="Blog.php">Blog</a></li>
            <li><a href="Gallery.php">Gallery</a></li>

              <form method="POST" action="cart.php">
                <button class="cart-icon" id="cart-icon" type="submit" name="view_cart">
                    🛒 <span id="cart-count"><?php echo $cart_count; ?></span>
                </button>
            </form>
            



            <button class="lgnbtn">     
     <!-- Display Login or User button based on the login status -->
     <?php if ($is_logged_in): ?>
                <li><a href="userprofile.php">user</a></li>
               
                
            <?php else: ?>
                <li><a href="Login.php">Login</a></li>
            <?php endif; ?>
            </button>
              
              
          </ul>
      </nav>
  </header>


  <!-- **************************************navigationa bar******************* -->





<div class="allcard">

<div class="tile" >
 <h2 style="  margin-top: 7px;
    margin-bottom: 20px;
    font-size: 40px;
    font-weight:bold;
    color: #fff;
    text-align: center;">Products</h2>
</div>



<?php

$conn = mysqli_connect('localhost','root','','fitzone');


 $sql="SELECT * from `product`";
 $result=$conn-> query($sql);
 $count=1;
 if ($result-> num_rows > 0){
   while ($row=$result-> fetch_assoc()) {
      
?>



<form action="" class="card" method="post">
      <div>
        <img src="<?php echo htmlspecialchars($row['images']); ?>" alt="Product Image">
        <h3><?php echo $row['Productname']?></h3>
        <p><?php echo $row['productDescription']?></p>
        <p><?php echo $row['Price']?></p>
        <input type="hidden" name="product_name" value="<?php echo $row['Productname']?>">  
            <input type="hidden" name="product_price" value=" <?php echo $row['Price']?>">
            <input type="hidden" name="product_image" value="<?php echo htmlspecialchars($row['images']); ?>">
         
           <input style="  background-color: #c1121f;
            color: white;
            padding: 10px 20px;
            margin-left: 30%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s;"class="btn" type="submit" class="btn" value="Add to cart" name="add_to_cart">
      </div>
      </form>
    


    <?php
        $count++;
       
    }
}
?>

</div>





       
   <!-- **********************************footer**************************************** -->



   <footer class="footer">
        <div class="footercontent">
            <div class="footersection about">
                <h2>FITZONE</h2>
                <p>Contact us today to see a difference tomorrow!</p>
            </div>
            <div class="footersection">
                <h2>Quick Links</h2>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="home.php#service">Services</a></li>
                    <li><a href="home.php#about">About</a></li>
                    <li><a href="home.php#contact1">Contact</a></li>
                </ul>
            </div>
            <div class="footersection">
                <h2>Information</h2>
                <ul>
                    <li>+94 9979883</li>
                    <li>No.155/E,Senanayaka Road,Kandy</li>
                    <li>inforfitzone@gmail.com</li>
                    <li>4:00am - 1:00pm</li>
                </ul>
            </div>
            <div class="footersection social">
                <h2>Follow Us</h2>
                <div class="social-links">
                    <a href="https://www.facebook.com" class="socialMediaicon"><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="48px" height="48px"><path d="M1.989 23.987c0-12.144 9.857-22 22.001-22s22.001 9.856 22.001 22c0 11.125-8.273 20.331-18.997 21.797v-15.78h5.001l1-6h-5v1.5c0 .276-.225.5-.5.5-.276 0-.5-.224-.5-.5l-.001-5.5c0-1.653 1.344-3 3.001-3h3v-6h-3c-4.968 0-9.001 4.031-9.001 9.001v3.999h-4.999v6h4v-1.5c0-.275.224-.5.5-.5.275 0 .5.225.5.5l-.001 17.281C10.265 44.323 1.989 35.117 1.989 23.987zM10.971 10.666c1.156-1.359 3.019-2.088 5.184-2.705.483-.167.723-.423.8-.759.124-.537-.213-1.076-.749-1.2-.136-.031-.269-.032-.503.02-2.889.573-5.295 2.856-5.608 4.215-.06.26.107.539.376.6C10.662 10.882 10.855 10.809 10.971 10.666zM23.982 46.998c9.941 0 18.011.225 18.011.501 0 .276-8.069.501-18.011.501-9.941 0-18.011-.225-18.011-.501C5.971 47.223 14.041 46.998 23.982 46.998z"/></svg></a>
                    <a href="https://www.instagram.com" class="socialMediaicon"><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="48px" height="48px"><path d="M23.994 47.002c8.836 0 16.008.225 16.008.501s-7.172.501-16.008.501c-8.836 0-16.008-.225-16.008-.501S15.158 47.002 23.994 47.002zM4.002 33.989V13.995c0-5.521 4.481-10.003 10.003-10.003h19.996c5.521 0 10.003 4.481 10.003 10.003v19.993c0 5.521-4.481 10.003-10.003 10.003H14.005C8.483 43.991 4.002 39.51 4.002 33.989zM6.002 34.989V14.995c0-4.968 4.033-9.003 9.003-9.003h19.996c2.229 0 4.271.813 5.844 2.159-1.652-1.932-4.107-3.159-6.844-3.159H14.005c-4.969 0-9.003 4.035-9.003 9.003v19.993c0 2.74 1.224 5.195 3.157 6.845C6.814 39.262 6.002 37.219 6.002 34.989zM40.005 33.915V14.069c0-3.355-2.724-6.079-6.079-6.079H14.079c-3.356 0-6.079 2.724-6.079 6.079v19.847c0 3.356 2.723 6.079 6.079 6.079h19.847C37.281 39.994 40.005 37.271 40.005 33.915zM10.001 33.915V14.069c0-2.249 1.828-4.079 4.079-4.079h19.847c2.249 0 4.079 1.829 4.079 4.079v19.847c0 2.251-1.829 4.079-4.079 4.079H14.079C11.829 37.994 10.001 36.166 10.001 33.915zM32.006 23.991c0-4.416-3.585-8-8.001-8-4.417 0-8.001 3.584-8.001 8 0 4.417 3.584 8 8.001 8C28.421 31.991 32.006 28.409 32.006 23.991zM18.003 23.991c0-3.311 2.689-6 6.001-6 3.311 0 6.001 2.689 6.001 6 0 3.312-2.691 6-6.001 6C20.693 29.991 18.003 27.303 18.003 23.991zM34.005 14.991c0-.552-.449-1-1.001-1s-1.001.448-1.001 1c0 .552.449 1 1.001 1S34.005 15.543 34.005 14.991z"/></svg></a>
                </div>
            </div>
        </div>
        <div class="footerbottom">
            <p> &copy 2023 Fitness Center. All Rights Reserved.</p>
        </div>
    </footer>


 

     
    <!-- **********************************footer**************************************** -->
 
       
</body>

</html>