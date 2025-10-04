

<!-- *******************************************************signup************ -->
<?php
include 'Connect.php';

// Signup Process
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && $_POST['submit'] == 'Sign Up') {
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

    $select = "SELECT * FROM `signup` WHERE email = ?";
    $stmt = $conn->prepare($select);
    $stmt->bind_param("s", $email);  
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script type='text/javascript'>alert('User already exists!');</script>";
    } else {
      
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $insert = "INSERT INTO `signup`(`name`, `email`, `password`) VALUES (?, ?, ?)";
        $stmt_insert = $conn->prepare($insert);
        $stmt_insert->bind_param("sss", $name, $email, $hashed_password); 

        
        if ($stmt_insert->execute()) {
            
            echo "<script type='text/javascript'>alert('Registered successfully!');</script>";
        } else {
            
            echo "<script type='text/javascript'>alert('Error registering user. Please try again.');</script>";
        }
    }
}


if (isset($_POST['submit']) && $_POST['submit'] == 'Login') {
    $email = $_POST['emails']; 
    $password = $_POST['passwords'];  

    
    $select = "SELECT * FROM `signup` WHERE email = ?";
    $stmt = $conn->prepare($select);
    $stmt->bind_param("s", $email); 
    $stmt->execute();
    $result = $stmt->get_result();
    
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();  

        
        if (password_verify($password, $row['password'])) {
            
            session_start();
            $_SESSION['user_logged_in'] = true;
            $_SESSION['email'] = $row['email'];  
            
        
            header("Location: Home.php");
            exit();
        } else {
          
            echo "<script type='text/javascript'>alert('Invalid password');</script>";
        }
    } else {
        
        echo "<script type='text/javascript'>alert('Invalid email ');</script>";
    }
}
?>





<!-- *****************************login********************************* -->








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <title id="Signup">FITZONE </title>
</head>
<body>
 

  
 

    <header class="allnav" id="main">
        <nav class="navbar">
            <div class="logo">
                <a href="#main">FITZONE</a>
            </div>
            <ul class="nav-links">
                
            <li><a href="Home.php">Home</a></li>
            <li><a href="home.php#about">About</a></li>
            <li><a href="Membership.php">Membership</a></li>
            <li><a href="product.php">Shop</a></li>
            <li><a href="home.php#contact1">Contact US</a></li>
            <li><a href="home.php#service">Services</a></li>
            <li><a href="Blog.php">Blog</a></li>
            <li><a href="Gallery.php">Gallery</a></li>
 
                
            </ul>
        </nav>
    </header>

      <!-- **************************************navigationa bar******************* -->



<div class="wrapper">
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="img/1.jpg" alt="">
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="img/3.jpg" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>

    
    <div class="forms">
      <div class="form-content">
      
        <div class="login-form">
          <div class="title">Login</div>
          <form action="#" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input name="emails" type="text" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input name="passwords" type="password" placeholder="Enter your password" required>
              </div>
              <div class="button input-box">
                <input name="submit" type="submit" value="Login">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sign up now</label></div>
            </div>
          </form>
        </div>

        
        <div class="signup-form">
          <div class="title">Signup</div>
          <form action="#" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input name="name" type="text" placeholder="Enter your name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input name="email" type="text" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input name="password" type="password" placeholder="Enter your password" required>
              </div>
              <div class="button input-box">
                <input name="submit" type="submit" value="Sign Up">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- /* ************************************log in********************** */ -->





       
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
<script>

const wrapper = document.querySelector(".wrapper");
const signupHeader = document.querySelector(".signup header");
const loginHeader = document.querySelector(".login header");

loginHeader.addEventListener("click", () => {
  wrapper.classList.add("active");
});
signupHeader.addEventListener("click", () => {
  wrapper.classList.remove("active");
});
</script>

</html>