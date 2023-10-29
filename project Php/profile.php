<?php
session_start();
include("includes/header.php");
// echo "<h3> PHP List All Session Variables</h3>";
// $user = $_SESSION['user_email'];
// echo $user;
// foreach ($_SESSION as $key => $val)
//     echo $key . " " . $val . "<br/>";
if (!isset($_SESSION['user_email'])) {
    header("location: index.php");
}

?>
<!DOCTYPE html>

<head>
    <?php
    $user = $_SESSION['user_email'];
    $get_user = " SELECT * FROM users where user_email='$user'";
    $run_user = mysqli_query($con, $get_user);
    $row = mysqli_fetch_array($run_user);

    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    ?>
    <title><?php echo $user_name;  ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style//home_style2.css">
</head>

<style>
    #cover-img {
        height: 400px;
        width: 100%;
    }
</style>

<body>
    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
            <?php
            echo "
                    <div> 
                        <div>
                            <img  class='img' src='images/download.jpeg' 
                             alt='cover'></img>
                            <form action='profile.php?u_id=$user_id' method='post' enctype='multipart/form-data'>

                            <ul class='nav pull-left' style='position:absolute; top:10px;left:40px;'>
                                <li class='dropdown'>
                                    <button class='dropdown-toggle btn-default' data-toggle='dropdown'> Change cover </button>

                                    <div class='dropdown-menu'>
                                        <center>
                                            <p>Click <strong> Update Cover </strong></p>
                                            <label class='btn btn-info'>Select Cover Image 
                                            <input type='file' name='u_cover' size='60' />
                                            </label><br>
                                            <button name='submit' class='btn btn-info'>Update cover </button>

                                        </center>
                                    </div>
                                </li>
                            </ul>

                            </form>
                        </div>

                          
                    </div>

                
                
                ";
            ?>
            <div class="col-sm-2">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-2" style="background-color: #e6e6e6; text-align:center; left:0.9;">
            <?php
            echo "
                        <center><h2><strong>About</strong></h2></center><br>
                        <center><h2><strong>$first_name $last_name</strong></h2></center><br>
                        <p> User's nationality<strong> $user_country </strong></p><br>
                        <p> Gender<strong> $user_gender </strong></p><br>

                ";
            ?>
        </div>
        <div class="col-sm-6">
            <?php
            global $con;
            if (isset($_Get['u_id'])) {
                $u_id = $_GET['u_id'];
            }
            $get_posts = "SELECT * from posts where user_id='$user_id' ORDER BY 1 DESC LIMIT 5";
            $run_posts = mysqli_query($con, $get_posts);

            while ($row_posts = mysqli_fetch_array($run_posts)) {
                $post_id = $row_posts['post_id'];
                $user_id = $row_posts['user_id'];
                $content = $row_posts['post_content'];
                $upload_image = $row_posts['upload_image'];
                $post_date = $row_posts['post_date'];

                $user = "SELECT * from users where user_id='$user_id'";
                $run_user = mysqli_query($con, $user);

                $row_user = mysqli_fetch_array($run_user);
                $user_name = $row_user['user_name'];
                $user_image = $row_user['user_cover'];

                //display the post

                if (!$content  && strlen($upload_image) >= 1) {

                    echo "
                    <div id='own_posts'>
                        <div class='row'>
                            <div class='col-sm-2'>
                                <p><img src='$user_image' class ='img-circle' width='100px' height='100px'></p>
                            </div>
                            <div class='col-sm-6'>
                                <h3><a 
                                style='text-decoration:none; cursor: pointer; color: #3897a0;'
                                href='user_profile.php?u_id=$user_id'>$user_name</a></h3>

                                <h4> <small style='color:black;'>Updated a post on <strong>$post_date</strong>
                                    </small>
                                </h4>
                            </div>
                            <div class='col-sm-4'>
                            </div>
                       
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <p> $content </p>
                                    <img id ='posts-img' src='imagepost?$upload_image' style='height:350px;'/>
                                </div>
                            </div>
                            <br>
                            <a href='single.php?post_id=$post_id' style='float:right;'>
                            <button class='btn btn-info'> Comment</button></a><br>

                            <a href='functions/delete_post.php?post_id=$post_id' style='float: right;'>
                            <button class='btn btn-danger'> DELETE</button></a><br>
                            </div>
                        </div> 
                    <br> <br>

                    ";
                } else if (strlen($content) >= 1  && strlen($upload_image) >= 1) {

                    echo "
                    <div id='own_posts'>
                        <div class='row'>
                            <div class='col-sm-2'>
                                <p><img src='$user_image' class ='img-circle' width='100px' height='100px'></p>
                            </div>
                            <div class='col-sm-6'>
                                <h3><a 
                                style='text-decoration:none; cursor: pointer; color: #3897a0;'
                                href='user_profile.php?u_id=$user_id'>$user_name</a></h3>

                                <h4> <small style='color:black;'>Updated a post on <strong>$post_date</strong>
                                </small></h4>
                            </div>
                            <div class='col-sm-4'>
                            </div>
                    
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <img id='posts-img' src='imagepost/$upload_image' style='height:350px;'/>
                                </div>
                        
                                <br>
                                <a href='single.php?post_id=$post_id' style='float:right;'>
                                <button class='btn btn-info'> Comment</button></a><br>

                                <a href='functions/delete_post.php?post_id=$post_id' style='float: right;'>
                                <button class='btn btn-danger'> DELETE</button></a><br>
                            </div>
                        </div>
                    </div> <br> <br>

                    ";
                }
            }

            ?>
        </div>
    </div>

</body>

</html>