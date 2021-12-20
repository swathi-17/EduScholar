<?php
    session_start();
    // Destroy session
    if(session_destroy()) {
        // Redirecting To Home Page
        if(isset($_SESSION['usn']))
            header("Location: studentlogin.php");
        else
        header("Location: facultylogin.php");
    }
?>