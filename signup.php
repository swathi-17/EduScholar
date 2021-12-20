<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/login.css"/>
    <link rel="stylesheet" href="css/navbar.css"/>
</head>
<body>
<?php include('navbar.php'); 

    require('config.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['usn'])) {
        // removes backslashes
        $usn = stripslashes($_REQUEST['usn']);
        //escapes special characters in a string
        $usn = mysqli_real_escape_string($conn, $usn);
        $usn = strtoupper($usn);
        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($conn, $name);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        //$create_datetime = date("Y-m-d H:i:s");
        /*$query = " UPDATE studentlogin SET sname='".$name."',email='".$email."',password='".md5($password)."' WHERE usn='".$usn."';";*/
        $query    = "INSERT into `studentlogin` (usn, sname, email, password)
                     VALUES ('$usn','$name','$email', '" . md5($password) . "')";
        $result   = mysqli_query($conn, $query);

        $query2 = "ALTER TABLE attendance ADD $usn VARCHAR(7)";
        $result2   = mysqli_query($conn, $query2);

        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='studentlogin.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='signup.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
<div class="container">
    <form class="form" action="" method="post">
        <h1 class="login-title">Signup</h1>
        <input type="text" class="login-input" name="usn" placeholder="USN" required />
        <input type="text" class="login-input" name="name" placeholder="Name">
        <input type="text" class="login-input" name="email" placeholder="Email Address">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Signup" class="login-button">
        <p class="link"><a href="studentlogin.php">Click to Login</a></p>
    </form>
</div>
<?php
    }
?>

<script src="js/navbar.js"></script>

</body>
</html>