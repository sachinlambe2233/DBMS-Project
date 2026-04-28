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
        $fullname = $_POST['fullname'];
        $rollno = $_POST['rollno'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $dob = $_POST['birthDate'];
        $branch = $_POST['branch'];
        $sem = $_POST['semester'];
        $status = 1;
        $addsql = "INSERT INTO `student` (`Name`, `Roll_No`, `Email`, `Gender`, `DOB`, `branch_id`, `Reg_date`, `sem_id`, `status`) VALUES ('$fullname','$rollno', '$email', '$gender', '$dob', '$branch', current_timestamp(), '$sem', '$status') ";
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

    <title>Add Students</title>
</head>
<body>
<?php include "nav.php"; ?>
<?php
    if($showAlert){
        echo '<script>alert("Record Added Successfully!")</script>';
    }
    if($showError){
        echo '<script>alert("Error! Try Again.")</script>';

    }
    ?>
    <div class="glass-panel" style="width: 80%; margin: 80px auto;">
      <form method="post" >
<!--     <fieldset> -->
      <h2 style="text-align:center; font-size : 30px">Add Student Details</h2>
       
 
<div style="width: 75%; margin: auto; font-size: 20px;">

    <div style="display: flex; align-items: center; margin-bottom: 25px;">
        <label for="fullname" style="width: 180px; flex-shrink: 0;">Full name :</label>  
        <input type="text" name="fullname" required />
    </div>

    <div style="display: flex; align-items: center; margin-bottom: 25px;">
        <label for="rollno" style="width: 180px; flex-shrink: 0;">Roll No :</label> 
        <input type="text" name="rollno" required />
    </div>

    <div style="display: flex; align-items: center; margin-bottom: 25px;">
        <label for="email" style="width: 180px; flex-shrink: 0;">Email :</label>  
        <input type="email" name="email" required />
    </div>

    <div style="display: flex; align-items: center; margin-bottom: 25px;">
        <label style="width: 180px; flex-shrink: 0;">Gender :</label>
        <div style="display: flex; align-items: center; gap: 20px;">
            <label style="display: flex; align-items: center; cursor: pointer;"><input type="radio" name="gender" value="Male" required style="width:auto; margin:0 8px 0 0;" /> Male</label>
            <label style="display: flex; align-items: center; cursor: pointer;"><input type="radio" name="gender" value="Female" required style="width:auto; margin:0 8px 0 0;" /> Female</label>
            <label style="display: flex; align-items: center; cursor: pointer;"><input type="radio" name="gender" value="Other" required style="width:auto; margin:0 8px 0 0;" /> Other</label>
        </div>
    </div>

    <div style="display: flex; align-items: center; margin-bottom: 25px;">
        <label for="birthDate" style="width: 180px; flex-shrink: 0;">DOB :</label> 
        <input type="date" name="birthDate" required />
    </div>

    <div style="display: flex; align-items: center; margin-bottom: 25px;">
        <label for="branch" style="width: 180px; flex-shrink: 0;">Branch :</label>
        <select name="branch" id="branch" required>
            <option value="">Select Branch</option>
            <?php 
            $sql = "SELECT * from `branch`";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
            ?>
                <option value="<?php echo $row['branch_id']; ?>"><?php echo $row['branch'];?></option>
            <?php } ?>
        </select>
    </div>

    <div style="display: flex; align-items: center; margin-bottom: 25px;">
        <label for="semester" style="width: 180px; flex-shrink: 0;">Semester :</label>
        <select name="semester" id="semester" required>
            <option value="">Select Semester</option>
            <?php 
            $sql = "SELECT * from `semester`";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
            ?>
                <option value="<?php echo $row['sem_id']; ?>"><?php echo $row['semester'];?></option>
            <?php } ?>
        </select>
    </div>

</div>

 
 
       
 <div style="float:right; margin-right : 80px">
        <button type="submit" >Add</button>

</div>

  </form>

    </div>

</body>
</html>
