<?php
session_start();
$showAlert = false;
$showError = false;
include "includes/connection.php";
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: index.php");
    exit;
}
$subid = intval($_GET['subid']);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $subj_name = $_POST['subj_name'];
        $subj_code = $_POST['subj_code'];
        $stat = $_POST['status'];
        $addsql = "UPDATE `subjects` set subj_name = '$subj_name' , subj_code = '$subj_code', status = '$stat' where subj_id = '$subid' ";
        $result = mysqli_query($conn, $addsql);
        if($result){
            $showAlert = true;
        }
        else{
            $showError = true;
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

    <title>Edit Semester</title>
</head>
<body>
<?php include "nav.php"; ?>
<?php
    if($showAlert){
        echo '<script>alert("Subject Updated Successfully!")</script>';
    }
    if($showError){
        echo '<script>alert("Error! Try Again.")</script>';

    }
    ?>
    <div class="glass-panel" style="width: 80%; margin: 80px auto;">
      <form method="post" >

      <h2 style="text-align:center; font-size : 30px">Edit Semester</h2>
<div style=" width : 75%; margin:60px auto; font-size : 20px">

<?php
$sql = "SELECT subjects.subj_id,subjects.subj_name, subjects.subj_code , subjects.status from subjects where subjects.subj_id = $subid";
$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);
if($num > 0){
    while($row = mysqli_fetch_assoc($result)){
        ?>
<p>
        <label for="subj_name">Subject Name  &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;  
    <input name="subj_name" value="<?php echo $row['subj_name']; ?>" />
</label>
      </p>
<p>
        <label for="subj_code">Subject Code  &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;  
    <input name="subj_code" value="<?php echo $row['subj_code']; ?>" />
</label>
      </p>
<p>
        Status  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;
<?php
$s = $row['status'];
if($s == 1){
    ?>
                <label><input type="radio" name="status" value="1" required="required" checked /> Active</label>
<label><input type="radio" name="status" value="0" required /> Block</label>
<?php
}?>
<?php
if($s == 0){
    ?>
                    <label><input type="radio" name="status" value="1" required="required" /> Active</label>
<label><input type="radio" name="status" value="0" required="required" checked /> Block</label>
<?php
}?>
</p>

<?php
    }
}
?>
</div>
       
 


 
 
       
 <div style="float:right; margin-right : 80px">
        <button type="submit" >Update</button>

</div>

  </form>

    </div>

</body>
</html>
