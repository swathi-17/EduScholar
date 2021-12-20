<?php
session_start();
include('navbar.php');
require_once "config.php";

if(!isset($_SESSION["username"])){
    header("location: facultylogin.php");
    exit;
}
$msg = "";
// if(isset($_POST['update'])) {
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $d = $_POST['date'];
    $query = "INSERT into attendance2 (adate) values ('$d')";
    $res = mysqli_query($conn,$query);
    foreach($_POST['atnd'] as $usn => $mk)
    {   
        $attendance = $mk['at'];
        // update the row
        $query1 = "UPDATE attendance2 SET `$usn` = '$attendance' where adate = '$d'";
        $res1 = mysqli_query($conn,$query1);
        if($res1)
        {
            $msg = "Successfully updated";
        }
        else
        {
            $msg = "Error";
        }
	}
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
    <link rel="stylesheet" href="css/updatema.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Update marks</title>
    
</head>
<body>
<div class="wrapper d-flex align-items-stretch">
<?php include('sidebar.php'); ?>
    <div class="container">
        <div class="heading"><span> 5 semester : D section - Attendance list </span>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
           <span>Course: Java Programming</span> </div>
           <div class="adate">
               <p>Enter the date :</p>
               <input type="date" name="date" id="adt" required>
           </div>
    <div class="table-responsive">
    <table id="table" class="table table-fixed table-striped table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
            <th scope="col">S.No.</th>
            <th scope="col">USN</th>
            <th style="width: 15%" scope="col">Name</th>
            <th scope="col">Attendance</th>
            <th scope="col">Classes held</th>
            <th scope="col">Classes attended</th>
            </tr>
        </thead>
        <tbody>
           
    <?php 
    $usn=$name="";

    $sql="SELECT usn,sname FROM studentlogin order by usn;";
    $result=mysqli_query($conn,$sql);

    $res1 = mysqli_query($conn, 'select count(adate) FROM attendance2;');
    $r1 = mysqli_fetch_array($res1);
    $total1 = $r1[0];

    //  $res2 = mysqli_query($conn, "select count(usn) FROM attendance where usn='Present' group by adate ;");
    //  $r2 = mysqli_fetch_array($res2);
    //  $total2 = $r2[0];

    if(mysqli_num_rows($result)==0)
    {
        echo "<span class='nothing'>No records.</span>";
    }
    else{
      $id=1;
      while($row = mysqli_fetch_array($result)){
          $usn=$row['usn'];
          $name=$row['sname'];

          $res2 = mysqli_query($conn, "select $usn,count($usn) FROM attendance2 group by $usn having $usn='P'");
          $rc = mysqli_fetch_array($res2);
          if(isset($rc[1])){
              $rowcount=$rc[1];
          }
          else{
            $rowcount = 0;
          }
        
        echo "
            <tr>
            <th scope='row'>$id</th>
            <td>$usn</td>
            <td>$name</td>
            <td>        
            <select name='atnd[$usn][at]' id='atnd'>
                <option value='P'>Present</option>
                <option value='AB'>Absent</option>
            </select>
            </td>
            <td>$total1</td>
            <td>$rowcount</td>
            </tr>
        ";  
        $id = $id+1;
      }
    }
      mysqli_close($conn);
?>

<tr class="foot">
    <td colspan="6"><button class="btnn float-right" type="submit" name="update">Update</button></td>
</tr>
        </form>
        </tbody>
       
    </table>
    </div>
        <div class="cheld">
            classes held : 
            <input type="text" id="cheld">
            <button id="myhref"> Update</button>
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