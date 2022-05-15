<?php
session_start();

require ('time_out.php');


//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();


   @$school = $_SESSION['school'];
   @$session = $_SESSION['session'];

    @$query_sepin = $db->selectPinSessionSchool($school, $session);
    @$result_sepin = mysqli_fetch_assoc($query_sepin);

@$query_sepin2 = $db->selectPinSessionSchool2($school, $session);
@$result_sepin2 = mysqli_fetch_assoc($query_sepin2);


//query school logo table
@$query_logo = $db->selectSchoolLogo(@$school);
@$result_logo = mysqli_fetch_assoc($query_logo);


?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

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
    <script src="js/slide.js"></script>

    <style>
        table.pin{
            padding: 20px;
        }
    </style>

</head>

<body>
<div class="container-fluid body">
    <?php require ('header.php');?>

    <br />

    <div class="row">
        <div class="col-lg-12" align="right">
           <!-- <a href="super_admin.php" class="button" style="color: #ffffff">Back</a>-->
        </div>
    </div>

        <div class="row col-sm-offset-1">
            <div class="col-lg-10">
                <h4 align="center"><strong> <?php  if(@$result_sepin2) { echo @$result_sepin2['school'].'  '. '('.@$result_sepin2['session'].' Session )';}?></strong></h4>
                <table class="table table-bordered pin" id="myTable">
                    <thead>
                    <tr><th>S/N</th><th>PIN NO</th><th>Names (Surname and Firstname)</th><th>Signature</th></tr>
                    </thead>
                    <tbody>
                    <?php  $sn = 1;
                        if(@$result_sepin) {
                            do {
                                echo '<tr ><td>' . $sn++ . '</td ><td style="font-size: 20px; padding: 10px;" ><strong>' . @$result_sepin['pin'] . '</strong></td ><td></td><td></td></tr >';
                            } while (@$result_sepin = mysqli_fetch_assoc($query_sepin));

                        }
                    ?>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div align="right">
                        <button class="button" onclick="print_page()" ><i class="fa fa-print"></i> Print</button>
                    </div>
                </div>
            </div><br/><br /><br/><br /><br/><br />

        </div>


</body>

</html>