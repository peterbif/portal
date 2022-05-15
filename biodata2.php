<?php
require_once("connection.php");
session_start();
require ('time_out.php');

@$_SESSION['user'];

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();

//query gender table
@$result_ge = $db->selectGender();
@$record_ge = mysqli_fetch_assoc($result_ge);

//query marital Status table
@$result_ma = $db->selectMaritalStatus();
@$record_ma = mysqli_fetch_assoc($result_ma);

//query marital Status table
@$result_ma = $db->selectMaritalStatus();
@$record_ma = mysqli_fetch_assoc($result_ma);




    @$result_pin = $db->selectPinNO2($_SESSION['user']);
    @$record_pin = mysqli_fetch_assoc($result_pin);

    @$result_bio = $db->selectBioData(@$record_pin['pin_no_id']);
    @$record_bio = mysqli_fetch_assoc($result_bio);


    @$surname = ucwords($_POST['bsurname']) or @$surname = ucwords($record_bio['bsurname']);
    @$firstname = ucwords($_POST['bfirstname']) or  @$firstname = ucwords($record_bio['bfirstname']);
    @$othername = ucwords($_POST['bothername']) or  @$othername = ucwords($record_bio['bothername']);
    @$dob = $_POST['dob'] or @$dob = $record_bio['date_of_birth'];
    @$gender = $_POST['gender'] or @$gender = $record_bio['gender'];
    @$marital = $_POST['marital_status'] or @$marital = $record_bio['marital_status'];
    @$maiden  = $_POST['maiden'] or  @$maiden = $record_bio['maiden_name'];

    @$applicant = $record_pin['pin_no_id'];

    if(isset($_POST['submit'])){


        if(@$record_pin){
            $query = "INSERT INTO bio_data(bsurname, bfirstname, bothername, maiden_name, date_of_birth, bgender, marital_status, applicant_id) VALUES('{$surname}', '{$firstname}', '{$othername}', '{$maiden}', '{$dob}', '{$gender}', '{$marital}', '{$applicant}')";
            $db->insert($query);
            echo '<script type="text/javascript"> alert("Click and fill next form : Permanent Address") </script>';

        }
    }

    if(isset($_POST['update_bio'])) {

        if(@$record_bio) {
            $query1 = "UPDATE bio_data SET bsurname = '{$surname}', bfirstname = '{$firstname}', bothername = '{$othername}', maiden_name = '{$maiden}', date_of_birth = '{$dob}', bgender = '{$gender}', marital_status = '{$marital}' WHERE applicant_id = '{$applicant}'";
            $db->update($query1);

        }


    }

    //permanent modal
    @$result_sen = $db->selectSenateDistrict();
    @$record_sen = mysqli_fetch_assoc($result_sen);

    @$result_cou = $db->selectCountry();
    @$record_cou = mysqli_fetch_assoc($result_cou);

//query state table
    @$results = $db->selectState();
    @$recordset = mysqli_fetch_assoc($results);

    //query permanent_add  table
    @$result_per = $db->selectPermanentAdd($record_pin['pin_no_id']);
    @$recordset_per = mysqli_fetch_assoc($result_per);


    @$street_add = ucwords($_POST['street_add']) or @$street_add = ucwords($recordset_per['street_add']);
    @$home_town = ucwords($_POST['home_town']) or @$home_town = ucwords($recordset_per['home_town']);
    @$senate = $_POST['senate'];
    @$lg = $_POST['lg'];
    @$state = $_POST['state'];
    @$nation = $_POST['nation'];
    @$applicant = $record_pin['pin_no_id'];

    if(isset($_POST['submit_per'])){
        if(@$record_pin) {
            $query_per = "INSERT INTO permanent_add (street_add, home_town, senatorial_district, lg_of_origin, state_of_origin, nationality, applicant_id) VALUES ('{$street_add}', '{$home_town}', '{$senate}', '{$lg}', '{$state}', '{$nation}', '{$applicant}')";
            $db->insert($query_per);
            echo '<script type="text/javascript"> alert("Click and fill next form : Contact Address") </script>';
        }

    }

    if(isset($_POST['update_per'])){
        if(@$recordset_per) {
            $query_per = "UPDATE permanent_add SET street_add = '{$street_add}', home_town = '{$home_town}', senatorial_district = '{$senate}', lg_of_origin = '{$lg}', state_of_origin = '{$state}', nationality = '{$nation}' WHERE applicant_id = '{$applicant}'";
            $db->update($query_per);
        }

    }



    //contact modal
    //query permanent_add  table
    @$result_con = $db->selectContactAdd($record_pin['pin_no_id']);
    @$recordset_con = mysqli_fetch_assoc($result_con);


    @$street_add2 = ucwords($_POST['street_add2']) or @$street_add2 = ucwords($recordset_con['street_add2']);
    @$city = ucwords($_POST['city']) or @$city = ucwords($recordset_con['city']);
    @$lg2 = $_POST['lg2'];
    @$state2 = $_POST['state2'];
    @$applicant = $record_pin['pin_no_id'];

    if(isset($_POST['submit_con'])) {

        if($record_pin){
            $query_con = "INSERT INTO contact_add(street_add2, city, lg_of_origin, state_of_origin, applicant_id) VALUES ('{$street_add2}', '{$city}', '{$lg2}', '{$state2}', '{$applicant}')";
            $db->insert($query_con);
            echo '<script type="text/javascript"> alert("Click and fill next form : Education") </script>';
        }
    }

    if(isset($_POST['update_con'])) {
        if (@$recordset_con) {
            $query_con = "UPDATE contact_add SET street_add2 = '{$street_add2}', city = '{$city}', lg_of_origin = '{$lg2}', state_of_origin = '{$state2}' WHERE applicant_id = '{$applicant}'";
            $db->update($query_con);

        }

    }
    //education modal
    //query qualification table
    $query_qua = $db->selectQualification2();
    $recordset_qua = mysqli_fetch_assoc($query_qua);


    $query_edu = $db->selectEducation($record_pin['pin_no_id']);
    $recordset_edu = mysqli_fetch_assoc($query_edu);

    @$school = ucwords($_POST['institution']) or @$school = ucwords($recordset_edu['school_name']);
    @$course = ucwords($_POST['course']) or  @$course = ucwords($recordset_edu['ecourse']);
    @$qual = $_POST['qualification'];
    @$date3 = ucwords($_POST['date3']) or @$date3 = ucwords($recordset_edu['edate']);
    @$applicant = $record_pin['pin_no_id'];

    if(isset($_POST['submit_edu'])) {
        if($record_pin) {
            $query_sch = "INSERT INTO education(school_name, ecourse, equalification, edate, applicant_id) VALUES ('{$school}', '{$course}', '{$qual}', '{$date3}', '{$applicant}')";
            $db->insert($query_sch);
            echo '<script type="text/javascript"> alert("Click and fill next form : Professional Training") </script>';
        }

    }



    //professional Training modal

    $query_pro = $db->selectProfessionalTraining($record_pin['pin_no_id']);
    $recordset_pro = mysqli_fetch_assoc($query_pro);

    @$school3 = ucwords($_POST['institution3']);
    @$course3 = ucwords($_POST['course3']);
    @$cert = $_POST['cert'];
    @$date4 = ucwords($_POST['date4']);
    @$applicant = $record_pin['pin_no_id'];

    if(isset($_POST['submit_pro'])) {
        if($record_pin) {
            $query_pro = "INSERT INTO professional_training (pschool_name, pcourse, pcertificate, pdate, applicant_id) VALUES ('{$school3}', '{$course3}', '{$cert}', '{$date4}', '{$applicant}')";
            $db->insert($query_pro);
            echo '<script type="text/javascript"> alert("Click and fill next form") </script>';
        }

    }

//award

    $query_awa = $db->selectAward($record_pin['pin_no_id']);
    $recordset_awa = mysqli_fetch_assoc($query_awa);

    if(isset($_POST['submit_awa'])) {




        $award = $_POST['award'];
        $scholarship = ucfirst($_POST['area']);
        if($record_pin) {
            $query_awa = "INSERT INTO awards(award, scholarship_details, applicant_id) VALUES ('{$award}','{$scholarship}', '{$applicant}')";
            $db->insert($query_awa);
        }

    }


//present appointment
    @$result_pre = $db->selectPresentAppointment($record_pin['pin_no_id']);
    @$recordset_pre = mysqli_fetch_assoc($result_pre);


    @$establishment = ucwords($_POST['estab']) or @$establishment = ucwords($recordset_pre['pestab']);
    @$address = ucwords($_POST['address']) or @$address = ucwords($recordset_pre['paddress']);
    @$dates = $_POST['dates'] or @$dates =  ucwords($recordset_pre['pdate']);
    @$present_salary = $_POST['salary'] or  @$present_salary =  ucwords($recordset_pre['psalary']);
    @$nature = $_POST['nature'] or @$nature =   ucwords($recordset_pre['pnature']);
    @$applicant = $record_pin['pin_no_id'];

    if(isset($_POST['submit_pre'])) {

        if($record_pin){
            $query_con = "INSERT INTO present_appointment(pestab, paddress, pdate, psalary, pnature, applicant_id) VALUES ('{$establishment}', '{$address}', '{$dates}', '{$present_salary}', '{$nature}', '{$applicant}')";
            $db->insert($query_con);
            echo '<script type="text/javascript"> alert("Click and fill next form : Previous Appointment") </script>';
        }
    }

    if(isset($_POST['update_pre'])){
        if (@$recordset_pre) {
            $query_con = "UPDATE present_appointment SET pestab = '{$establishment}', paddress = '{$address}', pdate = '{$dates}', psalary = '{$present_salary}', pnature = '{$nature}'  WHERE  applicant_id = '{$applicant}'";
            $db->update($query_con);

        }

    }



    //previous appointment

    @$establishment2 = ucwords($_POST['estab2']) or @$establishment2 = ucwords($recordset_pre['preestab']);
    @$address2 = ucwords($_POST['address2']) or @$address2 = ucwords($recordset_pre['preaddress']);
    @$dates2 = $_POST['dates2'] or @$dates2 =  ucwords($recordset_pre['predate']);
    @$present_salary2 = $_POST['salary2'] or  @$present_salary2 =  ucwords($recordset_pre['presalary']);
    @$nature2 = $_POST['nature2'] or @$nature2 =   ucwords($recordset_pre['prenature']);
    @$applicant2 = $record_pin['pin_no_id'];



    @$result_prev = $db->selectPreviousAppointment($record_pin['pin_no_id']);
    @$recordset_prev = mysqli_fetch_assoc($result_prev);

    if(isset($_POST['submit_prev'])) {



        if($record_pin){
            $query_con = "INSERT INTO previous_appointment(preestab, preaddress, predate, presalary, prenature, applicant_id) VALUES ('{$establishment2}', '{$address2}' , '{$dates2}', '{$present_salary2}', '{$nature2}', '{$applicant2}')";
            $db->insert($query_con);
        }
    }




//pass state into array


$query_st = "SELECT * FROM state ORDER BY state_name ASC";
$query_run_st = mysqli_query($conn, $query_st);
$recordset = mysqli_fetch_assoc($query_run_st);


$query_st2 = "SELECT * FROM state ORDER BY state_name ASC";
$query_run_st2 = mysqli_query($conn, $query_st2);
$recordset2 = mysqli_fetch_assoc($query_run_st2);


/*
$statelist = [];
$state_id = [];
$total = 0;

do{
    array_push($statelist, $recordset['state_name']);
    array_push($state_id, $recordset['state_id']);
    $total ++;
}
while($recordset = mysqli_fetch_assoc($query_run_st));

*/

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
    <link rel="stylesheet" href="css/style.css">


    <link rel="stylesheet" href="css/3.3.7bootstrap.min.css">

    <link rel="stylesheet" href="css/font-awesome.css">
    <script src="js/3.3.7bootstrap.min.js.js"></script>

    <script src="js/3.2.1jquery.min.js.js"></script>

    <script src="js/jquery.min.js"></script>

    <link rel="stylesheet" href="css/style2.css">
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function()
        {

            $(".state-control").change(function(){
                var url = "lg.php?id=" + this.value;
                $.get(url, function(data, status){
                    //console.log(data);
                    $(".lg-control").html(data);
                    //alert("Data: " + data + "\nStatus: " + status);
                });

            });

        });
    </script>


    <script type="text/javascript">
        $(document).ready(function()
        {

            $(".state-control2").change(function(){
                var url = "lg2.php?id=" + this.value;
                $.get(url, function(data, status){
                    //console.log(data);
                    $(".lg-control2").html(data);
                    //alert("Data: " + data + "\nStatus: " + status);
                });

                $("#lg").selectmenu();
                $("#lg2").selectmenu();
                $("#state").selectmenu();
                $("#state2").selectmenu();




            });
        });
    </script>

</head>



<body>
<div class="container-fluid">
    <div class="panel panel-danger">

        <?php require ('header.php');?>
        <div class="panel-body">

            <div class="col-lg-12 heading">
            Biodata <br />
            <p style="color: #bf1208; font-size: 14px;">You have not filled one of these important forms : Biodata, Permanent Address, Contact Address & Education; therefore you can't print!</p>
            <?php if(@$record_bio){ echo '<h3> Welcome, <strong>'.@$record_bio['bsurname']. '  '.  '  ' .@$record_bio['bfirstname']. '</strong>' .' '. 'Fill the Form one after the other</h3>';}?>
        </div>
    </div><br /><br />

            <div class="row">
                <div class="col-lg-2">
                    <div class="btn-group-vertical">
                        <button type="button" style="text-align: left"  class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal" >Permanent Address  <?php if(@$recordset_per){echo'<i class="fa fa-check icon" style="font-size: 30px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 30px;"></i>';}?></button>
                        <!--  <button type="button" disabled  style="text-align: left"  class="btn btn-danger btn-lg" data-toggle="modal"><a href="capture.php"  style="color: #ffffff"><i class="fa fa-external-link icon"></i>Take Passport Photo</a></button>-->
                        <button type="button" style="text-align: left"  class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal1">contact Address <?php if(@$recordset_con){echo'<i class="fa fa-check icon" style="font-size: 30px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 30px;"></i>';}?></button>
                        <div class="inline"> <button style="text-align: left" type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal2">Education <?php if(@$recordset_edu){echo'<i class="fa fa-check icon" style="font-size: 30px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 30px;"></i>';}?></button></div>
                        <button type="button" style="text-align: left"  class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal3">Professional Training <?php if(@$recordset_pro){echo'<i class="fa fa-check icon" style="font-size: 30px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 30px;"></i>';}?></button>
                        <button type="button" style="text-align: left"  class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal4">Scholarship/Award <?php if(@$recordset_awa){echo'<i class="fa fa-check icon" style="font-size: 30px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 30px;"></i>';}?></button>
                        <button type="button" style="text-align: left"  class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal5">Present Appointment <?php if(@$recordset_pre){echo'<i class="fa fa-check icon" style="font-size: 30px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 30px;"></i>';}?></button>
                        <button type="button" style="text-align: left"  class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal6">Previous Appointment <?php if(@$recordset_prev){echo'<i class="fa fa-check icon" style="font-size: 30px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 30px;"></i>';}?></button>
                        <button type="button" style="text-align: left"  class="btn btn-danger btn-lg" data-toggle="modal"><a href="preview_print.php" style="color: #ffffff" target="_blank"><i class="fa fa-print icon"></i>Preview Print</a></button>
                        <button type="button" style="text-align: left"  class="btn btn-danger btn-lg" data-toggle="modal"><a href="applicant.php" style="color: #ffffff" target="_blank"><i class="fa fa-print icon"></i>Print Form</a></button>

                    </div>
                </div><br />


                <!--Biodata-->
                <div class="col-lg-7 col-sm-offset-1">
                    <form class="form-horizontal"  method="post" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">

                        <div class="input-container">
                            <i class="fa fa-text-width icon"><br />Surname</i>
                            <input class="input-field" type="text" placeholder="Surname" value="<?php echo @$surname; ?>" required name="bsurname">
                        </div>

                        <div class="input-container">
                            <i class="fa fa-text-width icon"><br />Firstame</i>
                            <input class="input-field" type="text"   placeholder="Firstname" value="<?php echo @$firstname; ?>" required name="bfirstname">
                        </div>

                        <div class="input-container">
                            <i class="fa fa-text-width icon"><br />Othername</i>
                            <input class="input-field" type="text" placeholder="Othername" value="<?php echo @$othername ?>"   name="bothername">
                        </div>

                        <div class="input-container">
                            <i class="fa fa-text-width icon"><br />Maiden Name</i>
                            <input class="input-field" type="text" placeholder="Maiden Name" value="<?php echo @$maiden?>"   name="maiden">
                        </div>
                        <div class="input-container">
                            <i class="fa fa-clock-o icon">&nbsp;<br /> Date of Birth</i>
                            <?php if(@$record_bio){echo '<input class="input-field" type="date" readonly placeholder="Date of Birth" value="'.@$dob.'"  required name="dob">&nbsp;&nbsp; <span style="color: #bf1208; font-size: 20px;"><strong>It is not editable once filled</strong></span>';}?>
                            <?php if(!@$record_bio){echo '<input class="input-field" type="date"  placeholder="Date of Birth " value="'.@$dob.'"  required name="dob"> &nbsp;&nbsp; <span style="color: #bf1208; font-size: 20px;"><strong>It is not editable once filled</strong></span>';}?>

                        </div>



                        <div class="input-container">
                            <i class="fa fa-sort-alpha-asc icon"></i>
                            <select class="input-field" name="gender" required>
                                <option value="">Select Gender</option>
                                <?php do{ ?>
                                    <option value="<?php echo @$record_ge['gender_id']; ?>"><?php echo @$record_ge['gender']; ?></option>
                                <?php }while(@$record_ge = mysqli_fetch_assoc($result_ge))?>
                            </select>
                        </div>


                        <div class="input-container">
                            <i class="fa fa-sort-alpha-asc icon"></i>
                            <select class="input-field" name="marital_status" required>
                                <option value="">Select Marital Status</option>
                                <?php do{ ?>
                                    <option value="<?php echo @$record_ma['marital_status_id'];?>"><?php echo @$record_ma['status']; ?></option>
                                <?php } while(@$record_ma = mysqli_fetch_assoc($result_ma));?>
                            </select>
                        </div>

                        <div class="input-container" style="float: right">
                            <?php if(!@$record_bio){ echo '<input type="submit" name="submit" class="button btn btn-lg" value="Submit">';}?>
                            <?php if(@$record_bio){ echo '<input type="submit" style="background-color: #c9302c" name="update_bio" class="button2 btn btn-lg" value="Update">';}?>
                        </div>

                    </form>
                </div>

                <div class="col-lg-1" align="right">
                    <button type="button" class="button btn-danger btn-lg" data-toggle="modal"><a href="logoutlogic.php" style="color: #ffffff">Logout</a> </button>
                </div>


            </div><br /><br />




        </div>
    </div>
</div>







<?php require ('footer.php');?>



<!-- Permanent Address-->
<div class="main-content">
    <div class="fluid-container">

        <div class="content-wrapper">

            <div class="page-section" id="about">
                <div class="container-fluid">

                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->

                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="panel panel-danger">
                                        <?php require ('header.php')?>
                                        <div class="panel-body" style="margin-left: 80px">
                                            <button type="button" class="close" data-dismiss="modal" style="font-size: 30px; font-weight: 100; color: #000000;"><i class="fa fa-close"><span style="color: forestgreen">&nbsp;Close</span></i></button>
                                            <h4 class="modal-title" align="center" style="color:#000000; font-size: 20px ;">Add  Permanent Address</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                                        <div class="input-container">
                                                            <i class="fa fa-text-width icon"></i>
                                                            <input class="input-field" type="text" placeholder="Street Address" value="<?php echo @$street_add; ?>" required name="street_add">
                                                        </div>

                                                        <div class="input-container">
                                                            <i class="fa fa-text-width icon"></i>
                                                            <input class="input-field" type="text"   placeholder="Home Town" value="<?php echo @$home_town; ?>" required name="home_town">
                                                        </div>

                                                        <div class="input-container">
                                                            <i class="fa fa-sort-alpha-asc icon"></i>
                                                            <select class="input-field state state-control" name="state" id="state" required>
                                                                <option value="">Select State</option>
                                                                <?php do{  ?>
                                                                    <option value="<?php echo $recordset['state_id']; ?>"><?php echo $recordset['state_name'];?></option>
                                                                <?php }while($recordset = mysqli_fetch_assoc($query_run_st)); ?>
                                                            </select>
                                                        </div>

                                                        <div class="input-container">
                                                            <i class="fa fa-sort-alpha-asc icon"></i>
                                                            <select class="input-field lg-control" name="lg" id="lg" required>
                                                                <option value="">Select Local Govt.</option>

                                                            </select>
                                                        </div>

                                                        <div class="input-container">
                                                            <i class="fa fa-sort-alpha-asc icon"></i>
                                                            <select class="input-field" name="senate" required>
                                                                <option value="">Select Senatorial District</option>
                                                                <?php do{ ?>
                                                                    <option value="<?php echo @$record_sen['senatorial_district_id']; ?>"><?php echo @$record_sen['district']; ?></option>
                                                                <?php }while(@$record_sen = mysqli_fetch_assoc($result_sen))?>
                                                            </select>
                                                        </div>


                                                        <div class="input-container">
                                                            <i class="fa fa-sort-alpha-asc icon"></i>
                                                            <select class="input-field" name="nation" required>
                                                                <option value="">Select Country</option>
                                                                <?php do{ ?>
                                                                    <option value="<?php echo @$record_cou['country_id'];?>"><?php echo @$record_cou['country']; ?></option>
                                                                <?php } while(@$record_cou = mysqli_fetch_assoc($result_cou));?>
                                                            </select>
                                                        </div>


                                                        <div class="input-container" style="float: right">
                                                            <?php if(!@$recordset_per){ echo '<input type="submit" name="submit_per" class="button btn btn-lg" value="Submit">';}?>
                                                            <?php if(@$recordset_per){ echo '<input type="submit" style="background-color: #c9302c" name="update_per" class="button2 btn btn-lg" value="Update">';}?>
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
    </div>
</div>





<!-- Contact Address-->
<div class="container-fluid">

    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div class="panel panel-danger">
                        <?php require ('header.php')?>
                        <div class="panel-body" style="margin-left: 80px">
                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp<span style="color:forestgreen;">Close</span></button>
                            <h4 class="modal-title" align="center" style="color:#000000; font-size: 20px ;">Add Contact Address</h4>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="col-lg-12">
                                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"></i>
                                            <input class="input-field" type="text" placeholder="Street Address" value="<?php echo @$street_add2; ?>" required name="street_add2">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"></i>
                                            <input class="input-field" type="text"   placeholder="City" value="<?php echo @$city; ?>" required name="city">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-sort-alpha-asc icon"></i>
                                            <select class="input-field state2 state-control2" name="state2" id="state2" required>
                                                <option value="">Select State</option>
                                                <?php do{  ?>
                                                    <option value="<?php echo $recordset2['state_id']; ?>"><?php echo $recordset2['state_name'];?></option>
                                                <?php }while($recordset2 = mysqli_fetch_assoc($query_run_st2)); ?>
                                            </select>
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-sort-alpha-asc icon"></i>
                                            <select class="input-field lg-control2" name="lg2" id="lg" required>
                                                <option value="">Select Local Govt.</option>

                                            </select>
                                        </div>


                                        <div class="input-container" style="float: right">
                                            <?php if(!@$recordset_con){ echo '<input type="submit" name="submit_con" class="button btn btn-lg" value="Submit">';}?>
                                            <?php if(@$recordset_con){ echo '<input type="submit" style="background-color: #c9302c" name="update_con" class="button2 btn btn-lg" value="Update">';}?>
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




<!-- Education-->
<div class="container-fluid">

    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div class="panel panel-danger">
                        <?php require ('header.php')?>
                        <div class="panel-body" style="margin-left: 80px">
                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp<span style="color:forestgreen;">Close</span></button>
                            <h4 class="modal-title" align="center" style="color:#000000; font-size: 20px ;"> Education ( Add as many Education as Possible)</h4>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="col-lg-12">
                                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br />Institution</i>
                                            <input class="input-field" type="text" placeholder="Name of Institution" value="<?php echo @$school; ?>"  required name="institution">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br />Course</i>
                                            <input class="input-field" type="text"   placeholder="Computer Science" value="<?php echo @$course?>"  required name="course">
                                        </div>



                                        <div class="input-container">
                                            <i class="fa fa-sort-alpha-asc icon"></i>
                                            <select class="input-field" name="qualification" required="required">
                                                <option value="">Select Qualification</option>
                                                <?php $count = 0; do{  ?>
                                                    <option value="<?php echo $qualification_id[$count]; ?>"><?php echo $qualificationList[$count];?></option>
                                                    <?php  $count++; }while($count < $total); ?>
                                            </select>
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-clock-o icon"><br />Year</i>
                                            <input class="input-field" type="text"   placeholder="2018" value="<?php echo @$date3;?>"  required name="date3">
                                        </div>


                                        <div align="right">
                                            <button type="submit" name="submit_edu" class="button" value="Add New">Add New</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button type="button" class="button2"><a href="update_education.php" style="color: #FFFFFF">Edit</a> </button>
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


<!--Professional Training-->

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
                            <h4 class="modal-title" align="center" style="color:#000000; font-size: 20px ;">Professional Training( Add as many Professional Training as Possible)</h4>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="col-lg-12">
                                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br />Institution</i>
                                            <input class="input-field" type="text" placeholder="Name of Institution" value="<?php echo @$school3;?>"  required name="institution3">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br />Course</i>
                                            <input class="input-field" type="text"   placeholder="Accounting" value="<?php echo @$course3 ?>"  required name="course3">
                                        </div>



                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br />Certification <br />Honours</i>
                                            <input class="input-field" type="text"   placeholder="ICAN" value="<?php echo @$cert?>"  required name="cert">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-clock-o icon"><br />Year</i>
                                            <input class="input-field" type="text"   placeholder="2018"  value="<?php echo @$date4;?>" required name="date4">
                                        </div>



                                        <div align="right">
                                            <button type="submit" name="submit_pro" class="button" value="Add New">Add New</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button type="button" class="button2"><a href="update_pro.php" style="color: #FFFFFF">Edit</a> </button>
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


<!-- Scholarship-->
<div class="container-fluid">

    <div class="modal fade" id="myModal4" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div class="panel panel-danger">
                        <?php require ('header.php')?>
                        <div class="panel-body" style="margin-left: 80px">
                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;<span style="color:forestgreen;">Close</span></button>
                            <h6 class="modal-title"  style="color:#000000; font-size: 16px ;"><strong>To be Completed By Nigerian Candidates (Add as many scholarship/Awards as possible) </strong></h6>
                        </div><br/> <br />
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="col-lg-12">
                                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">

                                        <div class="input-container">
                                            <i class="fa fa-arrows icon"><br /></i>&nbsp;&nbsp;<span style="font-size: 16px">If you studied and qualified as a private student Please click:</span>&nbsp; &nbsp;&nbsp; &nbsp;
                                            <span style="font-size: 20px;">Yes</span>&nbsp; <input class="radio-inline" type="radio" value="Yes" name="award">&nbsp;&nbsp;&nbsp; &nbsp;<span style="font-size: 20px;">NO</span> &nbsp;<input class="radio-inline" type="radio" value="No" name="award" checked>
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-text-height icon"><br /></i>&nbsp;&nbsp;<span style="font-size: 16px">If you were in receipt of any scholarship award, please give details including any "bonds" you may have entered into.</span> <br /><br /><br />
                                        </div>

                                        <div class="input-container">
                                            <textarea class="input-field" cols="5" rows="5" placeholder="Give details here...."  name="area"></textarea>
                                        </div>


                                        <div align="right">
                                            <button type="submit" name="submit_awa" class="button" value="Add New">Add New</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button type="button" class="button2"><a href="update_award.php" style="color: #FFFFFF">Edit</a> </button>
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

<!--Present Appointment-->

<div class="container-fluid">

    <div class="modal fade" id="myModal5" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div class="panel panel-danger">
                        <?php require ('header.php')?>
                        <div class="panel-body" style="margin-left: 80px">
                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp<span style="color:forestgreen;">Close</span></button>
                            <h4 class="modal-title" align="center" style="color:#000000; font-size: 20px ;"> Present Appointment </h4>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="col-lg-12">
                                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br /><br /> Establishment</i>
                                            <input class="input-field" type="text" placeholder="Name of Establishment" value="<?php echo @$establishment;?>"  required name="estab">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br />Address</i>
                                            <input class="input-field" type="text"   placeholder="Address" value="<?php echo @$address ?>"  required name="address">
                                        </div>



                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br />Date of  <br />Appointment</i>
                                            <input class="input-field" type="date"   placeholder="" value="<?php echo @$dates?>"  required name="dates">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-money icon"><br />Present Salary</i>
                                            <input class="input-field" type="text"   placeholder="2000.00"  value="<?php echo @$present_salary;?>" required name="salary">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-clock-o icon"><br />Nature Of Job</i>
                                            <input class="input-field" type="text"   placeholder="Nature Of Present Duties and Responsibilities"  value="<?php echo @$nature;?>" required name="nature">
                                        </div>

                                        <div class="input-container" style="float: right">
                                            <?php if(!@$recordset_pre){ echo '<input type="submit" name="submit_pre" class="button btn btn-lg" value="Submit">';}?>
                                            <?php if(@$recordset_pre){ echo '<input type="submit" style="background-color: #c9302c" name="update_pre" class="button2 btn btn-lg" value="Update">';}?>
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


<!--Previous Appointment-->

<div class="container-fluid">

    <div class="modal fade" id="myModal6" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div class="panel panel-danger">
                        <?php require ('header.php')?>
                        <div class="panel-body" style="margin-left: 80px">
                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp<span style="color:forestgreen;">Close</span></button>
                            <h4 class="modal-title" align="center" style="color:#000000; font-size: 20px ;"> Previous Appointment </h4>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="col-lg-12">
                                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br /><br /> Establishment</i>
                                            <input class="input-field" type="text" placeholder="Name of Establishment" value="<?php echo @$estab2;?>"  required name="estab2">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br />Address</i>
                                            <input class="input-field" type="text"   placeholder="Address" value="<?php echo @$address2 ?>"  required name="address2">
                                        </div>



                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br />Date of<br />Appointment</i>
                                            <input class="input-field" type="date"   placeholder="" value="<?php echo @$dates2?>"  required name="dates2">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-money icon"><br />Salary</i>
                                            <input class="input-field" type="text"   placeholder="2000.00"  value="<?php echo @$salary2;?>" required name="salary2">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-arrows icon"><br />Nature Of Job</i>
                                            <input class="input-field" type="text"   placeholder="Nature Of Present Duties and Responsibilities"  value="<?php echo @$nature2;?>" required name="nature2">
                                        </div>



                                        <div align="right">
                                            <button type="submit" name="submit_prev" class="button" value="Add New">Add New</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button type="button" class="button2"><a href="update_previous_appointment.php" style="color: #FFFFFF">Edit</a> </button>
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


</body>

</html>