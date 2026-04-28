<?php
session_start();
$showAlert = false;
$showError = false;
include "includes/connection.php";
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: index.php");
    exit;
}
$semid = intval($_GET['semid']);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $semester = $_POST['semester'];
        $addsql = "UPDATE `semester` set semester.semester = '$semester' where sem_id = '$semid' ";
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

    <title>Update Semester</title>
</head>
<body>
<?php include "nav.php"; ?>
<?php
    if($showAlert){
        echo '<script>alert("Semester Updated Successfully!")</script>';
    }
    if($showError){
        echo '<script>alert("Error! Try Again.")</script>';

    }
    ?>
    <div class="glass-panel" style="width: 80%; margin: 80px auto;">
      <form method="post" >

      <h2 style="text-align:center; font-size : 30px">Update Semester</h2>
<div style=" width : 75%; margin:60px auto; font-size : 20px">

<?php
$sql = "SELECT sem_id , semester from semester where semester.sem_id = $semid";
$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);
if($num > 0){
    while($row = mysqli_fetch_assoc($result)){
        ?>
<p>
        <label for="semester">Semester  &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;  
    <input type="number" name="semester" required value="<?php echo $row['semester']; ?>" />
</label>
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

