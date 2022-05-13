<?php
require_once("connection.php");

session_start();

require('time_out.php');

$_SESSION['user'];

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


if($_SESSION['user']) {
//query pin no table
    @$result_pin = $db->selectPinNO2($_SESSION['user']);
    @$record_pin = mysqli_fetch_assoc($result_pin);


    //query student exam score table
    @$query_score = $db->selectStudentExamScore($record_pin['pin_no_id']);
    @$result_score = mysqli_fetch_assoc($query_score);


    //


    //query capture table

    @$result_caps = $db->selectCapture(@$record_pin['pin_no_id']);
    @$record_caps = mysqli_fetch_assoc($result_caps);

//query schools table
    @$result_res = $db->selectSchools();
    @$record_res = mysqli_fetch_assoc($result_res);


    @$result_res2 = $db->selectSchool2(@$record_pin['pin_no_id']);
    @$record_res2 = mysqli_fetch_assoc($result_res2);

    @$result_ress2 = $db->selectAllSchool(@$record_pin['pin_no_id']);
    @$record_ress2 = mysqli_fetch_assoc($result_ress2);



    @$result_bio = $db->selectBioData(@$record_pin['pin_no_id']);
    @$record_bio = mysqli_fetch_assoc($result_bio);


    @$result_bio2 = $db->selectBioDataMaritalGender(@$record_pin['pin_no_id']);
    @$record_bio2 = mysqli_fetch_assoc($result_bio2);


    @$result_pass = $db->selectPassport(@$record_pin['pin_no_id']);
    @$record_pass = mysqli_fetch_assoc($result_pass);

    @$result_rel = $db->selectReligion();
    @$record_rel = mysqli_fetch_assoc($result_rel);

    @$surname =   ucwords($_POST['bsurname']) or @$surname = ucwords($record_bio2['bsurname']);
    
    @$surname2 =   $db->escape_value($surname);

    @$firstname = ucwords($_POST['bfirstname']) or @$firstname = ucwords($record_bio2['bfirstname']);
   
    @$firstname2 = $db->escape_value($firstname);


    @$othername = ucwords($_POST['bothername']) or @$othername =  ucwords($record_bio2['bothername']);
    
    @$othername2 = $db->escape_value($othername);

    
    @$dob = $_POST['dob'] or @$dob = $record_bio2['date_of_birth'];
    @$gender = $_POST['gender'] or @$gender = $record_bio2['gender'];
    @$marital = $_POST['marital_status'] or @$marital = $record_bio2['status'];
    @$maiden = $db->escape_value($_POST['maiden']) or @$maiden = $db->escape_value($record_bio2['maiden_name']);

    @$religion = $_POST['religion'] or @$religion = $record_bio2['religion'];
    @$hobby = ucwords($_POST['hobby']) or @$hobby = ucwords($record_bio2['hobby']);

    @$applicant = $record_pin['pin_no_id'];


    //school

    @$result_pin2 = $db->selectPinCode(@$record_pin['pin']);
    @$record_pin2 = mysqli_fetch_assoc($result_pin2);

//school_id
    @$school = @$record_res2['schools_id'];

    @$result_set_ses = $db->selectSetSession3($school);
    @$record_set_ses = mysqli_fetch_assoc($result_set_ses);

//session id
    @$session = @$record_set_ses['set_session'];


    //program_id
    @$result_pro_cut = $db->selectProgram2(@$record_pin['pin_no_id']);
    @$record_pro_cut = mysqli_fetch_assoc($result_pro_cut);

    @$program_cut = $record_pro_cut['programs_id'];

    //query cut_off_mark table
    @$query_cutoff = $db->selectCutOffMarks(@$school, $session, $program_cut);
    @$result_cutoff = mysqli_fetch_assoc($query_cutoff);


    /*
        if(!($record_ress2['schools_id'])) {
            if (@$record_pin) {


                @$char = "0123456";

                if ($code = substr(str_shuffle($char), -1000000000, 7)) {

                    @$codes = $code;

                    @$query = "INSERT INTO school (schools_id, code, session, applicant_id) VALUES('{$school}', '{$codes}', '{$session}', '{$applicant}')";
                    $db->insertPins($query);
                    echo "<meta http-equiv='refresh' content='0'>";

                } else {

                   header('location:index.php');
                }


            }

        }
    */

    if (isset($_POST['update_res'])) {
        $school = $_POST['school'];

        if (@$record_res2) {
            $query1 = "UPDATE school SET schools_id = '{$school}' WHERE applicant_id = '{$applicant}'";
            $db->update($query1);
            echo "<meta http-equiv='refresh' content='0'>";

        }


    }


    //biodata

//date of birth in years
    @$age = $db->age($dob);


    if (isset($_POST['submit'])) {


        if (@$record_pin) {
            @$query = "INSERT INTO bio_data(bsurname, bfirstname, bothername, maiden_name, date_of_birth, bgender, bmarital_status,  breligion_id, hobby, applicant_id) VALUES('{$surname2}', '{$firstname2}', '{$othername2}', '{$maiden}', '{$dob}', '{$gender}', '{$marital}', '{$religion}', '{$hobby}', '{$applicant}')";
            $db->insert($query);
            //  echo '<script type="text/javascript"> alert("Click and fill next form : Department") </script>';
            echo "<meta http-equiv='refresh' content='0'>";

        }
    }

    if (isset($_POST['update_bio'])) {

        if (@$record_bio) {
            $query1 = "UPDATE bio_data SET bsurname = '{$surname2}', bfirstname = '{$firstname2}', bothername = '{$othername2}', maiden_name = '{$maiden}', date_of_birth = '{$dob}', bgender = '{$gender}', bmarital_status = '{$marital}', breligion_id ='{$religion}', hobby = '{$hobby}' WHERE applicant_id = '{$applicant}'";
            $db->update($query1);
            echo "<meta http-equiv='refresh' content='0'>";

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


    @$result_per2 = $db->selectPermanentAddSenatorialStateLgCountry($record_pin['pin_no_id']);
    @$recordset_per2 = mysqli_fetch_assoc($result_per2);


    @$street_add = ucwords($_POST['street_add']) or @$street_add = ucwords($recordset_per['street_add']);
    @$street_add_esc2 = $db->escape_value($street_add);
    @$home_town = ucwords($_POST['home_town']) or @$home_town = ucwords($recordset_per['home_town']);
    @$senate = $_POST['senate'];
    @$lg = $_POST['lg'];
    @$state = $_POST['state'];
    @$nation = $_POST['nation'];
    @$applicant = $record_pin['pin_no_id'];

    if (isset($_POST['submit_per'])) {
        if (@$record_pin) {
            $query_per = "INSERT INTO permanent_add (street_add, home_town, senatorial_district, lg_of_origin2, state_of_origin2, nationality, applicant_id) VALUES ('{$street_add_esc2}', '{$home_town}', '{$senate}', '{$lg}', '{$state}', '{$nation}', '{$applicant}')";
            $db->insert($query_per);
            // echo '<script type="text/javascript"> alert("Click and fill next form : Contact Address") </script>';
            echo "<meta http-equiv='refresh' content='0'>";
        }

    }

    if (isset($_POST['update_per'])) {
        if (@$recordset_per) {
            $query_per = "UPDATE permanent_add SET street_add = '{$street_add_esc2}', home_town = '{$home_town}', senatorial_district = '{$senate}', lg_of_origin2 = '{$lg}', state_of_origin2 = '{$state}', nationality = '{$nation}' WHERE applicant_id = '{$applicant}'";
            $db->update($query_per);
            echo "<meta http-equiv='refresh' content='0'>";
        }

    }


    //  Work Experience Modal

    @$result_wk = $db->selectWorkExperience(@$record_pin['pin_no_id']);
    @$recordset_wk = mysqli_fetch_assoc($result_wk);


    @$establishment3 = ucwords($_POST['estab']);
    @$establishment33 = $db->escape_value($establishment3);
    @$position = ucwords($_POST['position']);
    @$yearfw = ucwords($_POST['yearfw']);
    @$yeartw = ucwords($_POST['yeartw']);
    @$applicant = @$record_pin['pin_no_id'];


    if (isset($_POST['submit_wk'])) {
        if (@$record_pin) {
            $query_wk = "INSERT INTO work_experience(establishment, position, yearfw, yeartw, applicant_id) VALUES ('{$establishment33}', '{$position}', '{$yearfw}', '{$yeartw}', '{$applicant}')";
            $db->insert($query_wk);
            // echo '<script type="text/javascript"> alert("Click and fill next form : Contact Address") </script>';
            echo "<meta http-equiv='refresh' content='0'>";
        }

    }


    //contact modal
    //query permanent_add  table
    @$result_con = $db->selectContactAdd($record_pin['pin_no_id']);
    @$recordset_con = mysqli_fetch_assoc($result_con);

    @$result_con2 = $db->selectContactAddSenatorialStateLgCountry($record_pin['pin_no_id']);
    @$recordset_con2 = mysqli_fetch_assoc($result_con2);


    @$street_add2 = ucwords($_POST['street_add2']) or @$street_add2 = ucwords($recordset_con['street_add2']);
    @$street_add22 = $db->escape_value($street_add2);
    @$city = ucwords($_POST['city']) or @$city = ucwords($recordset_con['city']);
    @$lg2 = $_POST['lg2'];
    @$state2 = $_POST['state2'];
    @$applicant = $record_pin['pin_no_id'];

    if (isset($_POST['submit_con'])) {

        if ($record_pin) {
            $query_con = "INSERT INTO contact_add(street_add2, city, lg_of_origin, state_of_origin, applicant_id) VALUES ('{$street_add22}', '{$city}', '{$lg2}', '{$state2}', '{$applicant}')";
            $db->insert($query_con);
            //  echo '<script type="text/javascript"> alert("Click and fill next form : Education") </script>';
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }

    if (isset($_POST['update_con'])) {
        if (@$recordset_con) {
            $query_con = "UPDATE contact_add SET street_add2 = '{$street_add22}', city = '{$city}', lg_of_origin = '{$lg2}', state_of_origin = '{$state2}' WHERE applicant_id = '{$applicant}'";
            $db->update($query_con);
            echo "<meta http-equiv='refresh' content='0'>";

        }

    }
    //education modal
    //query qualification table
    $query_qua = $db->selectQualification2();
    $recordset_qua = mysqli_fetch_assoc($query_qua);


    $query_edu = $db->selectEducation($record_pin['pin_no_id']);
    $recordset_edu = mysqli_fetch_assoc($query_edu);

    $query_edu2 = $db->selectEducation22($record_pin['pin_no_id']);
    $recordset_edu2 = mysqli_fetch_assoc($query_edu2);

    @$school = ucwords($_POST['institution']) or @$school = ucwords($recordset_edu['school_name']);
    @$school2 = $db->escape_value($school);
    @$course = ucwords($_POST['course']) or @$course = ucwords($recordset_edu['ecourse']);
    @$course2 = $db->escape_value($course);
    @$qual = ucwords($_POST['qual']) or @$course = ucwords($recordset_edu['equalification']);
    @$reg_no = $_POST['reg_no'] or @$reg_no = ucwords($recordset_edu['reg_no']);
    @$yearf = ucwords($_POST['yearf']) or @$yearf = ucwords($recordset_edu['yearf']);
    @$yeart = ucwords($_POST['yeart']) or @$yeart = ucwords($recordset_edu['yeart']);
    @$applicant = $record_pin['pin_no_id'];

    if (isset($_POST['submit_edu'])) {
        if ($record_pin) {
            $query_sch = "INSERT INTO education(school_name, ecourse, equalification, reg_no, yearf, yeart, applicant_id) VALUES ('{$school2}', '{$course}', '{$qual}', '{$reg_no}', '{$yearf}', '{$yeart}', '{$applicant}')";
            $db->insert($query_sch);
            echo "<meta http-equiv='refresh' content='0'>";
        }

    }


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


    $query_olevel = $db->selectOlevel($record_pin['pin_no_id']);
    $recordset_olevel = mysqli_fetch_assoc($query_olevel);


    $query_creit_passess = $db->selectCreditPasses();
    $recordset_credit_passess = mysqli_fetch_assoc($query_creit_passess);


    @$query_olevel_sitting = $db->selectOlevelSitting($record_pin['pin_no_id'], $_POST['sitting']);
    $recordset_olevel_sitting = mysqli_fetch_assoc($query_olevel_sitting);

    @$applicant = $record_pin['pin_no_id'];

    if (isset($_POST['submit_olevel'])) {
        if ($record_pin) {

            $grade_na = 10;
            $subject_na = 10;


            $exam_type = $_POST['exam_type'];

            $exam_year = $_POST['exam_year'];

            $sitting = $_POST['sitting'];

            $exam_no = $_POST['exam_no'];

            $no_of_credit = $_POST['credit'];

            if ($recordset_olevel_sitting) {
                echo '<script type="text/javascript"> alert("This record exists") </script>';
            } else {

                if ($_POST['subject_1']) {
                    $subject_1 = $_POST['subject_1'];
                } else {
                    $subject_1 = $subject_na;
                }

                if ($_POST['grade_1']) {
                    $grade_1 = $_POST['grade_1'];
                } else {
                    $grade_1 = $grade_na;
                }

                if ($_POST['subject_2']) {
                    $subject_2 = $_POST['subject_2'];
                } else {
                    $subject_2 = $subject_na;
                }

                if ($_POST['grade_2']) {
                    $grade_2 = $_POST['grade_2'];
                } else {
                    $grade_2 = $grade_na;
                }

                if ($_POST['subject_3']) {
                    $subject_3 = $_POST['subject_3'];
                } else {
                    $subject_3 = $subject_na;
                }

                if ($_POST['grade_3']) {
                    $grade_3 = $_POST['grade_3'];
                } else {
                    $grade_3 = $grade_na;
                }

                if ($_POST['subject_4']) {
                    $subject_4 = $_POST['subject_4'];
                } else {
                    $subject_4 = $subject_na;
                }

                if ($_POST['grade_4']) {
                    $grade_4 = $_POST['grade_4'];
                } else {
                    $grade_4 = $grade_na;
                }

                if ($_POST['subject_5']) {
                    $subject_5 = $_POST['subject_5'];
                } else {
                    $subject_5 = $subject_na;
                }

                if ($_POST['grade_5']) {
                    $grade_5 = $_POST['grade_5'];
                } else {
                    $grade_5 = $grade_na;
                }

                if ($_POST['subject_6']) {
                    $subject_6 = $_POST['subject_6'];
                } else {
                    $subject_6 = $subject_na;
                }

                if ($_POST['grade_6']) {
                    $grade_6 = $_POST['grade_6'];
                } else {
                    $grade_6 = $grade_na;
                }

                if ($_POST['subject_7']) {
                    $subject_7 = $_POST['subject_7'];
                } else {
                    $subject_7 = $subject_na;
                }

                if ($_POST['grade_7']) {
                    $grade_7 = $_POST['grade_7'];
                } else {
                    $grade_7 = $grade_na;
                }

                if ($_POST['subject_8']) {
                    $subject_8 = $_POST['subject_8'];
                } else {
                    $subject_8 = $subject_na;
                }

                if ($_POST['grade_8']) {
                    $grade_8 = $_POST['grade_8'];
                } else {
                    $grade_8 = $grade_na;
                }

                if ($_POST['subject_9']) {
                    $subject_9 = $_POST['subject_9'];
                } else {
                    $subject_9 = $subject_na;
                }

                if ($_POST['grade_9']) {
                    $grade_9 = $_POST['grade_9'];
                } else {
                    $grade_9 = $grade_na;
                }

                //if($_POST['score']){$jamb = $_POST['score'];}else{$jamb = 'N/A';}


                @$query = "INSERT INTO olevel (applicant_id, exam_type, exam_year, exam_no, sitting_id, subject_1,  grade_1, subject_2,  grade_2,  subject_3, grade_3,  subject_4,  grade_4,  subject_5,  grade_5,  subject_6,  grade_6,  subject_7,  grade_7, subject_8,  grade_8, subject_9,  grade_9, no_of_credit_passes) VALUES('{$applicant}', '{$exam_type}', '{$exam_year}', '{$exam_no}', '{$sitting}', '{$subject_1}',  '{$grade_1}',  '{$subject_2}',  '{$grade_2}',  '{$subject_3}',  '{$grade_3}',  '{$subject_4}',  '{$grade_4}',  '{$subject_5}',  '{$grade_5}',  '{$subject_6}',  '{$grade_6}',  '{$subject_7}',  '{$grade_7}',  '{$subject_8}',  '{$grade_8}',  '{$subject_9}', '{$grade_9}', '{$no_of_credit}')";
                $db->insert($query);
                //echo '<script type="text/javascript"> alert("Click and fill next form : Professional Training") </script>';
                echo "<meta http-equiv='refresh' content='0'>";
            }

        }

    }


    //professional Training modal

    $query_pro = $db->selectProfessionalTraining($record_pin['pin_no_id']);
    $recordset_pro = mysqli_fetch_assoc($query_pro);

    @$school3 = ucwords($_POST['institution3']);
    @$school33 = $db->escape_value($school3);
    @$course3 = ucwords($_POST['course3']);
    @$cert = $_POST['cert'];
    @$date4 = ucwords($_POST['date4']);
    @$applicant = $record_pin['pin_no_id'];

    if (isset($_POST['submit_pro'])) {
        if ($record_pin) {
            $query_pro = "INSERT INTO professional_training (pschool_name, pcourse, pcertificate, pdate, applicant_id) VALUES ('{$school33}', '{$course3}', '{$cert}', '{$date4}', '{$applicant}')";
            $db->insert($query_pro);
            // echo '<script type="text/javascript"> alert("Click and fill next form") </script>';
            echo "<meta http-equiv='refresh' content='0'>";
        }

    }

//award

    $query_awa = $db->selectAward($record_pin['pin_no_id']);
    $recordset_awa = mysqli_fetch_assoc($query_awa);

    if (isset($_POST['submit_awa'])) {


        $award = $_POST['award'];
        $scholarship = ucfirst($_POST['area']);
        if ($record_pin) {
            $query_awa = "INSERT INTO awards(award, scholarship_details, applicant_id) VALUES ('{$award}','{$scholarship}', '{$applicant}')";
            $db->insert($query_awa);
            echo "<meta http-equiv='refresh' content='0'>";
        }

    }


//present appointment
    @$result_pre = $db->selectPresentAppointment($record_pin['pin_no_id']);
    @$recordset_pre = mysqli_fetch_assoc($result_pre);


    @$establishment = ucwords($_POST['estab']) or @$establishment = ucwords($recordset_pre['pestab']);
    @$establishment = $db->escape_value($establishment);
    @$address = ucwords($_POST['address']) or @$address = ucwords($recordset_pre['paddress']);
    @$address = $db->escape_value($address);
    @$dates = $_POST['dates'] or @$dates = ucwords($recordset_pre['pdate']);
    @$present_salary = $_POST['salary'] or @$present_salary = ucwords($recordset_pre['psalary']);
    @$nature = $_POST['nature'] or @$nature = ucwords($recordset_pre['pnature']);
    @$nature = $db->escape_value($nature);
    @$applicant = $record_pin['pin_no_id'];

    if (isset($_POST['submit_pre'])) {

        if ($record_pin) {
            $query_con = "INSERT INTO present_appointment(pestab, paddress, pdate, psalary, pnature, applicant_id) VALUES ('{$establishment}', '{$address}', '{$dates}', '{$present_salary}', '{$nature}', '{$applicant}')";
            $db->insert($query_con);
            //  echo '<script type="text/javascript"> alert("Click and fill next form : Previous Appointment") </script>';
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }

    if (isset($_POST['update_pre'])) {
        if (@$recordset_pre) {
            $query_con = "UPDATE present_appointment SET pestab = '{$establishment}', paddress = '{$address}', pdate = '{$dates}', psalary = '{$present_salary}', pnature = '{$nature}'  WHERE  applicant_id = '{$applicant}'";
            $db->update($query_con);
            echo "<meta http-equiv='refresh' content='0'>";

        }

    }


//sponsor
    @$result_spon = $db->selectSponsor($record_pin['pin_no_id']);
    @$recordset_spon = mysqli_fetch_assoc($result_spon);


    @$ssurname = $_POST['ssurname'] or @$ssurname = @$recordset_spon['ssurname'];
    @$ssurname2 = $db->escape_value($ssurname);

    @$sfirstname = $db->escape_value($_POST['sfirstname']) or @$sfirstname = $db->escape_value(@$recordset_spon['sfirstname']);

   @$sfirstname2 = $db->escape_value($sfirstname);


    @$soccupation = $_POST['soccupation'] or @$soccupation = @$recordset_spon['soccupation'];
    @$scontact_add = $_POST['scontact_add'] or @$scontact_add = @$recordset_spon['scontact_add'];
    @$scontact_add2 = $db->escape_value($scontact_add);
    @$sphone_no = $_POST['sphone_no'] or @$sphone_no = @$recordset_spon['sphone_no'];
    @$semail = $_POST['semail'] or @$semail = @$recordset_spon['semail'];;
    @$applicant = $record_pin['pin_no_id'];

    if (isset($_POST['submit_spon'])) {

        if ($record_pin) {
            $query = "INSERT INTO sponsor(applicant_id, ssurname, sfirstname, soccupation, scontact_add, sphone_no, semail) VALUES('{$applicant}', '{$ssurname2}', '{$sfirstname2}', '{$soccupation }', '{$scontact_add2}' , '{$sphone_no}', '{$semail}')";
            $db->insert($query);
            //echo '<script type="text/javascript"> alert("Click and fill next form : Previous Appointment") </script>';
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }

    if (isset($_POST['update_spon'])) {
        if (@$record_pin) {
            $query = "UPDATE sponsor SET  ssurname = '{$ssurname2}', sfirstname = '{$sfirstname2}', soccupation = '{$soccupation}', scontact_add = '{$scontact_add2}' ,  sphone_no = '{$sphone_no}', semail = '{$semail}'  WHERE applicant_id = '{$applicant}'";
            $db->update($query);
            echo "<meta http-equiv='refresh' content='0'>";

        }

    }


//sponsor2
    @$result_spon2 = $db->selectModeOfTraining();
    @$recordset_spon2 = mysqli_fetch_assoc($result_spon2);


    @$result_spon22 = $db->selectModeOfTraining2($record_pin['pin_no_id']);
    @$recordset_spon22 = mysqli_fetch_assoc($result_spon22);


    @$ssponsor2 = $_POST['ssponsor'] or @$ssponsor2 = @$recordset_spon22['sponsor'];
    @$sagency = $_POST['sagency'] or @$sagency = @$recordset_spon22['sagency'];
    @$sagency2 = $db->escape_value($sagency);
    @$applicant = $record_pin['pin_no_id'];

    if (isset($_POST['submit_spon2'])) {

        if ($record_pin) {
            $query = "INSERT INTO sponsor2(ssponsor, sagency, applicant_id) VALUES('{$ssponsor2}', '{$sagency2}', '{$applicant}')";
            $db->insert($query);
            //echo '<script type="text/javascript"> alert("Click and fill next form : Previous Appointment") </script>';
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }

    if (isset($_POST['update_spon2'])) {
        if (@$record_pin) {
            $query = "UPDATE sponsor2 SET ssponsor = '{$ssponsor2}' , sagency = '{$sagency2}' WHERE applicant_id = '{$applicant}'";
            $db->update($query);
            echo "<meta http-equiv='refresh' content='0'>";

        }

    }


    //NOK
    @$result_nok = $db->selectNOK($record_pin['pin_no_id']);
    @$recordset_nok = mysqli_fetch_assoc($result_nok);


    @$result_gen = $db->selectGender2();
    @$recordset_gen = mysqli_fetch_assoc($result_gen);

    @$nsurname = $db->escape_value($_POST['nsurname']) or @$nsurname = $db->escape_value(@$recordset_nok['nsurname']);
   
    @$nsurname2 = $db->escape_value($nsurname);

    @$nfirstname = $db->escape_value($_POST['nfirstname']) or @$nfirstname = $db->escape_value(@$recordset_nok['nfirstname']);
    
    @$nfirstname2 = $db->escape_value($nfirstname);


    @$ngender = $_POST['ngender'] or @$ngender = @$recordset_nok['gender'];
    @$nrelationship = $_POST['nrelationship'] or @$nrelationship = $recordset_nok['nrelationship'];
    @$ncontact_add = $db->escape_value($_POST['ncontact_add']) or @$ncontact_add = $db->escape_value(@$recordset_nok['ncontact_add']);
    @$ncontact_add2 = $db->escape_value($ncontact_add);
    @$nphone_no = $_POST['nphone_no'] or @$nphone_no = @$recordset_nok['nphone_no'];
    @$nemail = $_POST['nemail'] or @$nemail = @$recordset_nok['nemail'];
    @$applicant = $record_pin['pin_no_id'];

    if (isset($_POST['submit_nok'])) {

        if ($record_pin) {
            $query = "INSERT INTO applicant_nok (applicant_id, nsurname, nfirstname, ngender, nrelationship, ncontact_add, nphone_no, nemail) VALUES('{$applicant}', '{$nsurname2}', '{$nfirstname2}', '{$ngender}', '{$nrelationship}', '{$ncontact_add2}' , '{$nphone_no}', '{$nemail}')";
            $db->insert($query);
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }

    if (isset($_POST['update_nok'])) {
        if (@$record_pin) {
            $query = "UPDATE applicant_nok SET  nsurname = '{$nsurname2}', nfirstname = '{$nfirstname2}', ngender = '{$ngender}', nrelationship = '{$nrelationship}', ncontact_add = '{$ncontact_add2}' ,  nphone_no = '{$nphone_no}', nemail = '{$nemail}'  WHERE applicant_id = '{$applicant}'";
            $db->update($query);
            echo "<meta http-equiv='refresh' content='0'>";

        }

    }


    //REFREE
    @$result_ref = $db->selectREF($record_pin['pin_no_id']);
    @$recordset_ref = mysqli_fetch_assoc($result_ref);


    @$result_gen2 = $db->selectGender3();
    @$recordset_gen2 = mysqli_fetch_assoc($result_gen2);


    @$rsurname = $db->escape_value($_POST['rsurname']) or @$rsurname = $db->escape_value($recordset_ref['rsurname']);
  
    @$rsurname2 = $db->escape_value($rsurname);

    @$rfirstname = $db->escape_value($_POST['rfirstname']) or @$rfirstname = $db->escape_value($recordset_ref['rfirstname']);

    @$rfirstname2 = $db->escape_value($rfirstname);
  
    @$rgender = $_POST['rgender'] or @$rgender = $recordset_ref['gender'];
    @$roccupation = $_POST['roccupation'] or @$roccupation = $recordset_ref['roccupation'];
    @$rcontact_add = $_POST['rcontact_add'] or @$rcontact_add = $recordset_ref['rcontact_add'];
    @$rcontact_add2 = $db->escape_value($rcontact_add);
    @$rphone_no = $_POST['rphone_no'] or @$rphone_no = $recordset_ref['rphone_no'];
    @$remail = $_POST['remail'] or @$remail = $recordset_ref['remail'];
    @$applicant = $record_pin['pin_no_id'];

    if (isset($_POST['submit_ref'])) {

        if ($record_pin) {
            $query = "INSERT INTO applicant_ref (applicant_id, rsurname, rfirstname, rgender, roccupation, rcontact_add, rphone_no, remail) VALUES('{$applicant}', '{$rsurname2}', '{$rfirstname2}', '{$rgender}', '{$roccupation}', '{$rcontact_add2}' , '{$rphone_no}', '{$remail}')";
            $db->insert($query);
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }

    if (isset($_POST['update_ref'])) {
        if (@$record_pin) {
            $query = "UPDATE applicant_ref SET  rsurname = '{$rsurname2}', rfirstname = '{$rfirstname2}', rgender = '{$rgender}', roccupation = '{$roccupation}', rcontact_add = '{$rcontact_add2}' ,  rphone_no = '{$rphone_no}', remail = '{$remail}'  WHERE applicant_id = '{$applicant}'";
            $db->update($query);
            echo "<meta http-equiv='refresh' content='0'>";

        }

    }


    //previous appointment

    @$establishment2 = ucwords($_POST['estab2']) or @$establishment2 = ucwords($recordset_pre['preestab']);
   
    @$establishment22 = $db->escape_value($establishment2);


    @$address2 = ucwords($_POST['address2']) or @$address2 = ucwords($recordset_pre['preaddress']);
    @$address2 = $db->escape_value($address2);
    @$dates2 = $_POST['dates2'] or @$dates2 = ucwords($recordset_pre['predate']);
    @$present_salary2 = $_POST['salary2'] or @$present_salary2 = ucwords($recordset_pre['presalary']);
    @$nature2 = $_POST['nature2'] or @$nature2 = ucwords($recordset_pre['prenature']);
    @$applicant2 = $record_pin['pin_no_id'];


    @$result_prev = $db->selectPreviousAppointment($record_pin['pin_no_id']);
    @$recordset_prev = mysqli_fetch_assoc($result_prev);

    if (isset($_POST['submit_prev'])) {


        if ($record_pin) {
            $query_con = "INSERT INTO previous_appointment(preestab, preaddress, predate, presalary, prenature, applicant_id) VALUES ('{$establishment22}', '{$address2}' , '{$dates2}', '{$present_salary2}', '{$nature2}', '{$applicant2}')";
            $db->insert($query_con);
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }






    @$institution_add = $db->escape_value($_POST['institution_add']);
  
    @$institution_add2 = $db->escape_value($institution_add);



    @$qualification_add = $_POST['qualification_add'];
    @$grade_add = $_POST['grade_add'];
    @$yfrom_add = $_POST['yfrom_add'];
    @$yto_add = $_POST['yto_add'];
    @$applicant = $record_pin['pin_no_id'];

    if (isset($_POST['submit_add'])) {

        if ($record_pin) {
            $query = "INSERT INTO additional_qualification(institution, qualification_id, grade_id, yfrom, yto, applicant_id) VALUES('{$institution_add2}', '{$qualification_add}', '{$grade_add}', '{$yfrom_add}', '{$yto_add}', '{$applicant}')";
            $db->insert($query);
            echo "<meta http-equiv='refresh' content='0'>";
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
    $total2 = 0;

    do {
        array_push($qualificationList, $recordset_qua['qualification']);
        array_push($qualification_id, $recordset_qua['qualification_id']);
        $total2++;
    } while ($recordset_qua = mysqli_fetch_assoc($query_qua));


    $subject_list = [];
    $subject_id_list = [];
    $total = 0;
    do {
        array_push($subject_list, $recordset_sub['subject']);
        array_push($subject_id_list, $recordset_sub['subject_id']);

        $total++;
    } while (@$recordset_sub = mysqli_fetch_assoc($query_sub));


    $grade_list = [];
    $grade_id_list = [];
    $total_1 = 0;
    do {
        array_push($grade_list, $recordset_grad['grade']);
        array_push($grade_id_list, $recordset_grad['grade_id']);
        $total_1++;
    } while (@$recordset_grad = mysqli_fetch_assoc($query_grad));


    $exam_type_list = [];
    $exam_id_list = [];
    $total_2 = 0;

    do {
        array_push($exam_type_list, $recordset_exa['exam_type']);
        array_push($exam_id_list, $recordset_exa['exam_type_id']);
        $total_2++;
    } while (@$recordset_exa = mysqli_fetch_assoc($query_exa));



    //JAMB SCORE
    @$result_jamb = $db->selectJamb($record_pin['pin_no_id']);
    @$recordset_jamb = mysqli_fetch_assoc($result_jamb);



    @$jamb_score = $_POST['jamb_score'] or @$jamb_score = $recordset_jamb['jamb_score'];
    @$exam_no = $_POST['exam_no'] or @$exam_no = $recordset_jamb['exam_no'];

    @$applicant = $record_pin['pin_no_id'];

    if (isset($_POST['submit_jamb'])) {

        if ($record_pin) {
            $query = "INSERT INTO jamb_score(exam_no, jamb_score, applicant_id) VALUES('{$exam_no}','{$jamb_score}','{$applicant}')";
            $db->insert($query);
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }

    if (isset($_POST['update_jamb'])) {
        if (@$record_pin) {
            $query = "UPDATE jamb_score SET exam_no = '{$exam_no}',  jamb_score = '{$jamb_score}' WHERE applicant_id = '{$applicant}'";
            $db->update($query);
            echo "<meta http-equiv='refresh' content='0'>";

        }

    }



    //PROGRAM
    @$result_prog = $db->selectPrograms();
    @$recordset_prog = mysqli_fetch_assoc($result_prog);


    @$result_prog2 = $db->selectProgram($record_pin['pin_no_id']);
    @$recordset_prog2 = mysqli_fetch_assoc($result_prog2);


    @$program = $_POST['program'] or @$program = $recordset_prog2['program'];
    @$applicant = $record_pin['pin_no_id'];

    if (isset($_POST['submit_prog'])) {

        if ($record_pin) {
            $query = "INSERT INTO program (programs_id, applicant_id) VALUES('{$program}', '{$applicant}')";
            $db->insert($query);
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }

    if (isset($_POST['update_prog'])) {
        if (@$record_pin) {
            $query = "UPDATE  program SET  programs_id = '{$program}'  WHERE applicant_id = '{$applicant}'";
            $db->update($query);
            echo "<meta http-equiv='refresh' content='0'>";

        }

    }


    //query additional qualification table
    @$result_addqual = $db->selectAddQualification($record_pin['pin_no_id']);
    @$recordset_add = mysqli_fetch_assoc($result_addqual);

}

else{

    header("Location: index.php");
}



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

    <style>
        .link {
            padding:5px;
        }

        div{

            padding:5px;
        }

        .body{
            height: auto;
            border:1px solid black;
        }
    </style>

</head>



<body>
<div class="container-fluid body">
    <?php require ('header.php');?>
    <div class="row">

    </div>


    <div class="row">
        <div class="col-lg-12 heading">
            Biodata 
            <?php if(@$record_bio){ echo '<h3> Welcome, <strong>'.@$record_bio['bsurname']. '  '.  '  ' .@$record_bio['bfirstname']. '</strong>' .' '. 'Fill the Form one after the other</h3>';}?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2">
            <div class="btn btn-group btn-vertical">
                <?php if($record_res2['schools_id'] == 3){
                    echo '<a href="#" style="text-align: left; display:inline;"  class="btn btn-success  btn-md link" data-toggle="modal" data-target="#myModalexams">Exam NO';
                    if(@$record_caps){echo'<i class="fa fa-check icon" style="font-size: 20px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 20px;"></i></a>';}
                    ;}?>
                <?php if($record_res2['schools_id'] == 11){
                    echo '<a href="#" style="text-align: left; display:inline;"  class="btn btn-success  btn-md link" data-toggle="modal" data-target="#myModaladm">Admission Status';
                    if(@$result_score){echo'<i class="fa fa-check icon" style="font-size: 20px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 20px;"></i></a>';}
                    ;}?>

                <a href="#"  style="text-align: left; display:inline;" class="btn btn-success btn-md link" data-toggle="modal" data-target="#myModalr">School <?php  if(@$record_res2){echo'<i class="fa fa-check icon" style="font-size: 20px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 20px;"></i>';}?></a>
                <a href="capture.php" style="text-align: left; display:inline;"  class="btn btn-success  btn-md link">Passport Photo <?php if(@$record_pass){echo'<i class="fa fa-check icon link" style="font-size: 20px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 20px;"></i>';}?></a>
                <a href="#" style="text-align: left; display:inline;" class="btn btn-success  btn-md link" data-toggle="modal" data-target="#myModal">Permanent Address <?php if(@$recordset_per){echo'<i class="fa fa-check icon" style="font-size: 20px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 20px;"></i>';}?></a>
                <a href="#" style="text-align: left; display:inline;"  class="btn btn-success  btn-md link" data-toggle="modal" data-target="#myModal1">Contact Address <?php if(@$recordset_con){echo'<i class="fa fa-check icon" style="font-size:20px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 20px;"></i>';}?></a>
                <a href="#" style="text-align: left; display:inline;" type="button" class="btn btn-success  btn-md link" data-toggle="modal" data-target="#myModalre">O'Level Qualification <?php if(@$recordset_olevel){echo'<i class="fa fa-check icon" style="font-size: 20px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 20px;"></i>';}?></a>

                <?php if($record_res2['schools_id'] == 11){
                    echo '<a href="#" style="text-align: left; display:inline;"  class="btn btn-success  btn-md link" data-toggle="modal" data-target="#myModaljamb">Jamb Score';
                    if(@$recordset_jamb){echo'<i class="fa fa-check icon" style="font-size: 20px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 20px;"></i></a>';}
                    ;}?>

                <?php if($record_res2['schools_id'] == 11){
                    echo '<a href="#" style="text-align: left; display:inline;"  class="btn btn-success  btn-md link" data-toggle="modal" data-target="#myModalprog">Program';
                    if(@$recordset_prog2){echo'<i class="fa fa-check icon" style="font-size: 20px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 20px;"></i></a>';}
                    ;}?>


                <?php if($record_res2['schools_id'] == 11){
                    echo  '<a href="#"style="text-align: left; display:inline;" type="button" class="btn btn-success  btn-md link" data-toggle="modal" data-target="#myModaladd">Additional Qualification';
                    if(@$recordset_add){echo'<i class="fa fa-check icon" style="font-size: 20px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 20px;"></i></a>';}
                    ;}?>

                <?php if($record_res2['schools_id'] == 8  or $record_res2['schools_id'] == 9 or $record_res2['schools_id'] == 3 or $record_res2['schools_id'] == 12  or $record_res2['schools_id'] == 13     ){
                    echo  '<a href="#"style="text-align: left; display:inline;" type="button" class="btn btn-success  btn-md link" data-toggle="modal" data-target="#myModal2">Academic Record';
                    if(@$recordset_edu){echo'<i class="fa fa-check icon" style="font-size: 20px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 20px;"></i></a>';}
                    ;}?>

                <?php if($record_res2['schools_id'] == 8  or $record_res2['schools_id'] == 12  or $record_res2['schools_id'] == 12 or $record_res2['schools_id'] == 9  or $record_res2['schools_id'] == 13   ){
                    echo '<a href="#"style="text-align: left; display:inline;" type="button" class="btn btn-success  btn-md link" data-toggle="modal" data-target="#myModalwe"> Work Experience';
                    if(@$recordset_wk){echo '<i class="fa fa-check icon" style="font-size: 20px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 20px;"></i></a>';}
                    ;}?>
                <?php if($record_res2['schools_id'] == 3  or $record_res2['schools_id'] == 11){
                    echo '<a href="#" style="text-align: left; display:inline;"  class="btn btn-success  btn-md link" data-toggle="modal" data-target="#myModals">Sponsor';
                    if(@$recordset_spon){echo'<i class="fa fa-check icon" style="font-size: 20px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 20px;"></i></a>';}
                    ;}?>
                <a href="#" style="text-align: left; display:inline;"  class="btn btn-success  btn-md link" data-toggle="modal" data-target="#myModalnok">Next Of Kin <?php if(@$recordset_nok){echo'<i class="fa fa-check icon" style="font-size: 20px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 20px;"></i>';}?></a>
                <a href="#" style="text-align: left; display:inline;"  class="btn btn-success  btn-md link" data-toggle="modal" data-target="#myModalref">Referee<?php if(@$recordset_ref){echo'<i class="fa fa-check icon" style="font-size: 20px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 20px;"></i>';}?></a>
                <?php if($record_res2['schools_id'] == 8  or $record_res2['schools_id'] == 12 or $record_res2['schools_id'] == 9  or $record_res2['schools_id'] == 13   ){
                    echo '<a href="#" style="text-align: left; display:inline;"  class="btn btn-success  btn-md link" data-toggle="modal" data-target="#myModalsp2">Sponsor';
                    if(@$recordset_spon22){echo'<i class="fa fa-check icon" style="font-size: 20px;"></i>';} else{echo '<i class="fa fa-remove icon" style="color: #bf1208; font-size: 20px;"></i></a>';}
                    ;}?>

                <?php if($record_res2['schools_id'] == 3){
                    echo '<a href="preview_print.php" style="color: #ffffff;font-size: 20px; display:inline;" class="btn btn-success  btn-md link" target="_blank"><i class="fa fa-print icon link">&nbsp;&nbsp;&nbsp;&nbsp;Preview Form</i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';}?>

                <?php if($record_res2['schools_id'] == 3){
                    echo '<a href="applicant.php" style="color: #ffffff; font-size: 20px; display:inline;" class="btn btn-success  btn-md link" target="_blank"><i class="fa fa-print icon link">&nbsp;&nbsp;&nbsp;&nbsp;Print Form</i></a>';}?>

                <?php if($record_res2['schools_id'] == 3){
                    echo '<a href="photo_card.php" style="color: #ffffff; font-size: 20px; display:inline;" class="btn btn-success  btn-md link" target="_blank"><i class="fa fa-print icon link">&nbsp;&nbsp;&nbsp;&nbsp;Photo Card</i></a>';}?>



                <?php if($record_res2['schools_id'] == 8  or $record_res2['schools_id'] == 12 or $record_res2['schools_id'] == 9  or $record_res2['schools_id'] == 13   ){
                    echo '<a href="post_basic_preview_print.php" style="color: #ffffff;font-size: 20px; display:inline;" class="btn btn-success  btn-md link" target="_blank"><i class="fa fa-print icon link">&nbsp;&nbsp;Preview Form</i></a>';}?>

                <?php if($record_res2['schools_id'] == 8  or $record_res2['schools_id'] == 12 or $record_res2['schools_id'] == 9  or $record_res2['schools_id'] == 13   ){
                    echo '<a href="post_basic_print.php" style="color: #ffffff; font-size: 20px; display:inline;" class="btn btn-success  btn-md link" target="_blank"><i class="fa fa-print icon link">&nbsp;&nbsp;&nbsp;&nbsp;Print Form</i></a>';}?>

                <?php if($record_res2['schools_id'] == 8  or $record_res2['schools_id'] == 12 or $record_res2['schools_id'] == 9  or $record_res2['schools_id'] == 13   ){
                    echo '<a href="photo_card2.php" style="color: #ffffff; font-size: 20px; display:inline;" class="btn btn-success  btn-md link" target="_blank"><i class="fa fa-print icon link">&nbsp;&nbsp;&nbsp;&nbsp;Photo Card</i></a>';}?>



                <?php if($record_res2['schools_id'] == 11){
                    echo '<a href="preview_shim.php" style="color: #ffffff;font-size: 20px; display:inline;" class="btn btn-success  btn-md link" target="_blank"><i class="fa fa-print icon link">&nbsp;&nbsp;Preview Form</i></a>';}?>

                <?php if($record_res2['schools_id'] == 11){
                    echo '<a href="shim_print.php" style="color: #ffffff; font-size: 20px; display:inline;" class="btn btn-success  btn-md link" target="_blank"><i class="fa fa-print icon link">&nbsp;&nbsp;&nbsp;&nbsp;Print Form</i></a>';}?>

                <?php if($record_res2['schools_id'] == 11){
                    echo '<a href="shim_photo_card.php" style="color: #ffffff; font-size: 20px; display:inline;" class="btn btn-success  btn-md link" target="_blank"><i class="fa fa-print icon link">&nbsp;&nbsp;&nbsp;&nbsp;Photo Card</i></a>';}?>


            </div>
        </div>


        <!--Biodata-->
        <div class="col-lg-6 col-sm-offset-1">
            <form class="form-horizontal"  method="post" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">

                <div class="input-container">
                    <i class="fa fa-text-width icon"><br />Surname</i>
                    <input class="input-field" type="text" placeholder="Surname" value="<?php echo @$surname; ?>" required name="bsurname">

                </div>

                <div class="input-container">
                    <i class="fa fa-text-width icon"><br />Firstname</i>
                    <input class="input-field" type="text"   placeholder="Firstname" value="<?php echo @$firstname; ?>" required name="bfirstname">
                </div>

                <div class="input-container">
                    <i class="fa fa-text-width icon"><br />Other<br />Name</i>
                    <input class="input-field" type="text" placeholder="Othername" value="<?php echo @$othername ?>"   name="bothername">
                </div>

                <div class="input-container">
                    <i class="fa fa-text-width icon"><br />Maiden <br />Name</i>
                    <input class="input-field" type="text" placeholder="Maiden Name" value="<?php echo @$maiden?>"   name="maiden">
                </div>
                <div class="input-container">
                    <i class="fa fa-clock-o icon">&nbsp;<br /> Date of <br /> Birth</i>
                    <?php if(@$record_bio){echo '<input class="input-field" type="date"   placeholder="DD-MM-YYYY" value="'.@$dob.'"  required name="dob">&nbsp;<span style="color: forestgreen; font-size: 20px;"><strong>'.@$age.'yrs</span><span style="color: #bf1208; font-size: 20px;"></strong></span>';}?>
                    <?php if(!@$record_bio){echo '<input class="input-field" type="date"   placeholder="DD-MM-YYYY"    required name="dob"> &nbsp;&nbsp; <span style="color: #bf1208; font-size: 20px;"><strong></strong></span>';}?>

                </div>



                <div class="input-container">
                    <i class="fa fa-sort-alpha-asc icon"></i><?php if(@$record_bio2){echo '<input type="text" value="'.@$gender.'" readonly>';}?>
                    <select class="input-field" name="gender" required>
                        <option value="">Select Gender</option>
                        <?php do{ ?>
                            <option value="<?php echo @$record_ge['gender_id']; ?>"><?php echo @$record_ge['gender']; ?></option>
                        <?php }while(@$record_ge = mysqli_fetch_assoc($result_ge))?>
                    </select>
                </div>


                <div class="input-container">
                    <i class="fa fa-sort-alpha-asc icon"></i><?php if(@$record_bio2){echo '<input type="text" value="'.@$marital.'" readonly>';}?>
                    <select class="input-field" name="marital_status" required>
                        <option value="">Select Marital Status</option>
                        <?php do{ ?>
                            <option value="<?php echo @$record_ma['marital_status_id'];?>"><?php echo @$record_ma['status']; ?></option>
                        <?php } while(@$record_ma = mysqli_fetch_assoc($result_ma));?>
                    </select>
                </div>



                <div class="input-container">
                    <i class="fa fa-sort-alpha-asc icon"><br /></i><?php if(@$record_bio2){echo '<input type="text" value="'.@$religion.'" readonly>';}?>
                    <select class="input-field" name="religion" required>
                        <option value="">Select Religion</option>
                        <?php do{ ?>
                            <option value="<?php echo @$record_rel['religion_id'];?>"><?php echo @$record_rel['religion']; ?></option>
                        <?php } while(@$record_rel = mysqli_fetch_assoc($result_rel));?>
                    </select>
                </div>

                <div class="input-container">
                    <i class="fa fa-text-width icon"><br />Hobbies</i>
                    <input class="input-field" type="text"  value="<?php echo @$hobby?>"   name="hobby">
                </div>

                <div>
                    <?php if(!@$record_bio){ echo'<button type="submit" name="submit" class="button btn btn-lg">Submit</button>';}?>
                    <?php if(@$record_bio){ echo'<button type="submit" name="update_bio" style="background-color: #c9302c" class="button2 btn btn-lg">Update</button>';}?>
                </div>

            </form>
        </div>


        <div class="col-md-2">
            <a href="logoutlogic.php" style="color: #ffffff; display:inline; font-size:15px;" ><i class="fa fa-sign-out btn button" aria-hidden="true"> Logout </i></a>

        </div>


    </div><br /><br />









</div>







<?php require ('footer.php');?>


<!---School--->


<div class="main-content">
    <div class="fluid-container">

        <div class="content-wrapper">

            <div class="page-section" id="about">
                <div class="container-fluid">

                    <div class="modal fade" id="myModalr" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->

                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="panel panel-danger">
                                        <?php require ('header.php')?>
                                        <div class="panel-body" style="margin-left: 80px">
                                            <button type="button" class="close" data-dismiss="modal" style="font-size: 30px; font-weight: 100; color: #000000;"><i class="fa fa-close"><span style="color: forestgreen">&nbsp;Close</span></i></button>
                                            <h4 class="modal-title" align="center" style="color:#000000; font-size: 20px ;">Application Form into the School of </h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">

                                                        <div class="input-container">
                                                            <i class="fa fa-sort-alpha-asc icon"></i><?php if(@$record_res2){ echo '<input type="text" value="'. @$record_res2['school'].'" readonly >';}?>
                                                            <!-- <select class="input-field state state-control" name="school" required>
                                                                <option value="">Select School</option>
                                                                <?php do{  ?>
                                                                    <option value="<?php echo @$record_res['schools_id']; ?>"><?php echo @$record_res['school'];?></option>
                                                                <?php }while(@$record_res = mysqli_fetch_assoc($result_res)); ?>
                                                            </select>-->
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


<!-- Program-->
<div class="main-content">
    <div class="fluid-container">

        <div class="content-wrapper">

            <div class="page-section" id="about">
                <div class="container-fluid">

                    <div class="modal fade" id="myModalprog" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->

                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="panel panel-danger">
                                        <?php require ('header.php')?>
                                        <div class="panel-body" style="margin-left: 80px">
                                            <button type="button" class="close" data-dismiss="modal" style="font-size: 30px; font-weight: 100; color: #000000;"><i class="fa fa-close"><span style="color: forestgreen">&nbsp;Close</span></i></button>
                                            <h4 class="modal-title" align="center" style="color:#000000; font-size: 20px ;">Select Program </h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">

                                                        <div class="input-container">
                                                            <i class="fa fa-sort-alpha-asc icon"></i><?php if(@$recordset_prog2){ echo '<input type="text" value="'. @$program.'" readonly >';}?>
                                                            <select class="input-field state state-control" name="program" required>
                                                                <option value="">Select Program</option>
                                                                <?php do{  ?>
                                                                    <option value="<?php echo @$recordset_prog['programs_id']; ?>"><?php echo @$recordset_prog['program'];?></option>
                                                                <?php }while(@$recordset_prog = mysqli_fetch_assoc($result_prog)); ?>
                                                            </select>
                                                        </div>
                                                        <div class="input-container" style="float: right">
                                                            <?php if(!@$recordset_prog2){ echo '<input type="submit" name="submit_prog" class="button btn btn-lg" value="Submit">';}?>
                                                            <?php if(@$recordset_prog2){ echo '<input type="submit" style="background-color: #c9302c" name="update_prog" class="button2 btn btn-lg" value="Update">';}?>
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




<!-- Exam No-->
<div class="main-content">
    <div class="fluid-container">

        <div class="content-wrapper">

            <div class="page-section" id="about">
                <div class="container-fluid">

                    <div class="modal fade" id="myModalexam" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->

                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="panel panel-danger">
                                        <?php require ('header.php')?>
                                        <div class="panel-body" style="margin-left: 80px">
                                            <button type="button" class="close" data-dismiss="modal" style="font-size: 30px; font-weight: 100; color: #000000;"><i class="fa fa-close"><span style="color: forestgreen">&nbsp;Close</span></i></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                                        <div class="input-container">
                                                            <h2><?php if(@$record_caps){ echo 'Exam NO: '.'<strong>'. substr($record_caps['capture'], 0, strlen($record_caps['capture']) -4).'</strong>';} else{echo 'NO Exam Number Yet';}?> </h2>
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





<!-- JAMB-->
<div class="main-content">
    <div class="fluid-container">

        <div class="content-wrapper">

            <div class="page-section" id="about">
                <div class="container-fluid">

                    <div class="modal fade" id="myModaljamb" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->

                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="panel panel-danger">
                                        <?php require ('header.php')?>
                                        <div class="panel-body" style="margin-left: 80px">
                                            <button type="button" class="close" data-dismiss="modal" style="font-size: 30px; font-weight: 100; color: #000000;"><i class="fa fa-close"><span style="color: forestgreen">&nbsp;Close</span></i></button>
                                            <h4 class="modal-title" align="center" style="color:#000000; font-size: 20px ;">Enter Jamb Score</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                                        <div class="input-container">
                                                            <i class="fa fa-sort-alpha-asc icon"></i><?php if(@$recordset_jamb){ echo '<input type="text" value="'. @$recordset_jamb['exam_no'].'" readonly >';}?>
                                                            <input type="text" class="input-field" name="exam_no" value="" placeholder="HG37788L">
                                                        </div>

                                                        <div class="input-container">
                                                            <i class="fa fa-sort-alpha-asc icon"></i><?php if(@$recordset_jamb){ echo '<input type="text" value="'. @$recordset_jamb['jamb_score'].'" readonly >';}?>
                                                            <input type="text" class="input-field" name="jamb_score" value="" placeholder="200">
                                                        </div>

                                                        <div class="input-container" style="float: right">
                                                            <?php if(!@$recordset_jamb){ echo '<input type="submit" name="submit_jamb" class="button btn btn-lg" value="Submit">';}?>
                                                            <?php if(@$recordset_jamb){ echo '<input type="submit" style="background-color: #c9302c" name="update_jamb" class="button2 btn btn-lg" value="Update">';}?>
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




<!--Admission letter-->
<div class="main-content">
    <div class="fluid-container">

        <div class="content-wrapper">

            <div class="page-section" id="about">
                <div class="container-fluid">

                    <div class="modal fade" id="myModaladm" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->

                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="panel panel-danger">
                                        <?php require ('header.php')?>
                                        <div class="panel-body" style="margin-left: 80px">
                                            <button type="button" class="close" data-dismiss="modal" style="font-size: 30px; font-weight: 100; color: #000000;"><i class="fa fa-close"><span style="color: forestgreen">&nbsp;Close</span></i></button>
                                            <h4 class="modal-title" align="center" style="color:#000000; font-size: 20px ;">Admission Status</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                                        <h3>Score: <?php if(@$result_score['student_score']){ echo '<span style="color: forestgreen"><strong>'. @$result_score['student_score'].'</strong></span>';} else{ echo 'N/A';}?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Admission Status:  <?php if(@$result_score['student_score'] && @$result_score['admin_status_id']) {echo '<span style="color: forestgreen"><strong>'. @$result_score['status'] . '</strong></span>';}      ?> </h3>
                                                        <h3 class="text-center"> <?php if(@$result_score['student_score'] && $result_cutoff['score'] && (@$result_score['student_score'] >= $result_cutoff['score']) && (@$result_score['admin_status_id'] == 6)) {echo  '<br/> ' .'<a href="admission_letter.php" target="_blank"><span style="color: orangered">Print Admission Letter</span></a>' ;}  ?> </h3>
                                                        <h3 class="text-center"> <?php if(@$result_score['student_score'] && $result_cutoff['score'] && (@$result_score['student_score'] >= $result_cutoff['score']) && (@$result_score['admin_status_id'] == 6)) {echo  '<br/> ' .'<a href="school_fees.docx" target="_blank"><span style="color: orangered">Print Break Down of School Fees</span></a>' ;}  ?> </h3>

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

                                                            <input class="input-field" type="text" placeholder="Permanent Home Address" value="<?php echo @$street_add; ?>" required name="street_add">
                                                        </div>

                                                        <div class="input-container">
                                                            <i class="fa fa-text-width icon"></i>
                                                            <input class="input-field" type="text"   placeholder="Home Town" value="<?php echo @$home_town; ?>" required name="home_town">
                                                        </div>

                                                        <div class="input-container">
                                                            <i class="fa fa-sort-alpha-asc icon"></i><?php if(@$recordset_per2['state_name']){ echo '<input type="text" value="'. @$recordset_per2['state_name'].'" readonly >';}?>
                                                            <select class="input-field state state-control" name="state" id="state" required>
                                                                <option value="">Select State</option>
                                                                <?php do{  ?>
                                                                    <option value="<?php echo $recordset['state_id']; ?>"><?php echo $recordset['state_name'];?></option>
                                                                <?php }while($recordset = mysqli_fetch_assoc($query_run_st)); ?>
                                                            </select>
                                                        </div>

                                                        <div class="input-container">
                                                            <i class="fa fa-sort-alpha-asc icon"></i><?php if(@$recordset_per2['lg_name']){ echo '<input type="text" value="'. @$recordset_per2['lg_name'].'" readonly >';}?>
                                                            <select class="input-field lg-control" name="lg" id="lg" required>
                                                                <option value="">Select Local Govt.</option>

                                                            </select>
                                                        </div>

                                                        <div class="input-container">
                                                            <i class="fa fa-sort-alpha-asc icon"></i><?php if(@$recordset_per2['district']){ echo '<input type="text" value="'. @$recordset_per2['district'].'" readonly >';}?>
                                                            <select class="input-field" name="senate" required>
                                                                <option value="">Select Senatorial District</option>
                                                                <?php do{ ?>
                                                                    <option value="<?php echo @$record_sen['senatorial_district_id']; ?>"><?php echo @$record_sen['district']; ?></option>
                                                                <?php }while(@$record_sen = mysqli_fetch_assoc($result_sen))?>
                                                            </select>
                                                        </div>


                                                        <div class="input-container">
                                                            <i class="fa fa-sort-alpha-asc icon"></i><?php if(@$recordset_per2['country']){ echo '<input type="text" value="'. @$recordset_per2['country'].'" readonly >';}?>
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
                                            <input class="input-field" type="text" placeholder="Postal Address" value="<?php echo @$street_add2; ?>" required name="street_add2">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"></i>
                                            <input class="input-field" type="text"   placeholder="City" value="<?php echo @$city; ?>" required name="city">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-sort-alpha-asc icon"></i><?php if(@$recordset_con2['state_name']){ echo '<input type="text" value="'. @$recordset_con2['state_name'].'" readonly >';}?>
                                            <select class="input-field state2 state-control2" name="state2" id="state2" required>
                                                <option value="">Select State</option>
                                                <?php do{  ?>
                                                    <option value="<?php echo $recordset2['state_id']; ?>"><?php echo $recordset2['state_name'];?></option>
                                                <?php }while($recordset2 = mysqli_fetch_assoc($query_run_st2)); ?>
                                            </select>
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-sort-alpha-asc icon"></i><?php if(@$recordset_con2['lg_name']){ echo '<input type="text" value="'. @$recordset_con2['lg_name'].'" readonly >';}?>
                                            <select class="input-field lg-control2" name="lg2" id="lg" required>
                                                <option value="">Select Local Govt.</option>

                                            </select>
                                        </div>


                                        <div>
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

<!--Olevel-->


<div class="container-fluid">

    <div class="modal fade" id="myModalre" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div class="panel panel-danger">
                        <?php require ('header.php')?>
                        <div class="panel-body" style="margin-left: 80px">
                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp<span style="color:forestgreen;">Close</span></button>
                            <h3  align="center" style="color:#000000; font-size: 20px ;">Examination Passed or Entered for</h3>
                            <h5  align="center" style="color:#000000; font-size: 20px ;">(Add as many sittings: not more than two)</h5>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="col-lg-12">
                                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                        <table class="table table-bordered">
                                            <tr><td colspan="4" align="center"><h5><strong>All fields are required, select or fill in <span style="color:#ee1111">N/A</span></strong><strong> if not applicable</strong></h5></td></tr>

                                            <tr>
                                                <td  colspan="2" align="center">Sitting
                                                    <select class="form-control" name="sitting" required>
                                                        <option value="">Select Exam Sitting</option>
                                                        <?php  do{?>
                                                            <option value="<?php echo @$recordset_sit['sittings_id'];?>"> <?php echo @$recordset_sit['sitting'];?></option>
                                                        <?php }while($recordset_sit = mysqli_fetch_assoc($query_sit));?>
                                                    </select></td>

                                                <td  colspan="2" align="center">Exam Type
                                                    <select class="form-control" name="exam_type" required>
                                                        <option value="">Select Exam type</option>
                                                        <?php $count_2 = 0; do{?>
                                                            <option value="<?php echo @$exam_id_list[$count_2]?>"> <?php echo @$exam_type_list[$count_2]; $count_2++;?></option>
                                                        <?php }while($count_2 < $total_2);?>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td  align="center" colspan="2">Exam Year <input class="form-control" required type="text" name="exam_year" placeholder="2016"/></td>
                                                <td  align="center" colspan="2">Exam Number <input class="form-control" required type="text" name="exam_no" placeholder="A45678923"/></td>
                                            </tr>

                                            <tr><td colspan="2" align="center">1. Subject
                                                    <select class="form-control" name="subject_1">
                                                        <option value="">Select Subject</option>
                                                        <?php $count = 0; do{?>
                                                            <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                                        <?php }while($count < $total);?>
                                                    </select>
                                                </td>

                                                <td>1. Grade
                                                    <select class="form-control" name="grade_1">
                                                        <option value="">Select Grade</option>
                                                        <?php $count_1 = 0; do{?>
                                                            <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                                        <?php }while($count_1 < $total_1);?>
                                                    </select>
                                                </td>


                                            </tr>


                                            <tr><td  colspan="2" align="center">2. Subject
                                                    <select class="form-control" name="subject_2">
                                                        <option value="">Select Subject</option>
                                                        <?php $count = 0; do{?>
                                                            <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                                        <?php }while($count < $total);?>
                                                    </select>
                                                </td>


                                                <td>2. Grade
                                                    <select class="form-control" name="grade_2">
                                                        <option value="">Select Grade</option>
                                                        <?php $count_1 = 0; do{?>
                                                            <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                                        <?php }while($count_1 < $total_1);?>
                                                    </select>
                                                </td></tr>

                                            <tr>
                                                <td  colspan="2" align="center">3. Subject
                                                    <select class="form-control" name="subject_3">
                                                        <option value="">Select Subject</option>
                                                        <?php $count = 0; do{?>
                                                            <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                                        <?php }while($count < $total);?>
                                                    </select>
                                                </td>


                                                <td>3. Grade
                                                    <select class="form-control" name="grade_3">
                                                        <option value="">Select Grade</option>
                                                        <?php $count_1 = 0; do{?>
                                                            <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                                        <?php }while($count_1 < $total_1);?>
                                                    </select>
                                                </td> </td>
                                            </tr>

                                            <tr><td  colspan="2" align="center">4. Subject
                                                    <select class="form-control"    name="subject_4">
                                                        <option value="">Select Subject</option>
                                                        <?php $count = 0; do{?>
                                                            <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                                        <?php }while($count < $total);?>
                                                    </select>
                                                </td>


                                                <td>4. Grade
                                                    <select class="form-control" name="grade_4" >
                                                        <option value="">Select Grade</option>
                                                        <?php $count_1 = 0; do{?>
                                                            <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                                        <?php }while($count_1 < $total_1);?>
                                                    </select>
                                                </td></tr>

                                            <tr><td  colspan="2" align="center">5. Subject
                                                    <select class="form-control" name="subject_5">
                                                        <option value="">Select Subject</option>
                                                        <?php $count = 0; do{?>
                                                            <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                                        <?php }while($count < $total);?>
                                                    </select>
                                                </td>


                                                <td>5. Grade
                                                    <select class="form-control" name="grade_5" >
                                                        <option value="">Select Grade</option>
                                                        <?php $count_1 = 0; do{?>
                                                            <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                                        <?php }while($count_1 < $total_1);?>
                                                    </select>
                                                </td></tr>

                                            <tr><td  colspan="2" align="center">6. Subject
                                                    <select class="form-control"  name="subject_6">
                                                        <option value="">Select Subject</option>
                                                        <?php $count = 0; do{?>
                                                            <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                                        <?php }while($count < $total);?>
                                                    </select>
                                                </td>


                                                <td>6. Grade
                                                    <select class="form-control" name="grade_6">
                                                        <option value="">Select Grade</option>
                                                        <?php $count_1 = 0; do{?>
                                                            <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                                        <?php }while($count_1 < $total_1);?>
                                                    </select>
                                                </td></tr>
                                            <tr><td  colspan="2" align="center">7. Subject
                                                    <select class="form-control" name="subject_7">
                                                        <option value="">Select Subject</option>
                                                        <?php $count = 0; do{?>
                                                            <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                                        <?php }while($count < $total);?>
                                                    </select>
                                                </td>


                                                <td>7. Grade
                                                    <select class="form-control" name="grade_7">
                                                        <option value="">Select Grade</option>
                                                        <?php $count_1 = 0; do{?>
                                                            <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                                        <?php }while($count_1 < $total_1);?>
                                                    </select>
                                                </td></tr>
                                            <tr><td  colspan="2" align="center">8. Subject
                                                    <select class="form-control"  name="subject_8">
                                                        <option value="">Select Subject</option>
                                                        <?php $count = 0; do{?>
                                                            <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                                        <?php }while($count < $total);?>
                                                    </select>
                                                </td>


                                                <td>8. Grade
                                                    <select class="form-control" name="grade_8">
                                                        <option value="">Select Grade</option>
                                                        <?php $count_1 = 0; do{?>
                                                            <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                                        <?php }while($count_1 < $total_1);?>
                                                    </select>
                                                </td></tr>

                                            </tr><tr><td  colspan="2" align="center">9. Subject
                                                    <select class="form-control" name="subject_9">
                                                        <option value="">Select Subject</option>
                                                        <?php $count = 0; do{?>
                                                            <option value="<?php echo @$subject_id_list[$count]?>"> <?php echo @$subject_list[$count]; $count++;?></option>
                                                        <?php }while($count < $total);?>
                                                    </select>
                                                </td>


                                                <td>9. Grade
                                                    <select class="form-control" name="grade_9">
                                                        <option value="">Select Grade</option>
                                                        <?php $count_1 = 0; do{?>
                                                            <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                                        <?php }while($count_1 < $total_1);?>
                                                    </select>
                                                </td>
                                            </tr>


                                            </tbody>
                                        </table>
                                        <table>
                                            <tbody>
                                            <tr>
                                                <td colspan="3">10. Number Subject Passed at Credit Level and above:&nbsp;&nbsp;</td>

                                                <td colspan="3">
                                                    <select class="form-control" name="credit" required>
                                                        <option value="">Select</option>
                                                        <?php do{?>
                                                            <option value="<?php echo @$recordset_credit_passess['credit_passes_id']?>"> <?php echo  @$recordset_credit_passess['credit_passes']?></option>
                                                        <?php }while($recordset_credit_passess = mysqli_fetch_assoc($query_creit_passess));?>
                                                    </select>
                                                </td>



                                            </tr>

                                            </tbody>
                                        </table>


                                        <div align="right">
                                            <button type="submit" name="submit_olevel" class="button">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="olevel_table.php" class="button2" style="color: #FFFFFF">Edit/Delete</a>
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




<!-- Academic Records-->
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
                            <h2  align="center" style="color:#000000; font-size: 25px ;">Academic Records</h2>
                            <h4 align="center" style="color:#000000; font-size: 15px ;">(Add as many Academic Records as possible <?php if($record_res2['schools_id'] != 3){echo 'from Primary School';}?> )</h4>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="col-lg-12">
                                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br />Institution</i>
                                            <input class="input-field" type="text" placeholder="Name of Institution"  required name="institution">
                                        </div>
                                        <?php if($record_res2['schools_id'] != 3){
                                            echo '<div class="input-container">
                                            <i class="fa fa-text-width icon"><br />Course</i>
                                            <input class="input-field" type="text"   placeholder="Computer Science"   name="course">
                                        </div>';} ?>


                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br />Qualification</i>
                                            <input class="input-field" type="text"   placeholder="WASSCE" required  name="qual">
                                        </div>


                                        <?php if($record_res2['schools_id'] != 3){
                                            echo ' <div class="input-container">
                                            <i class="fa fa-text-width icon"><br />Registration <br />Number</i>
                                            <input class="input-field" type="text"   placeholder="345278" required  name="reg_no">
                                        </div>';} ?>
                                        <!--  <div class="input-container">
                                            <i class="fa fa-sort-alpha-asc icon"></i>
                                            <select class="input-field" name="qualification" required="required">
                                                <option value="">Select Qualification</option>
                                                <?php $count = 0; do{  ?>
                                                    <option value="<?php echo $qualification_id[$count]; ?>"><?php echo $qualificationList[$count];?></option>
                                                    <?php  $count++; }while($count < $total); ?>
                                            </select>
                                        </div>-->

                                        <div class="input-container">
                                            <i class="fa fa-clock-o icon"><br />Year (From)</i>
                                            <input class="input-field" type="text"   placeholder="2011"   required name="yearf">
                                        </div>
                                        <div class="input-container">
                                            <i class="fa fa-clock-o icon"><br />Year (To)</i>
                                            <input class="input-field" type="text"   placeholder="2018"   required name="yeart">
                                        </div>


                                        <div align="right">
                                            <button type="submit" name="submit_edu" class="button" value="Add New">Add New</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="edu_table.php" class="button2" style="color: #FFFFFF">Edit/Delete</a>
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




<!-- Additional Qualification-->
<div class="container-fluid">

    <div class="modal fade" id="myModaladd" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div class="panel panel-danger">
                        <?php require ('header.php')?>
                        <div class="panel-body" style="margin-left: 80px">
                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp<span style="color:forestgreen;">Close</span></button>
                            <h2  align="center" style="color:#000000; font-size: 25px ;">Additional Qualification</h2>
                            <h4 align="center" style="color:#000000; font-size: 15px ;">(Add as many Qualification as possible <?php if($record_res2['schools_id'] != 3){echo 'from Primary School';}?> )</h4>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="col-lg-12">
                                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br />Institution</i>
                                            <input class="input-field" type="text" placeholder="Name of Institution"  required name="institution_add">
                                        </div>


                                        <div class="input-container">
                                            <i class="fa fa-sort-alpha-asc icon"></i>
                                            <select class="input-field" name="qualification_add" required="required">
                                                <option value="">Select Qualification</option>
                                                <?php $count = 0; do{  ?>
                                                    <option value="<?php echo $qualification_id[$count]; ?>"><?php echo $qualificationList[$count]; $count++;?></option>
                                                <?php   }while($count < $total2); ?>
                                            </select>
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-sort-alpha-asc icon"></i>
                                            <select class="form-control" name="grade_add" required>
                                                <option value="">Select Grade</option>
                                                <?php $count_1 = 0; do{?>
                                                    <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                                <?php }while($count_1 < $total_1);?>
                                            </select>
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-clock-o icon"><br />Year (From)</i>
                                            <input class="input-field" type="text"   placeholder="2011"   required name="yfrom_add">
                                        </div>
                                        <div class="input-container">
                                            <i class="fa fa-clock-o icon"><br />Year (To)</i>
                                            <input class="input-field" type="text"   placeholder="2018"   required name="yto_add">
                                        </div>


                                        <div align="right">
                                            <button type="submit" name="submit_add" class="button" value="Add New">Add New</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="qualification_add.php" class="button2" style="color: #FFFFFF">Edit/Delete</a>
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










<!-- Work Experience-->
<div class="container-fluid">

    <div class="modal fade" id="myModalwe" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div class="panel panel-danger">
                        <?php require ('header.php')?>
                        <div class="panel-body" style="margin-left: 80px">
                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp<span style="color:forestgreen;">Close</span></button>
                            <h2  align="center" style="color:#000000; font-size: 25px ;">Work Experience</h2>
                            <h4 align="center" style="color:#000000; font-size: 15px ;">(Add as many  as possible)</h4>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="col-lg-12">
                                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br />Establishment</i>
                                            <input class="input-field" type="text" placeholder="Name of Establishment"  required name="estab">
                                        </div>
                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br />Position</i>
                                            <input class="input-field" type="text"   placeholder="Position Held" required=""   name="position">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-clock-o icon"><br />Year(From)</i>
                                            <input class="input-field" type="text"   placeholder="2011"   required name="yearfw">
                                        </div>
                                        <div class="input-container">
                                            <i class="fa fa-clock-o icon"><br />Year(To)</i>
                                            <input class="input-field" type="text"   placeholder="2018"   required name="yeartw">
                                        </div>


                                        <div align="right">
                                            <button type="submit" name="submit_wk" class="button" value="Add New">Add New</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="work_table.php" class="button2" style="color: #FFFFFF">Edit/Delete</a>
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
                                            <button type="submit" name="submit_pro" class="button" value="Add New">Add New</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="pro_table.php" style="color: #FFFFFF" class="button2">Edit/Delete</a>
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
                                            <button type="submit" name="submit_awa" class="button" value="Add New">Add New</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="award_table.php" style="color: #FFFFFF"  class="button2">Edit/Delete</a>
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

                                        <div>
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









<!--NOK-->

<div class="container-fluid">

    <div class="modal fade" id="myModalnok" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div class="panel panel-danger">
                        <?php require ('header.php')?>
                        <div class="panel-body" style="margin-left: 80px">
                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp<span style="color:forestgreen;">Close</span></button>
                            <h4 class="modal-title" align="center" style="color:#000000; font-size: 20px ;">Add Parent/Guidance/Next of Kin </h4>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="col-lg-12">
                                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br /><br />Surname</i>
                                            <input class="input-field" type="text"  value="<?php echo @$nsurname;?>"  required name="nsurname">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br />Firstname</i>
                                            <input class="input-field" type="text"    value="<?php echo @$nfirstname; ?>"  required name="nfirstname">
                                        </div>


                                        <div class="input-container">
                                            <i class="fa fa-clock-o icon"><br />Relationship</i>
                                            <input class="input-field" type="text"   placeholder="Brother"  value="<?php echo @$nrelationship;?>" required name="nrelationship">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-sort-alpha-asc icon"></i><?php if(@$recordset_nok){echo '<input class="input-field" type="text" readonly value="'.@$ngender.'">';}?>
                                            <select class="input-field" name="ngender" required="required">
                                                <option value="">Select Gender</option>
                                                <?php  do{  ?>
                                                    <option value="<?php echo @$recordset_gen['gender_id']; ?>"><?php echo @$recordset_gen['gender'];?></option>
                                                <?php  }while( @$recordset_gen = mysqli_fetch_assoc($result_gen)); ?>
                                            </select>
                                        </div>



                                        <div class="input-container">
                                            <i class="fa fa-clock-o icon"><br />Contact Add.</i>
                                            <input class="input-field" type="text"   placeholder="Contact Address"  value="<?php echo @$ncontact_add;?>" required name="ncontact_add">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-clock-o icon"><br />Email</i>
                                            <input class="input-field" type="email"   placeholder="peterbif@yahoo.com"  value="<?php echo @$nemail;?>" required name="nemail">
                                        </div>


                                        <div class="input-container">
                                            <i class="fa fa-clock-o icon"><br />Phone</i>
                                            <input class="input-field" type="text"   placeholder="08056324789"  value="<?php echo @$nphone_no;?>" required name="nphone_no">
                                        </div>

                                        <div>
                                            <?php if(!@$recordset_nok){ echo '<input type="submit" name="submit_nok" class="button btn btn-lg" value="Submit">';}?>
                                            <?php if(@$recordset_nok){ echo '<input type="submit" style="background-color: #c9302c" name="update_nok" class="button2 btn btn-lg" value="Update">';}?>
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







<!--REFREEE-->

<div class="container-fluid">

    <div class="modal fade" id="myModalref" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div class="panel panel-danger">
                        <?php require ('header.php')?>
                        <div class="panel-body" style="margin-left: 80px">
                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp<span style="color:forestgreen;">Close</span></button>
                            <h4 class="modal-title" align="center" style="color:#000000; font-size: 20px ;"> Referee  </h4>
                            <h6 class="modal-title" align="center"><strong>Only the following categories of people can complete Referee Section of the form i.e Clergy, Imam, Justice of Peace (JP), Lawyer, Civil Servant, from Grade Level 12 and above</strong></h6>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="col-lg-12">
                                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br /><br />Surname</i>
                                            <input class="input-field" type="text"   required name="rsurname">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br />Firstname</i>
                                            <input class="input-field" type="text"     required name="rfirstname">
                                        </div>


                                        <div class="input-container">
                                            <i class="fa fa-clock-o icon"><br />Occupation/<br />Post Held</i>
                                            <input class="input-field" type="text"   placeholder="Civil Service/Chief Accountant"  required name="roccupation">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-clock-o icon"><br />Gender</i>
                                            <select class="input-field" name="rgender" required="required">
                                                <option value="">Select Gender</option>
                                                <?php  do{  ?>
                                                    <option value="<?php echo @$recordset_gen2['gender_id']; ?>"><?php echo @$recordset_gen2['gender'];?></option>
                                                <?php  }while( @$recordset_gen2 = mysqli_fetch_assoc($result_gen2)); ?>
                                            </select>
                                        </div>



                                        <div class="input-container">
                                            <i class="fa fa-clock-o icon"><br />Contact Add.</i>
                                            <input class="input-field" type="text"   placeholder="Contact Address"   required name="rcontact_add">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-clock-o icon"><br />Email</i>
                                            <input class="input-field" type="email"   placeholder="peterbif@yahoo.com"   required name="remail">
                                        </div>


                                        <div class="input-container">
                                            <i class="fa fa-clock-o icon"><br />Phone</i>
                                            <input class="input-field" type="text"   placeholder="08056324789"  required name="rphone_no">
                                        </div>


                                        <div align="right">
                                            <button type="submit" name="submit_ref" class="button" value="Add New">Add New</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="ref_table.php" class="button2" style="color: #FFFFFF">Edit/Delete</a>
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



<!--Sponsor-->

<div class="container-fluid">

    <div class="modal fade" id="myModals" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div class="panel panel-danger">
                        <?php require ('header.php')?>
                        <div class="panel-body" style="margin-left: 80px">
                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp<span style="color:forestgreen;">Close</span></button>
                            <h4 class="modal-title" align="center" style="color:#000000; font-size: 20px ;">Add Your Sponsor </h4>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="col-lg-12">
                                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br /><br />Surname</i>
                                            <input class="input-field" type="text"  value="<?php echo @$ssurname;?>"  required name="ssurname">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br />Firstname</i>
                                            <input class="input-field" type="text"    value="<?php echo @$sfirstname ?>"  required name="sfirstname">
                                        </div>


                                        <div class="input-container">
                                            <i class="fa fa-money icon"><br />Occpation</i>
                                            <input class="input-field" type="text"   placeholder="Civil Service"  value="<?php echo @$soccupation;?>" required name="soccupation">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-clock-o icon"><br />Contact Add.</i>
                                            <input class="input-field" type="text"   placeholder="Contact Address"  value="<?php echo @$scontact_add;?>" required name="scontact_add">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-clock-o icon"><br />Email</i>
                                            <input class="input-field" type="email"   placeholder="peterbif@yahoo.com"  value="<?php echo @$semail;?>" required name="semail">
                                        </div>

                                        <div class="input-container">
                                            <i class="fa fa-clock-o icon"><br />Phone NO</i>
                                            <input class="input-field" type="text"   placeholder="08056478912"  value="<?php echo @$sphone_no;?>" required name="sphone_no">
                                        </div>

                                        <div>
                                            <?php if(!@$recordset_spon){ echo '<input type="submit" name="submit_spon" class="button btn btn-lg" value="Submit">';}?>
                                            <?php if(@$recordset_spon){ echo '<input type="submit" style="background-color: #c9302c" name="update_spon" class="button2 btn btn-lg" value="Update">';}?>
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



<!--Sponsor2-->

<div class="container-fluid">

    <div class="modal fade" id="myModalsp2" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div class="panel panel-danger">
                        <?php require ('header.php')?>
                        <div class="panel-body" style="margin-left: 80px">
                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp<span style="color:forestgreen;">Close</span></button>
                            <h4 class="modal-title" align="center" style="color:#000000; font-size: 20px ;">Add Your Sponsor </h4>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="col-lg-12">
                                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">

                                        <div class="input-container">
                                            <i class="fa fa-sort-alpha-asc icon"></i><?php if(@$recordset_spon22){ echo '<input type="text" value="'. @$ssponsor2.'" readonly >';}?>
                                            <select class="input-field" name="ssponsor"  required>
                                                <option value="">Select Sponsor</option>
                                                <?php do{  ?>
                                                    <option value="<?php echo @$recordset_spon2['mode_id']; ?>"><?php echo @$recordset_spon2['sponsor'];?></option>
                                                <?php }while(@$recordset_spon2 = mysqli_fetch_assoc($result_spon2)); ?>
                                            </select>
                                        </div>
                                        <div class="input-container">
                                            <i class="fa fa-text-width icon"><br /><br />Institution</i>
                                            <input class="input-field" type="text"    placeholder="Name of Agency/Sponsoring Institution" value="<?php echo @$sagency;?>"  name="sagency">
                                        </div>
                                        <div>
                                            <?php if(!@$recordset_spon22){ echo '<input type="submit" name="submit_spon2" class="button btn btn-lg" value="Submit">';}?>
                                            <?php if(@$recordset_spon22){ echo '<input type="submit" style="background-color: #c9302c" name="update_spon2" class="button2 btn btn-lg" value="Update">';}?>
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
                                            <button type="submit" name="submit_prev" class="button" value="Add New">Add New</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="pre_table.php" style="color: #FFFFFF" class="button2">Edit/Delete</a>
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
