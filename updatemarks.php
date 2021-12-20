<?php
session_start();
require_once "config.php";
if(!isset($_SESSION["username"])){
    header("location: facultylogin.php");
    exit;
}

$message = '';

if(isset($_POST["upload"]))
{
 if($_FILES['product_file']['name'])
 {
  $filename = explode(".", $_FILES['product_file']['name']);
  if(end($filename) == "csv")
  {
   $handle = fopen($_FILES['product_file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $usn = mysqli_real_escape_string($conn, $data[0]);
   // $sname = mysqli_real_escape_string($conn, $data[1]);  
    $cie = mysqli_real_escape_string($conn, $data[2]);
    $see = mysqli_real_escape_string($conn, $data[3]);
    $query = "
     UPDATE marks 
     SET  
     cie = '$cie',
     see = '$see'
     WHERE usn = '$usn'
    ";
    //  sname = '$sname', 
    mysqli_query($conn, $query);
   }
   fclose($handle);
   header("location: updatemarks.php?updation=1");
  }
  else
  {
   $message = '<label class="text-danger">Please Select CSV File only</label>';
  }
 }
 else
 {
  $message = '<label class="text-danger">Please Select File</label>';
 }
}

if(isset($_GET["updation"]))
{
 $message = '<label class="text-success">Successful</label>';
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Student Marks</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/course.css">
    <link rel="stylesheet" href="css/updatema.css">
    <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
 <?php include('navbar.php'); ?>
 <div class="wrapper d-flex align-items-stretch">
  <?php include('sidebar.php'); ?>
  <br />
  <div class="container">
   <div class="heading">
   <span>Student marks</span>
   <span> 5 semester D section: Web Programming</span>
   </div>
   <form method="post" enctype='multipart/form-data'>
    <div class="upld">
        <label>Please Select File(Only CSV Format) : </label>
        <input type="file" name="product_file" />
        <input type="submit" name="upload" class="btnn" value="Upload" />
    </div>
   </form>
   <br />
   <?php echo $message; ?>
   
   <div class="table-responsive">
    <table class="table table-hover table-bordered table-striped">
        <thead class="thead-dark">
        <tr>
        <th>Sl. No.</th>
        <th>Name</th>
        <th>USN</th>
        <th>CIE</th>
        <th>SEE</th>
        </tr>
        </thead>
        <tbody>
     <?php

      $query = "SELECT * FROM studentlogin";
      $result = mysqli_query($conn, $query);

      $query1 = "SELECT * FROM marks";
      $result1 = mysqli_query($conn, $query1);

     if(mysqli_num_rows($result)==0 or mysqli_num_rows($result1)==0)
     {
         echo "<span class='nothing'>No records.</span>";
     }
     else{
         $id =1;
     while($row = mysqli_fetch_array($result) and $row1 = mysqli_fetch_array($result1))
     {
      echo '
      <tr>
       <td>'.$id.'</td>
       <td>'.$row["sname"].'</td>
       <td>'.$row["usn"].'</td>
       <td>'.$row1["cie"].'</td>
       <td>'.$row1["see"].'</td>
      </tr>
      ';
      $id = $id + 1;
     }
    }
     ?>
    </tbody>
    </table>
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