<?php
require_once('connection.php');

session_start();

require ('time_out.php');

@$_SESSION['user'];

@$id = $_GET['id'];

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();





    @$result_pin = $db->selectPinNO2($_SESSION['user']);
    @$record_pin = mysqli_fetch_assoc($result_pin);


//echo $record_pin['pin_no_id'];

    $query_edu = $db->selectEducation($record_pin['pin_no_id']);
    $recordset_edu = mysqli_fetch_assoc($query_edu);

 // query credit passes table
$query_creit_passess= $db->selectCreditPasses();
$recordset_credit_passess = mysqli_fetch_assoc($query_creit_passess);


    //@$query_edu2 = $db->selectEducation2($search);
    //  @$recordset_edu2 = mysqli_fetch_assoc($query_edu2);


   echo @$_SESSION['hidden'];

    @$search = $id or @$search = $_POST['hidden'];// or @$search = @$_SESSION['hidden'];

    //O'level modal

    //query subject  table
    //query exam_type  table
    //query grade  table
    $query_sub = $db->selectSubject();
    $recordset_sub = mysqli_fetch_assoc($query_sub);

    $query_grad = $db->selectGrade();
    $recordset_grad = mysqli_fetch_assoc($query_grad);

    $query_exa = $db->selectExamType();
    $recordset_exa = mysqli_fetch_assoc($query_exa);

    $query_sit = $db->selectSittings();
    $recordset_sit = mysqli_fetch_assoc($query_sit);



    $query_olevel21 = $db->selectOlevel21($record_pin['pin_no_id'], $search);
    $recordset_olevel21 = mysqli_fetch_assoc($query_olevel21);

    $query_olevel22 = $db->selectOlevel22($record_pin['pin_no_id'], $search);
    $recordset_olevel22 = mysqli_fetch_assoc($query_olevel22);

    $query_olevel23 = $db->selectOlevel23($record_pin['pin_no_id'], $search);
    $recordset_olevel23 = mysqli_fetch_assoc($query_olevel23);

    $query_olevel24 = $db->selectOlevel24($record_pin['pin_no_id'], $search);
    $recordset_olevel24 = mysqli_fetch_assoc($query_olevel24);

    $query_olevel25 = $db->selectOlevel25($record_pin['pin_no_id'], $search);
    $recordset_olevel25 = mysqli_fetch_assoc($query_olevel25);

    $query_olevel26 = $db->selectOlevel26($record_pin['pin_no_id'], $search);
    $recordset_olevel26 = mysqli_fetch_assoc($query_olevel26);

    $query_olevel27 = $db->selectOlevel27($record_pin['pin_no_id'], $search);
    $recordset_olevel27 = mysqli_fetch_assoc($query_olevel27);

    $query_olevel28 = $db->selectOlevel28($record_pin['pin_no_id'], $search);
    $recordset_olevel28 = mysqli_fetch_assoc($query_olevel28);

    $query_olevel29 = $db->selectOlevel29($record_pin['pin_no_id'], $search);
    $recordset_olevel29 = mysqli_fetch_assoc($query_olevel29);


    $query_olevelup = $db->selectOlevelUpdate($search);
    $recordset_olevelup = mysqli_fetch_assoc($query_olevelup);

    @$applicant = $record_pin['pin_no_id'];


//query exam type table

    if (isset($_POST['update_edu'])) {


                $hidden = $_POST['hidden'];
                if($_POST['exam_type']){$exam_type = $_POST['exam_type'];} else{$exam_type = $recordset_olevelup['exam_type'];}

                if($_POST['exam_year']){$exam_year = $_POST['exam_year'];} else{$exam_year = $recordset_olevelup['exam_year'];}

                if($_POST['sitting']){ $sitting = $_POST['sitting'];}else{$sitting = $recordset_olevelup['sitting_id'];}

                if($_POST['subject_1']){ $subject_1 = $_POST['subject_1'];} else{$subject_1 =  $recordset_olevelup['subject_1'];}

                if($_POST['grade_1']){$grade_1 = $_POST['grade_1'];} else {$grade_1 = $recordset_olevelup['grade_1'];}

                if($_POST['subject_2']){$subject_2 = $_POST['subject_2'];} else {$subject_2 = $recordset_olevelup['subject_2'];}

                if($_POST['grade_2']){$grade_2 = $_POST['grade_2'];} else {$grade_2 = $recordset_olevelup['grade_2'];}

                if($_POST['subject_3']){$subject_3 = $_POST['subject_3'];} else {$subject_3 = $recordset_olevelup['subject_3'];}

                if($_POST['grade_3']){$grade_3 = $_POST['grade_3'];} else{ $grade_3 = $recordset_olevelup['grade_3'];}

                if($_POST['subject_4']){$subject_4 = $_POST['subject_4'];} else { $subject_4 = $recordset_olevelup['subject_4'];}

                if($_POST['grade_4']) {$grade_4 = $_POST['grade_4'];} else {$grade_4 = $recordset_olevelup['grade_4'];}

                if($_POST['subject_5']){$subject_5 = $_POST['subject_5'];} else {$subject_5 = $recordset_olevelup['subject_5'];}

                if($_POST['grade_5']) {$grade_5 = $_POST['grade_5'];} else {$grade_5 = $recordset_olevelup['grade_5'];}

                if($_POST['subject_6']){$subject_6 = $_POST['subject_6'];} else {$subject_6 = $recordset_olevelup['subject_6'];}

                if($_POST['grade_6']) {$grade_6 = $_POST['grade_6'];} else  {$grade_6 = $recordset_olevelup['grade_6'];}

                if($_POST['subject_7']){$subject_7 = $_POST['subject_7'];} else {$subject_7 = $recordset_olevelup['subject_7'];}

                if($_POST['grade_7']){$grade_7 = $_POST['grade_7'];} else {$grade_7 = $recordset_olevelup['grade_7'];}

                if($_POST['subject_8']){$subject_8 = $_POST['subject_8'];} else {$subject_8 = $recordset_olevelup['subject_8'];}

                if($_POST['grade_8']) {$grade_8 = $_POST['grade_8'];}  else {$grade_8 = $recordset_olevelup['grade_8'];}

                if($_POST['subject_9']){$subject_9 = $_POST['subject_9'];} else {$subject_9 = $recordset_olevelup['subject_9'];}

                if($_POST['grade_9']){$grade_9 = $_POST['grade_9'];} else {$grade_9 = $recordset_olevelup['grade_9'];}

                if($_POST['exam_no']){$exam_no = $_POST['exam_no'];}else{$exam_no = $recordset_olevelup['exam_no'];}

              if($_POST['credit']){ $no_of_credit = $_POST['credit'];}else{$no_of_credit = $recordset_olevelup['no_of_credit_passes'];}



               @$query = "UPDATE olevel SET applicant_id = '{$applicant}',  exam_type = '{$exam_type}', exam_year = '{$exam_year}', sitting_id =  '{$sitting}', exam_no = '{$exam_no}', subject_1 = '{$subject_1}',  grade_1 = '{$grade_1}', subject_2 = '{$subject_2}',  grade_2 = '{$grade_2}',  subject_3 = '{$subject_3}', grade_3 = '{$grade_3}',  subject_4 = '{$subject_4}',  grade_4 = '{$grade_4}',  subject_5 = '{$subject_5}',  grade_5 = '{$grade_5}',  subject_6 = '{$subject_6}',  grade_6 = '{$grade_6}',  subject_7 = '{$subject_7}',  grade_7 = '{$grade_7}', subject_8 = '{$subject_8}',  grade_8 = '{$grade_8}', subject_9 = '{$subject_9}',  grade_9 = '{$grade_9}', no_of_credit_passes = '{$no_of_credit}' WHERE olevel_id ='{$hidden}'";
                $db->update($query);
                header("location:olevel_table.php");
                 //echo "<meta http-equiv='refresh' content='0'>";
        }





$query_qua = $db->selectQualification2();
$recordset_qua = mysqli_fetch_assoc($query_qua);

//pass qualification into array

$qualificationList = [];
$qualification_id = [];
$total = 0;

do{
    array_push($qualificationList, $recordset_qua['qualification']);
    array_push($qualification_id, $recordset_qua['qualification_id']);
    $total ++;
}

while($recordset_qua = mysqli_fetch_assoc($query_qua));


$subject_list = [];
$subject_id_list =[];
$total = 0;
do{
    array_push($subject_list, $recordset_sub['subject']);
    array_push($subject_id_list,$recordset_sub['subject_id'] );

    $total++;
}
while(@$recordset_sub = mysqli_fetch_assoc($query_sub));


$grade_list = [];
$grade_id_list = [];
$total_1 = 0;
do{
    array_push($grade_list, $recordset_grad['grade']);
    array_push($grade_id_list, $recordset_grad['grade_id']);
    $total_1++;
}
while(@$recordset_grad = mysqli_fetch_assoc($query_grad));


$exam_type_list =[];
$exam_id_list =[];
$total_2 = 0;

do{
    array_push($exam_type_list, $recordset_exa['exam_type']);
    array_push($exam_id_list, $recordset_exa['exam_type_id']);
    $total_2++;
}
while(@$recordset_exa = mysqli_fetch_assoc($query_exa));




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php require ('title.php');?></title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/animate.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/font-awesome.css">

    <link rel="stylesheet" href="css/3.3.7bootstrap.min.css">


    <script src="js/3.3.7bootstrap.min.js.js"></script>

    <script src="js/3.2.1jquery.min.js.js"></script>

    <script src="js/jquery.min.js"></script>

</head>



<body>
<div class="container-fluid">

    <div class="panel panel-danger">

        <?php require ('header.php');?>
        <div class="panel-body" style="margin-left: 80px">
            <div class="container-fluid">
                <div class="row">
                    <div class="row">
                        <div class="col-lg-8">
                            <h2 align="center">Update O'Level Results
                            </h2>
                        </div>
                        <div class="col-lg-2">
                            <h2 align="right">
                                <a href="olevel_table.php" class="button">
                                    <i class="fa fa-backward"></i>&nbsp; Back
                                </a>

                            </h2>
                        </div>
                    </div><br/>

                    <div class="row">
                        <div class="col-lg-10">

                            <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">

                                <table class="table table-bordered">
                                    <tr><td colspan="4" align="center"><h4><strong>Select or Fill any field to update</strong></h4></td></tr>

                                    <tr>
                                     <td><?php echo @$recordset_olevel21['sitting'] ?></td>   <td  colspan="1" align="center">Sitting
                                            <select class="form-control" name="sitting" >
                                                <option value="">Select Exam Sitting</option>
                                                <?php  do{?>
                                                    <option value="<?php echo @$recordset_sit['sittings_id'];?>"> <?php echo @$recordset_sit['sitting'];?></option>
                                                <?php }while($recordset_sit = mysqli_fetch_assoc($query_sit));?>
                                            </select></td>

                                        <td><?php echo @$recordset_olevel21['exam_type'] ?></td>  <td  colspan="2" align="center">Exam Type
                                            <select class="form-control" name="exam_type">
                                                <option value="">Select Exam type</option>
                                                <?php $count_2 = 0; do{?>
                                                    <option value="<?php echo @$exam_id_list[$count_2]?>"> <?php echo @$exam_type_list[$count_2]; $count_2++;?></option>
                                                <?php }while($count_2 < $total_2);?>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo @$recordset_olevel21['exam_year'] ?></td>
                                        <td  align="center">Exam Year <input class="form-control" type="text" name="exam_year" placeholder="2016"/></td>
                                        <td><?php echo @$recordset_olevel21['exam_no'] ?></td>
                                        <td  align="center" colspan="2">Exam Number <input class="form-control"  type="text" name="exam_no" placeholder="A45678923"/></td>
                                    </tr>

                                    <tr>
                                        <td><?php echo @$recordset_olevel21['subject'] ?></td>
                                        <td colspan="1" align="center">1. Subject
                                            <select class="form-control" name="subject_1">
                                                <option value="">Select Subject</option>
                                                <?php $count = 0; do{?>
                                                    <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                                <?php }while($count < $total);?>
                                            </select>
                                        </td>
                                        <td><?php echo @$recordset_olevel21['grade'] ?></td>
                                        <td>1. Grade
                                            <select class="form-control" name="grade_1">
                                                <option value="">Select Grade</option>
                                                <?php $count_1 = 0; do{?>
                                                    <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                                <?php }while($count_1 < $total_1);?>
                                            </select>
                                        </td>


                                    </tr>


                                    <tr>
                                        <td><?php echo @$recordset_olevel22['subject'] ?></td>
                                        <td  colspan="1" align="center">2. Subject
                                            <select class="form-control" name="subject_2">
                                                <option value="">Select Subject</option>
                                                <?php $count = 0; do{?>
                                                    <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                                <?php }while($count < $total);?>
                                            </select>
                                        </td>

                                        <td><?php echo @$recordset_olevel22['grade'] ?></td>
                                        <td>2. Grade
                                            <select class="form-control" name="grade_2">
                                                <option value="">Select Grade</option>
                                                <?php $count_1 = 0; do{?>
                                                    <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                                <?php }while($count_1 < $total_1);?>
                                            </select>
                                        </td></tr>

                                    <tr>
                                        <td><?php echo @$recordset_olevel23['subject'] ?></td>
                                        <td  colspan="1" align="center">3. Subject
                                            <select class="form-control" name="subject_3">
                                                <option value="">Select Subject</option>
                                                <?php $count = 0; do{?>
                                                    <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                                <?php }while($count < $total);?>
                                            </select>
                                        </td>

                                        <td><?php echo @$recordset_olevel23['grade'] ?></td>
                                        <td>3. Grade
                                            <select class="form-control" name="grade_3">
                                                <option value="">Select Grade</option>
                                                <?php $count_1 = 0; do{?>
                                                    <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                                <?php }while($count_1 < $total_1);?>
                                            </select>
                                        </td> </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo @$recordset_olevel24['subject'] ?></td>
                                        <td  colspan="1" align="center">4. Subject
                                            <select class="form-control"    name="subject_4">
                                                <option value="">Select Subject</option>
                                                <?php $count = 0; do{?>
                                                    <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                                <?php }while($count < $total);?>
                                            </select>
                                        </td>
                                        <td><?php echo @$recordset_olevel24['grade'] ?></td>
                                        <td>4. Grade
                                            <select class="form-control" name="grade_4" >
                                                <option value="">Select Grade</option>
                                                <?php $count_1 = 0; do{?>
                                                    <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                                <?php }while($count_1 < $total_1);?>
                                            </select>
                                        </td></tr>

                                    <tr>
                                        <td><?php echo @$recordset_olevel25['subject'] ?></td>
                                        <td  colspan="1" align="center">5. Subject
                                            <select class="form-control" name="subject_5">
                                                <option value="">Select Subject</option>
                                                <?php $count = 0; do{?>
                                                    <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                                <?php }while($count < $total);?>
                                            </select>
                                        </td>

                                        <td><?php echo @$recordset_olevel25['grade'] ?></td>
                                        <td>5. Grade
                                            <select class="form-control" name="grade_5" >
                                                <option value="">Select Grade</option>
                                                <?php $count_1 = 0; do{?>
                                                    <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                                <?php }while($count_1 < $total_1);?>
                                            </select>
                                        </td></tr>

                                    <tr>
                                        <td><?php echo @$recordset_olevel26['subject'] ?></td>
                                        <td  colspan="1" align="center">6. Subject
                                            <select class="form-control"  name="subject_6">
                                                <option value="">Select Subject</option>
                                                <?php $count = 0; do{?>
                                                    <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                                <?php }while($count < $total);?>
                                            </select>
                                        </td>

                                        <td><?php echo @$recordset_olevel26['grade'] ?></td>
                                        <td>6. Grade
                                            <select class="form-control" name="grade_6">
                                                <option value="">Select Grade</option>
                                                <?php $count_1 = 0; do{?>
                                                    <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                                <?php }while($count_1 < $total_1);?>
                                            </select>
                                        </td></tr>
                                    <tr>
                                        <td><?php echo @$recordset_olevel27['subject'] ?></td>
                                        <td  colspan="1" align="center">7. Subject
                                            <select class="form-control" name="subject_7">
                                                <option value="">Select Subject</option>
                                                <?php $count = 0; do{?>
                                                    <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                                <?php }while($count < $total);?>
                                            </select>
                                        </td>

                                        <td><?php echo @$recordset_olevel27['grade'] ?></td>
                                        <td>7. Grade
                                            <select class="form-control" name="grade_7">
                                                <option value="">Select Grade</option>
                                                <?php $count_1 = 0; do{?>
                                                    <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                                <?php }while($count_1 < $total_1);?>
                                            </select>
                                        </td></tr>
                                    <tr>
                                        <td><?php echo @$recordset_olevel28['subject'] ?></td>
                                        <td  colspan="1" align="center">8. Subject
                                            <select class="form-control"  name="subject_8">
                                                <option value="">Select Subject</option>
                                                <?php $count = 0; do{?>
                                                    <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                                <?php }while($count < $total);?>
                                            </select>
                                        </td>

                                        <td><?php echo @$recordset_olevel28['grade'] ?></td>
                                        <td>8. Grade
                                            <select class="form-control" name="grade_8">
                                                <option value="">Select Grade</option>
                                                <?php $count_1 = 0; do{?>
                                                    <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                                <?php }while($count_1 < $total_1);?>
                                            </select>
                                        </td></tr>

                                    </tr>
                                    <tr>
                                        <td><?php echo @$recordset_olevel29['subject'] ?></td>
                                        <td  colspan="1" align="center">9. Subject
                                            <select class="form-control" name="subject_9">
                                                <option value="">Select Subject</option>
                                                <?php $count = 0; do{?>
                                                    <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                                <?php }while($count < $total);?>
                                            </select>
                                        </td>

                                        <td><?php echo @$recordset_olevel29['grade'] ?></td>
                                        <td>9. Grade
                                            <select class="form-control" name="grade_9">
                                                <option value="">Select Grade</option>
                                                <?php $count_1 = 0; do{?>
                                                    <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                                <?php }while($count_1 < $total_1);?>
                                            </select>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td><?php echo @$recordset_olevelup['no_of_credit_passes']; ?></td>

                                        <td>Number Subject Passed at Credit Level and above:&nbsp;&nbsp;
                                            <select class="form-control" name="credit">
                                                <option value="">Select</option>
                                                <?php do{?>
                                                    <option value="<?php echo @$recordset_credit_passess['credit_passes_id']?>"> <?php echo  @$recordset_credit_passess['credit_passes']?></option>
                                                <?php }while($recordset_credit_passess = mysqli_fetch_assoc($query_creit_passess));?>
                                            </select>
                                        </td>



                                    </tr>

                                    </tbody>
                                </table>

                                <table>
                                    <tbody>


                                    </tbody>
                                </table>

                                <div align="right">
                                    <button type="submit" name="update_edu" class="button2" value="Update">Update</button>
                                    <input type="hidden" name="hidden" value="<?php echo @$id;?>">
                                </div>




                            </form>


                        </div>
                    </div><br /><br />
                </div>





            </div>

            <?php require ('footer.php');?>

        </div>

    </div>


</body>

</html>

