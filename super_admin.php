<?php
require_once('connection.php');

session_start();

require('time_out.php');

@$_SESSION['user'];

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();

//submit users details


@$user = $db->selectAllUsers($_POST['email']);
@$result = mysqli_fetch_assoc($user);



@$session = $db->selectSession();
@$result_ses = mysqli_fetch_assoc($session);


@$school = $db->selectSchools();
@$result_sch2 = mysqli_fetch_assoc($school);



if (isset($_POST['user'])) {

    $surname = ucwords(htmlspecialchars($_POST['surname']));
    $firstname = ucwords(htmlspecialchars($_POST['firstname']));
    $email = strtolower(htmlspecialchars($_POST['email']));
    $phone_no = htmlspecialchars($_POST['phone_no']);
    $school = htmlspecialchars($_POST['admin_school']);
    $password = htmlspecialchars($_POST['password']);
    $password1 = htmlspecialchars($_POST['password1']);
    @$role = htmlspecialchars($_POST['role']);

    if (@$result['email']) {
        echo '<script type="text/javascript"> alert("This user exists") </script>';
    } elseif ($password != $password1) {

        echo '<script type="text/javascript"> alert("Passwords don\'t match, re-type") </script>';
    } elseif (empty($_POST['role'])) {

        echo '<script type="text/javascript"> alert("Select role") </script>';
    } else {

        $pass = md5($password);
        @$query = "INSERT INTO users(usurname, ufirstname, uemail, uphone_no, password, role, school_id) VALUES('{$surname}', '{$firstname}', '{$email}', '{$phone_no}', '{$pass}', '{$role}','{$school}')";
        $run = $db->insert($query);
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

//clear all text fields
if (isset($_POST['reset'])) {
    $surname = " ";
    $firstname = "";
    $email = " ";
    $phone_no = " ";
    $password = " ";
    $password1 = " ";
    @$role = " ";
}


//



//Set Session


if (isset($_POST['button3'])) {
    $session = $_POST['session'];
    $school = $_POST['school'];

    $query31 = $db->selectSetSession($session, $school);
    $result3 = mysqli_fetch_assoc($query31);

    if ($result3) {

        echo '<script type="text/javascript"> alert("This record exists") </script>';
        echo "<meta http-equiv='refresh' content='0'>";
    } else {

        $query3 = "INSERT INTO set_session(set_session, school) VALUES ('{$session}', '{$school}')";
        $db->insert($query3);
        echo "<meta http-equiv='refresh' content='0'>";
    }
}


//query schools table
$query_sch = $db->selectSchools();
$result_sch = mysqli_fetch_assoc($query_sch);



if (isset($_POST['reset3'])) {

    $_POST['set_time'] = " ";
}


?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?php require('title.php'); ?></title>
    <meta name="description" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">

    <link rel="stylesheet" href="css/style2.css">
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <style>
        body {
            background-image: url("img/nurse.jpg");
            background-repeat: no-repeat;
            background-size: 1485px 650px;

        }
    </style>





</head>

<body>
    <!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

    <div class="responsive-header visible-xs visible-sm">
        <div class="container">
            <div class="row" <div class="col-sm-4">
                <div class="top-section">
                    <div class="profile-image">
                        <img src="img/nurse.jpg" alt="UCH logo">
                    </div>
                    <div class="profile-content">
                        <h3 class="profile-title">University College Hospital, Ibadan</h3>
                    </div>
                </div>
            </div>

        </div>
        <a href="#" class="toggle-menu"><i class="fa fa-bars"></i></a>
        <div class="main-navigation responsive-menu">
            <div class="col-lg-4" style="margin-top: -40px;">
                <div class="btn-group-vertical">
                    <button type="button" style="text-align: left" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-external-link icon"></i>Add User</button>
                    <button type="button" style="text-align: left" class="btn btn-danger btn-lg" data-toggle="modal"><a href="all_users.php" style="color: #ffffff"><i class="fa fa-external-link icon"></i>All Users</a> </button>
                    <a href="session.php" style="color: #ffffff;text-align: left" class="btn btn-danger btn-lg"><i class="fa fa-external-link icon"></i>add Session</a>
                    <a href="list_of_session.php" class="btn btn-danger btn-lg" style="color: #ffffff;text-align: left"><i class="fa fa-external-link icon"></i>List Of Session</a>
                    <button type="button" style="text-align: left" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal3"><i class="fa fa-external-link icon"></i>Set Session</button>
                    <a href="school_logo.php" style="color: #ffffff;text-align: left;" class="btn btn-danger btn-lg"><i class="fa fa-external-link icon"></i>Add School logo</a>
                    <!--<button type="button"  style="text-align: left" class="btn btn-danger btn-lg" data-toggle="modal"><a href="qualification.php" style="color: #ffffff"><i class="fa fa-external-link icon"></i>Add Qualification</a></button>-->
                    <!--<a href="admin_applicants.php" style="color: #ffffff;text-align: left;" class="btn btn-danger btn-lg"><i class="fa fa-external-link icon"></i>SON Applicants</a>-->
                    <a href="check_pin.php" style="color: #ffffff;text-align: left;" class="btn btn-danger btn-lg" target="_blank"><i class="fa fa-external-link icon"></i>Check Pin</a>
                    <a href="admin_applicants2.php" style="color: #ffffff;text-align: left;" class="btn btn-danger btn-lg"><i class="fa fa-external-link icon"></i>Applicants</a>

                    <a href="pin.php" style="color: #ffffff;text-align: left;" class="btn btn-danger btn-lg"><i class="fa fa-external-link icon"></i>Generate Pin </a>
                </div><br /><br />

            </div>
        </div>
    </div>

    <!-- SIDEBAR -->

    <!--<div class="sidebar-menu hidden-xs hidden-sm">
    <div class="top-section">
        <div class="profile-image">
            <img src="img/profile.jpg" alt="uch logo">
            <br />
            <a href="index.php" class="glyphicon glyphicon-log-in">Login</a>
        </div>
        -->
    <!-- </div> -->
    <!-- top-section -->
    <div class="container-fluid">
        <div class="panel panel-danger">
            <?php require('header.php') ?>
            <div class="panel-body" id="panel">
                <div class="row">
                    <div class="col-lg-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" align="right">
                        <button type="button" class="button btn-danger btn-lg" data-toggle="modal"><a href="logoutlogic.php" style="color: #ffffff">Logout</a> </button>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 40px;">
                <div class="col-lg-2">
                    <div class="btn-group-vertical">
                        <button type="button" style="text-align: left" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-external-link icon"></i>Add User</button>
                        <button type="button" style="text-align: left" class="btn btn-danger btn-lg" data-toggle="modal"><a href="all_users.php" style="color: #ffffff"><i class="fa fa-external-link icon"></i>All Users</a> </button>
                        <a href="session.php" style="color: #ffffff;text-align: left" class="btn btn-danger btn-lg"><i class="fa fa-external-link icon"></i>add Session</a>
                        <a href="list_of_session.php" class="btn btn-danger btn-lg" style="color: #ffffff;text-align: left"><i class="fa fa-external-link icon"></i>List Of Session</a>
                        <button type="button" style="text-align: left" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal3"><i class="fa fa-external-link icon"></i>Set Session</button>
                        <a href="school_logo.php" style="color: #ffffff;text-align: left;" class="btn btn-danger btn-lg"><i class="fa fa-external-link icon"></i>Add School logo</a>
                        <!--<button type="button"  style="text-align: left" class="btn btn-danger btn-lg" data-toggle="modal"><a href="qualification.php" style="color: #ffffff"><i class="fa fa-external-link icon"></i>Add Qualification</a></button>-->
                        <!-- <a href="admin_applicants.php" style="color: #ffffff;text-align: left;" class="btn btn-danger btn-lg"><i class="fa fa-external-link icon"></i>SON Applicants</a>-->

                        <a href="check_pin.php" style="color: #ffffff;text-align: left;" class="btn btn-danger btn-lg" target="_blank"><i class="fa fa-external-link icon"></i>Check Pin</a>
                        <a href="admin_applicants2.php" style="color: #ffffff;text-align: left;" class="btn btn-danger btn-lg"><i class="fa fa-external-link icon"></i>Applicants</a>

                        <a href="pin.php" style="color: #ffffff;text-align: left;" class="btn btn-danger btn-lg"><i class="fa fa-external-link icon"></i>Generate Pin </a>
                        <!-- <a href="statistics.php" style="color: #ffffff;text-align: left;"  class="btn btn-danger btn-lg"><i class="fa fa-external-link icon"></i> Statistics</a><br /><br />-->
                    </div>

                </div>
                <div class="col-lg-10">
                    <img class="img-responsive" src="img/nurse.jpg" alt="backgroung Image" height="77%" width="77%">
                </div>


            </div>


        </div>
        <?php require('footer.php') ?>
    </div>
    </div>
    <!--   </div> <!-- .main-navigation -->
    <!--
</div> <!-- .sidebar-menu -->
    <div class="container-fluid">

        <!--<div class="banner-bg" id="top">
        <div class="banner-overlay"></div>
        <div class="welcome-text">
            <img align="center"  style="position: relative; top: -100px;" src="images/download.png" width="900" height="400">

        </div>
    </div>
    -->
    </div>

    <!-- Modal -->
    <div class="container-fluid">

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="panel panel-danger">
                            <?php require('header.php') ?>
                            <div class="panel-body" style="margin-left: 80px">
                                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Close</button>
                                <h4 class="modal-title" align="center" style="color:#000000; font-size: 20px ;">Add User</h4>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="col-lg-12">
                                        <form class="form-horizontal" method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
                                            <div class="input-container">
                                                <i class="fa fa-text-width icon"></i>
                                                <input type="text" class="input-field" id="surname" name="surname" value="<?php echo @$surname; ?>" required placeholder="Enter Surname">
                                            </div>
                                            <div class="input-container">
                                                <i class="fa fa-text-width icon"></i>
                                                <input type="text" class="input-field" name="firstname" id="firstname" value="<?php echo @$firstname; ?>" required placeholder="Enter Firstname">
                                            </div>
                                            <div class="input-container">
                                                <i class="fa fa-envelope icon"></i>
                                                <input type="email" class="input-field" name="email" value="<?php echo @$email; ?>" placeholder="Enter Email">
                                            </div>

                                            <div class="input-container">
                                                <i class="fa fa-phone icon"></i>
                                                <input type="text" class="input-field" name="phone_no" value="<?php echo @$phone_no; ?>" required placeholder="Enter Phone NO">
                                            </div>

                                            <div class="input-container">
                                                <i class="fa fa-sort-alpha-asc icon"></i>
                                                <select class="input-field" name="admin_school" required="required">
                                                    <option value="">Select School</option>
                                                    <?php do {  ?>
                                                        <option value="<?php echo @$result_sch['schools_id']; ?>"><?php echo @$result_sch['school']; ?></option>
                                                    <?php  } while (@$result_sch = mysqli_fetch_assoc($query_sch)); ?>
                                                </select>
                                            </div>

                                            <div class="input-container">
                                                <i class="fa fa-key icon">&nbsp;Password</i>
                                                <input type="password" class="input-field" id="pwd" name="password" placeholder="Password" value="<?php echo @$password; ?>" required>
                                            </div>

                                            <div class="input-container">
                                                <i class="fa fa-key icon">&nbsp;Re-type Password</i>
                                                <input type="password" class="input-field" id="pwd1" placeholder="Re-type Password" value="<?php echo @$password1; ?>" name="password1" required>
                                            </div>

                                            <div class="input-container">
                                                <i class="fa fa-arrow-circle-o-right icon">Click</i>&nbsp;&nbsp;
                                                &nbsp;<input type="radio" class="radio-inline" name="role" value="2"><span class="radio-select">&nbsp;&nbsp; Super Admin </span> &nbsp;&nbsp;&nbsp;<input type="radio" class="radio-inline" name="role" value="1"> <span class="radio-select"> &nbsp;&nbsp; Admin</span>
                                            </div>

                                            <div align="right"> <button type="submit" name="user" class="button">Submit</button> &nbsp;&nbsp;<button type="submit" name="reset" class="button">Clear Text</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="button2"><a href="update_users.php" style="color: #FFFFFF">Edit</a> </button></div>

                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="fluid-container">

            <div class="content-wrapper">

                <!-- ABOUT -->
                <div class="page-section" id="about">
                    <div class="container-fluid">

                        <div class="modal fade" id="myModal1" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="panel panel-danger">
                                            <?php require('header.php') ?>
                                            <div class="panel-body" style="margin-left: 80px">
                                                <button type="button" class="close" data-dismiss="modal" style="font-size: 30px; font-weight: 100; color: #000000;">&times;</button>
                                                <h4 class="modal-title" align="center" style="color:#000000; font-size: 20px ;">Add Session</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <form class="form-horizontal" method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
                                                                <div class="input-container">
                                                                    <i class="fa fa-text-width icon"></i>&nbsp;&nbsp;&nbsp;
                                                                    <input type="text" class="input-field" id="position" name="session2" value="<?php echo @$position; ?>" required placeholder="2018/2019">&nbsp;&nbsp;
                                                                    <button type="submit" name="button_two" class="button">Submit</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="reset2" class="button">Reset</button>
                                                                    <button type="submit" name="button_two" class="button">Add New</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="reset2" class="button">Reset</button>
                                                                </div>



                                                            </form>
                                                        </div>




                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!--Set Session -->


                <div class="container-fluid">

                    <div class="modal fade" id="myModal3" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="panel panel-danger">
                                        <?php require('header.php') ?>
                                        <div class="panel-body" style="margin-left: 80px">
                                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp<span style="color:forestgreen;">Close</span></button>
                                            <h4 class="modal-title" align="center" style="color:#000000; font-size: 20px ;">Set Session</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="col-lg-12">
                                                    <form class="form-horizontal" method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
                                                        <div class="input-container">
                                                            <i class="fa fa-sort-alpha-asc icon"></i>
                                                            <select class="input-field" name="school" required="required">
                                                                <option value="">Select School</option>
                                                                <?php do {  ?>
                                                                    <option value="<?php echo @$result_sch2['schools_id']; ?>"><?php echo @$result_sch2['school']; ?></option>
                                                                <?php  } while (@$result_sch2 = mysqli_fetch_assoc($school)); ?>
                                                            </select>
                                                        </div>


                                                        <div class="input-container">
                                                            <i class="fa fa-sort-alpha-asc icon"></i>
                                                            <select class="input-field" name="session" required="required">
                                                                <option value="">Select Session</option>
                                                                <?php do {  ?>
                                                                    <option value="<?php echo @$result_ses['session_id']; ?>"><?php echo @$result_ses['session']; ?></option>
                                                                <?php  } while (@$result_ses = mysqli_fetch_assoc($session)); ?>
                                                            </select>
                                                        </div>

                                                        <div class="input-container" style="float: right">
                                                            <input type="submit" name="button3" class="button btn btn-lg" value="Submit">
                                                        </div>
                                                    </form>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>







                <script src="js/vendor/jquery-1.10.2.min.js"></script>
                <script src="js/min/plugins.min.js"></script>
                <script src="js/min/main.min.js"></script>

                <script>
                    function password() {
                        var pwd = document.getElementById("pwd").value;
                        var pwd1 = document.getElementById("pwd1").value;

                        if (pwd != pwd1) {

                            alert("Password does not match, re-enter");
                        }
                    }
                </script>
</body>

</html>