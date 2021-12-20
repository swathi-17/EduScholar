<?php
    session_start();
    include('navbar.php');
    
    if(!isset($_SESSION["username"])){
        header("location: facultylogin.php");
        exit;
    }
     /*echo $_SESSION['username'];*/
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    /> -->
		
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fwelcome2.css" type="text/css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Welcome</title>
    <script>
        function myfunc1() {
            var ele1 = document.getElementById('modal');
            ele1.style.display = "block";
            var ele2 = document.getElementById('container');
            ele2.style.backgroundColor = "white";
            ele2.style.opacity = "0.4";
        }
        function myfunc2() {
            var ele3 = document.getElementById('modal');
            ele3.style.display = "none";
            var ele4 = document.getElementById('container');
            ele4.style.backgroundColor = "rgb(216 216 196)";
            ele4.style.opacity = "1";
        }
    </script>
</head>
<body>
<div class="wrapper d-flex align-items-stretch">
<?php include('sidebar.php'); ?>   

<div id="content" class="p-4 p-md-5 pt-5">
    <div id="container">
        <div id="wel">Faculty Dashboard</div>
            <div id="name">Name: Mr. <?php echo $_SESSION["name"]; ?> </div>
            <?php if($_SESSION["username"]=="faculty1") { ?>
            <div class="sub" onclick="f1()">
                <p1>Semester: III
                    <span style="padding-left: 100px ;">Section: D</span>
                </p1>
                <p2>Course code: 19CS01</p2>
                <p2>Course Title: Web Programming</p2>
            </div>
        <?php }
        else { ?>
            <div class="sub" onclick="f2()">
                <p1>Semester: V
                    <span style="padding-left: 100px ;">Section: D</span>
                </p1>
                <p2>Course code: 19CS02</p2>
                <p2>Course Title: Java Programming</p2>
            </div> 
        <?php } ?>
            <div class="sub">
                <p1>Semester: VII
                    <span style="padding-left: 90px ;">Section: B</span>
                </p1>
                <p2>Course Title: Machine Learning</p2>
                <p3>Course code: 18CS704</p3>
            </div>
            <!-- <div class="btn1p">
            <button class="button" onclick="myfunc1()">ADD COURSE</button>
            </div> -->
    </div>
</div>
    <!-- <div id="modal" class="modal">
        <div class="content">
            <button onclick="myfunc2()" class="close">&times</button>
            <div class="element">SEMESTER:<input type="text" name="sem" id="sem"></div>
            <div class="element">SECTION:<input type="text" name="sec" id="sec"></div>
            <div class="element">COURSE TITLE:<input type="text" name="title" id="title"></div>
            <div class="element">COURSE CODE:<input type="text" name="code" id="code"></div>
           
            <button class="btn1" onclick="myfunc3()">ADD</button>
        </div>
    </div> -->
</div>
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="sidebar.js"></script>
<script src="js/navbar.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        
    (function($) {

    "use strict";

    // var fullHeight = function() {

    //     $('.js-fullheight').css('height', $(window).height());
    //     $(window).resize(function(){
    //         $('.js-fullheight').css('height', $(window).height());
    //     });

    // };
    // fullHeight();

    $('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
    });

    })(jQuery);
         function f1()
        {
            window.location.href = "students.php";

            // Simulate an HTTP redirect:
            window.location.replace("students.php");
        }
        function f2()
        {
            window.location.href = "students.php";

            // Simulate an HTTP redirect:
            window.location.replace("students.php");
        }

    </script>

         <!-- function myfunc3(){
            var sem = document.getElementById("sem").value;
            var sec = document.getElementById("sec").value;
            var title = document.getElementById("title").value;
            var code = document.getElementById("code").value;

            var newsem = document.createElement("P1");
            newsem.innerHTML = sem;
            document.getElementsByClassName("sub")[0].appendChild(newsem);

            var newsec = document.createElement("SPAN");
            newsec.innerHTML = sec;
            document.getElementsByClassName("sub")[1].appendChild(newsec);

            var newcourse = document.createElement("P2");
            newcourse.innerHTML = title;
            document.getElementsByClassName("sub")[2].appendChild(newcourse);

            var newcode = document.createElement("P3");
            newcode.innerHTML = code;
            document.getElementsByClassName("sub")[3].appendChild(newcode);
        }  -->
    <!-- <div class="container">
        <h2>Faculty Welcome Page</h2>
        <h3>Shashank Shetty</h3>-->
        <!-- <img class="img-fluid" src="img/shashanksir.jpg" alt=""> -->
        <!-- <div class="text-center">
            <img src="img/shashanksir.jpg" class="rounded" alt="...">
        </div> -->
      <!--  <div class="courses">
            <a href="course.php" class="btn">5th sem: Web Prog</a>
        </div>
    </div> -->

</body>
</html>