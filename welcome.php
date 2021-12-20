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
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/welcome.css">
    <title>Welcome</title>
</head>
<body>
<?php 
     session_start();
    include('navbar.php');
   
    if(!isset($_SESSION["usn"])){
        header("location: studentlogin.php");
        exit;
    }
    ?>
    <?php
         $id=$_SESSION['id'];
         $usn=$_SESSION['usn'];
         $name=$_SESSION['name'];
         $email=$_SESSION['email'];
     ?>
      
    <div class="container" data-aos="fade-up" data-aos-duration="800">
        <div class="heading">PROGRESS REPORT</div>
        <div class="det">
        <div> <span>USN:</span>  <?php echo $usn; ?></div>
            <div><span>Name:</span>  <?php echo $name; ?></div>
            <!-- <div>Course: Web programming</div> -->
        </div>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                <th style="width: 20%" scope="col">Course</th>
                <th style="width: 12.5%" scope="col">CIE</th>
                <th style="width: 12.5%" scope="col">SEE</th>
                <th style="width: 12.5%" scope="col">Classes held</th>
                <th style="width: 12.5%" scope="col">Classes attended</th>
                </tr>
            </thead>
            <tbody>
    <?php 
        
        require_once "config.php";

        $ciem=$seem="";

        $sql="SELECT * FROM marks where usn='$usn';";
        $sql2="SELECT count(adate) FROM attendance;";
        $sql3="SELECT count(adate) FROM attendance where $usn='P'";

        $sql4="SELECT * FROM marks2 where usn='$usn';";
        $sql5="SELECT count(adate) FROM attendance2;";
        $sql6="SELECT count(adate) FROM attendance2 where $usn='P'";

            // $result=mysqli_query($link,$sql);
        // $sql2="SELECT cie,see FROM attendance where id=$id";

        if($result = mysqli_query($conn, $sql) and $res2=mysqli_query($conn,$sql2) and $res3=mysqli_query($conn,$sql3) and $res4 = mysqli_query($conn, $sql4) and $res5=mysqli_query($conn,$sql5) and $res6=mysqli_query($conn,$sql6)){     
            //  echo $link->error; 
        if(mysqli_num_rows($result)==0 or mysqli_num_rows($res2)==0 or mysqli_num_rows($res3)==0 or mysqli_num_rows($res4)==0 or mysqli_num_rows($res5)==0 or mysqli_num_rows($res6)==0)
        {
            echo "<span class='nothing'>No records.</span>";
        }
        else{
                $row = mysqli_fetch_array($result);
                $row2 = mysqli_fetch_array($res2);
                $row3 = mysqli_fetch_array($res3);
                $ciem=$row['cie'];
                $seem=$row['see'];
                $cheld=$row2[0];
                $cattended=$row3[0];

                $row4 = mysqli_fetch_array($res4);
                $row5 = mysqli_fetch_array($res5);
                $row6 = mysqli_fetch_array($res6);
                $ciem2=$row4['cie'];
                $seem2=$row4['see'];
                $cheld2=$row5[0];
                $cattended2=$row6[0];

        echo "
                <tr>
                <td>Web Programming</td>
                <td id='cie'>$ciem</td>
                <td id='see'>$seem</td>
                <td>$cheld</td>
                <td>$cattended</td>
                </tr>
                <tr>
                <td>Java Programming</td>
                <td id='cie'>$ciem2</td>
                <td id='see'>$seem2</td>
                <td>$cheld2</td>
                <td>$cattended2</td>
                </tr>
        ";  
        }
        }
        mysqli_close($conn);
    ?>
            </tbody>
        </table>
    </div>
    <script src="js/navbar.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 100,
            duration: 2000,
        });
    </script>
</body>
</html>