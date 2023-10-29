<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$dbservername = "127.0.0.1";
$dbusername = "root";
$dbpassword = "";
$dbname = "social_network";
$con = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
session_start();
function insertPost()
{
    if (isset($_POST['sub'])) {
        global $con;
        global $user_id;

        $content = htmlentities($_POST['content']);
        $upload_image = $_FILES['upload_image']['name'];
        $image_tmp = $_FILES['upload_image']['tmp_name'];
        $random_number = rand(1, 100);


        if (strlen($content) > 250) {
            echo "<script> alert('Please Use 250 or less than 250 words!') </script>";
            echo "<script>window.open('home.php','_self')</script>";
        } else {
            if (strlen($upload_image) >= 1 && strlen($content) >= 1) {
                $a = move_uploaded_file($image_tmp, "imagepost/$upload_image.$random_number");

                $insert = "INSERT into posts (user_id,post_content, upload_image,post_date) 
                    values ('$user_id','$content', '$upload_image.$random_number', NOW())";

                var_dump($a);
                $run = mysqli_query($con, $insert);
                if ($run) {
                    echo "
                        <script> alert('Your Post Updated a moment ago') </script>";
                    echo "<script>window.open('home.php','self')</script>";
                }

                exit();
            } else {

                if ($upload_image == '' && $content == '') {
                    echo "<script> alert('Error Occured while uploading!') </script>";
                    echo "<script> window.open('home.php','_self')</script>";
                } else {
                    if ($content == '') {
                        move_uploaded_file($image_tmp, "imagepost/$upload_image.$random_number");
                        $insert = "INSERT into posts (user_id,post_content, upload_image,post_date) values ('$user_id','', '$upload_image.$random_number', NOW())";
                        $run = mysqli_query($con, $insert);
                        if ($run) {
                            echo "
                                <script> alert('Your Post Updated a moment ago') </script>";
                            echo "<script>window.open('home.php','self')</script>";
                        }
                        exit();
                    } else {
                        $insert = "INSERT into posts (user_id,post_content,post_date) values ('$user_id','$content', NOW())";
                        $run = mysqli_query($con, $insert);
                        if ($run) {
                            echo "
                                <script> alert('Your Post Updated a moment ago') </script>";
                            echo "<script>window.open('home.php','self')</script>";
                        }
                        exit();
                    }
                }
            }
        }
    }
}


function get_posts()
{
    global $con;
    $per_page = 4;
    if (isset($GET['page'])) {
        $page = $GET['page'];
    } else {
        $page = 1;
    }

    $start_from = ($page - 1) * $per_page;

    $get_posts = "SELECT * from posts ORDER BY 1 DESC LIMIT $start_from, $per_page";

    $run_posts = mysqli_query($con, $get_posts);
    while ($row_posts = mysqli_fetch_array($run_posts)) {
        $post_id = $row_posts['post_id'];
        $user_id = $row_posts['user_id'];
        $content = substr($row_posts['post_content'], 0, 40);
        $upload_image = $row_posts['upload_image'];
        $post_date = $row_posts['post_date'];

        $user = "SELECT * from users where user_id = '$user_id' ";
        $run_user = mysqli_query($con, $user);
        $row_user = mysqli_fetch_array($run_user);
        $user_name = $row_user['user_name'];
        $user_image = $row_user['user_cover'];
        echo "<h1>$upload_image</h1>";

        if ($content == "" && strlen($upload_image) >= 1) {
            echo "
                <div class='row'>
                    <div class='col-sm-3'>
                    </div>
                    <div id='posts' class='col-sm-6'>
                        <div class='row'>
                            <div class ='col-sm-2'>
                            <p><img src='$user_image' class ='img-circle' width='100px' height='100px'></p>
                            </div>
                            <div class='col-sm-6'>
                                <h3><a 
                                style='text-decoration:none; cursor: pointer; color: #3897a0;'
                                href='user_profile.php?u_id=$user_id'>$user_name</a></h3>

                                <h4> <small style='color:black;'>Updated a post on <strong>$post_date</strong> </small></h4>
                            </div>
                            <div class='col-sm-4'>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <img id='posts-img' src='imagepost/$upload_image' style='height:350px;'/>
                            </div>
                        </div><br>
                        <a href='single.php?post_id=$post_id' style='float:right;'>
                        <button class='btn btn-info'> Comment</button></a><br>
                    </div>
                    <div class='col-sm-3'>

                    </div>
                </div><br><br>
            ";
        } else if (strlen($content) >= 1 && strlen($upload_image) >= 1) {
            echo "
            <div class='row'>
                <div class='col-sm-3'>
                </div>
                <div id='posts' class='col-sm-6'>
                    <div class='row'>
                        <div class ='col-sm-2'>
                        <p><img src='$user_image' class ='img-circle' width='100px' height='100px'></p>
                        </div>
                        <div class='col-sm-6'>
                            <h3><a 
                            style='text-decoration:none; cursor: pointer; color: #3897a0;'
                            href='user_profile.php?u_id=$user_id'>$user_name</a></h3>

                            <h4> <small style='color:black;'>Updated a post on <strong>$post_date</strong> </small></h4>
                        </div>
                        <div class='col-sm-4'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <p> $content </p>
                            <img id ='posts-img' src='imagepost/$upload_image' style='height:350px;'/>
                        </div>
                    </div><br>
                    <a href='single.php?post_id=$post_id' style='float:right;'>
                    <button class='btn btn-info'> Comment</button></a><br>
                </div>
                <div class='col-sm-3'>

                </div>
            </div><br><br>
        ";
        } else {
            echo "
            <div class='row'>
                <div class='col-sm-3'>
                </div>
                <div id='posts' class='col-sm-6'>
                    <div class='row'>
                        <div class ='col-sm-2'>
                        <p><img src='$user_image' class ='img-circle' width='100px' height='100px'></p>
                        </div>
                        <div class='col-sm-6'>
                            <h3><a 
                            style='text-decoration:none; cursor: pointer; color: #3897a0;'
                            href='user_profile.php?u_id=$user_id'>$user_name</a></h3>

                            <h4> <small style='color:black;'>Updated a post on <strong>$post_date</strong> </small></h4>
                        </div>
                        <div class='col-sm-4'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-12'>
                          <h3>  <p> $content </p>  </h3>
                         
                        </div>
                    </div><br>
                    <a href='single.php?post_id=$post_id' style='float:right;'>
                    <button class='btn btn-info'> Comment</button></a><br>
                </div>
                <div class='col-sm-3'>

                </div>
            </div><br><br>
        ";
        }
    }
    include("pagination.php");
}
