<?php
session_start();
include('includes/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result - Student Management System</title>
    <link rel="stylesheet" type="text/css" href="css/fp1.css?version=52">
    <link rel="stylesheet" href="css/nav.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Print-specific Styles */
        @media print {
            body {
                background: white !important;
                color: black !important;
                margin: 0 !important;
                padding: 0 !important;
            }
            .navbar, .last, .no-print-row, button {
                display: none !important;
            }
            .m1 {
                background: white !important;
                color: black !important;
                width: 100% !important;
                margin: 0 !important;
                padding: 20px !important;
                box-shadow: none !important;
                border: none !important;
                backdrop-filter: none !important;
                -webkit-backdrop-filter: none !important;
            }
            .m1 p, .m1 b, .m1 th, .m1 td {
                color: black !important;
                text-shadow: none !important;
            }
            table {
                width: 100% !important;
                border: 1px solid #000 !important;
                border-collapse: collapse !important;
                background: white !important;
            }
            th, td {
                border: 1px solid #000 !important;
                padding: 10px !important;
                background: white !important;
                color: black !important;
            }
            th {
                background: #f2f2f2 !important;
            }
            @page {
                size: A4;
                margin: 15mm;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar" style="justify-content: center; display: flex;">
      <h1 style="margin:0; font-size: 32px; color: white;">Result Management System</h1>
    </nav>
    <div class="m1" id="d1">
<?php
$stid = $_POST['stid'];
$branch_id = $_POST['branch_id'];
$sem_id = $_POST['sem_id'];
$sql = "SELECT student.Name, student.Roll_No, student.Reg_date, student.reg_id, branch.branch, semester.semester FROM student join branch on student.branch_id = branch.branch_id join semester on student.sem_id = semester.sem_id where student.Roll_No = $stid and student.branch_id = $branch_id and student.sem_id = $sem_id";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if($num > 0){
    while($row = mysqli_fetch_assoc($result))
    {
?>
    <p><b>Student Name : </b><?php echo $row['Name'];?></p>
    <p><b>Student Roll No. : </b><?php echo $row['Roll_No'];?></p>
    <p><b>Student Branch : </b><?php echo $row['branch'];?></p>
    <p><b>Semester : </b><?php echo $row['semester'];?></p>
    
<?php

    }
    ?>
    <table>
        <thead>
            <tr>
                <th style="width : 8%; ">#</th>
                <th style="width : 60%; ">Subject</th>
                <th >Marks</th>
            </tr>
        </thead>
        <tbody>
<?php

 $sql = "SELECT student.Name, student.Roll_No, student.branch_id, student.sem_id, results.marks, results.subj_id, subjects.subj_name from results join student on student.Roll_No = results.roll_no join subjects on subjects.subj_id = results.subj_id where student.Roll_No = $stid and student.branch_id = $branch_id and student.sem_id = $sem_id and student.status=1 and subjects.status =1";
 $result = mysqli_query($conn, $sql);
$num1 = mysqli_num_rows($result);
$cnt = 1;
$totalc = 0;
if($num1 > 0)
{
    while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td scope="row" ><?php echo $cnt ;?></td>
            <td ><?php echo $row['subj_name'];?></td>
            <td ><?php echo $total = $row['marks'];?></td>
        </tr>
        <?php
        $totalc += $total;
        $cnt++;
    }
    ?>
    <tr>
        <th scope="row" colspan="2" >Total Marks : </th>
        <td ><b><?php echo $totalc; ?></b>  out of  <b><?php echo ($outof = ($cnt - 1)*100);?></b></td>
    </tr>
    <tr>
        <th scope="row" colspan="2" >Percentage : </th>
        <td ><b><?php echo number_format(($totalc*(100)/$outof), 2);?>%</b></td>
    </tr>
    <tr class="no-print-row">
    <th scope="row" colspan="2" >Download Result : </th>
        <td ><button style="background-color:white; font-size:18px; cursor:pointer; color: black; border: 1px solid #ccc; padding: 8px 20px; border-radius: 5px; font-weight: bold;" onclick="downloadPDF()">Download PDF</button></td>
    </tr>
    <?php 
} else{?>
<div class="rnd">
                                            <strong>Notice!</strong> Your result is not declared yet
 <?php }
?>
                                        </div>
<?php
}else
{
    ?>
    <div class="inr">
<strong>Oh snap!</strong>
<?php
echo htmlentities("Invalid Roll Id");
}
?>
</div>
        </tbody>
    </table>

    </div>
    <div class="last">
        <a href="index.php">Back to Home</a>
    </div>

    <script>
        function downloadPDF() {
            // Using the browser's native print functionality is more reliable for 
            // maintaining layout, fonts, and preventing clipping issues.
            // The @media print CSS above handles the styling for the PDF.
            window.print();
        }
    </script>
</body>
</html>
