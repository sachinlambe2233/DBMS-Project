
    <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="css/nav.css?v=5"> 

</head>
<body>

<div class="top-nav">

  <a href="dashboard.php" class="nav-item">Dashboard</a>

  <div class="dropdown nav-item">
    <button class="dropbtn">Students
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="add-student.php" style="font-size : 18px">Add Students</a>
      <a href="manage-students.php" style="font-size : 18px">Manage Students</a>
    </div>
  </div> 

  <div class="dropdown nav-item">
    <button class="dropbtn">Branch 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="add-branch.php" style="font-size : 18px">Add branch</a>
      <a href="manage-branch.php" style="font-size : 18px">Manage branch</a>
    </div>
  </div> 

  <div class="dropdown nav-item">
    <button class="dropbtn">Semester
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="add-semester.php" style="font-size : 18px">Add semester</a>
      <a href="manage-sem.php" style="font-size : 18px">Manage semester</a>
    </div>
  </div> 

  <div class="dropdown nav-item">
    <button class="dropbtn">Subjects
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="add-subjects.php" style="font-size : 18px">Add Subjects</a>
      <a href="manage-subjects.php" style="font-size : 18px">Manage Subjects</a>
      <a href="add-subjcombo.php" style="font-size : 18px">Add Subject Combination</a>
      <a href="manage-subjcomb.php" style="font-size : 18px">Manage Subject Combination</a>
    </div>
  </div> 

  <div class="dropdown nav-item">
    <button class="dropbtn">Result 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="add-results.php" style="font-size : 18px">Add result</a>
      <a href="manage-results.php" style="font-size : 18px">Manage results</a>
    </div>
  </div> 

  <a href="change-password.php" class="nav-item">Change Password</a>
  <a href="logout.php" class="nav-item"><i class="fa fa-sign-out"></i> Logout </a>

</div>

</body>
</html>
