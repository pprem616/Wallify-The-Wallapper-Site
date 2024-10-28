<?php

session_start();

$phonenumber = $username = $password = "";

$db = mysqli_connect('localhost', 'root', '', 'ip'); // connect to the database

// Check connection
if ($db->connect_error) {
    die("Connection Failed: " . $db->connect_error);
}

if (isset($_POST['submit'])) 
{
    // receive all input values from the form
    $password = mysqli_real_escape_string($db, $_POST['Password']);
    $phonenumber = mysqli_real_escape_string($db, $_POST['Phonenumber']);
  
    $query = "SELECT * FROM wallify WHERE userphone = '$phonenumber' AND userpassword = '$password'";
    $res_phone = mysqli_query($db, $query);

    if (mysqli_num_rows($res_phone) == 1) {
            echo "LOGGED IN SUCCESSFULLY";
            $row = mysqli_fetch_array($res_phone,MYSQLI_ASSOC);
            $username = $row['username'];
            $_SESSION['username'] = $username;
            echo $_SESSION['username'];
            header("Location: index.php");
        } else {
            echo "LOGGED IN FAILED";
        }
}
    
?>


<html>
    <head> 
        <link href="signuplogin.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Wallify - Log In</title>
    </head>
    <body>

    <div class="abcd">
        <img id="log" src="http://icons.iconarchive.com/icons/goescat/macaron/128/burp-suite-icon.png">
        <a id="brandname" href="index.php"><strong>&nbspWallify</strong></a>
    </div>
    
    <form onsubmit="return validate()" action="login.php" method="POST">
        <div class="container">
           <h3 style="text-align: center; font-size: 26px">LOG IN</h3>
            <hr>
           <p style="font-style: oblique"> Welcome to our Site. Please enter your Login details to login here.</p>
           <br>
            Username<br><input id="uname" class="tborder" type="text" placeholder="Enter Phone Number" name= "Phonenumber" size="67">
            <br>
            <br>
            Password<br><input id="pass" class="tborder" type="password" placeholder="Enter Password" name="Password" size="67">
            <br>
            <br>
            <input class="button" id="logbtn" type="submit" name="submit" value="Log in ">
            <p style="font-style: oblique"> Don't have an account with us?<a href="signup.php"> SignUp here.</a></p>
        </div>
    </form>
    </body>
</html>
<script>



</script>