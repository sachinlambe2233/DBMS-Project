<?php
session_start();
$showAlert = false;
$showError = false;
include "includes/connection.php";
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: index.php");
    exit;
}
else{
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $subjname = $_POST['subjname'];
        $subjcode = $_POST['subjcode'];
        $status = 1;
        $addsql = "INSERT INTO `subjects` (`subj_name`, `subj_code`, `status`) VALUES ('$subjname','$subjcode','$status') ";
        $result = mysqli_query($conn, $addsql);
        if($result){
            $showAlert = true;
        }
        else{
            $showError = true;
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
 <link rel="stylesheet" href="css/form.css">

    <title>Add Subjects</title>
</head>
<body>
<?php include "nav.php"; ?>
<?php
    if($showAlert){
        echo '<script>alert("Subject Added Successfully!")</script>';
    }
    if($showError){
        echo '<script>alert("Error! Try Again.")</script>';

    }
    ?>
    <div class="glass-panel" style="width: 80%; margin: 80px auto;">
      <form method="post" >

      <h2 style="text-align:center; font-size : 30px">Add Subject</h2>
       
 
<div style=" width : 75%; margin:auto auto; font-size : 20px">
<p>
        <label for="subjname">Subject Name  &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;  
    <input name="subjname" />
</label>
      </p>
<p style="margin-top : 50px">
        <label for="subjcode">Subject Code  &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;  
    <input name="subjcode" />
</label>
      </p>


</div>

 
 
       
 <div style="float:right; margin-right : 80px">
        <button type="submit" >Add</button>

</div>

  </form>

    </div>

</body>
</html>
