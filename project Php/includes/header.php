<?php

include_once "connection.php";
include("functions/functions.php");
// include "../signin.php";
// echo "<h3> PHP List All Session Variables</h3>";
// $user = $_SESSION['user_email'];
// echo $user;
// foreach ($_SESSION as $key => $val)
//     echo $key . " " . $val . "<br/>";

?>

<div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" aria-expanded="false">

                    <span class="sr-only"> Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="home.php" class="navbar-brand">Windsurf</a>

            </div>
            <div class="colapse navbar-collapse" id="#bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php

                    $get_user = "SELECT * FROM users where user_email='georgi.filev00@gmail.com'";
                    $run_user = mysqli_query($con, $get_user);
                    $row = mysqli_fetch_array($run_user);

                    $user_id = $row['user_id'];
                    $user_name = $row['user_name'];
                    $first_name = $row['f_name'];
                    $last_name = $row['l_name'];
                    $user_email = $row['user_email'];
                    $user_country = $row['user_country'];
                    $user_gender = $row['user_gender'];

                    $user_posts = "SELECT * from posts where user_id ='$user_id'";
                    $run_posts = mysqli_query($con, $user_posts);
                    $posts = mysqli_num_rows($run_posts);

                    ?>
                    <li> <a href='profile.php? <?php echo "u_id=$user_id" ?> '>
                            <?php echo "$first_name"; ?>
                        </a>
                    </li>

                    <li> <a href="home.php"> Home</a>
                    <li> <a href="home.php"> Find People</a>
                    <li> <a href="messages.php?u_id=new"> Messages</a>

                        <?php
                        echo "
                            <li class='dropdown'> 
                                <a href='' class='dropdown-toggle' data-toggle='dropdown'
                                role='button' area-haspopup='true' area-expanded='false'>
                                <span> <i class='glyphicon glyphicon-chevron-down'>  </i></span> </a>
                                <ul class='dropdown-menu'>
                                        <li>
                                            <a href='my_post.php?u_id=$user_id'> My Posts 
                                            
                                            <span class ='badge badge-secondary'>

                                            $posts</span></a>
                                        </li>
                                        <li>
                                            <a href='edit_profile.php?u_id=$user_id'> Edit Account</a>
                                        </li>

                                        <li role='separator' class='divider'>

                                        </li>
                                        <li>
                                            <a href='logout.php'> Logout </a>
                                        </li>
                                </ul>
                            </li>
                        "
                        ?>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <form class="navbar-form navbar-left" action="results.php" method="get">
                            <div class="form-group">
                                <input type="text" name="user_query" placeholder="Search">

                            </div>
                            <button type="submit" class="btn btn-info" name="search">
                                Search
                            </button>
                        </form>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>