<?php
session_start();
$showAlert = false;
$showError = false;
include "includes/connection.php";
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: index.php");
    exit;
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "DELETE FROM subjects WHERE subj_id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        $showAlert = "Subject deleted successfully";
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
    <title>Manage Subjects</title>
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
        <h1 style="text-align:center;">Manage Subjects</h1>
        <h3 style="margin : 20px; margin-bottom:50px">* View Subjects</h3>
        <table id="tableID" class="display" >
            <thead  >
                <tr >
                    <th >#</th>
                    <th style="">Subject Name</th>
                    <th style="">Subject Code</th>
                    <th style="">Status</th>
                    <th>Action</th>
                </tr>
            </thead> 
            <tfoot>
                <tr>
                    <th >#</th>
                    <th style="">Subject Name</th>
                    <th style="">Subject Code</th>
                    <th style="">Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
<?php
$sql = "SELECT subjects.subj_id,subjects.subj_name, subjects.subj_code , subjects.status from subjects";
$result = mysqli_query($conn, $sql);
$c = 1;
$num = mysqli_num_rows($result);
if($num > 0){
    while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $c;?></td>
            <td><?php echo $row['subj_name'];?></td>
            <td><?php echo $row['subj_code'];?></td>
            <td><?php if($row['status'] == 1){
                echo "Active";
            }
            else{
                echo "Inactive";
            };?></td>
            <td>
                <a href="edit-subjects.php?subid=<?php echo $row['subj_id'];?>"><i class="fa fa-edit" title="Edit Record" style="color: #007bff; margin-right: 10px;"></i> </a>
                <a href="manage-subjects.php?delete=<?php echo $row['subj_id'];?>" onclick="return confirm('Do you really want to delete this subject?');"><i class="fa fa-trash" title="Delete Record" style="color: #dc3545;"></i> </a>
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
