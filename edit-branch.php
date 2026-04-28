<?php
session_start();
$showAlert = false;
$showError = false;
include "includes/connection.php";
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: index.php");
    exit;
}
$bid = intval($_GET['bid']);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $branch = $_POST['branch'];
        $addsql = "UPDATE `branch` set branch.branch = '$branch' where branch_id = '$bid' ";
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

    <title>Add Branch</title>
</head>
<body>
<?php include "nav.php"; ?>
<?php
    if($showAlert){
        echo '<script>alert("Branch Updated Successfully!")</script>';
    }
    if($showError){
        echo '<script>alert("Error! Try Again.")</script>';

    }
    ?>
    <div class="glass-panel" style="width: 80%; margin: 80px auto;">
      <form method="post" >

      <h2 style="text-align:center; font-size : 30px">Add Branch</h2>
<div style=" width : 75%; margin:60px auto; font-size : 20px">

<?php
$sql = "SELECT branch.branch_id , branch.branch from branch where branch.branch_id = $bid";
$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);
if($num > 0){
    while($row = mysqli_fetch_assoc($result)){
        ?>
<p>
        <label for="branch">Branch  &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;  
    <input type="text" name="branch" required value="<?php echo $row['branch']; ?>" />
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

