
<?php
  
  include 'connect.php';

 if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['yname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $massage = $_POST['massage'];

    $sql = "INSERT INTO `massages` (`username`, `email`, `subject`, `massage`)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssss", $name, $email, $subject, $massage);

    if ($stmt->execute()) {
        echo "<script type='text/javascript'>alert('Your massage is send');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>FITZONE</title>
</head>
<body >






  <!-- **************************************navigationa bar******************* -->
  <?php
session_start();

$is_logged_in = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true;
?>
<header id="main">
    <nav class="navbar">
        <div class="logo">
            <a href="#main">FITZONE</a>
        </div>
        <div class="toggle-btn">&#9776;</div> 
        <ul class="nav-links">
            <li><a href="Home.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="Membership.php">Membership</a></li>
            <li><a href="product.php">Shop</a></li>
            <li><a href="#contact1">Contact US</a></li>
            <li><a href="#service">Services</a></li>
            <li><a href="Blog.php">Blog</a></li>
            <li><a href="Gallery.php">Gallery</a></li>
            <button>     
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

    
<div class="main">
     <img src="img/mainpage.jpg" alt="">
     
        <h1 class="text anime" >Fitness centre</h1>
        <p class="mainparagraph anime">
            Transforming your fitness journey becomes effortless when surrounded by encouragement and camaraderie. 
            At Fit Haven, we believe that a welcoming atmosphere is key to success.More than just a place to work out, 
            we foster a community where every member is valued and supported empowering you to reach your full potential
            and surpass your goals.
         </p>
     

     </div>

  
   
      

    <!-- ******************************************End of HOME page*******************************88 -->

    

    <section class="aboutpage" id="about">
        
        <div class="aboutMain">
            <div class="aboutus" >
                <h2 class="abouttxt ">Why Choose Us</h2>
                <p class="aboutparagraph">At Fitness Center, we are dedicated to providing a transformative fitness experience tailored to your unique needs.
                    Our expert trainers offer personalized guidance, ensuring you receive the support and motivation necessary to achieve your health and wellness goals.
                     With a diverse range of classes, state-of-the-art facilities, and a welcoming community, we create an environment where everyone can thrive. 
                     Join us to embark on your fitness journey and discover the difference that commitment, passion, and community can make in your life!</p>
            </div>
            <div class="aboutusPic">
                <img src="img/aboutsphoto.jpg" alt="">
            </div>
        </div>
    
        <div class="missionMain">
    
            <div class="missionPic">
                <img src="img/MISSION.jpg" alt="">
            </div>
            <div class="mission">
                <h2 class=" ">Our Mission</h2>
                <p class=" ">Our mission is to empower individuals to achieve their fitness goals through personalized training, 
                    community support, and a welcoming environment. We strive to inspire a healthier lifestyle by providing high-quality facilities
                    diverse programs, and expert guidance.</p>
            </div>
            
            
        </div>      
     
    
        <div class="vissionMain">     
            <div class="vision">
                    <h2 class=" ">Our Vission</h2>
                    <p class="visionp">Our vision is to be the leading fitness destination in our community, recognized for our commitment to excellence,
                         innovation, and member satisfaction. We aim to transform lives through fitness and wellness, creating a healthier world one member at a time</p>
            </div>
            <div class="visionPic">
                <img src="img/VISION.jpg" alt="">
            </div>
        </div>
      
        </section>


    <!-- *************************************end of about page ***************************************** -->


    <div class="services" id="service">
          
        <div class="serivcetxt">Our Services</div>


        <div class="card card1">
            <h3>PERSONAL TRAINING</h3>
            <p>Tailored, supportive, goal-focused guidance.</p>
        </div>

        <div class="card card2">
            <h3>FIT WORKOUT</h3>
            <p>Dynamic, high energy group workouts.</p>
        </div>

        <div class="card card3">
            <h3>ONLINE COACHING
            </h3>
            <p>Remote, personalized fitness support.</p>
        </div>

        <div class="card card4">
            <h3> GROUP CLASSES</h3>
            <p>Fitness classes like yoga, spin, HIIT.</p>
        </div>


    </div>

     
    <!--***************************************end of service page********************  -->




           
    <div class="contact" id="contact1">

        <div class="contactrow">

        <div class="left">
            <div class="details">
                <h2> Get in Touch</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia ullam </p>
            </div>


            <div class="contactinfo">
                <div class="phoneicon">

                    <div class="socialMediaicon">

                        <a href="#"><svg width="30px" height="35px" viewBox="0 0 15 15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">

                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                            
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                            
                            <g id="SVGRepo_iconCarrier"> <title>call [#192]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-103.000000, -7321.000000)" fill="#000000"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M61.7302966,7173.99596 C61.2672966,7175.40296 59.4532966,7176.10496 58.1572966,7175.98796 C56.3872966,7175.82796 54.4612966,7174.88896 52.9992966,7173.85496 C50.8502966,7172.33496 48.8372966,7169.98396 47.6642966,7167.48896 C46.8352966,7165.72596 46.6492966,7163.55796 47.8822966,7161.95096 C48.3382966,7161.35696 48.8312966,7161.03996 49.5722966,7161.00296 C50.6002966,7160.95296 50.7442966,7161.54096 51.0972966,7162.45696 C51.3602966,7163.14196 51.7112966,7163.84096 51.9072966,7164.55096 C52.2742966,7165.87596 50.9912966,7165.93096 50.8292966,7167.01396 C50.7282966,7167.69696 51.5562966,7168.61296 51.9302966,7169.09996 C52.6632966,7170.05396 53.5442966,7170.87696 54.5382966,7171.50296 C55.1072966,7171.86196 56.0262966,7172.50896 56.6782966,7172.15196 C57.6822966,7171.60196 57.5872966,7169.90896 58.9912966,7170.48196 C59.7182966,7170.77796 60.4222966,7171.20496 61.1162966,7171.57896 C62.1892966,7172.15596 62.1392966,7172.75396 61.7302966,7173.99596 C61.4242966,7174.92396 62.0362966,7173.06796 61.7302966,7173.99596" id="call-[#192]"> </path> </g> </g> </g> </g>
                            
                            </svg></a>
                    </div>
                   
              <div class="details">

                <div class="detailhead"> <h3>Phone Number</h3></div>
                 <div class="detailp">+94 9979883</div>
                
              </div>

            </div>
        </div>




            <div class="contactinfo">
                <div class="phoneicon">

                    <div class="socialMediaicon">

                        <a href="#"><svg height="30px" width="35px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">

                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                            
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                            
                            <g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#000000;} </style> <g> <path class="st0" d="M440.917,67.925H71.083C31.827,67.925,0,99.752,0,139.008v233.984c0,39.256,31.827,71.083,71.083,71.083 h369.834c39.255,0,71.083-31.827,71.083-71.083V139.008C512,99.752,480.172,67.925,440.917,67.925z M178.166,321.72l-99.54,84.92 c-7.021,5.992-17.576,5.159-23.567-1.869c-5.992-7.021-5.159-17.576,1.87-23.567l99.54-84.92c7.02-5.992,17.574-5.159,23.566,1.87 C186.027,305.174,185.194,315.729,178.166,321.72z M256,289.436c-13.314-0.033-26.22-4.457-36.31-13.183l0.008,0.008l-0.032-0.024 c0.008,0.008,0.017,0.008,0.024,0.016L66.962,143.694c-6.98-6.058-7.723-16.612-1.674-23.583c6.057-6.98,16.612-7.723,23.582-1.674 l152.771,132.592c3.265,2.906,8.645,5.004,14.359,4.971c5.706,0.017,10.995-2.024,14.44-5.028l0.074-0.065l152.615-132.469 c6.971-6.049,17.526-5.306,23.583,1.674c6.048,6.97,5.306,17.525-1.674,23.583l-152.77,132.599 C282.211,284.929,269.322,289.419,256,289.436z M456.948,404.771c-5.992,7.028-16.547,7.861-23.566,1.869l-99.54-84.92 c-7.028-5.992-7.861-16.546-1.869-23.566c5.991-7.029,16.546-7.861,23.566-1.87l99.54,84.92 C462.107,387.195,462.94,397.75,456.948,404.771z"/> </g> </g>
                            
                            </svg></a>
                    </div>
            
                   
              <div class="details">


                <div class="detailhead"> <h3>Email</h3></div>
                <div class="detailp">inforfitzone@gmail.com</div>
      
              </div>

            </div>

        </div>



              <div class="contactinfo">
                <div class="phoneicon">

                    <div class="socialMediaicon">

                        <a href="#"><svg width="30px" height="35px" viewBox="-4 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000">

                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                            
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                            
                            <g id="SVGRepo_iconCarrier"> <title>location</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-106.000000, -413.000000)" fill="#000000"> <path d="M118,422 C116.343,422 115,423.343 115,425 C115,426.657 116.343,428 118,428 C119.657,428 121,426.657 121,425 C121,423.343 119.657,422 118,422 L118,422 Z M118,430 C115.239,430 113,427.762 113,425 C113,422.238 115.239,420 118,420 C120.761,420 123,422.238 123,425 C123,427.762 120.761,430 118,430 L118,430 Z M118,413 C111.373,413 106,418.373 106,425 C106,430.018 116.005,445.011 118,445 C119.964,445.011 130,429.95 130,425 C130,418.373 124.627,413 118,413 L118,413 Z" id="location" sketch:type="MSShapeGroup"> </path> </g> </g> </g>
                            
                            </svg></a>
                    </div>
                    
                

                  <div class="details">

                    <div class="detailhead"> <h3>Address</h3></div>
                    <div class="detailp">No.155/E,Senanayaka Road,Kandy</div>
            
                 </div>
            </div>

            </div>




            <div class="socialmedia">
                <div class="socialicones">
                    <a href="https://www.facebook.com" class="socialMediaicon1"><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="50px" height="50px">    <path d="M25,3C12.85,3,3,12.85,3,25c0,11.03,8.125,20.137,18.712,21.728V30.831h-5.443v-5.783h5.443v-3.848 c0-6.371,3.104-9.168,8.399-9.168c2.536,0,3.877,0.188,4.512,0.274v5.048h-3.612c-2.248,0-3.033,2.131-3.033,4.533v3.161h6.588 l-0.894,5.783h-5.694v15.944C38.716,45.318,47,36.137,47,25C47,12.85,37.15,3,25,3z"/></svg></a>
                    <a href="https://www.instagram.com" class="socialMediaicon1"><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 64 64" width="52px" height="52px"><path d="M 21.580078 7 C 13.541078 7 7 13.544938 7 21.585938 L 7 42.417969 C 7 50.457969 13.544938 57 21.585938 57 L 42.417969 57 C 50.457969 57 57 50.455062 57 42.414062 L 57 21.580078 C 57 13.541078 50.455062 7 42.414062 7 L 21.580078 7 z M 47 15 C 48.104 15 49 15.896 49 17 C 49 18.104 48.104 19 47 19 C 45.896 19 45 18.104 45 17 C 45 15.896 45.896 15 47 15 z M 32 19 C 39.17 19 45 24.83 45 32 C 45 39.17 39.169 45 32 45 C 24.83 45 19 39.169 19 32 C 19 24.831 24.83 19 32 19 z M 32 23 C 27.029 23 23 27.029 23 32 C 23 36.971 27.029 41 32 41 C 36.971 41 41 36.971 41 32 C 41 27.029 36.971 23 32 23 z"/></svg></a>
                    <a href="https://www.twitter.com" class="socialMediaicon1"><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="50px" height="50px"><path d="M 50.0625 10.4375 C 48.214844 11.257813 46.234375 11.808594 44.152344 12.058594 C 46.277344 10.785156 47.910156 8.769531 48.675781 6.371094 C 46.691406 7.546875 44.484375 8.402344 42.144531 8.863281 C 40.269531 6.863281 37.597656 5.617188 34.640625 5.617188 C 28.960938 5.617188 24.355469 10.21875 24.355469 15.898438 C 24.355469 16.703125 24.449219 17.488281 24.625 18.242188 C 16.078125 17.8125 8.503906 13.71875 3.429688 7.496094 C 2.542969 9.019531 2.039063 10.785156 2.039063 12.667969 C 2.039063 16.234375 3.851563 19.382813 6.613281 21.230469 C 4.925781 21.175781 3.339844 20.710938 1.953125 19.941406 C 1.953125 19.984375 1.953125 20.027344 1.953125 20.070313 C 1.953125 25.054688 5.5 29.207031 10.199219 30.15625 C 9.339844 30.390625 8.429688 30.515625 7.492188 30.515625 C 6.828125 30.515625 6.183594 30.453125 5.554688 30.328125 C 6.867188 34.410156 10.664063 37.390625 15.160156 37.472656 C 11.644531 40.230469 7.210938 41.871094 2.390625 41.871094 C 1.558594 41.871094 0.742188 41.824219 -0.0585938 41.726563 C 4.488281 44.648438 9.894531 46.347656 15.703125 46.347656 C 34.617188 46.347656 44.960938 30.679688 44.960938 17.09375 C 44.960938 16.648438 44.949219 16.199219 44.933594 15.761719 C 46.941406 14.3125 48.683594 12.5 50.0625 10.4375 Z"/></svg></a>
                </div>
            </div>


        </div>




        <div class="right" >
            <form class="form1" method="POST">
                <div class="inputname halwidth">
                    <input type="text"  name="yname" required>
                    <label > Your Name</label>       
                </div>
                <div class="inputname halwidth">
                    <input type="text" name="email" required >
                    <label > Email</label>                   
                </div>
                <div class="inputname fullwidth">
                    <input type="text" name="subject" required>
                    <label > Subject</label>                   
                </div>
                <div class="inputname fullwidth">
                    <textarea required name="massage" ></textarea>
                    <label class="say" > Say somthing</label>                    
                </div>

                <div class="inputname ">
                   <button>SEND Massage</button>
                </div>
            </form>
        </div>
        
        </div>
    </div>


     <!--***************************************end of contact page********************  -->



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
                    <li><a href="#service">Services</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact1">Contact</a></li>
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

const toggleBtn = document.querySelector('.toggle-btn');
const navLinks = document.querySelector('.nav-links');

toggleBtn.addEventListener('click', () => {
    navLinks.classList.toggle('open');
});
</script>  

</html>