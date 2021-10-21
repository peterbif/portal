<?php
session_start();

require ('time_out.php');

@$_SESSION['user'];

@$id = $_GET['id'] or @$id = $_POST['hidden'];

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




//Set Session

    @$query_sch = $db->selectAllUsers(@$_SESSION['user']);
    @$result_sch = mysqli_fetch_assoc($query_sch);

    @$query_cut = $db->selectCutOffMarkSet2(@$id);
    @$result_cut = mysqli_fetch_assoc($query_cut);

//$school = $result_sch['school_id'];

    if (isset($_POST['submit'])) {
        @$session = $_POST['session'] or @$session = $result_cut['session_id'];
        @$school = $result_sch['school_id'];
        @$score = trim($_POST['score']) or @$score = $result_cut['score'];
        @$program = $_POST['program'] or @$program = $result_cut['program_id'];



            $query3 = "UPDATE cut_off_mark SET score ='{$score}', session_id ='{$session}', program_id ='{$program}' WHERE cut_off_id = '{$id}'";
            $db->update($query3);
            header('location:admin.php');
            //echo "<meta http-equiv='refresh' content='0'>";



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
      /*  body {
            background-image: url("img/nurse.jpg");
            background-repeat: no-repeat;
            background-size:1485px 650px;

        }
**/

    </style>





</head>
<body>

<div class="container-fluid">
        <?php require ('header.php')?>

            <div class="row">
                <div class="col-lg-2">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" align="right">
                    <button type="button" class="button btn-danger btn-lg" data-toggle="modal"><a href="admin.php" style="color: #ffffff">Back</a> </button>
                </div>
            </div>

    <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        <h1 class="text-center" style="font-size: 30px;">Update Score, Session and Program</h1><br/>
        <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">

            <div class="input-container">
                <i class="fa fa-text-width icon"></i><input type="text" value="<?php echo @$result_cut['score']?>" readonly>
                <input type="text" class="input-field" id="surname"  name="score"   placeholder="Enter Score">
            </div>
            <div class="input-container">
                <i class="fa fa-sort-alpha-asc icon"></i><input type="text" value="<?php echo @$result_cut['session']?>" readonly>
                <select class="input-field" name="session">
                    <option value="">Select Session</option>
                    <?php  do{  ?>
                        <option value="<?php echo @$result_ses['session_id']; ?>"><?php echo @$result_ses['session'];?></option>
                    <?php  }while(@$result_ses = mysqli_fetch_assoc($session)); ?>
                </select>
            </div>

            <div class="input-container">
                <i class="fa fa-sort-alpha-asc icon"></i><input type="text" value="<?php echo @$result_cut['program']?>" readonly>
                <select class="input-field" name="program">
                    <option value="">Select Program</option>
                    <?php  do{  ?>
                        <option value="<?php echo @$result_pro['programs_id']; ?>"><?php echo @$result_pro['program'];?></option>
                    <?php  }while(@$result_pro = mysqli_fetch_assoc($program)); ?>
                </select>
            </div>
                             <input type="hidden" name="hidden" value="<?php echo @$_GET['id']?>">

            <div align="right"> <button type="submit" name="submit" class="button">Submit</button> &nbsp;&nbsp;</div>

        </form>
    </div>


</div>

</div>




    </div>
    <?php require ('footer.php')?>
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