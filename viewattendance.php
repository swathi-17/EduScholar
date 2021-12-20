<?php
session_start();
require_once "config.php";

if(!isset($_SESSION["username"])){
    header("location: facultylogin.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $d = $_POST['date'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/course.css">
    <link rel="stylesheet" href="css/updatema.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/updateatt_display.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
<?php include('navbar.php'); ?>
<div class="wrapper d-flex align-items-stretch">
<?php include('sidebar.php'); ?>
<div class="container">
    <div class="date">
        Date: <?php echo $d; ?>        
    </div>
    <div class="table-responsive">
        <table id="table" class="table table-hover table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th style="width: 25%;" scope="col">USN</th>
                    <th style="width: 25%;" scope="col">Name</th>
                    <th style="width: 25%;" scope="col">Attendance</th>
                </tr>
            </thead>
            <tbody>
    <?php
        $query1 = "select usn,sname from studentlogin";
        $res1 = mysqli_query($conn,$query1);

        if(mysqli_num_rows($res1)==0)
         {
             echo "<span class='nothing'>No records.</span>";
         }
         else
         {
            while($row = mysqli_fetch_array($res1)){
                $usn=$row['usn'];
                $name=$row['sname'];
                echo "<tr>
                        <th scope='row'>$usn</th>
                        <td>$name</td>";

                $query2 = "select * from attendance where adate='$d'";
                $res2 = mysqli_query($conn,$query2);
                while($row2= mysqli_fetch_array($res2))
                {
                    $status = $row2["$usn"];
                    echo"
                        <td>$status</td>
                    ";  
                }
                echo "<tr>";
            }
    }
    mysqli_close($conn);


    ?>
                <tr class="foot">
                    <td colspan="6"><button class="btnn float-right" type="submit" name="update">Update</button></td>
                </tr>
                </tbody>       
            </table>
        </div>    
    </form>
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