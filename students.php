<?php
session_start();
include('navbar.php');

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
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/course.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Welcome</title>
</head>
<body>
<div class="wrapper d-flex align-items-stretch">
<?php include('sidebar.php'); ?>
    <div class="container" style="margin-bottom: 45px;">
        <div class="heading">5 semester : D section - Student list</div>
    <table class="table table-hover table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
            <th style="width: 15%" scope="col">S.No.</th>
            <th style="width: 25%" scope="col">USN</th>
            <th style="width: 35%" scope="col">Name</th>
            <th style="width: 35%" scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
    <?php 
     
    require_once "config.php";

    $usn=$name=$email="";

    $sql="SELECT usn,sname,email FROM studentlogin order by usn;";
        // $result=mysqli_query($link,$sql);
    
    if($result = mysqli_query($conn, $sql)){     
        //  echo $link->error; 
      if(mysqli_num_rows($result)==0)
      {
          echo "<span class='nothing'>No records.</span>";
      }
      else{
        $id=1;
        while($row = mysqli_fetch_array($result)){
            $usn=$row['usn'];
            $name=$row['sname'];
           $email=$row['email'];
           
       echo "
            <tr>
            <th scope='row'>$id</th>
            <td>$usn</td>
            <td>$name</td>
            <td>$email</td>
            </tr>
       ";  
       $id = $id+1;
       
        }
      }
    }
      mysqli_close($conn);
?>
        </tbody>
    </table>

    <!-- <div class="links">
        <a href="updatemarks2.php">Update Marks</a>
        <a href="updateattendance.php">Update Attendance</a>
    </div> -->

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