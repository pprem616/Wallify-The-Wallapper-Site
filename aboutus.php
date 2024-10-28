<?php 
    session_start();

    $uname = "";
    $result = 0;

    if(isset($_SESSION['username'])){
      $uname =  "Welcome, " . $_SESSION['username'];
    }
   
    if ($uname != '') {
      $result = 1;
    } else {
      $result = 0;
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction']))
    {
      session_destroy();
      header('Location:index.php');
      $result = 0;
    }
?>






<html>
    <head>
        <title> About Us - Wallify</title>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="http://icons.iconarchive.com/icons/goescat/macaron/16/burp-suite-icon.png"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="main.js"></script>
    <script src="validation.js"></script>
    
    </head>
    <body>


    <div class="mynav" style=" position: absolute; z-index: 24 ; left: 0; top:0">
      <div id="mySidenav" class="sidenav">
        <div class="name">
            <?php
              if($result == 1){
                    echo '<p id="usernamemob" style = "color: white; font-size: 20px;"><i>' . $uname . '</i></p>';
                    echo '<style> 
                          #mlogin , #msignup {
                              display: none;
                          }

                          #mlogout {
                              display: block;
                          }

                        </style>';
                      }
            ?>
        </div>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a onclick="show_hide()" id="mcdropdown" class="navtext" href="#">Explore <i id="arrow" class="fa fa-angle-up"></i> </a>
          <div id="mccontent">
            <a href="#" class="categlinks cnavtext"  onclick="openCateg(event,'animal')">Animal</a>
            <a href="#" class="cnavtext">Abstract</a>
            <a href="#" class="cnavtext">Celebrity</a>
            <a href="#" class="cnavtext">Games</a>
            <a href="#" class="cnavtext">Space</a>
            <a href="#" class="cnavtext">Texture</a>
            <a href="#" class="cnavtext">Nature</a>
            <a href="#" class="cnavtext">Sports</a>
            <a href="#" class="cnavtext">Food</a>
          </div>
        <a id="mlogin" class="navtext" href="login.php">Login</a>
        <a id="msignup" class="navtext" href="signup.php">Signup</a>
        <a id="mlogout"  href="#">
            <form action="index.php" method="POST"  style="margin: 0; padding: 0;">
                  <input id="mlog" type="submit" class="mlog" name="someAction" style="height: 45px; width: 100%; padding: 0; margin: 0; margin-top: 15px;"  value="Logout" >
              </form>        
        </a>
            <?php
                if($result == 0){
                       echo '<style> 
                              #mlogout {
                                display: none;
                              }
                            </style>';
                     }
                ?>
      </div>

      <span id="menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
     
      <a id="brand" style=" height: 45px;font-size: 20px; border-radius: 5px;" href="index.php"><span><img style="width: 32px; height: 32px; " src="http://icons.iconarchive.com/icons/goescat/macaron/128/burp-suite-icon.png"></span>  &nbsp <strong>Wallify</strong></a>
      
      <div class="pcnav">
          <a id = "cbtn" class="pctext" href="#" onclick="opencloseCateg()">Explore  <i id="ar" class="fa fa-angle-down"></i></a>&nbsp<span style="color: white;">|</span>
          <a class="pctext" id="login" href="login.php">Login</a>
          <a class="pctext" id="signup" href="signup.php">Signup</a>
          <?php
                if($result == 1){
                      echo '<a href="#" id="username" class="pctext" style = " text-align: center;"><i>' . $uname . '</i></a>&nbsp';
                      echo "<span style='color: white;'>|</span>";
                      echo '<style> 
                              #login , #signup {
                                    display: none;
                              }
                              

                              #logobtn {
                                display: inline-block;
                              }

                            </style>';
                      
                     }
                ?>
            <a class="pctext" id="logobtn" style="margin: 0; padding: 0; height: 45px;"> 
              <form action="index.php" method="POST"  style="margin: 0; padding: 0; height: 45px;">
                  <input type="submit" name="someAction"  style="margin: 0; padding: 0; border: none; font-size: 16px; background:rgb(82, 17, 17,0.01) ; color: white; height: 45px; padding: 0 10px;" value="Logout" >
              </form>    
            </a>
            <?php
                if($result == 0){
                       echo '<style> 
                              #logobtn {
                                display: none;
                              }
                            </style>';
                     }
                ?>
      </div>
    </div>

    
    

    <div class="categclosed" id="category"> 
        <ul class="cname">
          <li class="categlinks" onclick="openCateg(event,'animal')">Animal</li>
          <li>Abstract</li>
          <li>Celebrity</li>
          <li>Beach</li>
          <li>Games</li>
          <li>Food</li>
          <li>Space</li>
          <li>Texture</li>
          <li>Nature</li>
          <li>Sports</li>
          <li>Typography</li>
        </ul>
    </div>

    <div class="aboutimg" style=" position: fixed; top:0; left:0; height: 55%; width:100%">
       <img style="width:100%; height: 100%;" src="https://www.pexels.com/assets/page-headers/night-62f57556079d65eee8655ce902da75245dab3fa0d02b077d1a7e26968ddb0463.jpg">
    </div>

    <div class="intro">
        <h3 id="introheading" class="aboutintro" style="padding-top:3%; padding-left:8%; padding-right:8%;">We provide free photos and Wallify helps many users<br> all over the world to easily create beautiful product and design. </h3>
        <br>
    </div>

 
    <div class="aboutcontent" style=" position: absolute; z-index: 10; width:100%; margin: 0 auto; padding: 3% 0 0 0; top:55%">
          <div style="margin: auto; width: 80%;">
            <h3 style="color:black; padding-top:1%;   font-weight: bold;">About Us</h3>
            <p>Wallify provides high quality and completely free stock photos licensed under the wallify license. All photos are nicely tagged, categorized and also easy to discover through our discover pages.</p>
            <h3 style="color:black; padding-top:1%;   font-weight: bold;">Photos</h3>
            <p>We have hundreds of thousands free stock photos and every day new high resolution photos will be added. All photos are hand-picked from photos uploaded by our users or sourced from free image websites. We make sure all published pictures are high-quality and licensed under the wallify license.</p>
            <h3 style="color:black; padding-top:1%;   font-weight: bold;">Team</h3>
            <p>Wallify is developed by,<br>&nbsp&nbsp Prem Patel&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp IT-B-12 <br>&nbsp&nbsp Riddhi Patel &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp IT-B-13 <br>&nbsp&nbsp Sandeep Pandey &nbsp&nbspIT-B-09</p>
            <h3 style="color:black; padding-top:1%;   font-weight: bold;">Mission</h3>
            <p>We help millions of designers, writers, artists, programmers and other creators to get access to beautiful photos that they can use freely which empowers them to create amazing products, designs, stories, websites, apps, art and other work.</p>
            <br>
            <p>And don't forget to share, like and follow Pexels on Instagram, Facebook and Twitter ;)</p>
        </div>


        <div class="foot" style="width: 100%; height: auto; z-index: 20">
      <div class="about">
          <h3 style=" color:black; font-size: 22px;" > <a style=" height: 45px;font-size: 20px; border-radius: 5px;" href="index.php"><img style="width: 32px; height: 32px; " src="http://icons.iconarchive.com/icons/goescat/macaron/128/burp-suite-icon.png"></a>&nbsp&nbspWallify&nbsp&nbsp&nbsp
            <div class="quicklink">
              <a href="index.php">Home</a>
              <a href="aboutus.php">About us</a>
              <a href="signup.php">Join us</a> 
             </div>
          </h3>
       
          <p style="color:black; font-size: 17px;  text-align: justify; ">Wallify provides high quality and completely free stock photos licensed under the wallify license. All photos are nicely tagged, searchable and also easy to discover through our discover pages.We help millions of designers, writers, artists, programmers and other creators to get access to beautiful photos that they can use freely which empowers them to create amazing products, designs, stories, websites, apps, art and other work.</p>
      </div>

    <div class="social">
        <a href="https://www.facebook.com"><img style="width:40px; height:40px;" src="Misc/fb.png"></a>
        <a href="https://www.gmail.com"><img style="width:42px; height:48px;" src="Misc/gmail.png"></a>
        <a href="https://www.twitter.com"> <img style="width:40px; height:45px;" src="Misc/twitter.png"></a>
        <a href="https://www.google.com"> <img style="width:42px; height:40px;"src="Misc/linkdin.png"></a>
    </div><br>
    <div class="contact">
      <i class="fa fa-envelope" style="font-size:25px;"></i><span style="font-size:17px;">&nbsp&nbsp wallify@abc.com</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      <i class="fa fa-phone"  style="font-size:25px;"></i><span style="font-size:17px;">&nbsp&nbsp (508) 746-2088</span>
    </div>
      <p id="copy"> ©2019&nbsp; Wallify Company S.L. All rights reserved.</p>



        
      </div>


   


    <div class="categcontent" id="animal">
    <div class="container-fluid">
      <br>
      <h2 class="trending"> Animal </h2>
    
      <div class="row">
             
              <div class="column">
               <img src="Animal/a1.jpeg">
                <img src="Animal/a2.jpeg">
                <img src="Animal/a3.jpeg">
                <img src="Animal/a4.jpeg">
                <img src="Animal/a5.jpeg">
                <img src="Animal/a6.jpeg">
                <img src="Animal/a7.jpeg">
              </div>
              <div class="column">
                <img src="Animal/a8.jpeg">
                <img src="Animal/a9.jpg">
                <img src="Animal/a10.jpeg">
                <img src="Animal/a11.jpeg">
                <img src="Animal/a12.jpeg">
                <img src="Animal/a13.jpeg">
                <img src="Animal/a14.jpeg">
                <img src="Animal/a15.jpeg">
              </div>
              <div class="column">
                <img src="Animal/a16.jpeg">
                <img src="Animal/a17.jpeg">
                <img src="Animal/a18.jpeg">
                <img src="Animal/a19.jpeg">
                <img src="Animal/a20.jpeg">
                <img src="Animal/a21.jpeg">
                <img src="Animal/a22.jpeg">
                <img src="Animal/a23.jpeg">
              </div>
              <div class="column">
                <img src="Animal/a24.jpeg">
                <img src="Animal/a25.jpeg">
                <img src="Animal/a26.jpeg">
                <img src="Animal/a27.jpeg">
                <img src="Animal/a28.jpeg">
                <img src="Animal/a29.jpeg">
                <img src="Animal/a30.jpeg">
                <img src="Animal/a31.jpeg">
              </div>
            </div>
  </div>
</div>




    </body>
</html>