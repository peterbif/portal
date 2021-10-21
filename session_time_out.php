<?php
require_once ('connection.php');

session_start();

require ('time_out.php');



@$_SESSION['user'] = $_POST['email'];


if(isset($_POST['login'])){

    $email = $_POST['email'];

    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '{$email}'";
    $query_run = mysqli_query($conn, $query);
    $recordset = mysqli_fetch_assoc($query_run);


    if($recordset['email'] != $email){

        echo '<script type="text/javascript"> alert("Email is incorrect") </script>';
    }


    else if($recordset['password'] != $password){


        echo '<script type="text/javascript"> alert("Password is incorrect") </script>';

    }


    else {


        if($recordset['password'] == $password && $recordset['role'] == 1) {

            header('location: super_admin.php');



        } else if ($recordset['password'] == $password && $recordset['role'] == 2) {

            header('location: admin.php');

        }



        else if ($recordset['password'] == $password && $recordset['role'] == 3) {

            header('location: biodata.php');

        }

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

    <link rel="stylesheet" href="css/font-awesome.css">

    <link rel="stylesheet" href="css/style2.css">


    <script src="js/jquery.min.js"></script>
    <script src="js/myOpenForm.js"></script>
    <style>
        body {
            background-image: url("img/conference-room-digital-nomad-discussing-1181408.jpg");
            background-repeat: no-repeat;

        }
    </style>
</head>

<body ><!-- background="img/jamb.jpg"-->
<div class="container-fluid" >

    <!--Pin form-->
    <div class="row" align="center" style="margin-top: 30px;">
        <div class="col-lg-6 col-sm-offset-3">
            <div class="top">
                <div class="form-popup" id="myForm1">
                    <h1 style="background-color: #FFFFFF; color: forestgreen; text-align: center">Generate Pin</h1>
                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">

                        <div class="input-container">
                            <i class="fa fa-sort-numeric-asc icon"></i>
                            <select class="input-field" required>
                                <option value="">Select Position to apply for</option>
                                <option value=""></option>

                            </select>
                        </div>

                        <div class="input-container">
                            <i class="fa fa-text-width icon"></i>
                            <input class="input-field" type="text"   placeholder="Email" required name="email">
                        </div>

                        <div class="input-container">
                            <i class="fa fa-phone icon"></i>
                            <input class="input-field" type="text" placeholder="Phone NO"  required name="psw">
                        </div>

                        <button type="submit" name="generate" class="button">Generate Code</button> &nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" class="button" onclick="closeForm1()">Close</button>
                    </form>
                </div>
            </div>
        </div>


    </div>

    <!--login form-->
    <!-- <div class="row" align="center" style="margin-top: 30px;">
        <div class="col-lg-6 col-sm-offset-3">
            <div class="top">
                <div class="form-popup" id="myForm2">
                    <h1 style="background-color: #FFFFFF; color: forestgreen; text-align: center">Applicant Login</h1>
                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                        <div class="input-container">
                            <i class="fa fa-text-width icon"></i>
                            <input class="input-field" type="text"   placeholder="Email" required name="email">
                        </div>

                        <div class="input-container">
                            <i class="fa fa-key icon"></i>
                            <input class="input-field" type="text" placeholder="Password"  required name="psw">
                        </div>

                        <button type="submit" class="button">Login</button> &nbsp;&nbsp;
                        <button type="submit" class="button" onclick="closeForm2()">Close</button>
                    </form>
                </div>
            </div>
        </div>


    </div>-->

    <!--Login form-->

    <div class="row" align="center" style="margin-top: 30px;">
        <div class="col-lg-6 col-sm-offset-3">
            <div class="top">
                <div class="form-popup" id="myForm3">
                    <h1 style="background-color: #FFFFFF; color: forestgreen; text-align: center">Login</h1>
                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                        <div class="input-container">
                            <i class="fa fa-text-width icon"></i>
                            <input class="input-field" type="text"   placeholder="Email" required name="email">
                        </div>

                        <div class="input-container">
                            <i class="fa fa-key icon"></i>
                            <input class="input-field" type="text"  placeholder="Password"  required name="password">
                        </div>

                        <button type="submit" name="login" class="button">Login</button> &nbsp;&nbsp;
                        <button type="submit" class="button" onclick="closeForm3()">Close</button>
                    </form>
                </div>
            </div>
        </div>


    </div>


    <br /><br/><br/><br /><br/><br/><br />

    <div class="row" align="center" style="margin-top: 15px;">
        <div class="col-lg-12">
            <button class="button" onclick="openForm()"><span class="login-button">Generate Pin</span></button> &nbsp;&nbsp;&nbsp;&nbsp; <!--<button class="button" onclick="openForm2()">Login</button>-->&nbsp;&nbsp;&nbsp;&nbsp;  <button class="button" onclick="openForm3()"><span class="login-button">Login</span></button>
        </div>
    </div>

</div>




<script>
    function openForm() {
        document.getElementById("myForm1").style.display = "block";
    }

    function closeForm1() {
        document.getElementById("myForm1").style.display = "none";
    }
</script>




<script>
    function openForm2() {
        document.getElementById("myForm2").style.display = "block";
    }

    function closeForm2() {
        document.getElementById("myForm2").style.display = "none";
    }
</script>



<script>
    function openForm3() {
        document.getElementById("myForm3").style.display = "block";
    }

    function closeForm3() {
        document.getElementById("myForm3").style.display = "none";
    }
</script>


</body>

</html>