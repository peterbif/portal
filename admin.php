<?php
session_start();

require ('time_out.php');

@$_SESSION['user'];

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();

//submit users details

if(@$_SESSION['user']) {

    @$user = $db->selectAllUsers($_POST['email']);
    @$result = mysqli_fetch_assoc($user);


    @$session = $db->selectSession();
    @$result_ses = mysqli_fetch_assoc($session);


    @$program = $db->selectPrograms();
    @$result_pro = mysqli_fetch_assoc($program);

    @$school = $db->selectSchools();
    @$result_sch = mysqli_fetch_assoc($school);


    if (isset($_POST['user'])) {

        $surname = ucwords(htmlspecialchars($_POST['surname']));
        $firstname = ucwords(htmlspecialchars($_POST['firstname']));
        $email = strtolower(htmlspecialchars($_POST['email']));
        $phone_no = htmlspecialchars($_POST['phone_no']);
        $password = htmlspecialchars($_POST['password']);
        $password1 = htmlspecialchars($_POST['password1']);
        @$role = htmlspecialchars($_POST['role']);

        if ($result['email']) {
            echo '<script type="text/javascript"> alert("This user exists") </script>';

        } elseif ($password != $password1) {

            echo '<script type="text/javascript"> alert("Passwords don\'t match, re-type") </script>';
        } elseif (empty($_POST['role'])) {

            echo '<script type="text/javascript"> alert("Select role") </script>';
        } else {

            $pass = md5($password);
            $query = "INSERT INTO users(usurname, ufirstname, uemail, uphone_no, password, role) VALUES('{$surname}', '{$firstname}', '{$email}', '{$phone_no}', '{$pass}', '{$role}')";
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

    @$query_sch = $db->selectAllUsers(@$_SESSION['user']);
    @$result_sch = mysqli_fetch_assoc($query_sch);

    @$query_cut = $db->selectCutOffMarkSet($result_sch['school_id']);
    @$result_cut = mysqli_fetch_assoc($query_cut);

//$school = $result_sch['school_id'];

    if (isset($_POST['submit'])) {
        $session = $_POST['session'];
        $school = $result_sch['school_id'];
        $score = trim($_POST['score']);
        $program = $_POST['program'];

        $query31 = $db->selectCutOffMark($session, $school, $program);
        $result3 = mysqli_fetch_assoc($query31);

        if ($result3){

            echo '<script type="text/javascript"> alert("This record exists")</script>';

            echo "<meta http-equiv='refresh' content='0'>";

        } else {

            $query3 = "INSERT INTO cut_off_mark(score, school_id, session_id,  program_id) VALUES ('{$score}', '{$school}', '{$session}', '{$program}')";
            $db->insert($query3);
            echo "<meta http-equiv='refresh' content='0'>";

        }


    }


    if (isset($_POST['reset'])) {

        $_POST['score'] = " ";
        $_POST['session'] = " ";

    }


}else{

    header('index.php');
}

?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?php require ('title.php');?></title>
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
            background-size:1485px 650px;

        }


    </style>





</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="responsive-header visible-xs visible-sm">
    <div class="container">
        <div class="row"
        <div class="col-sm-4">
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
        <div class="col-lg-2" style="margin-top: -40px;">
            <div class="btn-group-vertical">
                <!--<button type="button"  style="text-align: left" class="btn btn-danger btn-lg" data-toggle="modal"><a href="qualification.php" style="color: #ffffff"><i class="fa fa-external-link icon"></i>Add Qualification</a></button>-->
                <a href="applicants.php" style="color: #ffffff;text-align: left;" class="btn btn-danger btn-lg"><i class="fa fa-external-link icon"></i>Applicants</a>
                <button type="button"  style="text-align: left" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-external-link icon"></i>Set Cut-Off Mark</button>

                <!-- <a href="statistics.php" style="color: #ffffff;text-align: left;"  class="btn btn-danger btn-lg"><i class="fa fa-external-link icon"></i> Statistics</a><br /><br />-->
            </div>
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
<!-- </div> --><!-- top-section -->
<div class="container-fluid">
    <div class="panel panel-danger">
        <?php require ('header.php')?>
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
                    <button type="button"  style="text-align: left" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-external-link icon"></i>Set Cut-Off Mark</button>
                    <button type="button"  style="text-align: left" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal2"><i class="fa fa-external-link icon"></i>Cut-Off Marks</button>
                    <a href="applicants.php" style="color: #ffffff;text-align: left;" class="btn btn-danger btn-lg"><i class="fa fa-external-link icon"></i>Applicants</a>

                    <!-- <a href="statistics.php" style="color: #ffffff;text-align: left;"  class="btn btn-danger btn-lg"><i class="fa fa-external-link icon"></i> Statistics</a><br /><br />-->
                </div>

            </div>
            <div class="col-lg-10">
                <img class="img-responsive" src="img/nurse.jpg" alt="backgroung Image" height="77%" width="77%">
            </div>


        </div>


    </div>
    <?php require ('footer.php')?>
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
                        <?php require ('header.php')?>
                        <div class="panel-body" style="margin-left: 80px">
                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Close</button>
                            <h4 class="modal-title" align="center" style="color:#000000; font-size: 20px ;">Add Cut-Off Mark</h4>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="col-lg-12">
                                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"></i>
                                            <input type="text" class="input-field" id="surname"  name="score"  required placeholder="Enter Score">
                                        </div>
                                        <div class="input-container">
                                            <i class="fa fa-sort-alpha-asc icon"></i>
                                            <select class="input-field" name="session" required="required">
                                                <option value="">Select Session</option>
                                                <?php  do{  ?>
                                                    <option value="<?php echo @$result_ses['session_id']; ?>"><?php echo @$result_ses['session'];?></option>
                                                <?php  }while(@$result_ses = mysqli_fetch_assoc($session)); ?>
                                            </select>
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-sort-alpha-asc icon"></i>
                                            <select class="input-field" name="program" required="required">
                                                <option value="">Select Program</option>
                                                <?php  do{  ?>
                                                    <option value="<?php echo @$result_pro['programs_id']; ?>"><?php echo @$result_pro['program'];?></option>
                                                <?php  }while(@$result_pro = mysqli_fetch_assoc($program)); ?>
                                            </select>
                                        </div>


                                        <div align="right"> <button type="submit" name="submit" class="button">Submit</button> &nbsp;&nbsp;<button type="submit" name="reset" class="button">Clear Text</button> </button></div>

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




<!-- Modal -->
<div class="container-fluid">

    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div class="panel panel-danger">
                        <?php require ('header.php')?>
                        <div class="panel-body" style="margin-left: 80px">
                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Close</button>
                            <h4 class="modal-title" align="center" style="color:#000000; font-size: 20px ;">School Cut-Off Marks</h4>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="col-lg-12">
                                    <table class="table table-bordered" id="myTable">
                                        <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>School</th>
                                            <th>Session</th>
                                            <th>Program</th>
                                            <th>Cut-Off Mark</th>
                                            <th>Edit</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $sn = 1; do{

                                        if(@$result_cut) { ?>
                                        <tr>
                                            <td><?php echo @$sn++; ?></td>
                                            <td><?php echo  @$result_cut['school']?></></td>
                                            <td><?php echo  @$result_cut['session']?></td>
                                            <td><?php echo  @$result_cut['program']?></td>
                                            <td><?php echo  @$result_cut['score']?></td>
                                            <td><a href="update_cut_off_mark.php?id=<?php echo  @$result_cut['cut_off_id']?>"><i class="fa fa-edit btn btn-primary"></i></a></td>


                                        </tr>


                                        <?php } ?>
                                        <?php }while(@$result_cut = mysqli_fetch_assoc($query_cut));?>
                                        </tbody>

                                    </table>
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
                                        <?php require ('header.php')?>
                                        <div class="panel-body" style="margin-left: 80px">
                                            <button type="button" class="close" data-dismiss="modal" style="font-size: 30px; font-weight: 100; color: #000000;">&times;</button>
                                            <h4 class="modal-title" align="center" style="color:#000000; font-size: 20px ;">Add Session</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                                            <div class="input-container">
                                                                <i class="fa fa-text-width icon"></i>&nbsp;&nbsp;&nbsp;
                                                                <input type="text" class="input-field" id="position"  name="session2" value="<?php echo @$position; ?>" required placeholder="2018/2019">&nbsp;&nbsp;
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
                                    <?php require ('header.php')?>
                                    <div class="panel-body" style="margin-left: 80px">
                                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp<span style="color:forestgreen;">Close</span></button>
                                        <h4 class="modal-title" align="center" style="color:#000000; font-size: 20px ;">Set Session</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="col-lg-12">
                                                <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                                    <div class="input-container">
                                                        <i class="fa fa-sort-alpha-asc icon"></i>
                                                        <select class="input-field" name="school" required="required">
                                                            <option value="">Select School</option>
                                                            <?php  do{  ?>
                                                                <option value="<?php echo @$result_sch['schools_id']; ?>"><?php echo @$result_sch['school'];?></option>
                                                            <?php  }while(@$result_sch = mysqli_fetch_assoc($school)); ?>
                                                        </select>
                                                    </div>


                                                    <div class="input-container">
                                                        <i class="fa fa-sort-alpha-asc icon"></i>
                                                        <select class="input-field" name="session" required="required">
                                                            <option value="">Select Session</option>
                                                            <?php  do{  ?>
                                                                <option value="<?php echo @$result_ses['session_id']; ?>"><?php echo @$result_ses['session'];?></option>
                                                            <?php  }while(@$result_ses = mysqli_fetch_assoc($session)); ?>
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

                    if(pwd != pwd1){

                        alert("Password does not match, re-enter");
                    }
                }

            </script>
</body>
</html>