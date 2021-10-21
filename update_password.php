<?php
require_once ('connection.php');

session_start();

require ('time_out.php');

@$_SESSION['user'];


spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();


if(isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['old_password'];
    $password1 = $_POST['new_password'];

    $email1 = @$_SESSION['email'];

    $query = "SELECT * FROM users WHERE email = '{$email1}'";
    $query_run = mysqli_query($conn, $query);
    $recordset = mysqli_fetch_assoc($query_run);

    if($_POST['old_password'] != $_POST['new_password']){

        echo '<script type="text/javascript"> alert("Passwords don\'t match") </script>';
    }


    else if($recordset['email'] !=  $email) {

        echo '<script type="text/javascript"> alert("This record doesn\'t exist") </script>';
    }


    else {

         $query_1 = "UPDATE users SET  password = '{$password}' WHERE  email = '{$email1}'";

        $db->update($query_1);


    }

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
</head>

<body>
<div class="container">
    <div class="top">
        <h1 id="title" class="hidden"><span id="logo">Blood Transfusion</span><span> Unit</span></h1>
    </div>
    <div class="login-box animated fadeInUp">
        <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
            <div class="box-header">
                <h2>Update Password</h2>
            </div>
            <div style="padding-top: 10px">

                <label for="email">Email</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                <input type="email" id="email"name="email" placeholder="Your email" required >
                <br/>
                <label for="password">Password</label>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                <input type="password"  id="old_password" name="old_password"placeholder="Enter your old password" required>
                <br/>
                <br/>
                <label for="password">Retype Password</label>
                <input type="password"  id="new_password" name="new_password" placeholder="Enter your new password" required>
                <br/>
                <button type="submit" class="btn btn-danger" name="submit"  style="border-radius: 15px">Submit</button>
                <br/>
                <h2> <a href="index.php"><p class="small" style="color: #bf1208">Login in</p></a></h2>
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