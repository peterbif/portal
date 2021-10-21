<?php
session_start();

require ('time_out.php');

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();


@$_SESSION['user'];




    //
    @$query_pin = $db->selectPinNOPosition(@$_SESSION['user']);
    @$record_pin= mysqli_fetch_assoc($query_pin);


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
                <tr><td colspan="12" style="background-color: #000000" align="center"> <span  style="color: #ffffff; font-size: 20px; text-align: center;"> <?php echo  @$record_res2['school'] ;?>  <br /><span style="font-size: 17px">UNIVERSITY COLLEGE HOSPITAL <br /> IBADAN, NIGERIA</span></td></tr>

                <tr style="border-collapse: collapse;"><td colspan="3" align="left" style="border-right: 0px"><img  src="uploads/<?php echo @$result_logo['logo'];?>" class="img-rounded" width="120px" height="100px" /></td><td id="form_no"  align="center" colspan="2"><span style="font-size: 16px;">FORM NO</span> <br /><br /><span style="font-size: 20px; font-weight: bolder"><?php echo @$record_res2['code']; ?></span></td> <td colspan="3"><img  align="right" src="uploads/<?php echo @$result_pass['capture'];?>" class="img-rounded" width="120px" height="100px" /></span></td></tr>

                <tr><td colspan="12" align="center"><span style="font-size: 15px; font-weight: bolder;">ENTRANCE EXAMINATION / INTERVIEW ADMISSION CARD</span><br/><span style="font-size: 12px;text-transform: none">Bring this card to the examination and interview venues</span> </td></tr>

                <tr><td colspan="2">SURNAME: <strong><?php echo @$result_bio['bsurname']?></strong></td><td colspan="2">FIRST NAME: <strong><?php echo  @$result_bio['bfirstname'];?></strong></td><td colspan="2">Othername: <strong><?php echo @$result_bio['bothername'];?></strong></td><td colspan="2">MAIDEN NAME: <strong><span style="text-transform: capitalize"><?php echo @$result_bio['maiden_name'];?></span></strong></td></tr>
                <tr><td colspan="4">SEX: <strong><span style="text-transform: capitalize"><?php echo @$result_bio['gender'];?></span></strong></td><td colspan="2">AGE: <strong><span style="text-transform: capitalize"><?php   @$age =  $db->age($result_bio['date_of_birth']); echo @$age.'yrs';?></span></strong></td><td colspan="3">PHONE NO: <strong><?php echo @$record_pin['phone_no'];?></strong></td></tr>
                <tr><td colspan="12">POSTAL/CONTACT ADDRESS:   <strong><span style="text-transform: capitalize"><?php echo @$result_con['street_add2'];?></span></strong></td></tr>
                <tr> <td colspan="12">EMAIL ADDRESS: <strong><span style="text-transform: lowercase"><?php echo  @$record_pin['email'];?></span></strong></td></tr>
                <tr><td colspan="6">CANDIDATE'S SIGNATURE: <strong><span style="text-transform: capitalize"></span></strong></td><td colspan="4">DATE: <strong><span style="text-transform: capitalize"></span></strong></td></tr>
                <tr><td colspan="2">EXAMINATION DATE: <strong><span style="text-transform: capitalize"></span></strong></td><td colspan="2">TIME: <strong><span style="text-transform: capitalize"></span></strong></td><td colspan="6">EXAM. VENUE: <strong></strong></td></tr>

                </tbody>

            </table>

    <div class="row"">
        <div class="col-lg-12">

            <p style="padding-top: 50px;" align="center">
                .................................................................................................... <br/>
               Coordinator's/Chairman's Signature/Stamp
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