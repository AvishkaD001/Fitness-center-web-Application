
<?php

include 'connect.php';
$conn = new mysqli('localhost', 'root', '', 'fitzone');
    
    if(isset($_POST['submit'])){
        $email = $_POST['emails'];
        $password = $_POST['passwords'];

        $select = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $select);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);

        if($count==1){
            header("Location:admin.php");
        }
        else{
          echo "<script type='text/javascript'>alert('wrong password or email!!!');</script>";
        }

    }

?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Responsive Login Form HTML CSS | CodingNepal</title>
  <link rel="stylesheet" href="admin login.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body>
  <div class="wrapper">
    <div class="title"><span>Hi, Admin</span></div>
    <div class="pass">This is an admin Login page !</div>

    <form action="#" method="POST">
      <div class="row">
        <i class="fas fa-user"></i>
        <input type="text" name="emails" placeholder="Email " required />
      </div>
      <div class="row">
        <i class="fas fa-lock"></i>
        <input type="password" name="passwords" placeholder="Password" required />
      </div>

      <div class="row button">
        <input type="submit" name="submit" value="Login" />
      </div>
    </form>

  </div>
</body>
</html>