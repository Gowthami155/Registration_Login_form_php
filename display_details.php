<?php
include('connection.php');
session_start(); 
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $sql="SELECT u.username, u.email, ud.address, ud.role, ud.salary, ud.phone 
            FROM users u INNER JOIN user_details ud ON u.user_id = ud.u_id
            WHERE u.user_id = $user_id";
    $result=mysqli_query($con, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <style>
        .user-details{
            text-align: center;
        } 
        h4{
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result); 
        if ($row){
            echo "<div class='user-details'>";
            echo "<h1>User Details</h1>";
            echo "<p><strong>Username:</strong> ".$row['username'] . "</p>";
            echo "<p><strong>E-Mail:</strong> ".$row['email'] . "</p>";
            echo "<p><strong>Address:</strong> ".$row['address'] . "</p>";
            echo "<p><strong>Role:</strong> ".$row['role'] . "</p>";
            echo "<p><strong>Salary:</strong> ".$row['salary'] . "</p>";
            echo "<p><strong>Phone:</strong> ".$row['phone'] . "</p>";
            echo "</div>";
        } 
        else{
            echo "<p>No more user details found</p>";
        }
    } 
    else{
        echo "<p>No user details found</p>";
    }
?>
     <div>
        <a href="signin.html"><h4>Click here to logout</h4></a>
     </div>
</body>
</html>
