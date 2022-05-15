<?php
session_start();

require('time_out.php');

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();


@$_SESSION['user'];





//
@$query_pin = $db->selectPinNOPosition(@$_SESSION['user']);
@$record_pin = mysqli_fetch_assoc($query_pin);

//school
@$result_res2 = $db->selectSchool2($record_pin['pin_no_id']);
@$record_res2 = mysqli_fetch_assoc($result_res2);

//passport

@$query_pass = $db->selectPassport($record_pin['pin_no_id']);
@$result_pass = mysqli_fetch_assoc($query_pass);


$query_bio = $db->selectBioDataMaritalGender(@$record_pin['pin_no_id']);
$result_bio = mysqli_fetch_assoc($query_bio);



@$query_logo = $db->selectSchoolLogo(@$record_res2['schools_id']);
@$result_logo = mysqli_fetch_assoc($query_logo);

@$query_per = $db->selectPermanentAddSenatorialStateLgCountry(@$record_pin['pin_no_id']);
@$result_per = mysqli_fetch_assoc($query_per);

@$query_con = $db->selectContactAddSenatorialStateLgCountry(@$record_pin['pin_no_id']);
@$result_con = mysqli_fetch_assoc($query_con);

@$query_nok = $db->selectNOK(@$record_pin['pin_no_id']);
@$result_nok = mysqli_fetch_assoc($query_nok);

@$query_spon = $db->selectSponsor(@$record_pin['pin_no_id']);
@$result_spon = mysqli_fetch_assoc($query_spon);


@$query_edu = $db->selectEducation(@$record_pin['pin_no_id']);
@$result_edu = mysqli_fetch_assoc($query_edu);


@$query_ref = $db->selectREF(@$record_pin['pin_no_id']);
@$result_ref = mysqli_fetch_assoc($query_ref);



@$result_pin = $db->selectPinNO2($_SESSION['user']);
@$record_pin = mysqli_fetch_assoc($result_pin);



@$result_pre = $db->selectOlevel1($record_pin['pin_no_id']);
@$recordset_pre = mysqli_fetch_assoc($result_pre);


@$result_pre2 = $db->selectOlevel2($record_pin['pin_no_id']);
@$recordset_pre2 = mysqli_fetch_assoc($result_pre2);

@$result_pre3 = $db->selectOlevel3($record_pin['pin_no_id']);
@$recordset_pre3 = mysqli_fetch_assoc($result_pre3);

@$result_pre4 = $db->selectOlevel4($record_pin['pin_no_id']);
@$recordset_pre4 = mysqli_fetch_assoc($result_pre4);

@$result_pre5 = $db->selectOlevel5($record_pin['pin_no_id']);
@$recordset_pre5 = mysqli_fetch_assoc($result_pre5);

@$result_pre6 = $db->selectOlevel6($record_pin['pin_no_id']);
@$recordset_pre6 = mysqli_fetch_assoc($result_pre6);

@$result_pre7 = $db->selectOlevel7($record_pin['pin_no_id']);
@$recordset_pre7 = mysqli_fetch_assoc($result_pre7);

@$result_pre8 = $db->selectOlevel8($record_pin['pin_no_id']);
@$recordset_pre8 = mysqli_fetch_assoc($result_pre8);

@$result_pre9 = $db->selectOlevel9($record_pin['pin_no_id']);
@$recordset_pre9 = mysqli_fetch_assoc($result_pre9);



@$result_pre11 = $db->selectOlevel11($record_pin['pin_no_id']);
@$recordset_pre11 = mysqli_fetch_assoc($result_pre11);


@$result_pre12 = $db->selectOlevel12($record_pin['pin_no_id']);
@$recordset_pre12 = mysqli_fetch_assoc($result_pre12);

@$result_pre13 = $db->selectOlevel13($record_pin['pin_no_id']);
@$recordset_pre13 = mysqli_fetch_assoc($result_pre13);

@$result_pre14 = $db->selectOlevel14($record_pin['pin_no_id']);
@$recordset_pre14 = mysqli_fetch_assoc($result_pre14);

@$result_pre15 = $db->selectOlevel15($record_pin['pin_no_id']);
@$recordset_pre15 = mysqli_fetch_assoc($result_pre15);

@$result_pre16 = $db->selectOlevel16($record_pin['pin_no_id']);
@$recordset_pre16 = mysqli_fetch_assoc($result_pre16);

@$result_pre17 = $db->selectOlevel17($record_pin['pin_no_id']);
@$recordset_pre17 = mysqli_fetch_assoc($result_pre17);

@$result_pre18 = $db->selectOlevel18($record_pin['pin_no_id']);
@$recordset_pre18 = mysqli_fetch_assoc($result_pre18);

@$result_pre19 = $db->selectOlevel19($record_pin['pin_no_id']);
@$recordset_pre19 = mysqli_fetch_assoc($result_pre19);

@$result_jamb = $db->selectJamb($record_pin['pin_no_id']);
@$recordset_jamb = mysqli_fetch_assoc($result_jamb);


@$result_prog2 = $db->selectProgram($record_pin['pin_no_id']);
@$recordset_prog2 = mysqli_fetch_assoc($result_prog2);

//query additional qualification table
@$result_addqual = $db->selectAddQualification($record_pin['pin_no_id']);
@$recordset_add = mysqli_fetch_assoc($result_addqual);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php require('title.php'); ?></title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/animate.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/font-awesome.css">

    <link rel="stylesheet" href="css/3.3.7bootstrap.min.css">


    <script src="js/3.3.7bootstrap.min.js.js"></script>

    <script src="js/3.2.1jquery.min.js.js"></script>

    <script src="js/slide.js"></script>


    <script src="js/jquery.min.js"></script>

    <style>
        td {

            text-transform: uppercase;
            font-size: 12px;

        }

        /*
                #form_no{

                   border: 1px solid black;
                    height: 50px;
                    width: 80px;
                }
        */
        body {
            -webkit-print-color-adjust: exact !important;
            //background-color: #c7254e;
        }

        ul {
            list-style-type: lower-roman;
            display: block;
        }
    </style>


</head>



<body>
    <div class="container-fluid">



        <div class="row">
            <div class="col-lg-12 showResult">

                <table class="table table-bordered" id="myTable">
                    <tbody>
                        <tr>
                            <td colspan="12" style="background-color: #000000">
                                <h6 style="color: #ffffff; text-align: center;"><span style="font-size: font-size: 25px !important;">APPLICATION FORM ENTRY</span> <br /><br /><span style="font-size: 20px !important;"><?php echo  @$record_res2['school']; ?> </span> <br /><br /><span style="font-size: 15px !important;">UNIVERSITY COLLEGE HOSPITAL, IBADAN, NIGERIA</span></h6>
                            </td>
                        </tr>

                        <tr>
                            <td align="center" colspan="12">
                                <span style="color: red; font-size: 20px;"> Preview Print </span>
                            </td>
                        </tr>
                        <tr style="border-collapse: collapse;">
                            <td id="form_no" align="center" colspan="1"><span style="font-size: 16px;">FORM NO</span> <br /><br /><span style="font-size: 20px; font-weight: bolder"><?php echo @$record_res2['form_no']; ?></span></td>
                            <td colspan="6" align="center" style="border-right: 0px"><img src="uploads/<?php echo @$result_logo['logo']; ?>" class="img-rounded" width="120px" height="100px" /></td>
                            <td colspan="5"><img align="right" src="thumbs/<?php echo @$result_pass['capture']; ?>" class="img-rounded" width="120px" height="100px" /></span></td>
                        </tr>
                        <?php if (@$record_res2['schools_id'] == 3) {
                            echo  '<tr><td colspan="12"><span style="font-size: 15px; font-weight: bolder;">Importance Notice</span><br/> <span style="text-transform: none">The Course is for a period of three years after which candidates will be presented for both Hospital Final Examination and the Nursing and Midwifery Council of Nigeria Final Examination to qualify as a General Nurse and be eligible to become a Registered Nurse (RN).</span> </td></tr>';
                        } ?>
                        <tr>
                            <td colspan="12">
                                <h3 align="left" style="font-size: 14px;"><strong>1. PERSONAL DATA</strong></h3>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="12">SURNAME: <strong><?php echo @$result_bio['bsurname'] ?></strong></td>
                        </tr>
                        <tr>
                            <td colspan="4">FIRST NAME: <strong><?php echo  @$result_bio['bfirstname']; ?></strong></td>
                            <td colspan="5">Othername: <strong><?php echo @$result_bio['bothername']; ?></strong></td>
                        </tr>
                        <tr>
                            <td colspan="4">GENDER: <strong><span style="text-transform: capitalize"><?php echo @$result_bio['gender']; ?></span></strong></td>
                            <td colspan="5">Marital Status: <strong><span style="text-transform: capitalize"><?php echo @$result_bio['status']; ?></span></strong></td>
                        </tr>
                        <tr>
                            <td colspan="4">MAIDEN NAME: <strong><span style="text-transform: capitalize"><?php echo @$result_bio['maiden_name']; ?></span></strong></td>
                            <td colspan="5">Date of Birth: <strong><span style="text-transform: capitalize"><?php echo date('d-m-Y', strtotime(@$result_bio['date_of_birth'])); ?></span></strong></td>
                        </tr>
                        <tr>
                            <td colspan="4">AGE: <strong><span style="text-transform: capitalize"><?php @$age =  $db->age($result_bio['date_of_birth']);
                                                                                                    echo @$age . 'yrs'; ?></span></strong></td>
                            <td colspan="5">Religion: <strong><span style="text-transform: capitalize"><?php echo @$result_bio['religion']; ?></span></strong></td>
                        </tr>
                        <tr>
                            <td colspan="4">Country: <strong><span style="text-transform: capitalize"><?php echo @$result_per['country']; ?></span></strong></td>
                            <td colspan="5">State of Origin: <strong><span style="text-transform: capitalize"><?php echo @$result_per['state_name']; ?></span></strong></td>
                        </tr>
                        <tr>
                            <td colspan="12">Local Govt Area Of Origin: <strong><span style="text-transform: capitalize"><?php echo @$result_per['lg_name']; ?></span></strong></td>
                        </tr>
                        <tr>
                            <td colspan="12">PERMANENT ADDRESS: (HOME) <strong><span style="text-transform: capitalize"><?php echo @$result_per['street_add']; ?></span></strong></td>
                        </tr>
                        <tr>
                            <td colspan="12">POSTAL ADDRESS: <strong><span style="text-transform: capitalize"><?php echo @$result_con['street_add2']; ?></span></strong></td>
                        </tr>
                        <tr>
                            <td colspan="4">EMAIL ADDRESS: <strong><span style="text-transform: lowercase"><?php echo  @$record_pin['email']; ?></strong></span></td>
                            <td colspan="5">PHONE NO: <strong><?php echo @$record_pin['phone_no']; ?></strong></td>
                        </tr>

                        <tr>
                            <td colspan="12">
                                <h3 align="left" style="font-size: 14px;"><strong>2. OTHER PERSONAL DETAILS</strong></h3>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="12">NAME AND ADDRESS OF PARENTS/GUARDIAN/NEXT OF KIN: <strong><span style="text-transform: capitalize"><?php echo @$result_nok['nsurname'] . ' ' . @$result_nok['nfirstname'] . ' / ' . @$result_nok['ncontact_add']; ?></span></strong></td>
                        </tr>
                        <tr>
                            <td colspan="12">NAME AND ADDRESS OF SPONSOR: <strong><span style="text-transform: capitalize"><?php if ($result_spon) {
                                                                                                                                echo @$result_spon['ssurname'] . ' ' . @$result_spon['sfirstname'] . ' / ' . @$result_spon['scontact_add'];
                                                                                                                            } ?></span></strong></td>
                        </tr>
                        <tr>
                            <td colspan="12">HOBBIES: <strong><span style="text-transform: lowercase"><?php echo  @$result_bio['hobby'] ?></span></strong></td>
                        </tr>

                        <tr>
                            <td colspan="12">
                                <h3 align="left" style="font-size: 14px;"><strong>3. PROGRAM</strong></h3>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="12"><strong><span style="text-transform: capitalize"><?php echo  @$recordset_prog2['program']; ?></span></strong></td>
                        </tr>


                        <tr>
                            <th colspan="12">
                                <h3 align="left" style="font-size: 14px;"><strong>4. EXAMINATION(S) PASSED OR ENTERED FOR <br /> <br />(Photo Copies of Certificates; Statemnets of Results Obtained must be enclosed)</strong></h3>
                            </th>
                        </tr>


                        <?php if ($recordset_pre11 && ($recordset_pre11['sitting_id'] == 2) && ($recordset_pre['sitting_id'] == 1)) {


                            echo '<tr>';
                            echo '<tr><td><strong>' . ucwords(@$recordset_pre['sitting']) . '</strong></td>';
                            echo '<td colspan="2"> <strong>Exam Type:</strong> ' . ucwords(@$recordset_pre['exam_type']) . '</td>';
                            echo '<td colspan="1"> <strong>Exam Year:</strong> ' . ucwords(@$recordset_pre['exam_year']) . ' </td>';
                            echo '<td colspan="2"> <strong>Exam Number:</strong> ' . ucwords(@$recordset_pre['exam_no']) . ' </td><td colspan="1"><strong>Subject</strong></td><td colspan="2"><strong>Grade</strong></td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre['subject']) . ' </td><td> ' . ' ' . ucwords(@$recordset_pre['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre2['subject']) . ' </td><td> ' . ' ' . ucwords(@$recordset_pre2['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre3['subject']) . ' </td><td> ' . ' ' . ucwords(@$recordset_pre3['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre4['subject']) . '</td><td> ' . ' ' . ucwords(@$recordset_pre4['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre5['subject']) . '</td><td> ' . ' ' . ucwords(@$recordset_pre5['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre6['subject']) . '</td><td> ' . ' ' . ucwords(@$recordset_pre6['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre7['subject']) . '</td><td> ' . ' ' . ucwords(@$recordset_pre7['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre8['subject']) . ' </td><td> ' . ' ' . ucwords(@$recordset_pre8['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre9['subject']) . ' </td><td> ' . ' ' . ucwords(@$recordset_pre9['grade']) . '</td></tr>';


                            // echo '<tr><td colspan="12"></td></tr>';

                            echo '<tr><td><strong>' . ucwords(@$recordset_pre11['sitting']) . '</strong></td>';
                            echo '<td colspan="2"> <strong>Exam Type:</strong> ' . ucwords(@$recordset_pre11['exam_type']) . '</td>';
                            echo '<td colspan="1"> <strong>Exam Year:</strong> ' . ucwords(@$recordset_pre11['exam_year']) . ' </td>';
                            echo '<td colspan="2"> <strong>Exam Number:</strong> ' . ucwords(@$recordset_pre11['exam_no']) . ' </td><td colspan="1"><strong>Subject</strong></td><td colspan="1"><strong>Grade</strong></td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre11['subject']) . ' </td><td> ' . ' ' . ucwords(@$recordset_pre11['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre12['subject']) . ' </td><td> ' . ' ' . ucwords(@$recordset_pre12['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre13['subject']) . ' </td><td> ' . ' ' . ucwords(@$recordset_pre13['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre14['subject']) . '</td><td> ' . ' ' . ucwords(@$recordset_pre14['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre15['subject']) . '</td><td> ' . ' ' . ucwords(@$recordset_pre15['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre16['subject']) . '</td><td> ' . ' ' . ucwords(@$recordset_pre16['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre17['subject']) . '</td><td> ' . ' ' . ucwords(@$recordset_pre17['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre18['subject']) . ' </td><td> ' . ' ' . ucwords(@$recordset_pre18['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre19['subject']) . ' </td><td> ' . ' ' . ucwords(@$recordset_pre19['grade']) . '</td></tr>';
                        } elseif ($recordset_pre11 && ($recordset_pre11['sitting_id'] == 2)) {


                            echo '<tr>';
                            echo '<tr><td><strong>' . ucwords(@$recordset_pre11['sitting']) . '</strong></td>';
                            echo '<td colspan="2"> <strong>Exam Type:</strong> ' . ucwords(@$recordset_pre11['exam_type']) . '</td>';
                            echo '<td colspan="1"> <strong>Exam Year:</strong> ' . ucwords(@$recordset_pre11['exam_year']) . ' </td>';
                            echo '<td colspan="2"> <strong>Exam Number:</strong> ' . ucwords(@$recordset_pre11['exam_no']) . ' </td><td colspan="1"><strong>Subject</strong></td><td colspan="2"><strong>Grade</strong></td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre11['subject']) . ' </td><td> ' . ' ' . ucwords(@$recordset_pre11['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre12['subject']) . ' </td><td> ' . ' ' . ucwords(@$recordset_pre12['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre13['subject']) . ' </td><td> ' . ' ' . ucwords(@$recordset_pre13['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre14['subject']) . '</td><td> ' . ' ' . ucwords(@$recordset_pre14['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre15['subject']) . '</td><td> ' . ' ' . ucwords(@$recordset_pre15['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre16['subject']) . '</td><td> ' . ' ' . ucwords(@$recordset_pre16['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre17['subject']) . '</td><td> ' . ' ' . ucwords(@$recordset_pre17['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre18['subject']) . ' </td><td> ' . ' ' . ucwords(@$recordset_pre18['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre19['subject']) . ' </td><td> ' . ' ' . ucwords(@$recordset_pre19['grade']) . '</td></tr>';
                        } elseif ($recordset_pre && ($recordset_pre['sitting_id'] == 1)) {
                            // $sn  = 1;

                            echo '<tr>';
                            echo '<tr><td><strong>' . ucwords(@$recordset_pre['sitting']) . '</strong></td>';
                            echo '<td colspan="2"> <strong>Exam Type:</strong> ' . ucwords(@$recordset_pre['exam_type']) . '</td>';
                            echo '<td colspan="1"> <strong>Exam Year:</strong> ' . ucwords(@$recordset_pre['exam_year']) . ' </td>';
                            echo '<td colspan="2"> <strong>Exam Number:</strong> ' . ucwords(@$recordset_pre['exam_no']) . ' </td><td colspan="1"><strong>Subject</strong></td><td colspan="2"><strong>Grade</strong></td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre['subject']) . ' </td><td> ' . ' ' . ucwords(@$recordset_pre['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre2['subject']) . ' </td><td> ' . ' ' . ucwords(@$recordset_pre2['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre3['subject']) . ' </td><td> ' . ' ' . ucwords(@$recordset_pre3['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre4['subject']) . '</td><td> ' . ' ' . ucwords(@$recordset_pre4['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre5['subject']) . '</td><td> ' . ' ' . ucwords(@$recordset_pre5['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre6['subject']) . '</td><td> ' . ' ' . ucwords(@$recordset_pre6['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre7['subject']) . '</td><td> ' . ' ' . ucwords(@$recordset_pre7['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre8['subject']) . ' </td><td> ' . ' ' . ucwords(@$recordset_pre8['grade']) . '</td></tr>';
                            echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre9['subject']) . ' </td><td> ' . ' ' . ucwords(@$recordset_pre9['grade']) . '</td></tr>';
                        }
                        ?>

                        <tr>
                            <td colspan="12">NUMBER OF THE SUBJECTS PASSED AT CREDIT LEVEL: <span style="font-size: 15px;"><strong> <?php if ($recordset_pre11 && ($recordset_pre11['sitting_id'] == 2) && ($recordset_pre['sitting_id'] == 1)) {
                                                                                                                                        echo (@$recordset_pre9['no_of_credit_passes'] + @$recordset_pre19['no_of_credit_passes']);
                                                                                                                                    } elseif ($recordset_pre11 && ($recordset_pre11['sitting_id'] == 2)) {
                                                                                                                                        echo  @$recordset_pre19['no_of_credit_passes'];
                                                                                                                                    } elseif ($recordset_pre && ($recordset_pre['sitting_id'] == 1)) {
                                                                                                                                        echo @$recordset_pre9['no_of_credit_passes'];
                                                                                                                                    } else {
                                                                                                                                        echo 'NIL';
                                                                                                                                    } ?></strong></span> </td>
                        </tr>
                        <tr>
                            <td colspan="12">NUMBER OF SITTINGS:<span style="font-size: 15px;"><strong> <?php if ($recordset_pre11 && ($recordset_pre11['sitting_id'] == 2) && ($recordset_pre['sitting_id'] == 1)) {
                                                                                                            echo 'Two';
                                                                                                        } else {
                                                                                                            if (($recordset_pre && ($recordset_pre['sitting_id'] == 1) or ($recordset_pre11 && ($recordset_pre11['sitting_id'] == 2)))) {
                                                                                                                echo 'One';
                                                                                                            }
                                                                                                        } ?></strong></span> </td>
                        </tr>
                        <tr>
                            <td colspan="6">UTME EXAM NO:<span style="font-size: 15px;"><strong> <?php if ($recordset_jamb) {
                                                                                                        echo @$recordset_jamb['exam_no'];
                                                                                                    } else {
                                                                                                        echo 'N/A';
                                                                                                    } ?></strong></span> </td>
                            <td colspan="6">UTME SCORE:<span style="font-size: 15px;"><strong> <?php if ($recordset_jamb) {
                                                                                                    echo @$recordset_jamb['jamb_score'];
                                                                                                } else {
                                                                                                    echo 'N/A';
                                                                                                } ?></strong></span> </td>
                        </tr>


                        <tr>
                            <td colspan="12">
                                <h3 align="left" style="font-size: 14px;"><strong>5. Additional Qualifications</strong></h3>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="4">Institution Attended</th>
                            <th colspan="2">Qualification</th>
                            <th colspan="2">Grade</th>
                            <th colspan="2">Period <br />(From-To)</th>
                        </tr>
                        <?php $sn = 1;
                        do {
                            echo '<tr><td colspan="4"><strong>' . $sn++ . '.  ' . '</strong><span style="text-transform: capitalize;">' . @$recordset_add['institution'] . '</span></td><td colspan="2"> <span style="text-transform: capitalize">' . @$recordset_add['qualification'] . '</span></strong></td><td colspan="2"> <span style="text-transform: capitalize">' . @$recordset_add['grade'] . '</span></strong></td><td colspan="2"> <span style="text-transform: capitalize">' . @$recordset_add['yfrom'] . '-' . @$recordset_add['yto'] . '</span></strong></td></tr>';
                            // echo '<tr><td colspan="12"></td></tr>';
                        } while (@$recordset_add = mysqli_fetch_assoc($result_addqual))
                        ?>
                    </tbody>

                </table>


            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h3 align="left" style="font-size: 14px;"><strong>6. DECLARATION</strong></h3>

                <p> a) &nbsp;I, &nbsp; <span style="font-size: 20px; word-spacing: 5px; text-decoration: underline"><strong><?php echo @$result_bio['bsurname'] . ' ' . @$result_bio['bfirstname'] . ' ' . @$result_bio['bothername'] ?></strong></span> declare that all the information given in this form is to the best of my knowledge and belief correct.</p>
                <p> b) &nbsp;I further declare that any false or incomplete information given in this form WILL AUTOMATICALLY disqualify me from being considered for admission or continuing with my course of study </p>
                <p> c) &nbsp;I shall accept as final, the decision of the School Management with regard to any examination center and course of study.</p>
            </div>
        </div>

        <table align="center" style="border-spacing: 20px;
             border-collapse: separate;">
            <tr>
                <td colspan="4" style="padding-right: 20px;">..........................................................</td>
                <td></td>
                <td colspan="4">......................................................</td>
            </tr>
            <tr>
                <td colspan="4" align="center">Applicant's Signature</td>
                <td></td>
                <td colspan="4" align="center">Date</td>
            </tr>
        </table>

        <h4 align="left" style="font-size: 14px; padding-top: 10px;"><strong>Please Note:</strong></h4>
        <p>Only the following categories of people can complete <strong>Referee Section</strong> of the form i.e Clergy, Imam, Justice of Peace (JP), Lawyer, Civil Servant, from Grade Level 12 and above.</p>


        <div class="row" style="margin-top: 10px;">
            <div class="col-lg-12">
                <h3 align="left" style="font-size: 14px;"><strong>7. ATTESTATION</strong></h3>
                <p>I hereby confirm that this applicant is personally known me. The information supplied in his/her form is to the best of my knowledge. The attached photograph endorse by me is a true resemblance of the applicant.</p>

                <p> Full Name (Mr., Mrs, Chief, Dr., Prof., Pst. Rev., Imam): <span style="font-size: 20px; word-spacing: 5px; text-decoration: underline"><strong><?php echo @$result_ref['rsurname'] . ' ' . @$result_ref['rfirstname']; ?></strong></span></p>
                <p> Contact Address: <span style="font-size: 20px; word-spacing: 5px; text-decoration: underline"><strong><?php echo @$result_ref['rcontact_add'] ?></strong></span> </p>
                <p> Occupation/Post Held: <span style="font-size: 20px; word-spacing: 5px; text-decoration: underline"><strong><?php echo @$result_ref['roccupation'] ?></strong></span></p>


            </div>
        </div>

        <table align="center" style="border-spacing: 20px;
             border-collapse: separate;">
            <tr>
                <td colspan="4" style="padding-right: 20px;">..........................................................</td>
                <td></td>
                <td colspan="4">......................................................</td>
            </tr>
            <tr>
                <td colspan="4" align="center">Signature</td>
                <td></td>
                <td colspan="4" align="center">Date</td>
            </tr>
        </table>


        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-4 col-md-offset-2">
                <h4 align="left" style="padding-bottom: -5px;"><strong>FOR OFFICIAL USE ONLY</strong></h4>
                <table class="table table-bordered">
                    <tr>
                        <td>SCORE IN THE ENTRANCE EXAMINATION</td>
                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                    <tr>
                        <td>SCORE AT INTERVIEW LEVEL</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3">INTERVIEWER'S COMMENT: </td>
                    </tr>
                    <tr>
                        <td>SELECTED</td>
                        <td></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </tr>
                    <tr>
                        <td>NOT SELECTED</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>

                </table>

            </div>
        </div>


        <br /><br /><br /><br /><br /><br />








</body>

</html>