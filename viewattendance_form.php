<?php
session_start();
require_once "config.php";

if(!isset($_SESSION["username"])){
    header("location: facultylogin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/course.css">
    <link rel="stylesheet" href="css/updatema.css">
    <link rel="stylesheet" href="css/updateatt.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include('navbar.php'); ?>
<div class="wrapper d-flex align-items-stretch">
<?php include('sidebar.php'); ?>

<div class="container">
    <div class="new">
        <div class="new2">
            <h1 style="font-size: 35px;">View Attendance</h1>
            <form action="<?php 
            if($_SESSION['username']=='faculty1')
            {echo 'viewattendance.php';}
            else{echo 'viewattendance2.php';}
            ?>" method="POST">
                <div class="adate">
                    <p>Enter the date :</p>
                    <input type="date" name="date" id="adt" required>
                    <button type="submit" class="btnn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>  
<script src="js/navbar.js"></script>
<script>
    (function($) {
        "use strict";

        var fullHeight = function() {

            $('.js-fullheight').css('height', $(window).height());
            $(window).resize(function(){
                $('.js-fullheight').css('height', $(window).height());
            });

        };
        fullHeight();

        $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        });

    })(jQuery);
</script>
</body>
</html>