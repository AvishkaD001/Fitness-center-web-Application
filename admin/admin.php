<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<!-- JavaScript for showing/hiding sections -->
<script>
  // Function to show/hide the sections
  function showSection(section) {
    // Hide all sections
    document.getElementById("useradd").style.display = "none";
    document.getElementById("userview").style.display = "none";
    document.getElementById("usermassage").style.display = "none";
    document.getElementById("productadd").style.display = "none";
    document.getElementById("productview").style.display = "none";
    document.getElementById("order").style.display = "none";
    document.getElementById("blogadd").style.display = "none";
    document.getElementById("blogview").style.display = "none";
    document.getElementById("membershipbuy").style.display = "none";

    // Show the selected section
    document.getElementById(section).style.display = "block";
  }
</script>

<div class="adminpage">
    <!-- Sidebar -->
    <div class="sidenav">
        <a href="adminpage.html" class="logo">FITZONE</a>
        <a href="javascript:void(0);" onclick="showSection('useradd')">User Add</a>
        <a href="javascript:void(0);" onclick="showSection('userview')">User View</a>
        <a href="javascript:void(0);" onclick="showSection('usermassage')">User Message</a>

        <a href="javascript:void(0);" onclick="showSection('productadd')">Add Product</a>
        <a href="javascript:void(0);" onclick="showSection('productview')">Product View</a>
        <a href="javascript:void(0);" onclick="showSection('order')">Orders</a>

        <a href="javascript:void(0);" onclick="showSection('blogadd')">Blog Add</a>
        <a href="javascript:void(0);" onclick="showSection('blogview')">blog View</a>

        <a href="javascript:void(0);" onclick="showSection('membershipbuy')">Membership buy</a>

        <form action="logout.php" method="post">
            <button class="btn_logout" type="submit">Log Out</button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1>Welcome to the Admin page</h1>
    </div>
</div>

<!-- *******************************************************USER ADD Section************ -->

<!-- ************************************Signup*************************** -->
<?php

// Include the database connection file
include 'Connect.php'; // Make sure 'Connect.php' contains the database connection code

// Handling Admin Registration
if (isset($_POST['AddAdmin'])) {
    // Sanitize admin input
    $email = filter_input(INPUT_POST, "emails", FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, "passwords", FILTER_SANITIZE_STRING);

    // Check if the admin already exists
    $select = "SELECT * FROM `admin` WHERE email = ? AND Password = ?";
    $stmt = $conn->prepare($select);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If the admin already exists
        echo "<script type='text/javascript'>alert('Admin already exists!');</script>";
    } else {
        // Insert new admin
        $insert = "INSERT INTO `admin`(`email`, `password`) VALUES (?, ?)";
        $stmt_insert = $conn->prepare($insert);
        $stmt_insert->bind_param("ss", $email, $password);
        if ($stmt_insert->execute()) {
            echo "<script type='text/javascript'>alert('Admin Add successfully!');</script>";
        } else {
            echo "<script type='text/javascript'>alert('Error registering admin.');</script>";
        }
    }

    $stmt->close();
}

// Handling User Registration
if (isset($_POST['AddUser'])) {
    // Sanitize user input
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

    // Check if the user already exists
    $select = "SELECT * FROM `signup` WHERE email = ?";
    $stmt = $conn->prepare($select);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If user already exists
        echo "<script type='text/javascript'>alert('User already exists!');</script>";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user
        $insert = "INSERT INTO `signup`(`name`, `email`, `password`) VALUES (?, ?, ?)";
        $stmt_insert = $conn->prepare($insert);
        $stmt_insert->bind_param("sss", $name, $email, $hashed_password);
        if ($stmt_insert->execute()) {
            echo "<script type='text/javascript'>alert('User Add successfully!');</script>";
        } else {
            echo "<script type='text/javascript'>alert('Error registering user.');</script>";
        }
    }

    $stmt->close();
}

// Close the database connection
mysqli_close($conn);

?>


<!-- ************************************Signup*************************** -->

<div class="useradd" id="useradd" >
  <div class="container1">
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Admin add</div>
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
                <input name="AddAdmin" type="submit" value="Add Admin">
              </div>
            </div>
          </form>
        </div>


        <div class="signup-form">
          <div class="title" id="signup">User add</div>
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
                <input name="AddUser" type="submit" value="Add User">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- *******************************************************USER VIEW Section************ -->
<div class="userview" id="userview" style="display:none; ">
  <table style="width:50%">
    <tr>
      <th>Name</th>
      <th>Email</th>
    </tr>
    <?php
      $conn = mysqli_connect('localhost','root','','fitzone');
      $sql = "SELECT * FROM `signup`";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
      <tr>
        <td><?php echo $row['name']?></td>
        <td><?php echo $row["email"]?></td>
        <td><a href="delete.php?name=<?php echo $row['name'];?>" class="btn btn-danger">Delete</a></td>
      </tr>
    <?php
        }
      }
    ?>
  </table>
</div>

<!-- *******************************************************USER MESSAGE Section************ -->
<div class="usermassage" id="usermassage" style="display:none;">
  <table style="width:50%">
    <tr>
      <th>Username</th>
      <th>Email</th>
      <th>Subject</th>
      <th>Message</th>
    </tr>
    <?php
      $conn = mysqli_connect('localhost','root','','fitzone');
      $sql = "SELECT * FROM `massages`";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
      <tr>
        <td><?php echo $row['username']?></td>
        <td><?php echo $row["email"]?></td>
        <td><?php echo $row["subject"]?></td>
        <td><?php echo $row["massage"]?></td>
      </tr>
    <?php
        }
      }
    ?>
  </table>
</div>

<!-- *******************************************************PRODUCT ADD Section************ -->


<?php
$conn = new mysqli('localhost', 'root', '', 'fitzone');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $pname = filter_input(INPUT_POST, "pname", FILTER_SANITIZE_SPECIAL_CHARS);
    $pprice = filter_input(INPUT_POST, "pprice", FILTER_SANITIZE_SPECIAL_CHARS);
    $pdescription = filter_input(INPUT_POST, "Pdescription", FILTER_SANITIZE_SPECIAL_CHARS);
    $pimage = filter_input(INPUT_POST, "pimage", FILTER_SANITIZE_SPECIAL_CHARS);
   
   
    
    $select = " SELECT * FROM `Product` WHERE Productname = '$pname' ";

    $result = mysqli_query($conn, $select);
 
    if(mysqli_num_rows($result) > 0){
 
       $error[] = "";
 
    }else{
        $insert = "INSERT INTO `Product`( `Productname` ,`price` ,`productDescription` ,`images`)
                VALUES ('$pname', '$pprice' ,'$pdescription','$pimage')";
        mysqli_query($conn, $insert);
        echo "<script type='text/javascript'>alert('product add succesfully');</script>";
    }
  }
  
  mysqli_close($conn);

?>


<div class="container" id="productadd" style="display:none;">
  <section class="post">
    <header>Add Product</header>
    <form action="#" method="POST">
      <div class="content">
          <input type="text" name="pname" placeholder="Product name" required>
          <input type="text" name="pprice" placeholder="Product price (LKR)" required>
      </div>
      <textarea placeholder="Product description" name="Pdescription" spellcheck="false" required></textarea>
      <div class="options">
        <div class="photo">
          <input type="file" name="pimage" accept="image/*" required>
        </div>
      </div>
      <button>Publish product</button>
    </form>
  </section>
</div>

<!-- *******************************************************PRODUCT VIEW Section************ -->
<div class="allcard" id="productview" style="display:none;">
  <?php
    $conn = mysqli_connect('localhost','root','','fitzone');
    $sql = "SELECT * FROM `product`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
  ?>
    <div class="card1">
      <img src="<?php echo htmlspecialchars($row['images']); ?>" alt="Product Image">
      <h3><?php echo $row['Productname']?></h3>
      <p><?php echo $row['productDescription']?></p>
      <p><?php echo $row['Price']?></p>
      <a href="delete.php?Productname=<?php echo $row['Productname'];?>" class="btn-delete">delete product</a>
    </div>
  <?php
      }
    }
  ?>
</div>

<!-- *******************************************************ORDER Section************ -->



<table id="order" style="display:none;">
    <tr>
      <th>name</th>
      <th>Address</th> 
      <th>city</th>
      <th>state</th>
      <th>contactNumber</th>
      <th>zipCode</th>
      <th>method</th>
        <th>product</th>
      <th>quantity</th>
      <th>totalprice</th>
    </tr>


     
<?php

$conn = mysqli_connect('localhost','root','','fitzone');


     $sql="SELECT * from `orders`";
     $result=$conn-> query($sql);
     $count=1;
     if ($result-> num_rows > 0){
       while ($row=$result-> fetch_assoc()) {
          
   ?>
     
    <tr>
      <td><?php echo $row['name']?></td>
      <td><?php echo $row["address"]?></td>
      <td><?php echo $row["city"]?></td>
      <td><?php echo $row["state"]?></td>
      <td><?php echo $row['contactNumber']?></td>
      <td><?php echo $row["zipCode"]?></td>
      <td><?php echo $row["method"]?></td>
      <td><?php echo $row["product"]?></td>
      <td><?php echo $row["quantity"]?></td>
      <td><?php echo $row["totalprice"]?></td>
    </tr>

        <?php
            $count=$count+1;
           
        }
    }
    ?>

    
  </table>


    <!-- *************************************blog add********************************* -->

    <?php


$conn = new mysqli('localhost', 'root', '', 'fitzone');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS);
    $photo = filter_input(INPUT_POST, "image", FILTER_SANITIZE_SPECIAL_CHARS);
    $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
   
    
    $select = " SELECT * FROM `blogs` WHERE title = '$title'  ";

    $result = mysqli_query($conn, $select);
 
    if(mysqli_num_rows($result) > 0){
 
       $error[] = "";
 
    }else{
        $insert = "INSERT INTO `blogs`( `title` ,`images` ,`Description`)
                VALUES ('$title', '$photo' ,'$description')";
        mysqli_query($conn, $insert);
        echo "<script type='text/javascript'>alert('Blog add succesfully');</script>";
    }
  }

  mysqli_close($conn);

  
?>
    <div class="container" id="blogadd" style="display:none;">
      
        <section class="post">
          <header>Add Blogs</header>

          <form action="#" method="POST" >

            <div class="content">
                <input type="text" name="title" placeholder="Enter your title"  required>
              
            </div>

            <textarea placeholder="What's on your mind" name="description" spellcheck="false" required></textarea>
        
            <div class="options">
              <div class="photo"   action="/upload" method="POST" enctype="multipart/form-data" >
                <input type="file" name="image" accept="image/*" required></div>
            </div>

            <button>Post</button>
          </form>
          
        </section>
    </div>
    <!-- *************************************blog add********************************* -->


    <!-- *****************************************blog view******************** -->




<div class="container2" id="blogview" style="display:none;">

<div class="header">
 <h2>Our Blogs</h2>
</div>
 
<?php

$conn = mysqli_connect('localhost','root','','fitzone');


 $sql="SELECT * from `blogs`";
 $result=$conn-> query($sql);
 $count=1;
 if ($result-> num_rows > 0){
   while ($row=$result-> fetch_assoc()) {
      
?>

<div class="card">

 <div class="img">
 <img src="<?php echo htmlspecialchars($row['images']); ?>" alt="">
 </div>

 <a href="delete.php?title=<?php echo $row['title'];?>" class="btn-delete">Delete</a>

 <div class="top-text">
    <div class="name">
       <?php echo $row['title']?>
    </div>
 </div>

 <div class="bottom-text">
    <div class="text">
    <?php echo $row["Description"]?>
    </div>
</div>
   
</div>

<?php
        $count=$count+1;
       
    }
}
?>





</div>




<!-- *****************************************blog view******************** -->

<!-- ***********************************************membership buy************ -->


<table  id="membershipbuy" style="display:none;">
    <tr>
      <th>Name</th>
      <th>Phone number</th>
      <th>Gender</th>
      <th>Branch</th>
      <th>Membership</th>
      <th>Email</th>
      <th>Address</th>
      <th></th>

    </tr>


     
<?php

$conn = mysqli_connect('localhost','root','','fitzone');


     $sql="SELECT * from `membership`";
     $result=$conn-> query($sql);
     $count=1;
     if ($result-> num_rows > 0){
       while ($row=$result-> fetch_assoc()) {
          
   ?>
     
    <tr>
      <td><?php echo $row['name']?></td>
      <td><?php echo $row["phonenumber"]?></td>
      <td><?php echo $row["Gender"]?></td>
      <td><?php echo $row['Branch']?></td>
      <td><?php echo $row["Membership"]?></td>
      <td><?php echo $row["Email"]?></td>
      <td><?php echo $row["Address"]?></td>
      <td> <a href="delete.php?Email=<?php echo $row['Email'];?>" class="btn-delete">Delete</a></td>
    </tr>

        <?php
            $count=$count+1;
           
        }
    }
    ?>

    
  </table>





<!-- ***********************************************membership buy************ -->
