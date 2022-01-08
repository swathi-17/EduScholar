<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Student Login</title>
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
<?php 
 session_start();
 include('navbar.php'); 
    require('config.php');
   
    if(isset($_SESSION["usn"])){
        header("location: welcome.php");
        exit;
    }
    // if(isset($_SESSION["username"]))
    // {
    //     header("location: fwelcome.php");
    //     exit;
    // }
    // When form submitted, check and create user session.
    if (isset($_POST['usn'])) {
        $usn = stripslashes($_REQUEST['usn']);    // removes backslashes
        $usn = mysqli_real_escape_string($conn, $usn);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `studentlogin` WHERE usn='$usn'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query); //or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {

            while($row = mysqli_fetch_array($result)){
                $id=$row['id'];
				$usnn=$row['usn'];
                $namee=$row['sname'];
                $emaill=$row['email'];
                $pwdd=$row['password'];
        }

            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["usn"] = $usnn;
            $_SESSION["name"] = $namee;
            $_SESSION["email"] = $emaill;

            //$_SESSION['usn'] = $usn;
            
            // Redirect to user dashboard page
            header("Location: welcome.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='studentlogin.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
<div class="container">
    <form class="form" method="post" name="login">
        <h1 class="login-title">Student Login</h1>
        <input type="text" class="login-input" name="usn" placeholder="USN" autofocus="true" required/>
        <input type="password" class="login-input" name="password" placeholder="Password" required/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <!-- <p class="link"><a href="signup.php">Signup</a></p> -->
  </form>
</div>
<?php
    }
?>

<script src="js/navbar.js"></script>

</body>
</html>