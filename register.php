<?php
include('connection.php');
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$username = mysqli_real_escape_string($con, $username);
$email = mysqli_real_escape_string($con, $email);
$password = mysqli_real_escape_string($con, $password);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
    header("Location: index.php?error=duplicate");
} else {
    $sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$hashed_password')";
    if (mysqli_query($con, $sql)) {
        header("Location: index.php?success=true");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
?>
