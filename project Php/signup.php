<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<style>
    body {
        overflow: hidden;
    }

    .main-content {
        width: 50%;
        height: 40%;
        margin: 10px auto;
        background-color: #fff;
        border: 2px solid #e6e6e6;
        padding: 40px 50px;
    }

    header {
        border: 0px solid #000;
        margin-bottom: 5px;

    }

    .well {
        background-color: #187FAB;
    }

    #signup {
        width: 60%;
        border-radius: 30px;
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
        <div class="col-sm-12">
            <div class="main-content">
                <div class="header">
                    <h3 style="text-align:center;"><strong>Join Windsurf</strong></h3>
                </div>
                <div class="1-part">
                    <form method="post" action="insert_user.php">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyohicon-pencil"> </i>
                            </span>
                            <input type="text" class="form-control" placeholder="First Name" name="first_name" required="required">
                        </div>
                        <br>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyohicon-pencil"> </i>
                            </span>
                            <input type="text" class="form-control" placeholder="Last Name" name="last_name" required="required">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyohicon-lock"> </i>
                            </span>
                            <input type="password" class="form-control" placeholder="Password" name="u_pass" required="required">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyohicon-user"> </i>
                            </span>
                            <input type="email" class="form-control" placeholder="Email" name="u_email" required="required">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyohicon-chevron"> </i>
                            </span>
                            <select class="form-control" name="u_country" required="required">
                                <option> Bulgaria</option>
                                <option value="2">UK</option>
                                <option value="3">USA</option>
                            </select>
                        </div>
                        <br>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyohicon-chevron"> </i>
                            </span>
                            <select class="form-control input-md" name="u_gender" required="required">
                                <option> Male</option>
                                <option>Female </option>
                                <option> Other</option>
                            </select>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyohicon-calendar"> </i>
                            </span>
                            <input type="date" class="form-control input-md" placeholder="Email" name="u_birthday" required="required">
                        </div>
                        <br>

                        <a style="text-decoration:none;float:right;color:#187FAB;" data-toggle="tooltip" title="Signin" href="signin.php">
                            Already have an account ?
                        </a>
                        <cente>
                            <button id="signup" class="btn btn-info btn-lg" name="sign_up" value="sign_u">Signup</button>
                        </cente>
                        <?php
                        include("insert_user.php");

                        ?>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
</body>

</html>