<?php
session_start();

require('time_out.php');


//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();


@$school = $_SESSION['school'];
@$session = $_SESSION['session'];;
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
    <title><?php require('title.php'); ?></title>

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
        table.pin {
            padding: 20px;
        }

        table,
        tr,
        th,
        td {
            border: 5px solid black;
        }
    </style>

</head>

<body>
    <div class="container-fluid body">


        <br />

        <div class="row">
            <div class="col-lg-12" align="right">
                <!-- <a href="super_admin.php" class="button" style="color: #ffffff">Back</a>-->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-sm-offset-2">
                <!-- <h3 align="center"><strong> <?php if (@$result_sepin2) {
                                                        echo @$result_sepin2['school'] . '  ' . '(' . @$result_sepin2['session'] . ' Session)';
                                                    } ?></strong></h3>-->

                <?php


                $rows = array();
                $i = 0;

                // Put results in an array
                do {
                    $rows[] = @$result_sepin;
                    $i++;
                } while (@$result_sepin = mysqli_fetch_assoc($query_sepin));


                //display results in a table of 2 columns

                echo "<table class='table table-bordered pin'   width=\"120%\">";
                for ($j = 0; $j < $i; $j = $j + 2) {
                    $val = implode(@$rows[$j]);
                    @$val2 = implode(@$rows[$j + 1]);

                    if (@$school == 3) {

                        echo "<tr>";
                        echo '<td  style=\"font-size: 12px; padding: 12px; height: 90px; width: 100px;\" align=\"center\" \">&nbsp;&nbsp;<img  src="uploads/' . @$result_logo['logo'] . '"class="img-rounded" width="40px" height="40px" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><span style="font-size: 18px;">' . $result_sepin2['school'] . '</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img  src="images/UCH.png" class="img-rounded" width="40px" height="40px"/><br/>' . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;University College Hospital, Ibadan</strong> <br/><br /><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-size:18px; text-align: center !important;'>"
                            . 'PIN:' . ' ' . $val . '</span></strong> <br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To continue your application online <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;visit: https://portal.uch-ibadan.org.ng<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 10px;"><strong>Powered by ITD, UCH, Ibadan</strong></span>' . '</td>' .
                            '<td  style=\"font-size: 12px; padding: 12px; height: 90px; width: 100px;\" align=\"center\" \">&nbsp;&nbsp;<img  src="uploads/' . @$result_logo['logo'] . '"class="img-rounded" width="40px" height="40px" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><span style="font-size: 18px;">' . $result_sepin2['school'] . '</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img  src="images/UCH.png" class="img-rounded" width="40px" height="40px"/><br/>' . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;University College Hospital, Ibadan</strong> <br/><br /><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-size:18px; text-align: center !important;'>"
                            . 'PIN:' . ' ' . $val2 . '</span></strong> <br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To continue your application online <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;visit: https://portal.uch-ibadan.org.ng<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 10px;"><strong>Powered by ITD, UCH, Ibadan</strong></span>' . '</td>';
                        echo "</tr>";
                    } else if (@$school == 8) {

                        echo "<tr>";
                        echo '<td  style=\"font-size: 12px; padding: 12px; height: 90px; width: 100px;\" align=\"center\" \">&nbsp;&nbsp;<img  src="uploads/' . @$result_logo['logo'] . '"class="img-rounded" width="35px" height="35px" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><span style="font-size: 15px;">' . $result_sepin2['school'] . '</span></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img  src="images/UCH.png" class="img-rounded" width="35px" height="35px"/><br/>' . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;University College Hospital, Ibadan</strong> <br/><br /><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-size:18px; text-align: center !important;'>"
                            . 'PIN:' . ' ' . $val . '</span></strong> <br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To continue your application online <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;visit: https://portal.uch-ibadan.org.ng<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 10px;"><strong>Powered by ITD, UCH, Ibadan</strong></span>' . '</td>' .
                            '<td  style=\"font-size: 12px; padding: 12px; height: 90px; width: 100px;\" align=\"center\" \">&nbsp;&nbsp;<img  src="uploads/' . @$result_logo['logo'] . '"class="img-rounded" width="40px" height="40px" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><span style="font-size: 15px;">' . $result_sepin2['school'] . '</span></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img  src="images/UCH.png" class="img-rounded" width="40px" height="40px"/><br/>' . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;University College Hospital, Ibadan</strong> <br/><br /><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-size:18px; text-align: center !important;'>"
                            . 'PIN:' . ' ' . $val2 . '</span></strong> <br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To continue your application online <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;visit: https://portal.uch-ibadan.org.ng<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 10px;"><strong>Powered by ITD, UCH, Ibadan</strong></span>' . '</td>';
                        echo "</tr>";
                    } else if (@$school == 9) {

                        echo "<tr>";
                        echo '<td  style=\"font-size: 12px; padding: 12px; height: 90px; width: 100px;\" align=\"center\" \">&nbsp;&nbsp;<img  src="uploads/' . @$result_logo['logo'] . '"class="img-rounded" width="35px" height="35px" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 12px;"><strong>' . $result_sepin2['school'] . '</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img  src="images/UCH.png" class="img-rounded" width="35px" height="35px"/><br/>' . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><span style=\"font-size:11px\">University College Hospital, Ibadan</span></strong> <br/><br /><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-size:18px; text-align: center !important;'>"
                            . 'PIN:' . ' ' . $val . '</span></strong> <br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To continue your application online <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;visit: https://portal.uch-ibadan.org.ng<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 10px;"><strong>Powered by ITD, UCH, Ibadan</strong></span>' . '</td>' .
                            '<td  style=\"font-size: 12px; padding: 12px; height: 90px; width: 100px;\" align=\"center\" \">&nbsp;&nbsp;<img  src="uploads/' . @$result_logo['logo'] . '"class="img-rounded" width="35px" height="35px" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 12px;"><strong>' . $result_sepin2['school'] . '</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img  src="images/UCH.png" class="img-rounded" width="35px" height="35px"/><br/>' . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><span  style=\"font-size:11px\">University College Hospital, Ibadan</span></strong> <br/><br /><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-size:18px; text-align: center !important;'>"
                            . 'PIN:' . ' ' . $val2 . '</span></strong> <br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To continue your application online <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;visit: https://portal.uch-ibadan.org.ng<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 10px;"><strong>Powered by ITD, UCH, Ibadan</strong></span>' . '</td>';
                        echo "</tr>";
                    } else {

                        echo "<tr>";
                        echo "<tr>";
                        echo '<td  style=\"font-size: 12px; padding: 12px; height: 90px; width: 100px;\" align=\"center\" \">&nbsp;&nbsp;<img  src="uploads/' . @$result_logo['logo'] . '"class="img-rounded" width="25px" height="28px" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><span style="font-size: 11px;">' . $result_sepin2['school'] . '</span></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img  src="images/UCH.png" class="img-rounded" width="28px" height="25px"/><br/>' . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;University College Hospital, Ibadan</strong> <br/><br /><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-size:18px; text-align: center !important;'>"
                            . 'PIN:' . ' ' . $val . '</span></strong> <br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To continue your application online <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;visit: https://portal.uch-ibadan.org.ng<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 10px;"><strong>Powered by ITD, UCH, Ibadan</strong></span>' . '</td>' .
                            '<td  style=\"font-size: 12px; padding: 12px; height: 90px; width: 100px;\" align=\"center\" \">&nbsp;&nbsp;<img  src="uploads/' . @$result_logo['logo'] . '"class="img-rounded" width="25px" height="28px" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><span style="font-size: 11px;">' . $result_sepin2['school'] . '</span></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img  src="images/UCH.png" class="img-rounded" width="28px" height="25px"/><br/>' . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;University College Hospital, Ibadan</strong> <br/><br /><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-size:18px; text-align: center !important;'>"
                            . 'PIN:' . ' ' . $val2 . '</span></strong> <br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To continue your application online <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;visit: https://portal.uch-ibadan.org.ng<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 10px;"><strong>Powered by ITD, UCH, Ibadan</strong></span>' . '</td>';
                        echo "</tr>";
                    }
                }
                echo "</table>";



                ?>



            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div align="right">
                        <button class="button" onclick="print_page()"><i class="fa fa-print"></i> Print</button>
                    </div>
                </div>
            </div><br /><br /><br /><br /><br /><br />

        </div>


</body>

</html>