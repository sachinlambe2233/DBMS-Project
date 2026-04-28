<?php
session_start();
$showAlert = false;
$showError = false;
include "includes/connection.php";
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: index.php");
    exit;
}

if(isset($_GET['delete_roll']) && isset($_GET['delete_bid']) && isset($_GET['delete_sid'])){
    $roll = $_GET['delete_roll'];
    $bid = $_GET['delete_bid'];
    $sid = $_GET['delete_sid'];
    $sql = "DELETE FROM results WHERE roll_no = $roll AND branch_id = $bid AND sem_id = $sid";
    $result = mysqli_query($conn, $sql);
    if($result){
        $showAlert = "Result deleted successfully";
    }
    else{
        $showError = "Something went wrong. Please try again";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Results</title>
    <link rel="stylesheet" type="text/css" href="css/fp1.css?version=52">
    <!-- <link rel="stylesheet" href="css/fp1.css?parameter=1" type="text/css" /> -->
     
    	<!-- Datatable plugin CSS file -->
	<link rel="stylesheet" href=
"https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />

	<!-- jQuery library file -->
	<script type="text/javascript"
	src="https://code.jquery.com/jquery-3.5.1.js">
	</script>

	<!-- Datatable plugin JS library file -->
	<script type="text/javascript" src=
"https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
	</script>


</head>
<body>
    <?php include "nav.php";?>
    <?php
    if($showAlert){
        echo '<div class="alert success-alert" style="background-color: #d4edda; color: #155724; padding: 15px; margin: 20px; border-radius: 5px; border: 1px solid #c3e6cb;">
                <strong>Success!</strong> '.$showAlert.'
              </div>';
    }
    if($showError){
        echo '<div class="alert error-alert" style="background-color: #f8d7da; color: #721c24; padding: 15px; margin: 20px; border-radius: 5px; border: 1px solid #f5c6cb;">
                <strong>Error!</strong> '.$showError.'
              </div>';
    }
    ?>
    <div class="m2">
        <h1 style="text-align:center;">Manage Results</h1>
        <h3 style="margin : 20px; margin-bottom:50px">* View Students Result</h3>
        <table id="tableID" class="display">
            <thead  >
                <tr >
                    <th >#</th>
                    <th>Student Name</th>
                    <th>Roll No.</th>
                    <th>Branch</th>
                    <th>Semester</th>
                    <th>Reg Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead> 
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Roll No.</th>
                    <th>Branch</th>
                    <th>Semester</th>
                    <th>Reg Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
<?php
$sql = "SELECT distinct student.Name, student.Roll_No, student.Reg_date, student.status, student.reg_id, branch.branch, semester.semester, branch.branch_id, semester.sem_id from results join student on results.roll_no = student.Roll_No join branch on branch.branch_id = results.branch_id join semester on semester.sem_id = results.sem_id ";
$result = mysqli_query($conn, $sql);
$c = 1;
$num = mysqli_num_rows($result);
if($num > 0){
    while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $c;?></td>
            <td><?php echo $row['Name'];?></td>
            <td><?php echo $row['Roll_No'];?></td>
            <td><?php echo $row['branch'];?></td>
            <td><?php echo $row['semester'];?></td>
            <td><?php echo $row['Reg_date'];?></td>
            <td><?php if($row['status'] == 1){
                echo "Active";
            }
            else{
                echo "Blocked";
            };?></td>
            <td>
                <a href="edit-result.php?stid=<?php echo $row['reg_id'];?>"><i class="fa fa-edit" title="Edit Record" style="color: #007bff; margin-right: 10px;"></i> </a>
                <a href="manage-results.php?delete_roll=<?php echo $row['Roll_No'];?>&delete_bid=<?php echo $row['branch_id'];?>&delete_sid=<?php echo $row['sem_id'];?>" onclick="return confirm('Do you really want to delete this result?');"><i class="fa fa-trash" title="Delete Record" style="color: #dc3545;"></i> </a>
            </td>
        </tr>
        <?php
        $c++;
    }
}
?>
            </tbody>
        </table>
        <script>

		/* Initialization of datatable */
		$(document).ready(function() {
			$('#tableID').DataTable({ });
		});
	</script>
    </div>
</body>
</html>
