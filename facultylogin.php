<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Faculty Login</title>
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
   
    if(isset($_SESSION["username"])){
        header("location: fwelcome.php");
        exit;
    }

    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
       
        $query    = "SELECT * FROM `faculty` WHERE username='$username'
                     AND password='$password'";
        $result = mysqli_query($conn, $query); //or die(mysql_error());
        $rows = mysqli_num_rows($result);

        if ($rows == 1) {

            while($row = mysqli_fetch_array($result)){
				$username=$row['username'];
				$name=$row['fname'];
                $pwdd=$row['password'];
        }

            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["name"] = $name;

            //$_SESSION['usn'] = $usn;
            
            // Redirect to user dashboard page
            header("Location: fwelcome.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='facultylogin.php'>Login</a> again.</p>
                  </div>";
        }
    }
    else{
?>
<div class="container">
    <form class="form" method="post" name="login">
        <h1 class="login-title">Faculty Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" required/>
        <input type="password" class="login-input" name="password" placeholder="Password" required/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
  </form>
</div>
<?php
    } 
    ?>
    <script src="js/navbar.js"></script>

</body>
</html>