<?php
require_once ('connection.php');

session_start();

require ('time_out.php');


@$_SESSION['email'] = $_POST['email'];


if(isset($_POST['submit'])){



    $email = $_POST['email'];



    $query = "SELECT * FROM users WHERE email = '{$email}'";
    $query_run = mysqli_query($conn, $query);
    $recordset = mysqli_fetch_assoc($query_run);




}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php require ('title.php');?></title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/animate.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">


    <script src="js/jquery.min.js"></script>


    <style>
        body {
            background-image: url("img/jamb-exam1.jpg");
            background-repeat: no-repeat;

        }
    </style>
</head>

<body>
<div class="container">
    <div class="top">
        <h1 id="title" class="hidden"><span id="logo">CBT | UCH/span><span> Unit</span></h1>
    </div>
    <div class="login-box animated fadeInUp">
        <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
            <div class="box-header">
                <h2>Enter Your Email</h2>
            </div>
            <div style="padding-top: 10px">

                <label for="username"> <p><?php if(@$recordset['password']){echo "Your password is :" . @$recordset['password'];}?></p></label>
                <br/>

                <br/>

                <br/>
                <input type="email"  id="email" name="email" placeholder="Email" required>
                <br/>
                <button type="submit" class="btn btn-danger" name="submit"  style="border-radius: 15px">Search</button>
                <br/>
                <br />
               <h2> <a href="index.php"><p class="small" style="color: forestgreen">Login in</p></a></h2>

            </div>
    </div>
    </form>
</div>
</body>

<script>
    $(document).ready(function () {
        $('#logo').addClass('animated fadeInDown');
        $("input:text:visible:first").focus();
    });
    $('#username').focus(function() {
        $('label[for="username"]').addClass('selected');
    });
    $('#username').blur(function() {
        $('label[for="username"]').removeClass('selected');
    });
    $('#password').focus(function() {
        $('label[for="password"]').addClass('selected');
    });
    $('#password').blur(function() {
        $('label[for="password"]').removeClass('selected');
    });
</script>

</html>