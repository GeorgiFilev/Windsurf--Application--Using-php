<?php
include_once("includes/connection.php");


if (isset($_POST['sign_up'])) {
    $first_name = htmlentities(mysqli_real_escape_string($con, $_POST['first_name']));
    $last_name = htmlentities(mysqli_real_escape_string($con, $_POST['last_name']));
    $pass = htmlentities(mysqli_real_escape_string($con, $_POST['u_pass']));
    $email = htmlentities(mysqli_real_escape_string($con, $_POST['u_email']));
    $country = htmlentities(mysqli_real_escape_string($con, $_POST['u_country']));
    $gender = htmlentities(mysqli_real_escape_string($con, $_POST['u_gender']));
    $birthday = htmlentities(mysqli_real_escape_string($con, $_POST['u_birthday']));
    $status = "verified";
    $posts = "no";

    $newgid = sprintf('%05d', '');

    $username = strtolower($first_name . "_" . $last_name . "_" . $newgid);
    $check_username_query = "select user_name from users where user_email = '$email'";
    $run_username = mysqli_query($con, $check_username_query);

    if (strlen($pass) < 9) {
        echo "<script> alert('Password should be at least 9 characters!') </script>";
        exit();
    }
    $check_email = "SELECT * from users where user_email='$email'";
    $run_email = mysqli_query($con, $check_email);
    $check = mysqli_num_rows($run_email);

    if ($check > 0) {
        echo "<script>alert('Email already exist, Please try using another email') </script>";
        echo "<script>window.open('signup.php','_self') </script>";
        exit();
    }

    // $rand = rand(1, 3); //rand number
    // if ($rand == 1) {
    //     $profile_pic = "head_red.png";
    // } else if ($rand == 2) {
    //     $profile_pic = "head_sun_flower.png";
    // } else if ($rand == 3) {
    //     $profile_pic = "head_turqoise.png";
    // }

    $user_cover = "cover/user.jpg";
    $insert = "INSERT into users (f_name,l_name,user_name,user_pass,user_email,user_country,user_gender,user_cover) 
    values ('$first_name','$last_name','$username','$pass','$email','$country','$gender','$user_cover')";

    $query = mysqli_query($con, $insert);


    if ($query) {
        echo "<script>alert('Well done $first_name, good to go') </script>";
        echo "<script>window.open('signin.php','_self') </script>";
    } else {
        echo "<script>alert('Registration failed. TRY AGAIN !') </script>";
        echo "<script>window.open('signup.php','_self') </script>";
    }
}
