<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Reset password</title>
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

  // Check if the user is logged in, otherwise redirect to login page
// if(!isset($_SESSION["usn"]) || !isset($_SESSION["username"])){
//     header("location: index.php");
//     exit;
// }

if(isset($_SESSION["usn"]) || isset($_SESSION["username"])){

// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE studentlogin SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = md5($new_password);//password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                //session_destroy();
                header("location: welcome.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
<div class="container">
    <form class="form" method="post" name="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h1 class="login-title">Reset password</h1>
        <input type="text" class="login-input" name="new_password" placeholder="New Password" autofocus="true" required/>
        <?php echo $new_password_err; ?>
        <input type="password" class="login-input" name="confirm_password" placeholder="Confirm Password" required/>
        <?php echo $confirm_password_err; ?>
        <input type="submit" value="Login" name="submit" class="login-button"/>
  </form>
</div>
<?php } else
{
    header("location:index.php");
}
?>
    <script src="js/navbar.js"></script>

</body>
</html>