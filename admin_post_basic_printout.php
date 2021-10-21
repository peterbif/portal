<?php
session_start();
//require ('time_out.php');
//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();


@$_SESSION['user'];

$id = $_GET['id'] ;// or $id =  @$_SESSION['id'];



    //
    @$query_pin = $db->selectPinNOPosition2($id);
    @$record_pin= mysqli_fetch_assoc($query_pin);

    //school
    @$result_res2 = $db->selectSchool2($record_pin['pin_no_id']);
    @$record_res2 = mysqli_fetch_assoc($result_res2);


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


    @$result_wk = $db->selectWorkExperience(@$record_pin['pin_no_id']);
    @$recordset_wk = mysqli_fetch_assoc($result_wk);

    @$query_edup = $db->selectEducationp($record_pin['pin_no_id']);
    @$recordset_edup = mysqli_fetch_assoc($query_edup);


    @$result_ref = $db->selectREF($record_pin['pin_no_id']);
    @$recordset_ref = mysqli_fetch_assoc($result_ref);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php require ('title.php');?></title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css' media="screen, print">

    <link rel="stylesheet" href="css/animate.css" media="screen, print">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style2.css" media="screen, print">
    <link rel="stylesheet" href="css/font-awesome.css">

    <link rel="stylesheet" href="css/3.3.7bootstrap.min.css" media="screen, print">


    <script src="js/3.3.7bootstrap.min.js.js"></script>

    <script src="js/3.2.1jquery.min.js.js"></script>

    <script src="js/slide.js"></script>


    <script src="js/jquery.min.js"></script>

    <style>

        td{

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
        }



    </style>


</head>



<body>
<div class="container-fluid">



    <div class="row">
        <div class="col-lg-12 showResult">

            <table class="table table-bordered" id="myTable">
                <tbody>
                <tr><td colspan="12" style="background-color: #000000"> <h6  style="color: #ffffff; font-size: 17px; text-align: center;">APPLICATION FORM FOR ENTRY INTO THE <?php echo  @$record_res2['school'] ;?>  <br /><br /><span>UNIVERSITY COLLEGE HOSPITAL, IBADAN</span></td></tr>

                <tr style="border-collapse: collapse;"><td id="form_no"  align="center" colspan="1"><span style="font-size: 16px;">FORM NO</span> <br /><br /><span style="font-size: 20px; font-weight: bolder"><?php echo @$record_res2['code']; ?></span></td><td colspan="6" align="center" style="border-right: 0px"><img  src="uploads/<?php echo @$result_logo['logo'];?>" class="img-rounded" width="120px" height="100px" /></td> <td colspan="5"><img  align="right" src="uploads/<?php echo @$result_pass['capture'];?>" class="img-rounded" width="120px" height="100px" /></span></td></tr>

                <tr><td colspan="12"><span style="font-size: 15px; font-weight: bolder;">Importance Notice</span><br/> <span style="text-transform: none">The Course is for a period of three years after which candidates will be presented for both Hospital Final Examination and the Nursing and Midwifery Council of Nigeria Final Examination to qualify as a General Nurse and be eligible to become a Registered Nurse (RN).</span> </td></tr>

                <tr><td colspan="12"><h3 align="left"  style="font-size: 14px;"><strong>1. PERSONAL DATA</strong></h3></td></tr>
                <tr><td colspan="12">SURNAME: <strong><?php echo @$result_bio['bsurname']?></strong></td></tr>
                <tr> <td colspan="5">FIRST NAME: <strong><?php echo  @$result_bio['bfirstname'];?></strong></td><td colspan="4">Othername: <strong><?php echo @$result_bio['bothername'];?></strong></td></tr>
                <tr><td colspan="5">GENDER: <strong><span style="text-transform: capitalize"><?php echo @$result_bio['gender'];?></span></strong></td><td colspan="4">Marital Status: <strong><span style="text-transform: capitalize"><?php echo @$result_bio['status'];?></span></strong></td></tr>
                <tr><td colspan="5">MAIDEN NAME: <strong><span style="text-transform: capitalize"><?php echo @$result_bio['maiden_name'];?></span></strong></td><td colspan="4">Date of Birth: <strong><span style="text-transform: capitalize"><?php echo date('d-m-Y', strtotime(@$result_bio['date_of_birth']));?></span></strong></td></tr>
                <tr><td colspan="5">AGE: <strong><span style="text-transform: capitalize"><?php   @$age =  $db->age($result_bio['date_of_birth']); echo @$age.'yrs';?></span></strong></td><td colspan="4">Religion: <strong><span style="text-transform: capitalize"><?php echo @$result_bio['religion'];?></span></strong></td></tr>
                <tr><td colspan="5">Country: <strong><span style="text-transform: capitalize"><?php echo @$result_per['country'];?></span></strong></td><td colspan="4">State of Origin:  <strong><span style="text-transform: capitalize"><?php echo @$result_per['state_name'];?></span></strong></td></tr>
                <tr><td colspan="12">Local Govt Area Of Origin:  <strong><span style="text-transform: capitalize"><?php echo @$result_per['lg_name'];?></span></strong></td></tr>
                <tr><td colspan="12">PERMANENT ADDRESS: (HOME)  <strong><span style="text-transform: capitalize"><?php echo @$result_per['street_add'];?></span></strong></td></tr>
                <tr><td colspan="12"></td></tr>
                <tr><td colspan="12">POSTAL ADDRESS:   <strong><span style="text-transform: capitalize"><?php echo @$result_con['street_add2'];?></span></strong></td></tr>
                <tr> <td colspan="4">EMAIL ADDRESS: <strong><?php echo  @$record_pin['email'];?></strong></td><td colspan="5">PHONE NO: <strong><?php echo @$record_pin['phone_no'];?></strong></td></tr>

                <tr><td colspan="12"><h3 align="left"  style="font-size: 14px;"><strong>2. OTHER PERSONAL DETAILS</strong></h3></td></tr>
                <tr><td colspan="12">NAME AND ADDRESS OF PARENTS/GUARDIAN/NEXT OF KIN:  <strong><span style="text-transform: capitalize"><?php echo @$result_nok['nsurname']. ' '. @$result_nok['nfirstname']. ' / '. @$result_nok['ncontact_add'] ;?></span></strong></td></tr>
                <tr><td colspan="12">NAME AND ADDRESS OF SPONSOR: <strong><span style="text-transform: capitalize"><?php if($result_spon) {echo @$result_spon['ssurname']. ' '. @$result_spon['sfirstname']. ' / '. @$result_spon['scontact_add'];}?></span></strong></td></tr>
                <tr><td colspan="12">HOBBIES: <strong><span style="text-transform: lowercase"><?php echo  @$result_bio['hobby']?></span></strong></td></tr>

                <!-- <tr><td colspan="12"><h3 align="left"  style="font-size: 14px;"><strong>3. ACADEMIC RECORDS</strong></h3></td></tr>

                <tr><th colspan="5">Institution Attended with Dates(From Primary School)</th><th colspan="2">Period <br /> (From-To)</th><th colspan="2">Qualification Obtained</th></tr>
                <?php $sn = 1; do{
                    echo '<tr><td colspan="5"><strong>'.$sn++. '.  ' . '</strong><span style="text-transform: capitalize;">'. @$result_edu['school_name'].'</span></td><td colspan="2"> <span style="text-transform: capitalize">'. @$result_edu['yearf']. '-'. @$result_edu['yeart']. '</span></strong></td><td colspan="2"> <span style="text-transform: capitalize">'. @$result_edu['equalification']. '</span></strong></td></tr>';
                    // echo '<tr><td colspan="12"></td></tr>';
                }while(@$result_edu = mysqli_fetch_assoc($query_edu))
                ?>-->

                <tr><th colspan="12"><h3 align="left"  style="font-size: 14px;"><strong>4. EXAMINATION(S) PASSED OR ENTERED FOR <br /> <br />(Photo Copies of Certificates; Statemnets of Results Obtained must be enclosed)</strong></h3></th></tr>


                <?php  if($recordset_pre11 && ($recordset_pre11['sitting_id'] == 2) && ($recordset_pre['sitting_id'] == 1) ){


                    echo '<tr>';
                    echo'<tr><td><strong>' . ucwords(@$recordset_pre['sitting']) . '</strong></td>';
                    echo '<td colspan="2"> <strong>Exam Type:</strong> ' . ucwords(@$recordset_pre['exam_type']) . '</td>';
                    echo '<td colspan="1"> <strong>Exam Year:</strong> ' . ucwords(@$recordset_pre['exam_year']) . ' </td>';
                    echo '<td colspan="2"> <strong>Exam Number:</strong> ' . ucwords(@$recordset_pre['exam_no']) . ' </td><td colspan="1"><strong>Subject</strong></td><td colspan="2"><strong>Grade</strong></td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre['subject']) . ' </td><td> '.' '.ucwords(@$recordset_pre['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre2['subject']) . ' </td><td> '.' '.ucwords(@$recordset_pre2['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre3['subject']) . ' </td><td> '.' '.ucwords(@$recordset_pre3['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre4['subject']) . '</td><td> '.' '.ucwords(@$recordset_pre4['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre5['subject']) . '</td><td> '.' '.ucwords(@$recordset_pre5['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre6['subject']) . '</td><td> '.' '.ucwords(@$recordset_pre6['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre7['subject']) . '</td><td> '.' '.ucwords(@$recordset_pre7['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre8['subject']) . ' </td><td> '.' '.ucwords(@$recordset_pre8['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre9['subject']) . ' </td><td> '.' '.ucwords(@$recordset_pre9['grade']).'</td></tr>';


                    echo '<tr><td colspan="12"></td></tr>';

                    echo'<tr><td><strong>' . ucwords(@$recordset_pre11['sitting']) . '</strong></td>';
                    echo '<td colspan="2"> <strong>Exam Type:</strong> ' . ucwords(@$recordset_pre11['exam_type']) . '</td>';
                    echo '<td colspan="1"> <strong>Exam Year:</strong> ' . ucwords(@$recordset_pre11['exam_year']) . ' </td>';
                    echo '<td colspan="2"> <strong>Exam Number:</strong> ' . ucwords(@$recordset_pre11['exam_no']) . ' </td><td colspan="1"><strong>Subject</strong></td><td colspan="2"><strong>Grade</strong></td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre11['subject']) . ' </td><td> '.' '.ucwords(@$recordset_pre11['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre12['subject']) . ' </td><td> '.' '.ucwords(@$recordset_pre12['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre13['subject']) . ' </td><td> '.' '.ucwords(@$recordset_pre13['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre14['subject']) . '</td><td> '.' '.ucwords(@$recordset_pre14['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre15['subject']) . '</td><td> '.' '.ucwords(@$recordset_pre15['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre16['subject']) . '</td><td> '.' '.ucwords(@$recordset_pre16['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre17['subject']) . '</td><td> '.' '.ucwords(@$recordset_pre17['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre18['subject']) . ' </td><td> '.' '.ucwords(@$recordset_pre18['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre19['subject']) . ' </td><td> '.' '.ucwords(@$recordset_pre19['grade']).'</td></tr>';




                }


                elseif($recordset_pre11 && ($recordset_pre11['sitting_id'] == 2)){


                    echo '<tr>';
                    echo'<tr><td><strong>' . ucwords(@$recordset_pre11['sitting']) . '</strong></td>';
                    echo '<td colspan="2"> <strong>Exam Type:</strong> ' . ucwords(@$recordset_pre11['exam_type']) . '</td>';
                    echo '<td colspan="1"> <strong>Exam Year:</strong> ' . ucwords(@$recordset_pre11['exam_year']) . ' </td>';
                    echo '<td colspan="2"> <strong>Exam Number:</strong> ' . ucwords(@$recordset_pre11['exam_no']) . ' </td><td colspan="1"><strong>Subject</strong></td><td colspan="2"><strong>Grade</strong></td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre11['subject']) . ' </td><td> '.' '.ucwords(@$recordset_pre11['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre12['subject']) . ' </td><td> '.' '.ucwords(@$recordset_pre12['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre13['subject']) . ' </td><td> '.' '.ucwords(@$recordset_pre13['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre14['subject']) . '</td><td> '.' '.ucwords(@$recordset_pre14['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre15['subject']) . '</td><td> '.' '.ucwords(@$recordset_pre15['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre16['subject']) . '</td><td> '.' '.ucwords(@$recordset_pre16['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre17['subject']) . '</td><td> '.' '.ucwords(@$recordset_pre17['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre18['subject']) . ' </td><td> '.' '.ucwords(@$recordset_pre18['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre19['subject']) . ' </td><td> '.' '.ucwords(@$recordset_pre19['grade']).'</td></tr>';




                }


                elseif ($recordset_pre && ($recordset_pre['sitting_id'] == 1)){
                    // $sn  = 1;

                    echo '<tr>';
                    echo'<tr><td><strong>' . ucwords(@$recordset_pre['sitting']) . '</strong></td>';
                    echo '<td colspan="2"> <strong>Exam Type:</strong> ' . ucwords(@$recordset_pre['exam_type']) . '</td>';
                    echo '<td colspan="1"> <strong>Exam Year:</strong> ' . ucwords(@$recordset_pre['exam_year']) . ' </td>';
                    echo '<td colspan="2"> <strong>Exam Number:</strong> ' . ucwords(@$recordset_pre['exam_no']) . ' </td><td colspan="1"><strong>Subject</strong></td><td colspan="2"><strong>Grade</strong></td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre['subject']) . ' </td><td> '.' '.ucwords(@$recordset_pre['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre2['subject']) . ' </td><td> '.' '.ucwords(@$recordset_pre2['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre3['subject']) . ' </td><td> '.' '.ucwords(@$recordset_pre3['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre4['subject']) . '</td><td> '.' '.ucwords(@$recordset_pre4['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre5['subject']) . '</td><td> '.' '.ucwords(@$recordset_pre5['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre6['subject']) . '</td><td> '.' '.ucwords(@$recordset_pre6['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre7['subject']) . '</td><td> '.' '.ucwords(@$recordset_pre7['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre8['subject']) . ' </td><td> '.' '.ucwords(@$recordset_pre8['grade']).'</td></tr>';
                    echo '<tr><td colspan="6"></td><td>' . ucwords(@$recordset_pre9['subject']) . ' </td><td> '.' '.ucwords(@$recordset_pre9['grade']).'</td></tr>';


                }
                ?>

                <tr><td colspan="12">NUMBER OF THE SUBJECTS PASSED AT CREDIT LEVEL:     </td></tr>
                <tr><td colspan="12">NUMBER OF SITTINGS:<span style="font-size: 15px;"><strong> <?php  if($recordset_pre11 && ($recordset_pre11['sitting_id'] == 2) && ($recordset_pre['sitting_id'] == 1) ){echo 'Two';} else{ if(($recordset_pre && ($recordset_pre['sitting_id'] == 1) or ($recordset_pre11 && ($recordset_pre11['sitting_id'] == 2))) ){echo 'One';}}?></strong></span> </td></tr>

                <tr><th colspan="12"><h3 align="left"  style="font-size: 14px;"><strong>5. PROFESSIONAL TRAINING</strong></h3></th></tr>
                <tr><th colspan="2">Institution</th><th colspan="2">Course</th><th colspan="1">Qualification</th><th colspan="1">Reg. No</th><th colspan="1">Year(From)</th><th colspan="1">Year(To)</th></tr>
                <?php
                $sn = 1;
                do{
                    echo'<tr><td colspan="2"><strong><span style="text-transform: capitalize">'.$sn++.'.   ' .@$recordset_edup['school_name']. '</span></strong></td><td colspan="2"> <strong><span style="text-transform: capitalize">' .@$recordset_edup['ecourse']. '</span></strong></td><td colspan="1"> <strong><span style="text-transform: capitalize">' .@$recordset_edup['equalification']. '</span></strong></td><td colspan="1> <strong><span style="text-transform: capitalize">' .@$recordset_edup['reg_no']. '</span></strong></td>'.
                        '<td colspan="1"> <strong><span style="text-transform: capitalize">' .@$recordset_edup['yearf']. '</span></strong></td><td colspan="1"><strong><span style="text-transform: capitalize">' . @$recordset_edup['yeart'] . '</span></strong></td></tr>';
                }while(@$recordset_edup = mysqli_fetch_assoc($query_edup)); ?>


                <tr><th colspan="12"><h3 align="left"  style="font-size: 14px;"><strong>6. WORK EXPERIENCE(S)</strong></h3></th></tr>
                <tr><th colspan="4">Establishmen</th><th colspan="2">Position</th><th colspan="1">Year(From)</th><th colspan="1">Year(To)</th></tr>
                <?php
                $sn = 1;
                do{
                    echo '<tr><td colspan="4"><strong><span style="text-transform: capitalize">'.$sn++.'.   ' .@$recordset_wk['establishment']. '</span></strong></td><td colspan="2"> <strong><span style="text-transform: capitalize">' .@$recordset_wk['position']. '</span></strong></td>'.
                        '<td colspan="1"> <strong><span style="text-transform: capitalize">' .@$recordset_wk['yearfw']. '</span></strong></td><td colspan="1"><strong><span style="text-transform: capitalize">' . date('d-m-Y', strtotime(@$recordset_wk['yeartw'])) . '</span></strong></td></tr>';
                }while(@$recordset_wk = mysqli_fetch_assoc($result_wk)); ?>

                <tr><th colspan="12"><h3 align="left"  style="font-size: 14px;"><strong>7. REFEREES  (3 Referees must be one of your teachers, a hospital matron you worked with and any other)</strong></h3></th></tr>
                <tr><th colspan="1">Surname</th><th colspan="1">First name</th><th colspan="3">Contact Address</th><th colspan="1">Occupation/Position</th><th colspan="1">Email</th><th colspan="1">Phone NO</th></tr>
                <?php
                $sn = 1;
                do{
                    echo'<tr><td colspan="1"><strong><span style="text-transform: capitalize">'.$sn++.'.   ' .@$recordset_ref['rsurname']. '</span></strong></td><td colspan="1"> <strong><span style="text-transform: capitalize">' .@$recordset_ref['rfirstname']. '</span></strong></td><td colspan="3"> <strong><span style="text-transform: capitalize">' .@$recordset_ref['rcontact_add']. '</span></strong></td><td colspan="1> <strong><span style="text-transform: capitalize">' .@$recordset_ref['roccupation']. '</span></strong></td>'.
                        '<td colspan="1"> <strong><span style="text-transform: capitalize">' .@$recordset_ref['remail']. '</span></strong></td><td colspan="1"><strong><span style="text-transform: capitalize">' . @$recordset_ref['rphone_no'] . '</span></strong></td></tr>';
                }while(@$recordset_ref = mysqli_fetch_assoc($result_ref)); ?>


                </tbody>

            </table>


        </div>
    </div>






    <div class="row">
        <div class="col-lg-12">
            <h3 align="left"  style="font-size: 14px;"><strong>8. ATTESTATION</strong></h3>

            <p>  &nbsp;I, &nbsp; <span style="font-size: 20px; word-spacing: 5px; text-decoration: underline"><strong><?php echo @$result_bio['bsurname'] .' '. @$result_bio['bfirstname']. ' '.@$result_bio['bothername'] ?></strong></span> attest that the information provided in this form is true and correct.</p>
            <p>  &nbsp;I further declare that any false or incomplete information given in this form WILL AUTOMATICALLY disqualify me from being considered for admission or continuing with my course of study </p>




            <p style="text-align: center; padding-top: 10px;">
                .......................................................... &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.............................................<br/>
                Applicant's Signature&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date
            </p>
        </div>
    </div>





    <div class="row" style="margin-top: 30px;">
        <div class="col-lg-4 col-md-offset-2">
            <h4 align="left" style="padding-bottom: -5px;"><strong>FOR OFFICIAL USE ONLY</strong></h4>
            <table class="table table-bordered">
                <tr><td>SCORE IN THE ENTRANCE EXAMINATION</td><td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
                <tr><td>SCORE AT INTERVIEW LEVEL</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
                <tr><td colspan="3">INTERVIEWER'S COMMENT: </td></tr>
                <tr><td>SELECTED</td><td></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</tr>
                <tr><td>NOT SELECTED</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>

            </table>

        </div>
    </div>





</body>

</html>

<div class="row">
    <div class="col-lg-12">
        <div align="right">
            <button class="button" onclick="print_page()" ><i class="fa fa-print"></i> Print</button>
        </div>
    </div>
</div><br/><br /><br/><br /><br/><br />








</body>

</html>