<?php
session_start();
include("includes/connection.php");
if (isset($_POST['login'])) {

    $email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
    $pass = htmlentities(mysqli_real_escape_string($con, $_POST['pass']));

    $select_user = "SELECT * FROM users where user_email='$email' AND user_pass='$pass' ";

    $query = mysqli_query($con, $select_user);
    $check_user = mysqli_num_rows($query);
    if ($check_user > 0) {
        $_SESSION['user_email'] = $email;
        echo "<script>window.open('home.php','_self') </script>";
    } else {
        echo "<script> alert('your email or password is incorrect')</script>";
    }
}
