<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Windsurf login and signup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    body {
        overflow-x: hidden;
    }

    #centered1 {
        position: absolute;
        font-size: 10vw;
        top: 30%;
        left: 30%;
        transform: translate(-50%, -50%);
    }

    #centered2 {
        position: absolute;
        font-size: 10vw;
        top: 50%;
        left: 40%;
        transform: translate(-50%, -50%);
    }

    #centered3 {
        position: absolute;
        font-size: 10vw;
        top: 70%;
        left: 30%;
        transform: translate(-50%, -50%);
    }

    #signup {
        width: 60%;
        border-radius: 30px;
    }

    #login {
        width: 60%;
        border-radius: 30px;
        border: 1px solid #1da1f2;
        color: #1da1f2;
        background-color: #fff;
    }

    #login:hover {
        width: 60%;
        border-radius: 30px;
        border: 2px solid #1da1f2;
        color: #1da1f2;
        background-color: #fff;
    }

    .well {
        background-color: #187FAB;
    }

    strong {
        font-size: 20px;
    }
</style>

<body>
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <center>
                    <h1 style="color:white;">Windsurf</h1>

                </center>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6" style="left: 0.5%">
            <img src="images/download.jpeg" alt="Image Cafe" class="img-riunded" title="Windsurf" width="650px" height="565px">

            <div id="centered1" class="centered">
                <h3 style="color: white; width:100%">
                    <span class="glyphicon glyphicon-search">&nbsp<strong> Follow Your Interests</strong>&nbsp </span>
                </h3>
            </div>
            <div id="centered2" class="centered">
                <h3 style="color: white;">
                    <span class="glyphicon glyphicon-search">&nbsp<strong> Hear what people talk about</strong>&nbsp </span>
                </h3>
            </div>
            <div id="centered3" class="centered">
                <h3 style="color: white;">
                    <span class="glyphicon glyphicon-search">&nbsp<strong> Join the conversation</strong>&nbsp </span>
                </h3>
            </div>

        </div>

        <div class="col-sm-6" style="left:8%">
            <img src="images/codingcafe.jpeg" alt="Image Cafe" class="img-riunded" title="Windsurf" width="80px" height="80px">
            <h2><strong>See whats happening in <br>the world right now </br></strong></h2>
            <h4><strong> join us today</h4>
            <form method="post" action="">
                <button id="signup" class="btn btn-info btn-lg" name="signup">Sign Up</button>
                <?php
                if (isset($_POST['signup'])) {
                    echo "<script>window.open('signup.php','_self')</script>";
                }
                ?>
                <button id="login" class="btn btn-info btn-lg" name="login">Log in</button>
                <?php
                if (isset($_POST['login'])) {
                    echo "<script>window.open('signin.php','_self')</script>";
                }
                ?>

            </form>
        </div>
    </div>
</body>

</html>