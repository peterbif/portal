<?php
require_once("connection.php");

session_start();

require ('time_out.php');

@$_SESSION['user'];

@$_SESSION['school'];



@$result_pin = $db->selectPinNO2($_SESSION['user']);
@$record_pin = mysqli_fetch_assoc($result_pin);

$query_subj = "SELECT * FROM subject";
$query_run_subj = mysql_query($query_subj);
$recordset_subj = mysql_fetch_assoc($query_run_subj);

$query_grad = "SELECT * FROM grade";
$query_run_grad = mysql_query($query_grad);
$recordset_grad = mysql_fetch_assoc($query_run_grad);

$query_exam = "SELECT * FROM exam_type";
$query_run_exam = mysql_query($query_exam);
$recordset_exam = mysql_fetch_assoc($query_run_exam);



$query_edu = "SELECT * FROM application_edu_2 where student_id = '{$recordset['student_id']}'";
$query_run_edu = mysql_query($query_edu);
$recordset_wk = mysql_fetch_assoc($query_run_edu);




if(isset($_POST['submit'])){


    if(($recordset['student_id'] === $recordset_wk['student_id']) && ($recordset_app['form_ref'] === $recordset_wk['form_ref'])) {

        echo $record_exist = '<script type="text/javascript"> alert("This Record exists")</script>';

    }

    else if(empty($_POST['exam_type_2'])) {

        $required_error_ex = '<font color="#F31A1E">'. "Exam type is required".'</font>';
    }


    else if (empty($_POST['exam_year_2'])){

        $required_error_exy = '<font color="#F31A1E">'. "Exam Year is required".'</font>';
    }




    else{


        $grade_na = 10;
        $subject_na = 10;

        $record = $recordset['student_id'];

        $exam_type_2 = $_POST['exam_type_2'];

        $exam_year_2 = $_POST['exam_year_2'];

        if($_POST['subject_2_1']){$subject_2_1 = $_POST['subject_2_1'];} else {$subject_2_1 = $subject_na;}

        if($_POST['grade_2_1']){$grade_2_1 = $_POST['grade_2_1'];} else {$grade_2_1 = $grade_na;}

        if($_POST['subject_2_2']){$subject_2_2 = $_POST['subject_2_2'];} else {$subject_2_2 = $subject_na;}

        if($_POST['grade_2_2']){$grade_2_2 = $_POST['grade_2_2'];} else {$grade_2_2 = $grade_na;}

        if($_POST['subject_2_3']){$subject_2_3 = $_POST['subject_2_3'];} else {$subject_2_3 = $subject_na;}

        if($_POST['grade_2_3']){$grade_2_3 = $_POST['grade_2_3'];} else {$grade_2_3 = $grade_na;}


        if($_POST['subject_2_4']){$subject_2_4 = $_POST['subject_2_4'];} else {$subject_2_4 = $subject_na;}

        if($_POST['grade_2_4']){$grade_2_4 = $_POST['grade_2_4'];} else {$grade_2_4 = $grade_na;}

        if($_POST['subject_2_5']){$subject_2_5 = $_POST['subject_2_5'];} else {$subject_2_5 = $subject_na;}

        if($_POST['grade_2_5']){$grade_2_5 = $_POST['grade_2_5'];} else {$grade_2_5 = $grade_na;}

        if($_POST['subject_2_6']){$subject_2_6 = $_POST['subject_2_6'];} else {$subject_2_6 = $subject_na;}

        if($_POST['grade_2_6']){$grade_2_6 = $_POST['grade_2_6'];} else {$grade_2_6 = $grade_na;}

        if($_POST['subject_2_7']){$subject_2_7 = $_POST['subject_2_7'];} else {$subject_2_7 = $subject_na;}

        if($_POST['grade_2_7']){$grade_2_7 = $_POST['grade_2_7'];} else {$grade_2_7 = $grade_na;}

        if($_POST['subject_2_8']){$subject_2_8 = $_POST['subject_2_8'];} else {$subject_2_8 = $subject_na;}

        if($_POST['grade_2_8']){$grade_2_8 = $_POST['grade_2_8'];} else {$grade_2_8 = $grade_na;}

        if($_POST['subject_2_9']){$subject_2_9 = $_POST['subject_2_9'];} else {$subject_2_9 = $subject_na;}

        if($_POST['grade_2_9']){$grade_2_9 = $_POST['grade_2_9'];} else {$grade_2_9 = $grade_na;}

        $ref =   $recordset_app['form_ref'];

        $session = $recordset_apsch['session_id'];

        $query = "INSERT INTO application_edu_2(student_id, form_ref, session_id, school_id, exam_type_2, exam_year_2, subject_2_1, grade_2_1, subject_2_2, grade_2_2, subject_2_3, grade_2_3, subject_2_4, grade_2_4, subject_2_5, grade_2_5, subject_2_6, grade_2_6, subject_2_7, grade_2_7, subject_2_8, grade_2_8, subject_2_9, grade_2_9) VALUES('{$record}', '{$ref}', '{$session}', '{$recordset_apsch['schools_id']}', '{$exam_type_2}', '{$exam_year_2}',  '{$subject_2_1}',  '{$grade_2_1}',  '{$subject_2_2}',  '{$grade_2_2}',  '{$subject_2_3}',  '{$grade_2_3}',  '{$subject_2_4}',  '{$grade_2_4}',  '{$subject_2_5}',  '{$grade_2_5}',  '{$subject_2_6}', '{$grade_2_6}',  '{$subject_2_7}',  '{$grade_2_7}',  '{$subject_2_8}',  '{$grade_2_8}',  '{$subject_2_9}',  '{$grade_2_9}')";


        if($query_run = mysql_query($query)){

            echo $success =  '<script type="text/javascript"> alert("Information successfully submitted, click next page down")</script>';
        }

        else{
            echo $no_success =  '<script type="text/javascript"> alert("Information not submitted")</script>';

        }


    }

}



$subject_list = [];
$subject_id_list =[];
$total = 0;
do{
    array_push($subject_list, $recordset_subj['subject']);
    array_push($subject_id_list,$recordset_subj['subject_id'] );

    $total++;
}
while($recordset_subj = mysql_fetch_assoc($query_run_subj));


$grade_list = [];
$grade_id_list = [];
$total_1 = 0;
do{
    array_push($grade_list, $recordset_grad['grade']);
    array_push($grade_id_list, $recordset_grad['grade_id']);
    $total_1++;
}
while($recordset_grad = mysql_fetch_assoc($query_run_grad));


$exam_type_list =[];
$exam_id_list =[];
$total_2 = 0;

do{
    array_push($exam_type_list, $recordset_exam['exam_type']);
    array_push($exam_id_list, $recordset_exam['exam_type_id']);
    $total_2++;
}
while($recordset_exam = mysql_fetch_assoc($query_run_exam));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UCH Schools' Portal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap1.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../js/slide.js" type="text/javascript"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 450px}

        /* Set gray background color and 100% height */


        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {

            .row.content {height:auto;}
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $("div.basic2").hide();

            $("div#basicm").hover(function(){

                $("div#basicm2").show().css({
                    "padding-left": "50px",
                    "border-radius" : "30px"
                });});

            $("div#firstsit").hover(function(){

                $("div#firstsitup").show().css({
                    "padding-left": "50px",
                    "border-radius" : "30px"
                });});

            $("div#2ndsit").hover(function(){

                $("div#2ndsitup").show().css({
                    "padding-left": "50px",
                    "border-radius" : "30px"
                });});


            $("div#adqul").hover(function(){

                $("div#adqulup").show().css({
                    "padding-left": "50px",
                    "border-radius" : "30px"
                });});

            $("div#nok").hover(function(){

                $("div#nokup").show().css({
                    "padding-left": "50px",
                    "border-radius" : "30px"
                });});

            $("div#ref").hover(function(){

                $("div#refup").show().css({
                    "padding-left": "50px",
                    "border-radius" : "30px"
                });});

        });
    </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid " >
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="../pix/logo (1).png" width="80" height="80" alt="logo"/>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">

            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php" target="_blank">Home</a></li>
                <li><a href="contact.php" target="_blank">Contact</a></li>
                <li><a href="basic_info.php" target="_blank">Returning Students</a></li>
                <li><a href="tutor.php" target="_blank">Tutors</a></li>

            </ul>
            <div id="school_heading"> University College Hospital, Ibadan Schools' Portal</div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="loginlogic.php" target="_blank"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><h5> <font color="#FDFDFD"> <?php date_default_timezone_set("Africa/Lagos");
                            echo  date('h:i:sa'). ' '. date('l'). ','. ' '. date('d-m-'). '20'.date('y');?> </font> </h5></li>
            </ul>
        </div>
    </div>
</nav>


<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav btn-group-vertical">
            <div class="dropdown">
                <button class="dropbtn">Application Form</button>
                <div class="dropdown-content">
                    <div id="basicm"><a href="application.php" class="btn btn-primary form2" >Basic Information</a></div>

                    <div class="basic2" id="basicm2" ><a href="application_update.php" class="btn btn-primary form2" id="basic2" >Basic Information Update</a></div>


                    <div id="firstsit"><a href="application_edu.php" class="btn btn-primary form2">First Sitting Result</a></div>

                    <div class="basic2" id="firstsitup"><a href="application_edu_update.php" class="btn btn-primary form2 formhover" id="basic2" > First Sitting Result Update</a></div>


                    <div id="2ndsit"> <a href="applicant_edu_2.php" class="btn btn-primary form2">2nd Sitting Result</a></div>


                    <div class="basic2" id="2ndsitup"><a href="applicant_edu_2_update.php" class="btn btn-primary form2 formhover" id="basic2" >2nd Sitting Result Update</a></diV>



                    <?php
                    require ('additional_qualification.php');
                    ?>



                    <div id="nok"><a href="applicant_nok.php" class="btn btn-primary form2">NOK's Information</a></div>

                    <div class="basic2" id="nokup"> <a href="applicant_nok_update.php" class="btn btn-primary form2 formhover" id="basic2" >NOK's Information Update</a></div>


                    <div id="ref"><a href="applicant_ref.php" class="btn btn-primary form2">Ref's  Information</a></div>

                    <div class="basic2" id="refup"> <a href="applicant_ref_update.php" class="btn btn-primary form2 formhover" id="basic2" >Ref's  Information Update</a></div>

                    <?php
                    if(@$recordset_app['schools_id'] == 5 or @$recordset_app['schools_id'] == 6) {
                        echo '<div > <a href = "post_exp.php" class="btn btn-primary form2" target = "_blank" > Post Clinical Experience </a ></div >';
                    } ?>

                    <?php
                    if(@$recordset_app['schools_id'] == 5 or @$recordset_app['schools_id'] == 6) {
                        echo '<div class="basic2" id="refup"> <a href="post_exp_update.php" class="btn btn-primary form2 formhover" id="basic2" >Post Clinical Experience Update</a></div>';
                    } ?>


                    <?php
                    if(@$recordset_app['schools_id'] == 5 or @$recordset_app['schools_id'] == 6) {
                        echo '<div > <a href = "sponsor.php" class="btn btn-primary form2" target = "_blank" > Sponsor </a ></div >';
                    } ?>

                    <?php
                    if(@$recordset_app['schools_id'] == 5 or @$recordset_app['schools_id'] == 6) {
                        echo '<div class="basic2" id="refup"> <a href="sponsor_update.php" class="btn btn-primary form2 formhover" id="basic2" >Sponsor Update</a></div>';
                    } ?>

                    <?php
                    if(@$recordset_app['schools_id'] == 5 ) {
                        echo '<div > <a href = "professional_qualification.php" class="btn btn-primary form2" target = "_blank" > Professional Qualification </a ></div >';
                    } ?>

                    <?php
                    if(@$recordset_app['schools_id'] == 6) {
                        echo '<div > <a href = "nurse_pro_qualification.php" class="btn btn-primary form2" target = "_blank" > Professional Qualification </a ></div >';
                    } ?>

                    <?php
                    if(@$recordset_app['schools_id'] == 5) {
                        echo '<div class="basic2" id="refup"> <a href="professional_qualification_update.php" class="btn btn-primary form2 formhover" id="basic2" >Professional Qualification Update</a></div>';
                    } ?>

                    <?php
                    if(@$recordset_app['schools_id'] == 6) {
                        echo '<div class="basic2" id="refup"> <a href="nurse_pro_qualification_update.php" class="btn btn-primary form2 formhover" id="basic2" >Professional Qualification Update</a></div>';
                    } ?>

                    <div><a href="applicant_print_out.php" class="btn btn-primary form2" target="_blank">Application Print-out</a></div>

                </div>
            </div>

        </div>

        <div class="col-sm-8 text-left">
            <div> <h3 align="center">Welcome, <strong> <?php echo @$recordset['surname']. '  '. @$recordset['firstname'];?></strong> please apply for the program of your choice</h3></div>

            <div class="container">
                <form class="form-horizontal"  name="basic_nfo" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data" autocomplete="off">
                    <table align="center" style="margin-left:20px" class="table  table-condensed">
                        <tbody  style="margin-left:20px">
                        <tr><td colspan="4" align="center"><h3>Application Form</h3></td><td><a href="logoutlogic.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></td></tr>

                        <tr><td></td><td></td><td><img src="uploads/<?php echo @$recordset_pas['file'];?>" class="img-rounded" width="100px" height="100px" /></h3></td></tr>

                        <tr><td colspan="4" align="center"><h4 align="center"><strong>Post-Secondary Requirements</strong></h4></td></tr>


                        <tr><td colspan="4" align="center"><h4><strong> 2nd Sitting</strong></h4></label></td></tr>
                        <tr><td colspan="4" align="center"><h5><strong>All fields are required, select or fill in <font color="#FB1C20">N/A</font> if not applicable</strong></h5></td></tr>
                        <tr><td  colspan="2" align="center">Exam Type
                                <select class="form-control" name="exam_type_2">
                                    <option value="">Select Exam type</option>
                                    <?php $count_2 = 0; do{?>
                                        <option value="<?php echo @$exam_id_list[$count_2]?>"> <?php echo @$exam_type_list[$count_2]; $count_2++;?></option>
                                    <?php }while($count_2 < $total_2);?>
                                </select>
                            </td><td>Exam Year <input class="form-control" type="text" name="exam_year_2" placeholder="2016"/></td>

                            <td><span><?php echo @$required_error_ex;?></span><span><?php echo @$required_error_exy?></span></td></tr>



                        <tr><td  colspan="2" align="center">1. Subject
                                <select class="form-control" name="subject_2_1">
                                    <option value="">Select Subject</option>
                                    <?php $count = 0; do{?>
                                        <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                    <?php }while($count < $total);?>
                                </select>
                            </td>


                            <td>1. Grade
                                <select class="form-control" name="grade_2_1">
                                    <option value="">Select Grade</option>
                                    <?php $count_1 = 0; do{?>
                                        <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                    <?php }while($count_1 < $total_1);?>
                                </select>
                            </td><td><span><?php  echo @$required_error_su;?></span><span> <?php  echo @$required_error_gr_1;?></span></td></tr>


                        <tr><td  colspan="2" align="center">2. Subject
                                <select class="form-control" name="subject_2_2">
                                    <option value="">Select Subject</option>
                                    <?php $count = 0; do{?>
                                        <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                    <?php }while($count < $total);?>
                                </select>
                            </td>


                            <td>2. Grade
                                <select class="form-control" name="grade_2_2">
                                    <option value="">Select Grade</option>
                                    <?php $count_1 = 0; do{?>
                                        <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                    <?php }while($count_1 < $total_1);?>
                                </select>
                            </td> <td><span><?php echo @$required_error_su_2;?></span><span><?php echo @$required_error_gr_2;?></span></td>
                        </tr>

                        <tr><td  colspan="2" align="center">3. Subject
                                <select class="form-control" name="subject_2_3">
                                    <option value="">Select Subject</option>
                                    <?php $count = 0; do{?>
                                        <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                    <?php }while($count < $total);?>
                                </select>
                            </td>


                            <td>3. Grade
                                <select class="form-control"  name="grade_2_3">
                                    <option value="">Select Grade</option>
                                    <?php $count_1 = 0; do{?>
                                        <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                    <?php }while($count_1 < $total_1);?>
                                </select>
                            </td> <td><span><?php  echo @$required_error_su_3;?></span><span><?php  echo @$required_error_gr_3;?></span></tr>

                        <tr><td colspan="2" align="center">4. Subject
                                <select class="form-control" name="subject_2_4">
                                    <option value="">Select Subject</option>
                                    <?php $count = 0; do{?>
                                        <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                    <?php }while($count < $total);?>
                                </select>
                            </td>


                            <td>4. Grade
                                <select class="form-control" name="grade_2_4">
                                    <option value="">Select Grade</option>
                                    <?php $count_1 = 0; do{?>
                                        <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                    <?php }while($count_1 < $total_1);?>
                                </select>
                            </td> <td><span><?php echo @$required_error_su_4;?></span><span><?php  echo @$required_error_gr_4;?></span></td></tr>

                        <tr><td colspan="2" align="center">5. Subject
                                <select class="form-control" name="subject_2_5">
                                    <option value="">Select Subject</option>
                                    <?php $count = 0; do{?>
                                        <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                    <?php }while($count < $total);?>
                                </select>
                            </td>


                            <td>5. Grade
                                <select class="form-control" name="grade_2_5">
                                    <option value="">Select Grade</option>
                                    <?php $count_1 = 0; do{?>
                                        <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                    <?php }while($count_1 < $total_1);?>
                                </select>
                            </td><td><span><?php echo @$required_error_su_5;?></span><span><?php  echo @$required_error_gr_5;?></span></td></tr>

                        <tr><td colspan="2" align="center">6. Subject
                                <select class="form-control"  name="subject_2_6">
                                    <option value="">Select Subject</option>
                                    <?php $count = 0; do{?>
                                        <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                    <?php }while($count < $total);?>
                                </select>
                            </td>


                            <td>6. Grade
                                <select class="form-control" name="grade_2_6">
                                    <option value="">Select Grade</option>
                                    <?php $count_1 = 0; do{?>
                                        <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                    <?php }while($count_1 < $total_1);?>
                                </select>
                            </td><td><span><?php echo @$required_error_su_6;?></span><span><?php  echo @$required_error_gr_6;?></span></td> </tr>


                        <tr><td colspan="2" align="center">7. Subject
                                <select class="form-control"  name="subject_2_7">
                                    <option value="">Select Subject</option>
                                    <?php $count = 0; do{?>
                                        <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                    <?php }while($count < $total);?>
                                </select>
                            </td>


                            <td>7. Grade
                                <select class="form-control" name="grade_2_7">
                                    <option value="">Select Grade</option>
                                    <?php $count_1 = 0; do{?>
                                        <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                    <?php }while($count_1 < $total_1);?>
                                </select>
                            </td><td><span><?php echo @$required_error_su_7;?></span><span><?php  echo @$required_error_gr_7;?></span></td> </tr>

                        <tr><td colspan="2" align="center">8. Subject
                                <select class="form-control" name="subject_2_8">
                                    <option value="">Select Subject</option>
                                    <?php $count = 0; do{?>
                                        <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                    <?php }while($count < $total);?>
                                </select>
                            </td>


                            <td>8. Grade
                                <select class="form-control" name="grade_2_8">
                                    <option value="">Select Grade</option>
                                    <?php $count_1 = 0; do{?>
                                        <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                    <?php }while($count_1 < $total_1);?>
                                </select>
                            </td>
                            <td><span><?php echo @$required_error_su_8;?></span><span><?php  echo @$required_error_gr_8;?></span></td>
                        </tr>


                        <tr><td colspan="2" align="center">9. Subject
                                <select class="form-control"  name="subject_2_9">
                                    <option value="">Select Subject</option>
                                    <?php $count = 0; do{?>
                                        <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                    <?php }while($count < $total);?>
                                </select>
                            </td>


                            <td>9. Grade
                                <select class="form-control" name="grade_2_9">
                                    <option value="">Select Grade</option>
                                    <?php $count_1 = 0; do{?>
                                        <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                    <?php }while($count_1 < $total_1);?>
                                </select>
                            </td><td><span><?php echo @$required_error_su_9;?></span><span><?php  echo @$required_error_gr_9;?></span></td> </tr>


                        <tr><td></td><td></td><td align="center"><button type="submit" id="submit" name="submit" value="Save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button></td></tr>
                        <tr><td  colspan="4" align="center"><h4><strong>3-of-6</strong></h4></td></tr>
                        </tbody>
                    </table>
                </form>
            </div>

        </div>
    </div>
</div>
<footer class="container-fluid text-center" id="footer">
    <p><font color="#F1EBEB">&copy 20<?php echo date("y")?>&nbsp;&nbsp;   Designed by Information Technology Department, University College Hospital, Ibadan.</font></p>
</footer>
</body>
</html>

