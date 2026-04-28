<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'includes/connection.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
     
    // $sql = "Select * from users where username='$username' AND password='$password'";
    $sql = "Select * from admin where username='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['password'])){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: dashboard.php");
            } 
            else{
                $showError = "Invalid Credentials";
            }
        }
        
    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="shortcut icon" href="sample/favicon.png" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <nav class="navbar">
      <h1>Nutan Maharashtra Institute of Engineering and Technology, Pune</h1>
    </nav>

    <div class="main-container">
        <!-- Student Section -->
        <div id="f2" class="card-wrapper">
            <div id="f22" class="glass-card">
                <div class="card-header">
                    <h2>For Students</h2>
                </div>
                <div class="card-body student-body">
                    <label for="click">Search your result:</label>
                    <a href="find-result.php" class="btn-primary">Click here</a>
                </div>
            </div>
        </div>

        <!-- Admin Section -->
        <div id="f1" class="card-wrapper">
            <div id="f11" class="glass-card">
                <form action="" method="post">
                    <div class="card-header">
                        <h2>Admin Login</h2>
                    </div>
                    
                    <?php if(isset($showError) && $showError){ echo '<div class="error-msg">'.$showError.'</div>'; } ?>

                    <div class="card-body form-body">
                        <div class="input-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" required placeholder="Enter admin username">
                        </div>
                        <div class="input-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" required placeholder="Enter password">
                        </div>
                        <div class="submit-group">
                            <button type="submit" class="btn-primary login-btn">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
