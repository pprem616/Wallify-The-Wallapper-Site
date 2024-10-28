
<?php

session_start();

$username = $phonenumber = $email = $msg = $password = "";
$result = 0; //initialize variable

$db = mysqli_connect('localhost', 'root', '', 'ip'); // connect to the database

// Check connection
if ($db->connect_error) {
    die("Connection Failed: " . $db->connect_error);
}

if (isset($_POST['submit'])) 
{
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['Username']);
    $phonenumber = mysqli_real_escape_string($db, $_POST['Phonenumber']);
    $email = mysqli_real_escape_string($db, $_POST['Email']);
    $password = mysqli_real_escape_string($db, $_POST['Password']);

  	$query = "INSERT INTO wallify (username, userphone, useremail, userpassword) 
              VALUES('$username', '$phonenumber', '$email', '$password')";

	$sql_u = "SELECT * FROM wallify WHERE username='$username'";
  	$sql_e = "SELECT * FROM wallify WHERE useremail='$email'";
  	$res_u = mysqli_query($db, $sql_u);
  	$res_e = mysqli_query($db, $sql_e);

  	if (mysqli_num_rows($res_u) > 0) {
         $msg = 'Sorry... Username already taken'; 	
         $result = 0;
  	}else if(mysqli_num_rows($res_e) > 0){
         $msg = 'Sorry... E-mail already taken'; 	
         $result = 0;
  	}else{
    
      if (mysqli_query($db, $query)) {
            $msg = "Registered Successfully";
            $result = 1;
        } else {
            $msg =  "Error: " . $query . "<br>" . mysqli_error($db);
            $result = 0;
        }
  	}
}
    
?>



<html>
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="signuplogin.css" rel="stylesheet" type="text/css">
        <script src="validation.js"></script>
        <title>Wallify - Sign Up</title>
    </head>
    
    <div class="abcd">
        <img id="log" src="http://icons.iconarchive.com/icons/goescat/macaron/128/burp-suite-icon.png">
        <a id="brandname" href="index.php"><strong>&nbspWallify</strong></a>
    </div>

    <form onsubmit="return validate();" action="signup.php" method="POST" >
        <div class="container">
           <h3 style="text-align: center; font-size: 26px;">SIGN UP</h3>
            <hr>
           <p style="font-style: oblique">You can sign up free at Wallify and download super awesome wallpapers without any cost. </p>
           <br>
            Username <span style="color:red;">*</span> <br><input id="uname" class="tborder" type="text" placeholder="Enter Username" name="Username" size="67">

            <div id="uerror" style="font-family: oblique; font-size:15px; margin-top: 5px; color:red"></div> 
            <br>
            Phone number <span style="color:red;">*</span><br><input id="phnum" class="tborder" type="text" placeholder="Enter Phone number" name="Phonenumber" size="67">
            <div id="pherror" style="font-family: oblique; font-size:15px; margin-top: 5px; color:red"></div> 
            <br>
            E-mail <span style="color:red;">*</span> <br><input id="emailid" class="tborder" type="text" placeholder="Enter E-mail ID" name="Email" size="67">
            <div id="eerror" style="font-family: oblique; font-size:15px; margin-top: 5px; color:red"></div> 
            <br>
            Password <span style="color:red;">*</span><br><input id="upass" class="tborder" type="password" placeholder="Enter Password" name="Password" size="67">
            <div id="perror" style="font-family: oblique; font-size:15px; margin-top: 5px; color:red"></div> 
            <br>
            Confirm Password <span style="color:red;">*</span><br><input id="cpass" class="tborder" type="password" placeholder="Confirm Password" size="67">
            <div id="cperror" style="font-family: oblique; font-size:15px; margin-top: 5px; color:red"></div> 
            <br>
            <input class="button" id="signbtn" type="submit" name="submit" value="Create an account">
            <br>
                <?php
                    if($result == 1){
                        echo '<p style = "color: green; text-align: center;">' . $msg . '</p>'; 
                    } else {
                        echo '<p style = "color: red; text-align: center;">' . $msg . '</p>'; 
                    } 
                ?>
            <p style="font-style: oblique;"> Have an account with us?<a href="login.php"> Login here.</a></p>
        </div>
    </form>
</html>